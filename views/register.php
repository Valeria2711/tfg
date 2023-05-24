<!DOCTYPE html>
<html>
<head>
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="../favicon.ico" rel="icon" type="image/x-icon" />
  <!-- Alertas -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <label for="nombre">Nombre y apellidos: <i>*(Obligatorio)</i></label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="form-group">
        <label for="user">Nombre de usuario: <i>*(Obligatorio)</i></label>
        <input type="text" class="form-control" id="user" name="user" required>
        
        <div class="form-group">
          <label for="correo">Correo electrónico: <i>*(Obligatorio)</i></label>
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        
        <div class="form-group">
          <label for="contrasenna">Contraseña: <i>*(Obligatorio)</i></label>
          <input type="password" class="form-control" id="contrasenna" name="contrasenna" required>
        </div>
        <div class="form-group">
          <label for="contrasenna2">Repetir contraseña: <i>*(Obligatorio)</i></label>
          <input type="password" class="form-control" id="contrasenna2" name="contrasenna2" required>
        </div>
      </div>
      <div class="form-group">
        <label for="dni">DNI/NIF:</label>
        <input type="text" class="form-control" id="dni" name="dni" >
      </div>
      <div class="form-group">
        <label for="f_nac">Fecha de nacimiento:  <i>*(Obligatorio)</i></label>
        <input type="date" class="form-control" id="f_nac" name="f_nac" required>
      </div>
      <div class="form-group">
        <label for="direccion">Dirección:</label>
        <input type="text" class="form-control" id="direccion" name="direccion" >
      </div>
      <div class="form-group">
        <label for="telefono">Teléfono: ej.(+34 66666666) <i>*(Obligatorio)</i> </label>
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
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $error = "";
  
  $nombre = $_POST['nombre'];
  $usuario = $_POST['user'];
  $correo = $_POST['correo'];
  $contrasenna =  $_POST['contrasenna'];
  $contrasenna2 = $_POST['contrasenna2'];
  $dni = $_POST['dni'] ?: null;
  $f_nac = $_POST['f_nac'] ?: null;
  $direccion = $_POST['direccion'] ?: null;
  $genero = $_POST['genero'] ?: null;
  $telefono = $_POST['telefono'];

  if($contrasenna == $contrasenna2){
    try{
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
      $ret = $result->execute();
      if($ret){
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
        $ret2 = $result2->execute();
        if($ret2){
          echo "<script>
          Swal.fire({
            title: '¡Éxito!',
            html: '¡Podrá iniciar sesión correctamente!',
            icon: 'success',
            confirmButtonText: 'Aceptar'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'login.php';
            }
          })
          </script>";
        }else{
          echo "<script>
          Swal.fire({
            title: 'ERROR',
            text: 'Ha ocurrido un error inesperado al registrar el usuario, por favor inténtelo de nuevo más tarde.',
            icon: 'error',
            confirmButtonText: 'Aceptar'
          })
          </script>";
        }
      }
    }catch(Exception $e){
      $error = $e;
      if(strpos($e, "Duplicate entry") !== false){
        echo "<script>
        Swal.fire({
          title: 'ERROR',
          text: 'Ha ocurrido un error al registrar el usuario, ese nombre de usuario ya existe.',
          icon: 'error',
          confirmButtonText: 'Aceptar'
        })
        </script>";
      }else{
        echo "<script>
        Swal.fire({
          title: 'ERROR',
          text: 'Ha ocurrido un error inesperado al registrar el usuario, por favor inténtelo de nuevo más tarde.',
          icon: 'error',
          confirmButtonText: 'Aceptar'
        })
        </script>";
      }
    }
    }else{
      echo "<script>
        Swal.fire({
          title: 'ERROR',
          text: 'Las contraseñas no coinciden',
          icon: 'error',
          confirmButtonText: 'Aceptar'
        })
        </script>";
      $error="Las contraseñas no coinciden";
    }
    

  if( $error == "" )
    header('Location: login.php');
  // exit();
}

