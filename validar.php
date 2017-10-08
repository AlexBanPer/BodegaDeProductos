<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Iniciamos la sesion, para luego veriricar si esta conectado o no.
session_start();

//Recuperamos, para solo una carga el archivo conexion.php 
require_once("conexion.php");

// Llamamos a las variables de login.php via POST
$username = $_POST['usuario'];
$password = $_POST['pass'];

// Encriptamos la contraseña para verificacion. *Se que pudo haber sido md5($_POST[...]) pero lo hago por comodidad y para presentar bien.
$newpass = md5($password);

if($_POST)
{
	if(!empty($username) or !empty($password))
	{
		$dbPDOClass = new PDOConnect();
		$stmt = $dbPDOClass->dbPDO->prepare("SELECT nombre,contrasena FROM personal WHERE nombre=:name");
		$stmt->bindParam(':name', $username, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		

		if($count == 0)
		{
			//redireccionar("login.php?error=si");
			echo "No existe el usuario!";
		}else{
			$result = $stmt->fetchAll();
			foreach ($result as $key) {
				$dbpass = $key['contrasena'];
			}
			if($newpass === $dbpass){
				echo "Todo correcto!";
			}else{
				//redireccionar("login.php?error=si");
				echo "Datos no validos.";
			}
		}
	}
	else
	{
		//redireccionar("login.php?error=si");
		echo "Datos no validos.";
	}
}
else
{
	//redireccionar("login.php?error=si");
	echo "NO HAY DATOS! -> Vuelve a login";
}






// Funcion para redirigir
function redireccionar($destino){
	header("Refresh: 1; url=$destino");
}


?>

<!-- 
	
	Verificar que exista el registro en la base de datos.
		Si el registro existe entonces:
			Iniciar sesión.
			Crear variables de sesión a ocupar.
			Asignar los permisos según el cargo. 

		Si no existe el registro enviar una variable para mostra mensaje en pagina de login. 





   

