<?php
session_start();

include("conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Generar el hash truncado de la contraseña ingresada
$hashed_password = substr(hash_hmac('sha256', $clave, 'secret-key'), 0, 40);

// Validar el usuario y la contraseña
$validar = mysqli_query($conn, "SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$hashed_password'");
if (mysqli_num_rows($validar) > 0) {
  $_SESSION['usuario'] = $usuario;
    echo '<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head><body>';
    echo '<script>
            Swal.fire({
              title: "¡Bienvenido!",
              text: "Inicio de sesión exitoso.",
              icon: "success"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = "../home.php";
              }
            });
          </script>';
    echo '</body></html>';
} else {
    echo '<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head><body>';
    echo '<script>
            Swal.fire({
              title: "Error",
              text: "Usuario o contraseña incorrectos.",
              icon: "error"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = "../index.php";
              }
            });
          </script>';
    echo '</body></html>';
}

mysqli_close($conn);
