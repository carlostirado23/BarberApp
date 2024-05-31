<?php
session_start(); // Inicia la sesión si no está iniciada
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
                        <div>
                            <a href="./shop.php" style="margin-right: 90%; font-size: 2em;"><i class='bx bx-arrow-back'></i></a>
                        </div>
                        <div class="page-title-content">
                            <div class="shell">
                                <p class="page-title-header">Carrito</p>
                                <p class="lead fw-normal text-white-50 mb-0">Tus Productos Agregados.</p>
                            </div>
                        </div>
                    </div>
                    <section class="py-5" style="padding: 10px; margin: 10px;">
                        <div class="container px-4 px-lg-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover" style="color: black;">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Producto</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="productos-carrito">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="" style="display: grid; width: 100%; justify-content: end;">
                                    <h4>Total a Pagar: <span id="total-a-pagar">$</span></h4>
                                    <div class="d-grid gap-2" style="width: 350px;">
                                        <div id="paypal-button-container"></div>
                                        <button class="btn btn-warning" style="width: 100%;" type="button" onclick="vaciarCarrito()">Vaciar Carrito</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Footer-->
                    <?php include_once("views/footer.php"); ?>
                    <!-- Bootstrap core JS-->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                    <!-- Core theme JS-->
                    <script src="assets/js/jquery-3.6.0.min.js"></script>
                    <script src="js/core.min.js"></script>
                    <script src="assets/js/scripts.js"></script>
                    <script src="https://www.paypal.com/sdk/js?client-id=AaYz7YEBcQ9BtGcI4VTA1Ja1HgPdArdkqoshW3HfjPrYNS-4RAs0zWp5xONwDp4tZEQMB7Fdzr7ZlUgc"></script>
                    <script>
                        // Función para mostrar los productos seleccionados en el carrito
                        function mostrarProductosSeleccionados() {
                            let productosSeleccionados = JSON.parse(localStorage.getItem('selectedProducts')) || [];
                            let total = 0;

                            let listaProductos = document.getElementById('productos-carrito');

                            // Limpiamos la tabla antes de agregar los productos
                            listaProductos.innerHTML = '';

                            productosSeleccionados.forEach(function(producto, index) {
                                let fila = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${producto.nombre}</td>
                        <td>$${producto.precio}</td>
                        <td>1</td> <!-- Suponiendo que la cantidad siempre es 1 -->
                        <td>$${producto.precio}</td>
                    </tr>
                `;
                                listaProductos.innerHTML += fila;
                                total += producto.precio;
                            });

                            // Actualizamos el total a pagar
                            document.getElementById('total-a-pagar').textContent = `$${total.toFixed(2)}`;
                        }

                        // Función para vaciar el carrito
                        function vaciarCarrito() {
                            localStorage.removeItem('selectedProducts');
                            mostrarProductosSeleccionados(); // Actualizamos la vista del carrito
                        }

                        // Mostrar los productos seleccionados al cargar la página
                        document.addEventListener("DOMContentLoaded", function() {
                            mostrarProductosSeleccionados();
                        });


                        // PAYPAL
                        paypal.Buttons({
                            createOrder: function(data, actions) {
                                // Calcular el monto total dinámicamente
                                let total = parseFloat(document.getElementById('total-a-pagar').textContent.replace('$', ''));

                                // Este método se llama cuando el usuario hace clic en el botón de PayPal
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: total.toFixed(2), // Pasar el monto total calculado
                                            currency_code: 'USD' // Cambiar a la moneda que corresponda
                                        }
                                    }]
                                });
                            },
                            onApprove: function(data, actions) {
                                // Este método se llama cuando el usuario completa la transacción en PayPal
                                return actions.order.capture().then(function(details) {
                                    // Aquí puedes hacer algo cuando la transacción se completa exitosamente, como redirigir a una página de confirmación
                                    window.location.href = 'pagina-de-confirmacion.php';
                                });
                            }
                        }).render('#paypal-button-container');
                    </script>
</body>

</html>