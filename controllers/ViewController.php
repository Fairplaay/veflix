<?php  

/**
* 
*/
class ViewController
{
	private static $view_path='./views/';
	#carga las vistas que recibe desde el route
	#y le devuelve el archivo solicidado
	public function loadView($view)
	{
		require_once (self::$view_path .'header.php');
		require_once (self::$view_path . $view . '.php');
		require_once (self::$view_path .'footer.php');
	}
}
