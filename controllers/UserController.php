<?php
/**
* 
*/
class UserController
{
	private $model;
	function __construct()
	{
		$this->model=new UserModel();
	}
	public function set($user_data = []){
		return $this->model->set($user_data);
	}
	public function get( $user_id = ''){
		return $this->model->get($user_id);

	}
	public function del($user_id = ''){
		return $this->model->del($user_id);
	}
}