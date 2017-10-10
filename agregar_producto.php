<?php 
//Recuperamos, para incluir el archivo sesion.php & iniciamos la variable.
include('sesion.php');
$data = Sessions::getInstance();

if ($data->isOnline == false) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Agregar productos</title>
        <link rel="stylesheet" href="estilo.css"/>
    </head>
    <body>

        <div class="contenedor">
            <div class= "encabezado">
            <div class="izq">
        
            <p>Bienvenido/a:<br> <?php echo $_SESSION['fullname']; ?></p>

            </div>
            <div class="centro">
                <?php
                    if ($_SESSION['cargo']=='Admin') {
                            echo "<a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a>";
                    }else {
                            echo "<a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>";
                    };

                    error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING);
                ?> 
            </div>
            
            <div class="derecha">
                <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
            </div>
        </div>
        <br><h1 align="center">GESTIÓN DE PRODUCTOS</h1>     

            <div class="formulario">
                <form name="registro" method="post" action="gestion_productos.php?modo=agregar" enctype="application/x-www-form-urlencoded">
                    <div class="campo">
                        <label for="codigo">Código del producto:</label>
                        <input type="text" name="codigo" required/>
                    </div>

                    
                    <div class="campo">
                        <label for="nombre">Descripción:</label>
                        <input type="text" name="descripcion" required/>
                    </div>

                    <div class="campo">
                        <label for="stock">Stock:</label>
                        <input type="number" name="stock" required/>
                    </div>
                    

                    <div class="campo">
                        <label for="proveedor">Proveedor:</label>
                        <input type="text" name="proveedor" required/>
                    </div>

                    <div class="campo">
                        <label for="fecha">Fecha ingreso:</label>
                        <input type="date" name="fecha" required/>
                    </div>

                    <div class="botones">
                        <input type="submit" name="crear" value="Agregar producto"/>
                    </div>


                    <!-- Verificación del boton submit "crear".
                        Recuperar las variables con los valores ingresados.
                        Verificar que el código no exista en los registros. 
                            Si ya existe un producto con ese codigo:
                                Mostrar mensaje con información.

                            Si no existe un producto con ese código: 
                                Insertar los datos en la tabla correspondiente.

                        Redirigir el flujo a esta misma página -->

                </form>
            </div>

        </div>
    </body>
</html>