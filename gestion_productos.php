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
$stock = $_POST['stock'];
$proveedor = $_POST['proveedor'];
$fecha = $_POST['fecha'];

if (isset($_POST)) {
	if($_GET)
	{
		switch ($_GET['modo']) {
			case 'agregar':
			$verificar = $dbPDOClass->dbPDO->prepare("SELECT cod_producto FROM productos WHERE cod_producto=:cod");
			$verificar->bindParam(':cod', $codigo, PDO::PARAM_STR);
			$verificar->execute();
			$count = $verificar->rowCount();

			if ($count == 0) {
				$stmt = $dbPDOClass->dbPDO->prepare("INSERT INTO `productos`(`cod_producto`, `descripcion`, `stock`, `proveedor`, `fecha_ingreso`) VALUES (:cod,:descripcion,:stock,:prov,:fecha)");
				$stmt->bindParam(':cod', $codigo, PDO::PARAM_STR);
				$stmt->bindParam(':descripcion', $desc, PDO::PARAM_STR);
				$stmt->bindParam(':stock', $stock, PDO::PARAM_STR);
				$stmt->bindParam(':prov', $proveedor, PDO::PARAM_STR);
				$stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
				$stmt->execute();
				header("Location: agregar_producto.php?status=200&new=".$codigo);
			} else {
				header("Location: agregar_producto.php?status=11");
			}
			break;
			case 'modificar':









			break;
			case 'eliminar':









			break;
			default:
			break;
		}
	}else{
		header("Location: agregar_producto.php?status=10");
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






