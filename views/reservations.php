<?php
include_once("../model/Reserva.php");
if(isset($_POST['reservar'])){
  $reserva=new Reserva($_POST["deportes"],$_POST["instalaciones"],$_POST["hora_inicio"],$_POST["hora_fin"],$_POST["fecha"]);
  $reserva->reservar();
  echo "Datos de la reserva: ".$reserva."<br/>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <!-- Use title if it's in the page YAML frontmatter -->
    <title>Nuestras instalaciones</title>

    <link href="/images/favicon.png" rel="icon" type="image/png" />


  </head>

  <body >
    <?php 
      include "./nav-bar.php";
    ?>
    <div class="card col col-md-6">
      <div class="card-body">
        <form action="" method="post">
          <div class="mb-3">
            <label for="deportes">Selecciona el deporte:</label>
            <!-- <select id="deporte" name="deporte" class="form-control" onchange="actualizarInstalaciones()"> -->
              <select id="deportes" name="deportes" required class="form-control" >
            <option value=''>Selecciona un deporte</option>
              <?php
                require_once( "../model/bdConnection.php" );
                $result = $conn->query("SELECT id_deporte, nombre from tbl_deportes");
                while ($row = $result->fetch_assoc()) {
                  $idDeporte = $row['id_deporte'];
                  $nombre = $row['nombre'];
                  echo "<option value='".$idDeporte."'>".$nombre."</option>";
                }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="instalaciones">Selecciona la instalación:</label>
            <!-- <select id="instalaciones" name="instalaciones" class="form-control" onchange="actualizarDeportes()"> -->
              <select id="instalaciones" name="instalaciones" required class="form-control" >
              <option value="">Selecciona una instalación</option>
              <?php
                require_once( "../model/bdConnection.php" );
                $result = $conn->query("SELECT id_instalacion, denominacion from tbl_instalaciones");
                while ($row = $result->fetch_assoc()) {
                  $idInstalacion = $row['id_instalacion'];
                  $denominacion = $row['denominacion'];
                  echo "<option value='".$idInstalacion."'>".$denominacion."</option>";
                }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="fecha">Fecha a reservar:</label>
            <input type="date" id="fecha" name="fecha" required class="form-control">
          </div>
          <div class="mb-3">
            <label for="hora_inicio">Hora de inicio:</label>
            <input type="time" id="hora_inicio" name="hora_inicio" required class="form-control">
          </div>
          <div class="mb-3">
            <label for="hora_fin">Hora de fin:</label>
            <input type="time" id="hora_fin" name="hora_fin" required class="form-control">
          </div>
          <input type="submit" name="reservar" class="btn btn-primary" value="Reservar ahora">
        </form>
      </div>
    </div>
  </body>
  <script>
    function actualizarInstalaciones() {
      var deporteSeleccionado = $('#deportes').val();
      
      $.ajax({
        url: '../controller/obtenerInstalaciones.php',
        method: 'POST',
        data: { deporte: deporteSeleccionado },
        success: function(response) {
          console.log(response);
          // Actualizar el select de instalaciones con los datos recibidos
          $('#instalaciones').html(response);
        },
        error: function() {
          alert('Error al obtener las instalaciones.');
        }
      });
    }
    function actualizarDeportes() {
      var instalacionSeleccionada = $('#instalaciones').val();
      
      $.ajax({
        url: '../controller/obtenerDeportes.php',
        method: 'POST',
        data: { instalacion: instalacionSeleccionada },
        success: function(response) {
          // Actualizar el select de instalaciones con los datos recibidos
          $('#deportes').html(response);
        },
        error: function() {
          alert('Error al obtener los deportes.');
        }
      });
    }

  </script>
</html>