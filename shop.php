<?php
session_start(); // Inicia la sesión si no está iniciada
include_once("funciones/conexion.php");

// Obtener productos de la base de datos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

$productos = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
  }
}

$conn->close();
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
          <div class="page-header-left"><a class="brand" href="home.php"><img src="image/barberAppMobile.png" alt="" width="200" height="100" /></a></div>
          <div class="page-header-right">
            <div id="perspective-open-menu" data-custom-toggle=".perspective-menu-toggle" data-custom-toggle-hide-on-blur="true"><span class="perspective-menu-text">Menu</span>
              <button class="perspective-menu-toggle"><span></span></button>
            </div>
          </div>
        </div>
        <div id="wrapper">
          <div class="page-title">
            <div class="page-title-content">
              <div class="shell">
                <p class="page-title-header">Productos</p>
              </div>
            </div>
          </div>
          <div class="shop-panel">
            <div class="shell">
              <div class="shop-panel-inner">
                <div class="shop-panel-left">
                  <a class="shop-panel-link btn-flotante" href="#" id="btnCarrito"> <!-- Enlace al carrito -->
                    <span class="icon bx bxs-cart" style="font-size: 3rem;"></span>
                    <span class="count bg-success" id="carrito">0</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <section class="section-md bg-periglacial-blue text-center">
            <div class="shell">
              <div class="range range-30">
                <?php foreach ($productos as $producto) : ?>
                  <div class="cell-sm-6 cell-md-4">
                    <article class="product">
                      <input type="hidden" value="<?php echo $producto['id']; ?>">
                        <img src="uploads/<?php echo $producto['imagen']; ?>" alt="" width="164" height="168" />
              
                      <p class="product-title"><a href="single-product.php?id=<?php echo $producto['id']; ?>"><?php echo $producto['nombre']; ?></a></p>
                      <p name="precio" class="product-price" data-price="<?php echo $producto['precio']; ?>">$<?php echo number_format($producto['precio'], 2); ?></p>
                      <div>
                        <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>">
                        <input type="number" name="cantidad" value="1" min="1">
                        <a class="btn-shop agregar" href="#" onclick="addProduct(<?php echo $producto['id']; ?>, '<?php echo $producto['nombre']; ?>', <?php echo $producto['precio']; ?>)"><span class="btn-shop-icon fa fa-shopping-cart"></span><span class="btn-shop-text">Agregar al carrito</span></a>
                      </div>
                    </article>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </section>
          <!-- Footer-->
          <?php include_once("views/footer.php"); ?>
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
  <script>
    // Función para agregar productos al localStorage
    function addProduct(id, nombre, precio) {
      let selectedProducts = JSON.parse(localStorage.getItem('selectedProducts')) || [];

      // Creamos un objeto para representar el producto seleccionado
      let selectedProduct = {
        id: id,
        nombre: nombre,
        precio: precio
      };

      selectedProducts.push(selectedProduct);
      localStorage.setItem('selectedProducts', JSON.stringify(selectedProducts));
    }
  </script>


</body>

</html>