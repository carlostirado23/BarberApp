<?php
require_once "../funciones/conexion.php"; // Asegúrate de ajustar la ruta si es necesario

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recuperar datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen'];

    // Validar y procesar la imagen
    if ($imagen['error'] == 0) {
        $nombre_imagen = uniqid() . '-' . basename($imagen['name']);
        $ruta_imagen = '../uploads/' . $nombre_imagen; // Ruta relativa dentro del proyecto

        // Mover la imagen al directorio de destino
        if (move_uploaded_file($imagen['tmp_name'], $ruta_imagen)) {
            // Guardar la ruta de la imagen y los detalles del producto en la base de datos
            $sql = $conn->prepare("INSERT INTO productos (nombre, precio, imagen) VALUES (?, ?, ?)");
            $sql->bind_param("sss", $nombre, $precio, $ruta_imagen);

            if ($sql->execute() === TRUE) {
                echo "Producto agregado con éxito";
            } else {
                echo "Error: " . $sql->error;
            }

            $sql->close();
        } else {
            echo "Error al mover la imagen.";
        }
    } else {
        echo "Error al cargar la imagen.";
    }
}
