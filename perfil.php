<?php
session_start(); // Inicia la sesión si no está iniciada
include_once("funciones/conexion.php");

// Obtener productos de la base de datos
$sql = "SELECT nombre FROM usuario WHERE id_usuario = id_usuario;"; // Aquí necesitas especificar el ID del usuario que deseas obtener
$result = $conn->query($sql);

// Verificar si se encontraron resultados y obtener el nombre del usuario
if ($result->num_rows > 0) {
    // Solo debería haber una fila si estás buscando por ID
    $row = $result->fetch_assoc();
    $nombre = $row["nombre"];
} else {
    $nombre = "Nombre no encontrado"; // O algún otro mensaje de error si el usuario no se encuentra
}
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>BarberApp</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,300italic,400,700%7CArvo:400,700">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="page">
        <main class="page-content" id="perspective">
            <div class="content-wrapper">
                <div class="page-header page-header-perspective">
                    <div class="page-header-left"><a class="brand" href="index.html"><img src="image/barberAppMobile.png" alt="" width="200" height="100" /></a></div>
                    <div class="page-header-right">
                        <div id="perspective-open-menu" data-custom-toggle=".perspective-menu-toggle" data-custom-toggle-hide-on-blur="true"><span class="perspective-menu-text">Menu</span>
                            <button class="perspective-menu-toggle"><span></span></button>
                        </div>
                    </div>
                </div>
                <div id="wrapper">
                    <div class="page-title">
                        <div class="page-title-content">
                            <div class="shell">
                                <p class="page-title-header">Perfil</p>
                            </div>
                        </div>
                        <div class="shop-panel">
                            <div class="shell">
                                <div class="shop-panel-inner">
                                    <div class="shop-panel-left">
                                        <a class="shop-panel-link btn-flotante" href="./funciones/cerrarSesion.php">
                                            <span class="icon bx bx-log-out" style="font-size: 3rem;"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="section-md bg-periglacial-blue text-center">
                            <div class="image-wrap-inner">
                                <img src="./image/user.webp" alt="" style="border-radius: 50%; width: 200px;">
                                <h4><?php echo htmlspecialchars($nombre); ?></h4>
                            </div>
                            <div class="p text-width-medium">
                                <h1 class="page-title-header" style="color: black; padding: 10px; margin: 10px;">¡Bienvenidos a BarberApp!</h1>
                                <p class="big" style="color: black;">
                                    Somos la nueva forma de experimentar la barbería: fácil, rápida y
                                    personalizada. Con nuestra app, reservar citas es sencillo y puedes
                                    comunicarte directamente con tu estilista. Además, te ofrecemos perfiles
                                    detallados para que elijas el profesional que mejor se adapte a tus
                                    necesidades. Destacamos en el mercado por nuestra conveniencia y enfoque
                                    en la comunicación directa. ¡Únete a BarberApp y disfruta de una
                                    experiencia única en la barbería!
                                </p>
                            </div>

                        </section>
                    </div>
                    <!-- Footer-->
                    <?php include_once("views/footer.php"); ?>
                </div>
                <div id="perspective-content-overlay"></div>
            </div>
            <!-- RD Navbar-->
            <?php
            include_once("views/navbar.php");
            ?>
        </main>
    </div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>