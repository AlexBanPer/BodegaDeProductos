<?php 
//Recuperamos, para incluir el archivo sesion.php & iniciamos la variable.
include('sesion.php');
$data = Sessions::getInstance();

if ($_GET['sal'] == 'si') {
	$data->destroy();
	header("Refresh: 1; url=login.php");
}else{
	header("Refresh: 1; url=principalAdmin.php");
}


 ?>
<!-- Verificar que la variable sal sea igual a si.
Cerrar la sesión. 
Redirigir el flujo a la pagina del login --> 
