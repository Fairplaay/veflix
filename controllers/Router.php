<?php

/**
*
*/
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
			$contolador=new ViewController();
			$contolador->loadView('home');
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