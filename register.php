<?php
// Comprobar si se ha enviado el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos enviados del formulario
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $contrasenna = $_POST['contrasenna'];

  // Validar y procesar los datos recibidos
  // Aquí puedes agregar la lógica para validar los datos y guardarlos en tu base de datos

  // Redireccionar al usuario a la página de inicio de sesión
  header('Location: login.php');
  exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
    <?php 
      @include "./nav-bar.php";
    ?>
  <div class="container">
    <h1>Registro de Usuario</h1>

    <form action="registro.php" method="post">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>

      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
      </div>

      <div class="form-group">
        <label for="contrasenna">Contraseña:</label>
        <input type="password" class="form-control" id="contrasenna" name="contrasenna" required>
      </div>

      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
