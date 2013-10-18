<?php
include '../autoload.php';
include '../config.php';
session_start();

if ($_SERVER['REDIRECT_URL'] != '/') 
{
	$route = $_SERVER['REDIRECT_URL'];
} else {
	$route = 'index';
}
$route .= 'Action';

$db = new PDO('mysql:host=localhost;dbname=' . $config['db']['dbname'], 
    $config['db']['username'], $config['db']['username']);

// check the URL for where to route to
// if empty, go to default controller
$controller = new DefaultController();
$controller->$route($db);
