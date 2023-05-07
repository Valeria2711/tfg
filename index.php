<?php
	// if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	// 	$uri = 'https://';
	// } else {
	// 	$uri = 'http://';
	// }
	// $uri .= $_SERVER['HTTP_HOST'];
	// header('Location: '.$uri);
	// // header('Location: '.$uri.'/dashboard/');
	// exit;
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Inicio</title>

    <link href="./favicon.ico" rel="icon" type="image/x-icon" />


  </head>

  <body class="index">
    <?php 
    @include "./nav-bar.php";
    ?>

    <!-- Slider diferentes deportes que puedes realizar -->
    <div class="container-md justify-content-center" >
        <div id="sportsCarousel" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./images/futsal.jpg" class="d-block w-60" alt="Fútbol sala">
            </div>
            <div class="carousel-item">
              <img src="./images/baloncesto.jpg" class="d-block w-60" alt="Baloncesto">
            </div>
            <div class="carousel-item">
              <img src="./images/tenis.jpg" class="d-block w-60" alt="Tenis">
            </div>
            <div class="carousel-item">
              <img src="./images/futbol.jpg" class="d-block w-60" alt="Fútbol">
            </div>
            <div class="carousel-item">
              <img src="./images/voleibol.jpg" class="d-block w-60" alt="Voleibol">
            </div>
            <div class="carousel-item">
              <img src="./images/padel.jpg" class="d-block w-60" alt="Pádel">
            </div>
            <div class="carousel-item">
              <img src="./images/rugby.jpg" class="d-block w-60" alt="Rugby">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#sportsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#sportsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
  </body>
</html>

