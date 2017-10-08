<!-- Conexión a la base de datos,
codificación de caracteres,
seleccion de base de datos. -->
<?php 

/**
* PDOConnect
* Nota: La seleccion de la base de datos se hara por cada sentencia.
*/
class PDOConnect
{
	public $dbPDO;
	private $tableName;

	function __construct()
	{
		$this->checkConn();
	}

	private function checkConn($dbhost="localhost", $dbname="gestion_bodega", $dbuser="root", $dbpass="")
	{
		try{
			//Creamos la base de datos en PDO
			$this->dbPDO = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
			echo "connected!"; //Si esta conectado, mostrara un mensaje.
		}catch(PDOException $e){
			print "Error!: ".$e->getMessage()."<br>"; // En caso de error, nos dira cual es.
			die(); // Terminar todos los procesos de la clase.
		}
		
	}
}



?>