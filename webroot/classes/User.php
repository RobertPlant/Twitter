<?php 
class User {
	
	public $name;
	
	public function __construct($user) 
	{
		$this->name = $user;
	}	
	
	public function getDisplayName() 
	{
		return "Hello " . $this->name;	
	}
}
