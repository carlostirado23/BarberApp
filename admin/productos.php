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
                echo '<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head><body>';
                echo '<script>
                        Swal.fire({
                        title: "¡Buen trabajo!",
                        text: "Producto registrado exitosamente.",
                        icon: "success"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "productos.php";
                        }
                        });
                    </script>';
                echo '</body></html>';
            } else {
                echo "Error: " . $sql->error;
            }

            $sql->close();
        } else {
            echo '<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head><body>';
            echo '<script>
                    Swal.fire({
                    title: "Error",
                    text: "Error al mover la imagen.",
                    icon: "error"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = productos.php";
                    }
                    });
                </script>';
            echo '</body></html>';
        }
    } else {
        echo '<html><head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script></head><body>';
        echo '<script>
                    Swal.fire({
                    title: "Error",
                    text: "Error al cargar la imagen.",
                    icon: "error"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = productos.php";
                    }
                    });
                </script>';
        echo '</body></html>';
    }
}

include("includes/header.php"); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Productos</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="abrirProducto"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM productos");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><img class="img-thumbnail" src="../uploads/<?php echo $data['imagen']; ?>" width="50"></td>
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['precio']; ?></td>
                            <td>
                                <form method="post" action="eliminar.php?accion=pro&id=<?php echo $data['id']; ?>" class="d-inline eliminar">
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="productos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="title">Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p_normal">Precio</label>
                                <input id="p_normal" class="form-control" type="text" name="precio" placeholder="Precio" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="imagen">Foto</label>
                                <input type="file" class="form-control" name="imagen" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>