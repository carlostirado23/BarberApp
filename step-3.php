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
              <div class="step-progress-top"><span class="step-progress-number">3</span><span>de</span><span class="step-progress-number">3</span></div>
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
          <div class="custom-progress-body" style="width: 66.66%;"></div>
        </div>
        <div id="wrapper">
          <section class="section-xs bg-periglacial-blue one-screen-page-content text-center">
            <div class="shell">
              <a class=" link-primary " style="text-decoration: underline; font-size: 1.5em;" href="step-2.php">
                < Atras</a>
            </div>
            <h2>ELIGE UNA FECHA Y HORA</h2>
            <form id="date-time-form">
              <div class="form-group" style="padding: 10px;">
                <label for="date">Fecha:</label>
                <input type="date" id="date" name="date" required>
              </div>
              <div class="form-group">
                <label for="time">Hora:</label>
                <input type="time" id="time" name="time" required>
              </div>
              <button type="submit" class="btn btn-primary">Continuar</button>
            </form>
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
      document.getElementById('date-time-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const dateTime = {
          date: formData.get('date'),
          time: formData.get('time')
        };

        localStorage.setItem('selectedDateTime', JSON.stringify(dateTime));

        window.location.href = 'step-4.php';
      });
    });
  </script>
</body>

</html>