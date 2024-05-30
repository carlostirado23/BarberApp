<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        /* Estilos CSS para la presentación */
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .product {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .product img {
            width: 100px;
            margin-right: 20px;
        }

        .btn {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .btn-danger {
            background-color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Carrito de Compras</h2>
        <?php
        // Verificar si hay productos en el carrito
        if (!empty($_SESSION['carrito'])) {
            // Loop a través de los productos en el carrito
            foreach ($_SESSION['carrito'] as $producto_id) {
                // Obtener información del producto desde la base de datos
                $sql = "SELECT * FROM productos WHERE id = $producto_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $producto = $result->fetch_assoc();
        ?>
                    <div class="product">
                        <img src="uploads/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <span><?php echo $producto['nombre']; ?></span>
                        <span>$<?php echo number_format($producto['precio'], 2); ?></span>
                        <!-- Formulario para eliminar una unidad del producto -->
                        <form action="eliminar_del_carrito.php" method="post">
                            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                            <input type="submit" class="btn btn-danger" value="Eliminar">
                        </form>
                        <!-- Formulario para agregar una unidad más del producto -->
                        <form action="agregar_al_carrito.php" method="post">
                            <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                            <input type="submit" class="btn" value="Agregar más">
                        </form>
                    </div>
        <?php
                }
            }
        } else {
            echo "<p>No hay productos en el carrito.</p>";
        }
        ?>
        <a href="ver_catalogo.php">Volver al catálogo</a>
    </div>
</body>

</html>