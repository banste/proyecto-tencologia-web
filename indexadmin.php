<?php

include("conexion.php");
$connectar=conn();
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nite.cl</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap');
    </style>
</head>
<body>
        <div class = "contenedor">
                <div id="navleft">
                <a class="inicio" href="index.php"><img src="logo.jpg" width="100" height="80"></a>
                <a class="links" href="editarproducto.php">Editar producto</a>
                <a class="links" href="crearproducto.php">ingresar Producto</a>
                <a class="links" href="skere.html">Marcas</a>
                </div>
                <!--- inicio de sesion y registro --->
                <div id="naright">
                <?php
            require_once("conexion.php");
            session_start();
            if($_SESSION != null){
                if($_SESSION['admin']==0){
        ?>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Cerrar sesión</a>
            <?php
                }
            else{
            ?>
            <a href="indexadmin.php"><i class="fas fa-sign-out-alt"></i>ADMINISTRACION</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Cerrar sesión</a>
            <?php
            }
            }
            else{
          ?>
            <a href= "login.php" class="btn-abrir-popup" id = "btn-abrir-popup"><i class="fas fa-user"></i>Iniciar sesión</a>
            <a href="signup.php"><i class="fas fa-user-plus"></i>Registrarse</a>
          <?php                 
            }
        ?>
                </div>
                <!--- inicio de sesion y registro --->
        <div id="cuerpo">
        </div>

</body>
</html>
