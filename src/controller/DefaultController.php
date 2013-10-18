<?php

class DefaultController {
     public function indexAction() {
         echo "hello world";
         // TODO render a template here
     }

	public function signupAction($db, $post) {
		$sql = 'insert into user VALUES :firstName, :lastName, :username, :password';
		$stmt = $db->prepare($sql);
		$stmt->execute(array(
			":firstName" => $post['firstName'],
			":lastName" => $post['lastName'],
			":username" => $post['username'],
			":password" => $post['password']
		);

	}
}
