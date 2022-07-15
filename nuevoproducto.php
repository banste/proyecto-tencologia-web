<?php
        require_once("conexion.php");

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];        
        $imagen = $_FILES['imagen']['tmp_name'];
        $datosimagen = addslashes(file_get_contents($imagen));
        $marca = $_POST['marca'];
        $stock = $_POST['stock'];
        //Categoria
        ingresarProducto($nombre, $precio, $datosimagen,$marca,$stock);
        header("location: crearproducto.php");
?>