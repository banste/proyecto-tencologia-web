<?php
  require_once("conexion.php");

  if (!isset($_POST["id"])) {
    exit("No existe el producto!");
  }
  eliminarProductos($_POST["id"]);
  
  if (isset($_POST["perfil_red"])) {
    header("Location: editarproducto.php");
  } else {
    header("Location: editarproducto.php");
  }
?>