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

    <link href="/images/favicon.png" rel="icon" type="image/png" />


  </head>

  <body >
    <?php 
      @include "./nav-bar.php";
    ?>
    <div class="container col col-md-6">
    <form action="submit-form.php" method="post">
      <div class="mb-3">
        <label for="deporte">Selecciona el deporte:</label>
        <select id="deporte" name="deporte" class="form-control">
          <!-- foreach de cada deporte -->
          <option value="futbol">Fútbol</option>
          <option value="tenis">Tenis</option>
          <option value="natacion">Natación</option>
          <!-- Agrega más opciones según tus instalaciones deportivas -->
        </select>
      </div>
      <div class="mb-3">
      <!-- foreach de cada instalacion -->
        <label for="instalacion">Selecciona la instalación:</label>
        <select id="instalacion" name="instalacion" class="form-control">
          <option value="campo1">Campo 1</option>
          <option value="campo2">Campo 2</option>
          <option value="piscina">Piscina</option>
          <!-- Agrega más opciones según tus instalaciones deportivas -->
        </select>
      </div>
      <div class="mb-3">
        <label for="fecha">Fecha a reservar:</label>
        <input type="date" id="fecha" name="fecha" class="form-control">
      </div>
      <div class="mb-3">
        <label for="hora_inicio">Hora de inicio:</label>
        <input type="time" id="hora_inicio" name="hora_inicio" class="form-control">
      </div>
      <div class="mb-3">
        <label for="hora_fin">Hora de fin:</label>
        <input type="time" id="hora_fin" name="hora_fin" class="form-control">
      </div>
      <input type="submit" class="btn btn-primary" value="Reservar ahora">
    </form>
    </div>
  </body>
</html>