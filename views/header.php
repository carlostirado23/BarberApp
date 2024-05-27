<?php
session_start();

// Verificar si no hay sesión activa
if (!isset($_SESSION['usuario'])) {
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- <link rel="icon" href="image/favicon.ico" type="image/x-icon"> -->
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,300italic,400,700%7CArvo:400,700">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .slick-slide-inner img {
            width: 50%;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="page">
        <header class="page-header">
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fullwidth" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-stick-up-clone="true" data-md-stick-up-offset="140px" data-lg-stick-up-offset="140px">
                    <div class="rd-navbar-inner">
                        <div class="rd-navbar-panel">
                            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                            <div class="rd-navbar-brand">
                                <a class="brand-name" href="index.html">
                                    <div class="brand-mobile">
                                        <img src="image/barberAppMobile.png" alt="" width="200" height="100" />
                                    </div>
                                    <div class="brand-desktop">
                                        <img src="image/barberApp.png" alt="" width="125" height="125" />
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="rd-navbar-nav-wrap">
                            <div class="rd-navbar-nav-inner">
                                <ul class="rd-navbar-nav">
                                    <li class="active"><a href="home.php">Inicio</a></li>
                                    <li><a href="services.php">Servicios</a></li>
                                    <li><a href="barbers.php">Baberos</a></li>
                                    <li><a href="blog.html">Citas</a></li>
                                    <li><a href="#">Productos</a></li>
                                    <li><a href="./funciones/cerrarSesion.php">perfil</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>