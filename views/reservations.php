
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="../js/reservations.js"></script>
    <!-- Alertas -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- FlatPickr ( calendario ) -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  
    <title>Nuestras instalaciones</title>
    <link href="../favicon.ico" rel="icon" type="image/x-icon" />
  </head>

  <body >
  <?php 
    if(!isset($_COOKIE['user']) )
      include "./nav-bar-sin_sesion.php";
    else
      include "./nav-bar.php";
  ?>
    <div class="container col col-md-8">
      <div class="card-body">
			<h2>Reservar</h2>
        <form action="" method="post">
          <div class="mb-3">
            <label for="deportes">Selecciona el deporte:</label>
            <div class="input-group">
              <select id="deportes" name="deportes" class="form-control" onchange="actualizarInstalaciones()">
              </select>
              <input type="button" class="btn btn-primary" id="btn-reset-deportes" value="Reiniciar" onclick="cargarDeportes()"/>
            </div>
          </div>
          <div class="mb-3 input-group">
            <label for="instalaciones">Selecciona la instalación:</label>
            <div class="input-group">
              <select id="instalaciones" name="instalaciones" class="form-control" required onchange="actualizarDeportes()">
              </select>
              <input type="button" class="btn btn-primary" id="btn-reset-instalaciones" value="Reiniciar" onclick="cargarInstalaciones()"/>
            </div>
          </div>
          <div class="mb-3">
            <label for="fechaSeleccionada">Fecha a reservar:</label>
            <input type="text" id="fechaSeleccionada" name="fechaSeleccionada" required placeholder="Seleccione una fecha" onchange="buscarHoras()">
          </div>
          <div class="mb-3 timeline" >
            <label for="horaSeleccionada">Hora a reservar:</label>
            <div class="input-group">
              <select id="horaSeleccionada" name="horaSeleccionada" required class="form-control">
                <!-- Horas de disponibilidad se agregarán dinámicamente aquí -->
              </select>
              <input type="button" class="btn btn-primary" id="btn-reset-instalaciones" value="Buscar horario disponible" onclick="buscarHoras()"/>
            </div>
          </div>
          <input type="submit" name="reservar" class="btn btn-primary" value="Reservar ahora">
          <input type="reset" name="reset" class="btn btn-primary" value="Reiniciar formulario">
        </form>
      </div>
    </div>
  </body>
  <script>
    window.onload = function() {  
      var urlParams = new URLSearchParams(window.location.search);
      var instalacion = urlParams.get('instalacion');
      if (instalacion) {
        var select = document.getElementById("instalaciones");
        for (var i = 0; i < select.options.length; i++) {
          if (select.options[i].value === instalacion) {
            select.selectedIndex = i;
            break;
          }
        }
      }
    }
    var flatpickr = flatpickr("#fechaSeleccionada", {
      minDate: "today",
      dateFormat: "Y-m-d",
      altInput: true,
      altFormat: "j F, Y",
      maxDate: new Date().fp_incr(30),
      "locale": {
        "firstDayOfWeek": 1
      }
    });

    function buscarHoras() {
      var fecha = document.getElementById("fechaSeleccionada").value;
      var instalacion = document.getElementById("instalaciones").value;
      if(fecha == "0" || instalacion == "0"){
        Swal.fire({
          title: 'Error',
          text: 'Debe seleccionar una fecha y una instalación para poder ofrecerle una información válida.',
          icon: 'error',
          confirmButtonText: 'Aceptar'
        });
      }else{
        if(instalacion != '0'){
          let formData = new FormData();
          formData.append("instalacion", instalacion);
          formData.append("fecha", fecha);
          let xhr = new XMLHttpRequest();
          let url = '../controller/horasReservas.php';
          xhr.open("POST", url);
          xhr.send(formData);
          xhr.onload = function () {
            if (xhr.status != 200) {
              alert(`Error ${xhr.status}: ${xhr.statusText}`);
            } else {
              console.log(xhr.response);
              $('#horaSeleccionada ').html(xhr.response);
            }
          }
        }
      }
      
    }
  </script>
</html>
<?php
include_once("../model/Reserva.php");
if(isset($_POST['reservar']) && isset($_COOKIE['user'])){
  $reserva=new Reserva($_POST["instalaciones"],$_COOKIE['user'],$_POST["horaSeleccionada"],$_POST["fechaSeleccionada"]);
  $result = $reserva->reservar();
  // echo "<h1>Datos de la reserva:</h1> ".$reserva."<br/>";
  echo "<script>
  Swal.fire({
    title: '¡Éxito!',
    html: 'Podrá acceder a los datos de la reserva en la página de <i>Mis reservas</i>',
    icon: 'success',
    confirmButtonText: 'Aceptar'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'userReservations.php';
    }
})
  </script>";
  exit;
// }
}else if( !isset($_COOKIE['user']) && isset($_POST['reservar'])  ) {
  // echo "Error en la reserva";
  echo "<script>
  Swal.fire({
    title: 'Error!',
    text: 'Error en la reserva, debe tener inciada la sesión y haber seleccionado todos los campos obligatorios.',
    icon: 'error',
    confirmButtonText: 'Aceptar'
  })
  // alert('Error en la reserva, debe tener inciada la sesión y haber seleccionado todos los campos obligatorios.')
  </script>";
}

?>