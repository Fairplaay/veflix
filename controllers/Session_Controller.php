<?php  

class Session_Controller
{
	public $session;
	function __construct()
	{
		$this->session=new UserModel();
	}
	public function login($user,$pass)
	{
		return $this->session->validateUser($user,$pass);
	}
	public function logout()
	{
		
	}
}