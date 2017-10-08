<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 /**
 * Sesiones
 */
 class Sessions
 {

 	const SESSION_STARTED = TRUE;
 	const SESSION_NOT_STARTED = FALSE;

 	private $sessionState = self::SESSION_NOT_STARTED;

 	private static $instance;

 	private function __construct() {}

 	public static function getInstance()
    {
        if ( !isset(self::$instance))
        {
            self::$instance = new self;
        }
       
        self::$instance->startSession();
       
        return self::$instance;
    }

    public function startSession()
    {
        if ( $this->sessionState == self::SESSION_NOT_STARTED )
        {
            $this->sessionState = session_start();
        }
       
        return $this->sessionState;
    }

    public function __set( $name , $value )
    {
        $_SESSION[$name] = $value;
    }

     public function __get( $name )
    {
        if ( isset($_SESSION[$name]))
        {
            return $_SESSION[$name];
        }
    }
   
   
    public function __isset( $name )
    {
        return isset($_SESSION[$name]);
    }
   
   
    public function __unset( $name )
    {
        unset( $_SESSION[$name] );
    }

    public function destroy()
    {
        if ( $this->sessionState == self::SESSION_STARTED )
        {
            $this->sessionState = !session_destroy();
            unset( $_SESSION );
           
            return !$this->sessionState;
        }
       
        return FALSE;
    }

 }


$data = Sessions::getInstance();
$data->nickname = 'Someone';
$data->age = 18;
printf( '<p>My name is %s and I\'m %d years old.</p>' , $data->nickname , $data->age );


 ?>




<!-- Evaluar que la sesión continue, verificando la variable de sesión creada para este propósito.
	Si la variable cambió su valor inicial se enviará la variable error=si al archivo salir.php -->

