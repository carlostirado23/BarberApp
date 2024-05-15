<?php
include("conexion.php");


$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$query = "INSERT INTO usuario(nombre, usuario, clave, fecha_nacimiento) VALUES('$nombre', '$usuario', '$clave', '$fecha_nacimiento')";

$validar = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario='$usuario'");

if (mysqli_num_rows($validar) > 0) {
  echo '<script>
            alert("Este correo o usuario ya esta registrado, intenta con otro diferente.");
            window.location = "../registrar.php";
          </script>';
  exit();
}

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
  echo '<script>
            alert("Usuario registrado exitosamente.");
            window.location = "../index.php";
          </script>';
} else {
  echo '<script>
            alert("Usuario no registrado.");
            window.location = "../index.php";
          </script>';
}

mysqli_close($conexion);
