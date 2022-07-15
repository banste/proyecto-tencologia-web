<?php
include("conexion.php");
$connectar = conn();

if ($connectar != false) {
    $consulta = "SELECT * FROM zapas";
    $resultados = mysqli_query($connectar, $consulta);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nite.cl</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
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
                    session_start();
                    if ($_SESSION != null) {
                        if ($_SESSION['admin'] == 1) {
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
                        } else {
                        ?>
                            <li class="nav-item dropdown">

                            </li>
                    <?php
                        }
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

    <div class="contenedor" >

        <div class="fila">
            <?php while ($row = mysqli_fetch_assoc($resultados)) { ?>
                <div class="columna">
                    <div >
                        <?php 
                        echo "<img height='350px' width='350px' src='data:image/ppg; base64," . base64_encode($row['img']) . "'/>" ?>
                        <div class="cuerpo3">
                            <h5 class="titulo"><?php echo $row['nombre']; ?></h5>
                            <h6 class="titulo"><?php echo $row['marca']; ?></h6>
                            <p class="texto"></p>$<?php echo number_format($row['precio'], 0, '.', ','); ?>
                            
                                <p><a href="#" class="btn btn-success">Agregar</a></p>
                            
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>




    <footer class="footer">
        <div class="container bottom_border">
            <div class="row">
                <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
                    <!--headin5_amrc-->
                    <p class="mb10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                    <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
                    <p><i class="fa fa-phone"></i> +91-9999878398 </p>
                    <p><i class="fa fa fa-envelope"></i> info@example.com </p>


                </div>



                <div class=" col-sm-4 col-md  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Siguenos en</h5>
                    <!--headin5_amrc ends here-->

                    <ul class="footer_ul2_amrc">
                        <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a>
                            <p><a href="http://www.instagram.com/nite.cl">Instagram</a></p>
                        </li>
                    </ul>
                    <!--footer_ul2_amrc ends here-->
                </div>
            </div>
        </div>


        <!--foote_bottom_ul_amrc ends here-->
        <p class="text-center">Copyright @2017 | Designed With by <a href="#">mucho skere y muy poco trap</a></p>

        <!--social_footer_ul ends here-->
        </div>

    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>




</body>

</html>