<?php
include '../autoload.php';
session_start();

// check the URL for where to route to

// if empty, go to default controller
$controller = new DefaultController();
$controller->indexAction();
