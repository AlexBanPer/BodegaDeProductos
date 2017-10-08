<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 /**
 * Sesiones
 */
 class Sessions
 {
 	public $session_name;
 	
 	function __construct()
 	{
 		if(!isset($_SESSION))
 		{
 			$this->init_session();
 		}
 	}
 	public function init_session()
 	{
 		session_start();
 	}
 	public function get_session_id()
 	{
 		return session_id();
 	}
 	public function sessionExists($session_name)
 	{
 		return isset($_SESSION[$session_name]);
 	}
 	public function create_new_session($session_name, $isArray = false)
 	{
 		if(!isset($_SESSION[$session_name]))
 		{
 			if($isArray == true)
 			{
 				$_SESSION[$session_name] = array();
 			}
 			else
 			{
 				$_SESSION[$session_name] = '';
 			}
 		}
 	}
 	public function insert_value( $session_name , array $data ){
 		if( is_array($_SESSION[$session_name]) ){
 			array_push( $_SESSION[$session_name], $data );
 		}
 	}

 	public function display_session( $session_name ){
 		echo '<pre>';print_r($_SESSION[$session_name]);echo '</pre>';
 	}

 	public function remove_session( $session_name = '' ){
 		if( !empty($session_name) ){
 			unset( $_SESSION[$session_name] );
 		}
 		else
 		{
 			unset($_SESSION);
 		}
 	}
 	public function get_session_data($session_name){
 		return $_SESSION[$session_name];
 	}

 	public function set_session_data( $session_name , $data ){
 		$_SESSION[$session_name] = $data;
 	}

 }


 $sesion = new Sessions();
 $sesion->create_new_session("myrut");
 $sesion->insert_value("myrut", array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43"));
 $sesion->get_session_data("myrut");
 $sesion->display_session("myrut");


 ?>




<!-- Evaluar que la sesión continue, verificando la variable de sesión creada para este propósito.
	Si la variable cambió su valor inicial se enviará la variable error=si al archivo salir.php -->

