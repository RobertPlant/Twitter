<?php

class DefaultController {
	public function indexAction() {
		if ($_SESSION['user'] != null) {
			header(':Location newsFeed');	
		}         
		require '../view/homepage.php';
    }
	
	public function registerAction() {
		require '../view/registration.php';
	}

	public function newsFeedAction() {
		require '../view/newsfeed.php';
	}
	
	public function createMessageAction(){
		require '../view/createmessage.php';
	}
	public function tweetAction($post){
		
	}
	public function signupAction($db, $post) {
		$db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);	
		$sql = "insert into users (firstName, lastName, username, password) VALUES (:firstName, :lastName, :username, :password)";
		$stmt = $db->prepare($sql);
		$stmt->execute(array(
			":firstName" => $post['firstName'],
			":lastName" => $post['lastName'],
			":username" => $post['username'],
			":password" => password_hash($post['password'], PASSWORD_BCRYPT)
		));
		header( 'Location: /' ) ;	
	}

	public function loginAction($db, $post) {
		$db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);	
		$sql = 'select * from users where username = :username';
		$stmt = $db->prepare($sql);
		$stmt->execute(array(
            ":username" => $post['username']
		));
		$row = $stmt->fetch();
		if (password_verify($post['password'], $row['password'])) {
			$_SESSION['user'] = $row;
			header('Location: /newsFeed');
		}
	}
}
