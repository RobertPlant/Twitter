<?php

class DefaultController {
     public function indexAction() {
        require '../view/homepage.php';
     }
	
	public function registerAction() {
		require '../view/registration.php';
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
		$sql = 'select * from users where user = :username AND password = :password';
		$stmt = $db->prepare($sql);
		$stmt->execute(array(
            ":username" => $post['username'],
            ":password" => password_hash($post['password'], PASSWORD_BCRYPT)
		));
		if ($stmt->fetch() != false) {
			$_SESSION['user'] = $stmt->fetch();
		}
	
		header( 'Location: /' ) ;
	}
}
