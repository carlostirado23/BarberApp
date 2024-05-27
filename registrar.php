<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <div class="image-section">
                <div class="logo-container">
                    <img src="./image/logo.jpeg" alt="Logo" class="logo" />
                </div>
            </div>
            <div class="form-section2">
                <form method="post" action="./funciones/register.php">
                    <h2 class="title">Crear una cuenta nueva</h2>
                    <p class="subtitle">¿Ya registrado? <a href="./index.php">Entra aquí.</a></p>
                    <div class="input-group">
                        <label for="nombre" class="label">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Nombre Completo" class="input" />
                    </div>
                    <div class="input-group">
                        <label for="usuario" class="label">Usuario</label>
                        <input type="text" id="usuario" name="usuario" placeholder="Usuario" class="input" />
                    </div>
                    <div class="input-group">
                        <label for="clave" class="label">CONTRASEÑA</label>
                        <input type="password" id="clave" name="clave" placeholder="Contraseña" class="input" />
                    </div>
                    <div class="input-group">
                        <label for="fecha_nacimiento" class="label">Fecha de nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha de nacimiento" class="input" />
                    </div>
                    <button class="button">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>