<?php

require_once( "../model/bdConnection.php" );
// $conexion = new Conexion( 'alquiler_instalaciones' );

if ( isset($_POST['enviar']) ) {
    $usuarioCorreo = $_POST['usuario_correo'];
	$contrasenna = $_POST['password'];

	$sql = "SELECT * FROM tbl_usuarios WHERE nombre_usuario = '$usuarioCorreo' OR correo = '$usuarioCorreo'";
	$result = $conn->prepare($sql);
	$ret = $result->execute();
	$row = $result->fetch(PDO::FETCH_ASSOC);
	var_dump($row['contrasenna']);exit();
	if ( $row['contrasenna'] == $contrasenna ) {
		$_SESSION['usuario'] = $row;
		header( "Location: ./index.php" );
	} else {
		header( "Location: ./login.php" );
	}

	


    // $contrasenna = password_hash($_POST['password'],PASSWORD_DEFAULT);
	// $user = $conexion->realizar_consulta( "SELECT * from tbl_usuarios where (correo = '$correo' OR nombre_usuario = '$correo') AND contrasenna = '$contrasenna'" );
    // if ( $user ) {
	// 	session_start();
	// 	setcookie('sesion',$user["id_usuario"],time()-5000);
	// 	$_SESSION['sesion'] = $user["id_usuario"];
	// 	header('Location: ../index.php');
	// }else{
	// 	echo "Usuario o contraseña incorrecta";
	// }
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
