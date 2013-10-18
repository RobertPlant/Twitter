<?php
include '../autoload.php';
session_start();

if ($_SERVER['REDIRECT_URL'] != '/') 
{
	$route = $_SERVER['REDIRECT_URL'];
} else {
	$route = 'index';
}
$route .= 'Action';
// check the URL for where to route to
// if empty, go to default controller
$controller = new DefaultController();
$controller->$route();
