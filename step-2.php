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
          <div class="page-header-left"><a class="brand" href="index.php"><img src="image/barberAppMobile.png" alt="" width="200" height="100" /></a></div>
          <div class="page-header-center">
            <div class="step-progress">
              <div class="step-progress-top"><span class="step-progress-number">2</span><span>de</span><span class="step-progress-number">3</span></div>
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
          <div class="custom-progress-body" style="width: 40%;"></div>
        </div>
        <div id="wrapper">
          <section class="section-xl bg-periglacial-blue one-screen-page-content text-center">
            <div class="shell">
              <a class="link link-primary " style="text-decoration: underline; font-size: 1.5em;" href="step-1.php">
                < Atras</a>
            </div>
            <div class="shell">
              <h2>ELEGIR EL BARBERO</h2>
              <div class="range range-50" style="justify-content: center;">
                <form id="barber-form" style="display: flex;">
                  <div class="cell-xs-3 cell-md-5" style="display: grid; gap: 2em; justify-content: center;">
                    <div style="display: flex; justify-content: center;">
                      <div class="thumbnail-option">
                        <div class="thumbnail-option">
                          <article class="card-barber">
                            <div class="thumbnail-option-body">
                              <input class="card-barber-title" name="barbero" value="SANCHEZ" style="border: none; width: 250px; display: block; background-color: transparent; text-align: center;">
                              <div class="card-barber-panel" style="display: grid; justify-content: center;">
                                <p class="card-barber-text">Barbero con 10 años de experiencia.</p>
                                <button type="button" class="btn btn-xs btn-primary btn-circle" onclick="saveBarber('SANCHEZ')">Elegir</button>
                              </div>
                            </div>
                          </article>
                        </div>
                      </div>
                      <div class="cell-xs-3 cell-md-3">
                        <div class="thumbnail-option">
                          <article class="card-barber">
                            <div class="thumbnail-option-body">
                              <input class="card-barber-title" name="barbero" value="PATTERSON" style="border: none; width: 250px; display: block; background-color: transparent; text-align: center;">
                              <div class="card-barber-panel" style="display: grid; justify-content: center;">
                                <p class="card-barber-text">Especialista en cortes modernos.</p>
                                <button type="button" class="btn btn-xs btn-primary btn-circle" onclick="saveBarber('PATTERSON')">Elegir</button>
                              </div>
                            </div>
                          </article>
                        </div>
                      </div>
                    </div>
                    <div style="display: flex; justify-content: center;">
                      <div class="cell-xs-6 cell-md-3">
                        <div class="thumbnail-option">
                          <article class="card-barber">
                            <div class="thumbnail-option-body">
                              <input class="card-barber-title" name="barbero" value="RICHARD" style="border: none; width: 250px; display: block; background-color: transparent; text-align: center;">
                              <div class="card-barber-panel" style="display: grid; justify-content: center;">
                                <p class="card-barber-text">Experto en barbería tradicional.</p>
                                <button type="button" class="btn btn-xs btn-primary btn-circle" onclick="saveBarber('RICHARD')">Elegir</button>
                              </div>
                            </div>
                          </article>
                        </div>
                      </div>
                      <div class="cell-xs-6 cell-md-3">
                        <div class="thumbnail-option">
                          <article class="card-barber">
                            <div class="thumbnail-option-body">
                              <input class="card-barber-title" name="barbero" value="JONATHAN" style="border: none; width: 250px; display: block; background-color: transparent; text-align: center;">
                              <div class="card-barber-panel" style="display: grid; justify-content: center;">
                                <p class="card-barber-text">Especialista en estilos clásicos.</p>
                                <button type="button" class="btn btn-xs btn-primary btn-circle" onclick="saveBarber('JONATHAN')">Elegir</button>
                              </div>
                            </div>
                          </article>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
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
  <script>
    function saveBarber(barber) {
      localStorage.setItem('selectedBarber', barber);
      window.location.href = 'step-3.php';
    }
  </script>
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
</body>

</html>