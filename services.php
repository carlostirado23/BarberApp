<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Services</title>
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta charset="utf-8" />
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,300italic,400,700%7CArvo:400,700" />
    <link rel="stylesheet" href="css/style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!--  -->
    <div class="page">
        <main class="page-content" id="perspective">
            <div class="content-wrapper">
                <div class="page-header page-header-perspective">
                    <div class="page-header-left">
                        <a class="brand" href="index.html"><img src="image/barberAppMobile.png" alt="" width="200" height="100" /></a>
                    </div>
                    <div class="page-header-right">
                        <div class="booking-control">
                            <a class="btn btn-xs btn-circle btn-primary" href="step-1.php">RESERVAR AHORA</a>
                        </div>
                        <div id="perspective-open-menu" data-custom-toggle=".perspective-menu-toggle" data-custom-toggle-hide-on-blur="true">
                            <span class="perspective-menu-text">Menu</span>
                            <button class="perspective-menu-toggle"><span></span></button>
                        </div>
                    </div>
                </div>
                <div id="wrapper">
                    <div class="page-title">
                        <div class="page-title-content">
                            <div class="shell">
                                <p class="page-title-header">Servicios</p>
                            </div>
                        </div>
                    </div>
                    <section class="section-lg bg-periglacial-blue text-center">
                        <div class="shell">
                            <div class="range range-sm-center range-50">
                                <div class="cell-xs-12">
                                    <div class="p text-width-medium">
                                        <p class="big">
                                            Barbershop ofrece cortes de pelo para hombres, cuidado de la
                                            barba y afeitados con navaja caliente de primer nivel. Éstos son
                                            sólo algunos de los servicios por los que somos conocidos.
                                        </p>
                                    </div>
                                </div>
                                <div class="cell-xs-12">
                                    <div class="range range-30">
                                        <div class="cell-xs-6 cell-md-3">
                                            <article class="card-service">
                                                <img class="card-service-image" src="image/icon-service-1-70x62.png" alt="" width="70" height="62" />
                                                <p class="card-service-title">CORTES DE PELO PARA NIÑOS</p>
                                                <p class="card-service-price">
                                                    <small>$</small>8.<small>000</small>
                                                </p>
                                                <a class="btn btn-sm card-service-control" href="step-1.php">RESERVAR AHORA</a>
                                            </article>
                                        </div>
                                        <div class="cell-xs-6 cell-md-3">
                                            <article class="card-service">
                                                <img class="card-service-image" src="image/icon-service-2-70x62.png" alt="" width="70" height="62" />
                                                <p class="card-service-title">AFEITADO</p>
                                                <p class="card-service-price">
                                                    <small>$</small>4.<small>000</small>
                                                </p>
                                                <a class="btn btn-sm card-service-control" href="step-1.php">RESERVAR AHORA</a>
                                            </article>
                                        </div>
                                        <div class="cell-xs-6 cell-md-3">
                                            <article class="card-service">
                                                <img class="card-service-image" src="image/icon-service-3-70x62.png" alt="" width="70" height="62" />
                                                <p class="card-service-title">CORTE DE PELO Y ARREGLO DE BARBA</p>
                                                <p class="card-service-price">
                                                    <small>$</small>12.<small>000</small>
                                                </p>
                                                <a class="btn btn-sm card-service-control" href="step-1.php">Book Now</a>
                                            </article>
                                        </div>
                                        <div class="cell-xs-6 cell-md-3">
                                            <article class="card-service">
                                                <img class="card-service-image" src="image/icon-service-4-70x62.png" alt="" width="70" height="62" />
                                                <p class="card-service-title">RECORTE DE BARBA</p>
                                                <p class="card-service-price">
                                                    <small>$</small>4.<small>000</small>
                                                </p>
                                                <a class="btn btn-sm card-service-control" href="step-1.php">RESERVAR AHORA</a>
                                            </article>
                                        </div>
                                        <div class="cell-xs-6 cell-md-3">
                                            <article class="card-service">
                                                <img class="card-service-image" src="image/icon-service-5-70x62.png.png" alt="" width="70" height="62" />
                                                <p class="card-service-title">Tinte de cabello</p>
                                                <p class="card-service-price">
                                                    <small>$</small>4.<small>000</small>
                                                </p>
                                                <a class="btn btn-sm card-service-control" href="step-1.php">RESERVAR AHORA</a>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- footer -->
                    <?php
                    include_once("views/footer.php");
                    ?>
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