<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./estilos.css">
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