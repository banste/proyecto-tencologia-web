<?php
include("conexion.php");
$connectar = conn();
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nite.cl</title>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap');
  </style>
</head>

<body>
  <header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Nite.cl</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="zapatillas.php">zapatillas</a>
          </li>

          <?php
          if ($_SESSION['admin'] != 0) {
          ?>
            <li class="nav-item dropdown">

              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Productos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="editarproducto.php">Editar Producto</a>
                <a class="dropdown-item" href="crearproducto.php">Agregar Producto</a>
              </div>
            </li>
          <?php
          }
          ?>
        </ul>

        <span class="navbar-text">
          <?php
          if ($_SESSION != null) {
            if ($_SESSION['admin'] == 0) {
          ?>
              <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Cerrar sesión</a>
            <?php
            } else {
            ?>
              <a><i class="fas fa-sign-out-alt"></i>Administrador</a>
              <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Cerrar sesión</a>
            <?php
            }
          } else {
            ?>
            <a href="login.php" class="btn-abrir-popup" id="btn-abrir-popup"><i class="fas fa-user"></i>Iniciar sesión</a>
            <a href="signup.php"><i class="fas fa-user-plus"></i>Registrarse</a>
          <?php
          }

          ?>
        </span>
      </div>
    </nav>
  </header>


  <h1>INGRESAR NUEVO PRODUCTO</h1>
  <form action="editproducto.php" method="POST" enctype="multipart/form-data">

    id:<input type="int" name="id" placeholder="ingrese id para confirmar" />
    <br>
    nombre:<input type="text" name="nombre" />
    <br>
    precio: <input type="int" name="precio" />
    <br>
    marca:<input type="text" name="marca" />
    <br>
    stock:<input type="int" name="stock" />
    <p><input type="submit" value="enviar"></p>
  </form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>