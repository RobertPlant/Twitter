<?php
include '../autoload.php';
include '../../vendor/autoload.php';
session_start();
$url = explode('/', $_SERVER['REDIRECT_URL']);
if ($url[1] != '') 
{
	$route = $url[1];
} else {
	$route = 'index';
}
$route .= 'Action';

$db = new PDO('mysql:host=localhost;dbname=twitter', 'root', 'lornajane');

// check the URL for where to route to
// if empty, go to default controller
$controller = new DefaultController();
$controller->$route($db, $_GET);
