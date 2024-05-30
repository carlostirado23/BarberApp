<?php
session_start(); // Inicia la sesión si no está iniciada
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BarberApp</title>
    <!-- Bootstrap icons-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> -->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />
    <link href="assets/css/estilos.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./shop.php">BarberApp</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Carrito</h1>
                <p class="lead fw-normal text-white-50 mb-0">Tus Productos Agregados.</p>
            </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
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
                <div class="col-md-5 ms-auto">
                    <h4>Total a Pagar: <span id="total-a-pagar">$</span></h4>
                    <div class="d-grid gap-2">
                        <div id="paypal-button-container"></div>
                        <button class="btn btn-warning" type="button" onclick="vaciarCarrito()">Vaciar Carrito</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
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