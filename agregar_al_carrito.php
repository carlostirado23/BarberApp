<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = $_POST["producto_id"];
    $cantidad = $_POST["cantidad"];

    // Verificar si ya existe un carrito en la sesión
    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"] = [];
    }

    // Agregar el producto al carrito
    $_SESSION["carrito"][$producto_id] = $cantidad;

    // Redirigir de vuelta a la página de productos
    header("Location: shop.php");
    exit;
}
?>
