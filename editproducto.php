<?php
    require_once("conexion.php");

    $id=$_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];        
    $marca = $_POST['marca'];
    $stock = $_POST['stock'];

    actualizarDatosProducto($id, $nombre, $precio,$marca,$stock);
    header("location: editarproducto.php");
?>