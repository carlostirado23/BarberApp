<?php
session_start();

// Verificar si hay una sesión activa
if (isset($_SESSION['usuario'])) {
    // Verificar si la sesión activa es válida (por ejemplo, haciendo una consulta a la base de datos)
    include("funciones/conexion.php"); // Asegúrate de tener la conexión a la base de datos aquí
    $usuario = $_SESSION['usuario'];
    $consulta = mysqli_query($conn, "SELECT * FROM usuario WHERE usuario='$usuario'");

    // Si la consulta es exitosa y el usuario existe, redirige a la página principal
    if (mysqli_num_rows($consulta) > 0) {
        header("location: home.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberApp</title>
    <link rel="stylesheet" href="./css/estilos.css">
</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="image-section">
                <div class="logo-container">
                    <img src="./image/logo.jpeg" alt="Logo" class="logo" />
                </div>
            </div>
            <div class="form-section">
                <form method="post" action="./funciones/login.php">
                    <h2 class="title">Acceso</h2>
                    <p class="subtitle">Iniciar sesión para continuar</p>
                    <div class="input-group">
                        <label for="usuario" class="label">Usuario</label>
                        <input type="text" id="usuario" name="usuario" placeholder="Usuario" class="input" />
                    </div>
                    <div class="input-group">
                        <label for="clave" class="label">CONTRASEÑA</label>
                        <input type="password" id="clave" name="clave" placeholder="Contraseña" class="input" />
                    </div>
                    <button class="button">Iniciar sesión</button>
                    <p class="register-text">
                        ¿No te haz registrado aun?
                        <a href="./registrar.php" class="register-link">Regístrate aquí!</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>