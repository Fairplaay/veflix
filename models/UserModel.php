<?php
/**
* EL REQUIRE ONCE MODEL SE HARA CON UN AUTOLOADER
*/
class UserModel extends Model
{
	public function set($user_data = []){
		foreach ($user_data as $key => $value) {
			$$key = $value;
		}
		$this->query="REPLACE INTO users(user, email, name,birthday, pass, role) VALUES ('$user','$email','$name','$birthday'
			,MD5('$pass'), 'role')";
		$this->set_query();
	}
	public function get( $user = ''){
		$this->query = ($user != '')
			?"SELECT * FROM users WHERE user = '$user';"
			:"SELECT * FROM users;";
		$this->get_query();
		$data=[];
		foreach ($this->row as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}
	public function del($user = ''){
		$this->query="
		DELETE FROM users WHERE user = '$user'";
		$this->set_query();
	}
	function validateUser($user,$pass){
		$this->query="
			SELECT * FROM users 
			WHERE user = '$user'  
			AND pass = MD5('$pass')";
		$this->get_query();
		$data=array();
		foreach ($this->row as $key => $value) {
			array_push($data, $value);
		}
		return $data;
	}
}
