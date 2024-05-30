<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>BarberApp</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
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
              <div class="step-progress-bottom">
                <p class="step-progress-text">Cita Reservada</p>
              </div>
            </div>
          </div>
          <div class="page-header-right">
            <div id="perspective-open-menu" data-custom-toggle=".perspective-menu-toggle" data-custom-toggle-hide-on-blur="true"><span class="perspective-menu-text">Menu</span>
              <button class="perspective-menu-toggle"><span></span></button>
            </div>
          </div>
        </div>
        <div id="wrapper">
          <section class="section-xs bg-periglacial-blue one-screen-page-content text-center">
            <h2>Citas reservada</h2>
            <div class="range range-50">
              <div class="cell-xs-12 cell-md-4">
                <article class="card-confirmation">
                  <h3>Servicios seleccionados:</h3>
                  <ul id="selected-services"></ul>
                </article>
              </div>
              <div class="cell-xs-12 cell-md-4">
                <article class="card-confirmation">
                  <h3>Barbero seleccionado:</h3>
                  <p id="selected-barber"></p>
                </article>

              </div>
              <div class="cell-xs-12 cell-md-4">
                <article class="card-confirmation">
                  <h3>Fecha y Hora:</h3>
                  <p id="selected-date-time"></p>
                </article>
              </div>
            </div>
            <button id="print-button" class="btn btn-xs card-service-option-control">Imprimir Recibo</button>
          </section>
          <?php include_once("views/footer.php"); ?>
        </div>
        <div id="perspective-content-overlay"></div>
      </div>
      <?php
      include_once("views/navbar.php");
      ?>
    </main>
  </div>
  <!-- Scripts -->
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let selectedServices = JSON.parse(localStorage.getItem('selectedServices')) || [];
      let selectedBarber = localStorage.getItem('selectedBarber') || 'No se ha seleccionado ningún barbero';
      let selectedDateTime = JSON.parse(localStorage.getItem('selectedDateTime')) || {};

      let servicesList = document.getElementById('selected-services');
      selectedServices.forEach(function(service) {
        let listItem = document.createElement('li');
        listItem.textContent = service;
        servicesList.appendChild(listItem);
      });

      document.getElementById('selected-barber').textContent = selectedBarber;
      document.getElementById('selected-date-time').textContent = `${selectedDateTime.date} a las ${selectedDateTime.time}`;
    });

    document.addEventListener('DOMContentLoaded', function() {
      // Tu código existente...

      // Agrega el evento de clic al botón de impresión
      document.getElementById('print-button').addEventListener('click', function() {
        imprimirRecibo();
      });
    });

    function imprimirRecibo() {
      window.print();
    }
  </script>
</body>

</html>