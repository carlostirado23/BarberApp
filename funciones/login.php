<?php 
session_start();

include("conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$validar = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario' and clave='$clave'");

if (mysqli_num_rows($validar) > 0) {
    $_SESSION['usuario']= $usuario;
    header("location: ../home.php");
    exit();
}else{
    echo '<script>
            alert("Usuario no existe.");
            window.location = "../index.php";
          </script>';
          exit();
}


?>