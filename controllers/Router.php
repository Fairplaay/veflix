<?php

class Router
{
	public $route;
	function __construct($route)
	{
		#si la variable session no existe comienza una session
		if (!isset($_SESSION)) session_start();
		#si la variable session[ok] NO esta definida
		if (!isset($_SESSION['ok']))  $_SESSION['ok']=false;

		if ($_SESSION['ok']) {
			# aqui va la programacionde nuestra webapp
			$this->route=(isset($_GET['r']))? $_GET['r']: 'home';
			$controlador=new ViewController();
			switch ($this->route) {
				case 'home':
					# code...
					$controlador->loadView('home');
					break;
				case 'movieseries':
					# code...
					$controlador->loadView('movieseries');
					break;
				case 'users':
					# code...
					if (!isset($_POST['r'])) {
						# code...
						$controlador->loadView('users');
					}elseif ($_POST['r'] == 'user-add') {
						# code...
						$controlador->loadView('user-add');
					}elseif ($_POST['r'] == 'user-edit') {
						# code...
						$controlador->loadView('user-edit');
					}elseif ($_POST['r'] == 'user-del') {
						# code...
						$controlador->loadView('user-del');
					}
					break;
				case 'status':
					# code...
					#si no esta definida la variable r del formulario 
					#carga el status.php 
					if (!isset($_POST['r'])) {
						# code...
						$controlador->loadView('status');
					}elseif ($_POST['r'] == 'status-add') {
						# code...
						$controlador->loadView('status-add');
					}elseif ($_POST['r'] == 'status-edit') {
						# code...
						$controlador->loadView('status-edit');
					}elseif ($_POST['r'] == 'status-del') {
						# code...
						$controlador->loadView('status-del');
					}
					break;
				case 'salir':
					# code...
					$userSession=new Session_Controller();
					$userSession->logout();
					break;
				default:
					# code...
					$controlador->loadView('error404');
					break;
			}


		}else{
			if (!isset($_POST['user']) && !isset($_POST['pass'])) {
				# muestra un formulario de login
				$login_form=new ViewController();
				$login_form->loadView('login');
			}
			else{
				$userSession=new Session_Controller();
				$var=$userSession->login($_POST['user'],$_POST['pass']);
				if(empty($var)) {
					$login_form=new ViewController();
					$login_form->loadView('login');
					header('Location: ./?error=El Usuario o Contraseña <br> no son Correctos');
				}
				else{
					$_SESSION['ok']=true;
					foreach ($var as $row) {
						$_SESSION['user']=$row['user'];
						$_SESSION['email']=$row['email'];
						$_SESSION['name']=$row['name'];
						$_SESSION['birthday']=$row['birthday'];
						$_SESSION['pass']=$row['pass'];
						$_SESSION['role']=$row['role'];
					}
					header('Location: ./');
				}
			}
		}

	}

}