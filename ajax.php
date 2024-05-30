<?php
require_once "./funciones/conexion.php";
if (isset($_POST)) {
    if ($_POST['action'] == 'buscar') {
        $array['productos'] = array();
        $total = 0;
        for ($i=0; $i < count($_POST['productos']); $i++) { 
            $id = $_POST['productos'][$i]['id'];
            $query = mysqli_query($conn, "SELECT * FROM productos WHERE id = $id");
            $result = mysqli_fetch_assoc($query);
            $productos['id'] = $result['id'];
            $productos['precio'] = $result['precio'];
            $productos['nombre'] = $result['nombre'];
            array_push($array['productos'], $productos);
        }
        $array['total'] = $total;
        echo json_encode($array);
        die();
    }
}

?>