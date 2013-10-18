<?php
class Message {
	public $message;
	public $time;

	public function __construct($message) 
	{
		$this->message = $message;
		$this->time = new DateTime();	
	}
}
