<?php
require_once("../model/bdConnection.php");
if (isset($_POST['enviar'])) {
    $usuario_correo = $_POST['usuario_correo'];
    $password = $_POST['password'];
    if (empty($usuario_correo) || empty($password)) {
        echo "<script>
                Swal.fire({
                    title: 'ERROR',
                    text: 'Debes rellenar todos los campos',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                })
                </script>";
    } else {
        $conn = new mysqli("localhost", "root", "", "alquiler_instalaciones");

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
        $sql = "SELECT id_usuario, contrasenna FROM tbl_usuarios WHERE nombre_usuario = ? OR correo = ?";
        $sqlresult = $conn->prepare($sql);
        $sqlresult->bind_param("ss", $usuario_correo, $usuario_correo);
        $sqlresult->execute();
        $result = $sqlresult->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $stored_password = $row['contrasenna'];
            
            if (password_verify($password, $stored_password)) {
                echo "<script>
                Swal.fire({
                    title: '¡Éxito!',
                    text: '¡Inicio de sesión exitoso!',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                })
                </script>";
                // echo "Inicio de sesión exitoso.";
                $idUser = $row['id_usuario'];
                $_SESSION['usuario_correo'] = $idUser;
                setcookie('user', $idUser, time() + 3600, '/');
                header('Location: ./index.php');exit;
            } else {
                echo "<script>
                Swal.fire({
                    title: 'ERROR',
                    text: 'Credenciales inválidas.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                })
                </script>";
                // echo "Credenciales inválidas.";
            }
        } else {
            echo "<script>
                Swal.fire({
                    title: 'ERROR',
                    text: 'Credenciales inválidas.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                })
                </script>";
            // echo "Credenciales inválidas.";
        }
        $sqlresult->close();
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
    <!-- Alertas -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="../favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
<?php 
    if(!isset($_COOKIE['user']) )
      include "./nav-bar-sin_sesion.php";
    else
      include "./nav-bar.php";
  ?>
	<div class="container ">
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