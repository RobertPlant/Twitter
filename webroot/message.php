<?php

session_start();
include 'autoload.php';

if ($_POST['user'] != null) {
	$_SESSION['privateMessage'][] = new PrivateMessage($_POST['message'], $_SESSION['user']['current']);
} else {
	$_SESSION['message'][] = new Message($_POST['message']);
}

header( 'Location: /' ) ;
