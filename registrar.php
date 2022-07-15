<?php
    require_once("conexion.php");
    registroUsuario($_POST['nombre'], $_POST['apellido'], $_POST['rut'], $_POST['email'], $_POST['fechanac'], $_POST['direccion'], $_POST['ciudad'], $_POST['password']);
    header("location: login.php");
?>
