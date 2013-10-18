<?php

session_start();
include 'autoload.php';

$_SESSION['user']['current'] = new User($_POST['name']);
$_SESSION['user'][] = new User($_POST['name']);

header( 'Location: /' ) ;
