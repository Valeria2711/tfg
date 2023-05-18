<?php
	
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

    <link href="../favicon.ico" rel="icon" type="image/x-icon" />

    <style>
      .btn-reserva {
        margin-top: 15px;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        border: none;
        padding: 10px 20px;
        font-size: 1.2rem;
        text-transform: uppercase;
        font-weight: bold;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        cursor: pointer;
        transition: all 0.3s ease-in-out;
      }

      .btn-reserva:hover {
        background-color: #0062cc;
      }
      .reserva {
        font-size: 20px;
      }

    </style>

  </head>

  <body class="index">
    <?php 
    if(!isset($_COOKIE['user']) )
      include "./nav-bar-sin_sesion.php";
    else
      include "./nav-bar.php";
    ?>

    <div class="container-sm justify-content-center" >
        <div id="sportsCarousel" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../images/futsal.jpg" class="d-block w-60" alt="Fútbol sala">
            </div>
            <div class="carousel-item">
              <img src="../images/baloncesto.jpg" class="d-block w-60" alt="Baloncesto">
            </div>
            <div class="carousel-item">
              <img src="../images/tenis.jpg" class="d-block w-60" alt="Tenis">
            </div>
            <div class="carousel-item">
              <img src="../images/futbol.jpg" class="d-block w-60" alt="Fútbol">
            </div>
            <div class="carousel-item">
              <img src="../images/voleibol.jpg" class="d-block w-60" alt="Voleibol">
            </div>
            <div class="carousel-item">
              <img src="../images/padel.jpg" class="d-block w-60" alt="Pádel">
            </div>
            <div class="carousel-item">
              <img src="../images/rugby.jpg" class="d-block w-60" alt="Rugby">
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
      <br/>
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-8">
          <img src="../images/gifReservas.gif" class="rounded img-fluid" width="400px"/>
        </div>
        <div class="col-sm-4">
          <p class="reserva">
            ¿Buscas un lugar para practicar tu deporte favorito? 
            ¡Reserva ahora en nuestras pistas deportivas y comienza 
            a disfrutar de una experiencia única! Contamos con una 
            amplia variedad de opciones, desde canchas de tenis y 
            baloncesto hasta campos de fútbol y más. Con tarifas 
            accesibles y horarios flexibles, estamos aquí para ayudarte 
            a mantenerte activo y en forma. ¡No esperes más y reserva 
            ahora tu espacio en nuestras pistas deportivas!
          </p>
          <a href="./reservations.php"><button class="btn-reserva">¡Reserva ahora!</button></a>
        </div>
      </div>
    </div>
  </body>
</html>

