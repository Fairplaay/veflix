<?php

abstract class Model{
	//atributos
	private static $db_host='localhost';
	private static $db_user='root';
	private static $db_pass='18736609';
	private static $db_name='veflix';
	private static $db_charset='utf8';
	private $conn;
	protected $query;
	protected $row=array();
	//metodos abstractos del crud de clases que hereden
	abstract protected function set();
	abstract protected function get();
	abstract protected function del();
	//metodos para la conexion
	private function db_open(){
		$this->conn=new mysqli(
			Model::$db_host,
			Model::$db_user,
			Model::$db_pass,
			Model::$db_name);
		$this->conn->set_charset(Model::$db_charset);
	}
	//metodos para la desconexion
	private function db_close(){
		$this->conn->close();
	}
	//establece un query simple C R U
	protected function set_query(){
		$this->db_open();
		$this->conn->query($this->query);
		$this->db_close();
	}
	//traer resltados de una consulta SELECT de un array
	protected function get_query(){
		$this->db_open();
		$result= $this->conn->query($this->query);
		while ($this->row [] = $result->fetch_assoc());
		$result->close();
		$this->db_close();
		return array_pop($this->row);
	}
	
}