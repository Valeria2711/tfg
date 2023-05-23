<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos enviados del formulario
  $nombre = $_POST['nombre'];
  $usuario = $_POST['user'];
  $correo = $_POST['correo'];
  $contrasenna =  $_POST['contrasenna'];
  $contrasenna2 = $_POST['contrasenna2'];
  $dni = $_POST['dni'];
  $f_nac = $_POST['f_nac'];
  $direccion = $_POST['direccion'];
  $genero = $_POST['genero'];
  $telefono = $_POST['telefono'];

  if($contrasenna == $contrasenna2){
    
    $hash = password_hash($contrasenna, PASSWORD_DEFAULT);
    $conn = new PDO("mysql:host=localhost;dbname=alquiler_instalaciones", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO tbl_usuarios (
      nombre_apellidos,
      nombre_usuario,
      contrasenna,
      correo
    ) VALUES (
        '$nombre',
        '$usuario',
        '$hash',
        '$correo'
    )";
    $result = $conn->prepare($sql);
    $result->execute();
    $id = $conn->lastInsertId();
    $sql2 = "INSERT INTO tbl_usuarios_datos_extra (
      fk_usuario,
      dni,
      fecha_nacimiento,
      direccion,
      telefono,
      genero
    ) VALUES (
      '$id',
      '$dni',
      '$f_nac',
      '$direccion',
      '$telefono',
      '$genero'
  )";
    $result2 = $conn->prepare($sql2);
    $result2->execute();
    var_dump($result2);
  }else{
    // TODO: PONER ERROR EN EL PROPIO REGISTER
    echo "Las contraseñas no coinciden";exit();
  }

  if( $error == "" )
  header('Location: login.php');
  // exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="../favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
  <?php 
      if(!isset($_COOKIE['user']) )
        include "./nav-bar-sin_sesion.php";
      else
        include "./nav-bar.php";
    ?>
  <div class="container">
    <h1>Registro de Usuario</h1>

    <form action="" method="post">
      <div class="form-group">
        <label for="nombre">Nombre y apellidos:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="user">Nombre de usuario:</label>
        <input type="text" class="form-control" id="user" name="user" required>
        
        <div class="form-group">
          <label for="correo">Correo electrónico:</label>
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        
        <div class="form-group">
          <label for="contrasenna">Contraseña:</label>
          <input type="password" class="form-control" id="contrasenna" name="contrasenna" required>
        </div>
        <div class="form-group">
          <label for="contrasenna2">Repetir contraseña:</label>
          <input type="password" class="form-control" id="contrasenna2" name="contrasenna2" required>
        </div>
      </div>
      <div class="form-group">
        <label for="dni">DNI/NIF:</label>
        <input type="text" class="form-control" id="dni" name="dni" >
      </div>
      <div class="form-group">
        <label for="f_nac">Fecha de nacimiento:</label>
        <input type="date" class="form-control" id="f_nac" name="f_nac" >
      </div>
      <div class="form-group">
        <label for="direccion">Dirección:</label>
        <input type="text" class="form-control" id="direccion" name="direccion" >
      </div>
      <div class="form-group">
        <label for="telefono">Teléfono: ej.(+34 66666666)</label>
        <input type="text" class="form-control" id="telefono" name="telefono" required>
      </div>
      <div class="form-group">
        <label for="genero">Género:</label>
        <select class="form-control" id="genero" name="genero">
          <option value="0">Seleccione un género:</option>
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
          <option value="O">Otro</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
