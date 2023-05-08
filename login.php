<?php
// Comprobar si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados del formulario
    $correo = $_POST['email'];
    $contrasenna = $_POST['password'];

    // Validar y procesar los datos recibidos
    // Aquí puedes agregar la lógica para validar las credenciales del usuario
    // y permitir el inicio de sesión

    // Si las credenciales son válidas, redireccionar al usuario a la página principal
    // de lo contrario, mostrar un mensaje de error o realizar otra acción adecuada
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Página de inicio de sesión</title>
	<meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Use title if it's in the page YAML frontmatter -->
</head>
<body>
    <?php 
      @include "./nav-bar.php";
    ?>
	<div class="container card">
		<h2>Iniciar sesión</h2>
		<form action="POST">
			<div class="form-group">
				<label for="email">Correo electrónico:</label>
				<input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico">
			</div>
			<div class="form-group">
				<label for="pwd">Contraseña:</label>
				<input type="password" class="form-control" id="pwd" placeholder="Ingresa tu contraseña">
			</div>
			<div class="checkbox">
				<label><input type="checkbox">Recordarme</label>
			</div>
			<button type="submit" class="btn btn-primary">Iniciar sesión</button>
		</form>
	</div>
	<!-- Enlace a los archivos JS de Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
