<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Recuperamos, para incluir el archivo sesion.php & iniciamos la variable.
include('sesion.php');
$data = Sessions::getInstance();

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
		$stmt = $dbPDOClass->dbPDO->prepare("SELECT * FROM personal WHERE rut=:name AND contrasena=:pass");
		$stmt->bindParam(':name', $username, PDO::PARAM_STR);
		$stmt->bindParam(':pass', $newpass, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		

		if($count == 0)
		{
			//redireccionar("login.php?error=si");
			echo "No existe el usuario!";
		}
		else
		{
			$result = $stmt->fetchAll();
			foreach ($result as $key)
			{
				$dbpass = $key['contrasena'];
				$dbrut  = $key['rut'];
				$dbname = $key['nombre'];
				$dbapellido = $key['apellido'];
				$dbcargo = $key['cargo'];
			}

			if($newpass === $dbpass)
			{
				$data->setOnline(true);
				$data->rut = $dbrut;
				$data->name = $dbname;
				$data->apellido = $dbapellido;
				$data->fullname = $dbname." ".$dbapellido;
				$data->cargo = $dbcargo;
				switch ($dbcargo) {
					case 'Bodega':
						header("Location:principalBodega.php");
						break;
					case 'Admin':
						header("Location:principalAdmin.php");
						break;
					default:
						break;
				}
			}
			else
			{
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
	header("Location: $destino");
}


?>



   

