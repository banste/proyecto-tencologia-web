<?php
    require_once("conexion.php");
    $connectar=conn();
    
    $email = !empty($_POST['email']) ? $_POST['email'] : 'email';
    $password = !empty($_POST['password']) ? $_POST['password'] : 'password';
    
    login($email, $password);
?>