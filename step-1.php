<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <!-- Site Title-->
  <title>BarberApp</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto+Mono:300,300italic,400,700%7CArvo:400,700">
  <link rel="stylesheet" href="css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="one-screen-page">
  <div class="page">
    <main class="page-content" id="perspective">
      <div class="content-wrapper">
        <div class="page-header page-header-perspective">
          <div class="page-header-left"><a class="brand" href="index.html"><img src="image/barberAppMobile.png" alt="" width="200" height="100" /></a></div>
          <div class="page-header-center">
            <div class="step-progress">
              <div class="step-progress-top"><span class="step-progress-number">1</span><span>de</span><span class="step-progress-number">3</span></div>
              <div class="step-progress-bottom">
                <p class="step-progress-text">PASOS</p>
              </div>
            </div>
          </div>
          <div class="page-header-right">
            <div id="perspective-open-menu" data-custom-toggle=".perspective-menu-toggle" data-custom-toggle-hide-on-blur="true"><span class="perspective-menu-text">Menu</span>
              <button class="perspective-menu-toggle"><span></span></button>
            </div>
          </div>
        </div>
        <div class="custom-progress">
          <div class="custom-progress-body" style="width: 0;"></div>
        </div>
        <div id="wrapper">
          <section class="section-xl bg-periglacial-blue one-screen-page-content text-center">
            <div class="shell">
              <h2>ELIJA UN SERVICIO</h2>
              <div class="p text-width-medium">
                <p class="big">En esta página puede seleccionar el servicio que necesita. A continuación se presentan solo los servicios de barbería más populares que ofrecemos. Si requieres un servicio de barbería personalizado, por favor contáctanos.</p>
              </div>
              <div class="range range-50">
                <form id="service-form" style="display: flex;">
                  <div class="range range-30">
                    <div class="cell-xs-6 cell-md-3">
                      <article class="card-service-option"><img class="card-service-option-image" src="image/icon-service-1-70x62.png" alt="" width="70" height="62" />
                        <input class="card-service-option-title" name="servicio" value="CORTES DE PELO PARA NIÑOS" style="border: none; width: 250px; display: block; background-color: transparent; text-align: center;">
                        <div class="card-service-option-panel">
                          <p class="card-service-price card-service-option-text">
                            <small>$</small>8.<small>000</small>
                          </p>
                          <button type="button" class="btn btn-xs card-service-option-control" onclick="saveService('CORTES DE PELO PARA NIÑOS  $8.000')">Elegir</button>
                        </div>
                      </article>
                    </div>
                    <div class="cell-xs-6 cell-md-3">
                      <article class="card-service-option"><img class="card-service-option-image" src="image/icon-service-2-70x62.png" alt="" width="70" height="62" />
                        <input class="card-service-option-title" name="servicio" value="AFEITADO" style="border: none; width: 250px; display: block; background-color: transparent; text-align: center;">
                        <div class="card-service-option-panel">
                          <p class="card-service-price card-service-option-text">
                            <small>$</small>4.<small>000</small>
                          </p>
                          <button type="button" class="btn btn-xs card-service-option-control" onclick="saveService('AFEITADO  $4.000')">Elegir</button>
                        </div>
                      </article>
                    </div>
                    <div class="cell-xs-6 cell-md-3">
                      <article class="card-service-option"><img class="card-service-option-image" src="image/icon-service-3-70x62.png" alt="" width="70" height="62" />
                        <input class=" card-service-title" name="servicio" value="CORTE DE PELO Y ARREGLO DE BARBA" style="border: none; width: 280px; display: block; background-color: transparent; text-align: center;">
                        <div class="card-service-option-panel">
                          <p class="card-service-price card-service-option-text">
                            <small>$</small>12.<small>000</small>
                          </p>
                          <button type="button" class="btn btn-xs card-service-option-control" onclick="saveService('CORTE DE PELO Y ARREGLO DE BARBA  $12.000')">Elegir</button>
                        </div>
                      </article>
                    </div>
                    <div class="cell-xs-6 cell-md-3">
                      <article class="card-service-option"><img class="card-service-option-image" src="image/icon-service-4-70x62.png" alt="" width="70" height="62" />
                        <input class="card-service-option-title " name="servicio" value="RECORTE DE BIGOTE" style="border: none; width: 250px; display: block; background-color: transparent; text-align: center;">
                        <div class="card-service-option-panel">
                          <p class="card-service-price card-service-option-text">
                            <small>$</small>4.<small>000</small>
                          </p>
                          <button type="button" class="btn btn-xs card-service-option-control" onclick="saveService('RECORTE DE BIGOTE  $4.000')">Elegir</button>
                        </div>
                      </article>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>

        </div>
        <div id="perspective-content-overlay"></div>
      </div>
      <?php include_once("views/navbar.php"); ?>
    </main>
    <?php include_once("views/footer.php"); ?>
  </div>
  <script>
    // Función para limpiar los datos almacenados en el localStorage
    function clearLocalStorage() {
      localStorage.removeItem('selectedServices');
    }

    // Ejecutar la función de limpieza al cargar la página
    window.onload = clearLocalStorage;

    function saveService(service) {
      let selectedServices = JSON.parse(localStorage.getItem('selectedServices')) || [];
      selectedServices.push(service);
      localStorage.setItem('selectedServices', JSON.stringify(selectedServices));
      window.location.href = 'step-2.php';
    }
  </script>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>