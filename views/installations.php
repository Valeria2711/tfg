<!DOCTYPE html>
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

  <link href="../favicon.ico" rel="icon" type="image/x-icon" />   
  <style>
    @import url('https://fonts.cdnfonts.com/css/mikado');
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

    .img-x {
      width: 100%;
      max-width: 300px;
      height: 150px;
    }

    .contenedor {
      display: grid;
      grid-template-columns: repeat(3, 31.3%);
      gap: 2%;
    }
    
    p {
      margin-top: 5px;
      font-size: 20px;
      font-family: 'Mikado', sans-serif;
      font-weight: 500;
    }
  </style>

</head>

<body>
  <?php
  if (!isset($_COOKIE['sesion']))
    include "./nav-bar-sin_sesion.php";
  else
    include "./nav-bar.php";
  ?>
  <br />
  <div class="container text-center">
    <div>
      <h1>Nuestras instalaciones</h1>
    </div>
    <div class="contenedor">
      <div class="">
        <a href="reservations.php?instalacion=1">
          <img class="img-x" src="../images/instalaciones/baloncesto.jpg" alt="Baloncesto">
        </a>
        <p> Baloncesto </p>
      </div>
      <div class="">
        <a href="reservations.php?instalacion=2">
          <img class="img-x" src="../images/instalaciones/multideportiva1.jpg" alt="Multideportiva 1">
        </a> 
        <p>Multideportiva 1</p>
      </div>
      <div class="">
        <a href="reservations.php?instalacion=3">
          <img class="img-x" src="../images/instalaciones/multideportiva2.jpg" alt="Multideportiva 2">
        </a> 
        <p> Multideportiva 2 </p>
      </div>
    <div class="">
      <a href="reservations.php?instalacion=4">
        <img class="img-x" src="../images/instalaciones/voleibol.jpg" alt="Voleibol">
      </a> 
      <p> Voleibol </p>
    </div>
    <div class="">
      <a href="reservations.php?instalacion=5">
        <img class="img-x" src="../images/instalaciones/atletismo.jpg" alt="Atletismo">
      </a> 
      <p> Atletismo </p>
    </div>
    <div class="">
      <a href="reservations.php?instalacion=6">
        <img class="img-x" src="../images/instalaciones/futbol7-1.jpg" alt="Fútbol 7 - 1">
      </a> 
      <p> Fútbol 7 - 1 </p>
    </div>
    <div class="">
      <a href="reservations.php?instalacion=7">
        <img class="img-x" src="../images/instalaciones/futbol7-2.jpg" alt="Fútbol 7 - 2">
      </a> 
      <p> Fútbol 7 - 2 </p>
    </div>
    <div class="">
      <a href="reservations.php?instalacion=8">
        <img class="img-x" src="../images/instalaciones/futbol11.jpg" alt="Fútbol 11">
      </a> 
      <p> Fútbol 11 </p>
    </div>
    <div class="">
      <a href="reservations.php?instalacion=9">
        <img class="img-x" src="../images/instalaciones/padel1.jpg" alt="Pádel 1">
      </a> 
      <p> Pádel 1 </p>
    </div>
    <div class="">
      <a href="reservations.php?instalacion=10">
        <img class="img-x" src="../images/instalaciones/padel2.jpg" alt="Pádel 2">
      </a> 
      <p> Pádel 2 </p>
    </div>
    <div class="">
      <a href="reservations.php?instalacion=11">
        <img class="img-x" src="../images/instalaciones/tenis1.jpg" alt="Tenis 1">
      </a> 
      <p> Tenis 1 </p>
    </div>
    <div class="">
      <a href="reservations.php?instalacion=12">
        <img class="img-x" src="../images/instalaciones/tenis2.jpg" alt="Tenis 2">
      </a> 
      <p> Tenis 2 </p>
    </div>
  </div>
</body>

</html>