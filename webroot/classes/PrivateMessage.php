<?php
class PrivateMessage extends Message {

	public $user;

	public function __construct($message, User $user) 
	{
		$this->message = $message;
		$this->time = new DateTime();	
		$this->user = $user;
	}
}
