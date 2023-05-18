<?php

require_once( "../model/bdConnection.php" );
if (isset($_POST['enviar'])) {
    $usuario_correo = $_POST['usuario_correo'];
    $password = $_POST['password'];

    if (empty($usuario_correo) || empty($password)) {
        echo "Debes completar todos los campos.";
    } else {
        $conn = new mysqli("localhost", "root", "", "alquiler_instalaciones");

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tbl_usuarios WHERE (nombre_usuario = ? OR correo = ?) AND contrasenna = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $usuario_correo, $usuario_correo, $password);
        $stmt->execute();

        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            echo "Inicio de sesión exitoso.";
            $_SESSION['usuario_correo'] = $usuario_correo;
            setcookie('user', $usuario_correo, time() + 3600, '/');
            header('Location: ./index.php');   
        } else {
            echo "Credenciales inválidas.";
        }

        $stmt->close();
        $conn->close();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio de sesión</title>
	<meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
      @include "./nav-bar-sin_sesion.php";
    ?>
	<div class="container card">
		<div class="card-body">
			<h2>Iniciar sesión</h2>
			<form method="POST" action="">
				<div class="form-group">
					<label for="usuario_correo">Correo electrónico o usuario:</label>
					<input type="text" class="form-control" name="usuario_correo" id="usuario_correo" placeholder="Ingresa tu correo electrónico o nombre de usuario">
				</div>
				<div class="form-group">
					<label for="password">Contraseña:</label>
					<input type="password" class="form-control" name="password" id="password" placeholder="Ingresa tu contraseña">
				</div>
				<!-- <div class="checkbox">
					<label><input type="checkbox">Recordarme</label>
				</div> -->
				<button type="submit" name="enviar" class="btn btn-primary">Iniciar sesión</button>
			</form>
		</div>
	</div>
	<!-- Enlace a los archivos JS de Bootstrap -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
