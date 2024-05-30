<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
</head>

<body>
    <form action="agregar_producto.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre del producto:</label>
        <input type="text" name="nombre" id="nombre" required><br>

        <label for="precio">Precio:</label>
        <input type="text" name="precio" id="precio" required><br>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" required><br>

        <input type="submit" value="Agregar Producto">
    </form>
</body>

</html>