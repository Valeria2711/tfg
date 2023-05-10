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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Nuestras instalaciones</title>

    <link href="favicon.ico" rel="icon" type="image/x-icon" />

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

  <body >
    <?php 
      @include "./nav-bar.php";
    ?>
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

