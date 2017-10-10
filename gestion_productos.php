<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Recuperamos, para incluir el archivo sesion.php & iniciamos la variable.
include('sesion.php');
$data = Sessions::getInstance();
$dbPDOClass = new PDOConnect();

$codigo = $_POST['codigo'];
$desc = $_POST['descripcion'];
$stock = is_numeric($_POST['stock']);
$proveedor = $_POST['proveedor'];
$fecha = $_POST['fecha'];

if (isset($_POST)) {
	if($_GET)
	{
		switch ($_GET['modo']) {
			case 'agregar':








			break;
			case 'modificar':









			break;
			case 'eliminar':









			break;
			default:
			break;
		}
	}

} else {
	if ($_SESSION['cargo']=='Admin') {
		echo "<a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a>";
	}else {
		echo "<a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>";
	};
}

// Funcion para redirigir
function redireccionar($destino){
	header("Location: $destino");
}


?>






