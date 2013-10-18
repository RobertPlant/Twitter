<?php

class DefaultController {
     public function indexAction() {
         echo "hello world";
         // TODO render a template here
     }

	public function signupAction($db, $post) {
		$sql = "insert into users (firstName, lastName, username, password) VALUES (:firstName, :lastName, :username, :password)";
		$stmt = $db->prepare($sql);
		$stmt->execute(array(
			":firstName" => $post['firstName'],
			":lastName" => $post['lastName'],
			":username" => $post['username'],
			":password" => password_hash($post['password'], PASSWORD_BCRYPT)
		));
		return true;
	}

	public function loginAction($db, $post) {
		$sql = 'select * from users where user = :username AND password = :password';
		$stmt = $db->prepare($sql);
		$stmt->execute(array(
            ":username" => $post['username'],
            ":password" => password_hash($post['password'], PASSWORD_BCRYPT)
		));
		if ($stmt->fetch() != false) { return true; } 
		return false;
	}
}
