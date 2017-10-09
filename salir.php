<?php 
//Recuperamos, para incluir el archivo sesion.php & iniciamos la variable.
include('sesion.php');
$data = Sessions::getInstance();

if ($_GET['sal'] == 'si') {
	$data->destroy();
	header("Location: login.php");
}else{
	header("Location: principalAdmin.php");
}


 ?>
<!-- Verificar que la variable sal sea igual a si.
Cerrar la sesión. 
Redirigir el flujo a la pagina del login --> 
