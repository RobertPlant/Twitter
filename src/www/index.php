<?php
include '../../vendor/autoload.php';
include '../autoload.php';
include '../config.php';
session_start();
$url = explode('/', $_SERVER['REDIRECT_URL']);
if ($url[1] != '') 
{
	$route = $url[1];
} else {
	$route = 'index';
}
$route .= 'Action';

$db = new PDO('mysql:host=localhost;dbname=' . $config['db']['dbname'], 
    $config['db']['username'], $config['db']['password']);

// check the URL for where to route to
// if empty, go to default controller
$controller = new DefaultController();
$controller->$route($db, $_GET);
