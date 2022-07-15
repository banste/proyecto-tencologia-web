
<?php

function conn()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "nitecl";

    //Creamos la conexion
    $connectar = mysqli_connect($servername, $username, $password, $dbname);
    return $connectar;
}
/* register */
function registroUsuario($nombre, $apellido, $rut, $email, $fechanac, $direccion, $ciudad, $password)
{
    $connectar = conn();

    $sql = "INSERT INTO `datos` (`nombre`, `apellido`, `rut`, `email`, `fecha_nacimiento`, `direccion`, `ciudad`, `contrasena`) 
    VALUES ('$nombre','$apellido','$rut','$email','$fechanac','$direccion','$ciudad','$password')";
    $insertar = mysqli_query($connectar, $sql);
}
/* inicio de sesion */

function login($email, $password)
{
    $connectar = conn();
    if ($connectar != false) {
        $buscar = "SELECT * FROM datos WHERE email='$email' AND contrasena='$password'";
        $resultados = mysqli_query($connectar, $buscar);

        $filas = mysqli_num_rows($resultados);
        if ($filas > 0) {
            session_start();
            $row = mysqli_fetch_assoc($resultados);

            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['rut'] = $row['rut'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['direccion'] = $row['direccion'];
            $_SESSION['ciudad'] = $row['ciudad'];
            $_SESSION['contrasena'] = $row['contrasena'];
            $_SESSION['admin'] = $row['admin'];
            $idSession = session_id();
            header("Location: index.php");
        } else {
            echo "Houston tenemos un problema!";
            echo "<br/>Intentalo otra vez <a class='link' href='login.php'> Iniciar Sesión";
        }
        mysqli_free_result($resultados);
        mysqli_close($connectar);
    }
}
/* Ingresar Producto */
function ingresarProducto($nombre, $precio, $datosimagen, $marca, $stock)
{
    $conexion = conn();

    $consulta = "INSERT INTO `zapas`(`id`, `nombre`, `precio`, `img`, `marca`, `stock`) VALUES ('', '$nombre', '$precio', '$datosimagen','$marca', '$stock')";
    $insertar = mysqli_query($conexion, $consulta);
}
/*LISTA DE EDICION DE PRODUCTOS*/
function listarProductos()
{
    $conexion = conn();
    if ($conexion != false) {
        $listar = "SELECT * FROM zapas";
        $resultados = mysqli_query($conexion, $listar);
        if (mysqli_num_rows($resultados) > 0) {
            echo "
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
                <table class='table table-striped'>
                <thead>
                    <tr style='font-size:25px;'>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Marca</th>
                        <th>Stock</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
            <tbody>";

            while ($fila = mysqli_fetch_assoc($resultados)) {
                echo "
                    <tr style='font-size:25px;'>
                        <td>" . $fila['id'] . "</td>
                        <td>" . $fila['nombre'] . "</td>
                        <td>" . $fila['precio'] . "</td>
                        <td><img width='100px' height='100px' src='data:image/png; base64," . base64_encode($fila['img']) . "'/>.</td>
                        <td>" . $fila['marca'] . "</td>
                        <td>" . $fila['stock'] . "</td>
                        <td>
                        <form action='editardatosproducto.php' method='post'>
                            <input type='hidden' name='nombre' value='" . $fila['nombre'] . "'>
                            <input type='hidden' name='precio' value='" . $fila['precio'] . "'>
                            <input type='hidden' name='tipo' value='" . $fila['marca'] . "'>
                            <input type='hidden' name='stock' value='" . $fila['stock'] . "'>
                            <input type='hidden' name='perfil_red'>
                            <button class='button is-danger'>
                            <i class='far fa-edit'></i>
                            </button>
                        </form>
                    </td>
                        <td>
                            <form action='eliminarProductos.php' method='post'>
                                <input type='hidden' name='id' value='" . $fila['id'] . "'>
                                <input type='hidden' name='perfil_red'>
                                <button class='button is-danger'>
                                <i class='fa fa-trash-o'></i>
                                </button>
                            </form>
                        </td>
                    </tr>";
            }
            echo "</tbody>
            </table>";
        }
    }
}
/* ACTUALIZAR DATOS DE PRODUCTO*/
function actualizarDatosProducto($id, $nombre, $precio, $marca, $stock)
{
    $conexion = conn();

    $consulta = "UPDATE zapas SET nombre='$nombre', precio='$precio', marca='$marca', stock='$stock' WHERE id = $id";
    $actualizar = mysqli_query($conexion, $consulta);
}
/* ELIMINAR PRODUCTO */
function eliminarProductos($id)
{
    $conexion = conn();
    if ($conexion != false) {
        $consulta = "DELETE FROM zapas WHERE id = $id";
        $eliminar = mysqli_query($conexion, $consulta);
    }
}
function producto($id, $nombre, $precio, $datosimagen, $marca){
    echo "<a href='producto.php?id=$id'><img width='100px' height='100px' src='data:image/png; base64,".base64_encode($datosimagen)."'/></a><br/>";
    echo "Código del producto:".$id."<br />";
    echo "Nombre del producto:".$nombre."<br />";
    echo "Precio: $".$precio."<br /><hr />";
    echo "Precio: $".$precio."<br /><hr />";
}

?>