<?php
include("conexion.php");

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

// Generar un hash truncado de la contraseña usando SHA-256
$hashed_password = substr(hash_hmac('sha256', $clave, 'secret-key'), 0, 40);

// Validar si el usuario ya existe
$validar = mysqli_query($conn, "SELECT * FROM usuario WHERE usuario='$usuario'");
if (mysqli_num_rows($validar) > 0) {
  echo '<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head><body>';
  echo '<script>
            Swal.fire({
              title: "Error",
              text: "Este correo o usuario ya está registrado, intenta con otro diferente.",
              icon: "error"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = "../registrar.php";
              }
            });
          </script>';
  echo '</body></html>';
  exit();
}

// Insertar nuevo usuario con contraseña hasheada
$query = "INSERT INTO usuario(nombre, usuario, clave, fecha_nacimiento) VALUES('$nombre', '$usuario', '$hashed_password', '$fecha_nacimiento')";
$ejecutar = mysqli_query($conn, $query);

if ($ejecutar) {
  echo '<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head><body>';
  echo '<script>
            Swal.fire({
              title: "¡Buen trabajo!",
              text: "Usuario registrado exitosamente.",
              icon: "success"
            }).then((result) => {
              if (result.isConfirmed) {
                window.location = "../index.php";
              }
            });
          </script>';
  echo '</body></html>';
} else {
  echo '<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head><body>';
  echo '<script>
            Swal.fire({
              title: "Error",
              text: "Usuario no registrado.",
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
