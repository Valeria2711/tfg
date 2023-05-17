<?php
include_once("../model/Reserva.php");
if(isset($_POST['reservar'])){
  $reserva=new Reserva($_POST["instalaciones"],1,$_POST["horaSeleccionada"],$_POST["fechaSeleccionada"]);
  $result = $reserva->reservar();
  echo $result;
  echo "Datos de la reserva: ".$reserva."<br/>";
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
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
    if(!isset($_COOKIE['sesion']) )
      include "./nav-bar-sin_sesion.php";
    else
      include "./nav-bar.php";
  ?>
    <div class="card col col-md-6">
      <div class="card-body">
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
              <select id="instalaciones" name="instalaciones" class="form-control" onchange="actualizarDeportes()">
              </select>
              <input type="button" class="btn btn-primary" id="btn-reset-instalaciones" value="Reiniciar" onclick="cargarInstalaciones()"/>
            </div>
          </div>
          <div class="mb-3">
            <label for="fechaSeleccionada">Fecha a reservar:</label>
            <input type="text" id="fechaSeleccionada" name="fechaSeleccionada" placeholder="Seleccione una fecha">
            <!-- <input type="date" id="fecha" name="fecha" required class="form-control"> -->
          </div>
          <div class="mb-3">
            <!-- <label for="horaSeleccionada">Hora a reservar:</label> -->
            <!-- <input type="time" id="horaSeleccionada" name="horaSeleccionada" required class="form-control"> -->
            <div class="timeline" id="timeline">
              <!-- Horas de disponibilidad se agregarán dinámicamente aquí -->
            </div>
          </div>
          <input type="submit" name="reservar" class="btn btn-primary" value="Reservar ahora">
          <input type="reset" name="reset" class="btn btn-primary" value="Reiniciar formulario">
        </form>
      </div>
    </div>
  </body>
  <script>
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
    // function disableSpecificTimes(time) {
    //     var disabledTimes = ['12:00am']; // Horas que deseas quitar del selector
    //     return disabledTimes.indexOf(time) === -1;
    //   }
    // // Inicializa el timepicker en el campo de entrada de texto
    // var timepicker = $("#horaSeleccionada").timepicker({
    //   timeFormat: "HH:mm",
    //   interval: 60,
    //   dropdown: true,
    //   disableTimeFn: disableSpecificTimes,
    //   scrollbar: true,
    //   minTime: '8:00',
    //   maxTime: '22:00',
    // });

    // document.querySelector("#horaSeleccionada").addEventListener(
    //   'click', function(event) {
    //     timepicker.timepicker('open');
    //   }
    // );
    function actualizarInstalaciones() {
        var deporteSeleccionado = $('#deportes').val();
        let formData = new FormData();
        formData.append("deporte", deporteSeleccionado);
        let xhr = new XMLHttpRequest();
        let url = '../controller/actualizarSelects.php';
        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = function () {
          if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`);
          } else {
            var selectElement = document.getElementById("deportes");
            var options = selectElement.options;

            for (var i = 0; i < options.length; i++) {
              console.log(xhr.response);
              var value = options[i].outerHTML;
              console.log(value);
            }

            console.log(xhr.response);
            $('#instalaciones').html(xhr.response);
          }
        }
        
    }
    function actualizarDeportes() {
      if($('#deportes').val() == '0'){
        var instalacionSeleccionada = $('#instalaciones').val();
        let formData = new FormData();
        formData.append("instalacion", instalacionSeleccionada);
        let xhr = new XMLHttpRequest();
        let url = '../controller/actualizarSelects.php';
        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = function () {
          if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`);
          } else {
            console.log(xhr.response);
            $('#deportes').html(xhr.response);
          }
        }
      }
	  }
    function actualizarHoras() {
        var timeline = document.getElementById('timeline');
    
        // TODO sql to tbl reservas desde instalacion seleccionada
        for (var i = 8; i <= 22; i++) {
            var divHour = document.createElement('div');
            var hour = document.createElement('button');
            hour.classList.add('hour');
            hour.textContent = i.toString().padStart(2, '0') + ':00';
            hour.addEventListener("click",seleccionarHora);
            if (isHoraOcupada(i)) {
                hour.classList.add('occupied');
            }else{
                hour.classList.add('available');
            }
            
            divHour.appendChild(hour);
            timeline.appendChild(hour);
      }
    }
    var reservas = [
        { hora_inicio: '08:00', hora_fin: '10:00' },
        { hora_inicio: '13:00', hora_fin: '14:00' },
        // ...
    ];
    function isHoraOcupada(hora) {
        for (var i = 0; i < reservas.length; i++) {
            var reserva = reservas[i];
            var horaInicio = parseInt(reserva.hora_inicio.split(':')[0]);
            var horaFin = parseInt(reserva.hora_fin.split(':')[0]);
            
            if (hora >= horaInicio && hora < horaFin) {
            return true;
            }
        }
        return false;
    }
    function seleccionarHora(e) {
        var hora = e.target.textContent.split(':')[0] * 1;
        if (e.target.classList.contains('available')) {
            e.target.classList.add('selected');
            e.target.classList.remove('available');
            console.log(hora)
        }else if (e.target.classList.contains('occupied')) {
            alert("La hora seleccionada no se puede reservar, ya está ocupada")   
        }
    }
    document.addEventListener("DOMContentLoaded", function() {
      cargarDeportes();
      cargarInstalaciones();
      $('timeline').hide = true;
    });
    function cargarDeportes() {
        let formData = new FormData();
        formData.append("get", "deportes");
        let xhr = new XMLHttpRequest();
        let url = '../controller/actualizarSelects.php';
        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = function () {
          if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`);
          } else {         
            console.log(xhr.response);
            $('#deportes').html(xhr.response);
          }
        }
    }

    function cargarInstalaciones() {
        let formData = new FormData();
        formData.append("get", "instalaciones");
        let xhr = new XMLHttpRequest();
        let url = '../controller/actualizarSelects.php';
        xhr.open("POST", url);
        xhr.send(formData);
        xhr.onload = function () {
          if (xhr.status != 200) {
            alert(`Error ${xhr.status}: ${xhr.statusText}`);
          } else {
            console.log($('#instalaciones'));
            console.log(xhr.response);
            $('#instalaciones').html(xhr.response);
          }
        }
    }

    function getHorasOcupadas(){
      // var instalacion = document.getElementById("instalaciones").value;
      // var deporte = document.getElementById("deportes").value;
      // var fecha = document.getElementById("fecha").value;
      // var url = "consulta_reservas.php?instalacion=" + instalacion + "&deporte=" + deporte + "&fecha=" + fecha;
      var url = "";
      var xhr = new XMLHttpRequest();
      xhr.open("GET", url, true); // Utilizar la URL construida con los parámetros
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
              // La llamada AJAX se completó con éxito
              var response = xhr.responseText;
              // Aquí puedes utilizar la respuesta recibida (los datos de las reservas)
              // para generar la línea temporal o realizar cualquier otra operación
          }
      };
      xhr.send(formData);
    }
    function isHoraOcupada(hora) {
        for (var i = 0; i < reservas.length; i++) {
            var reserva = reservas[i];
            var horaInicio = parseInt(reserva.hora_inicio.split(':')[0]);
            var horaFin = parseInt(reserva.hora_fin.split(':')[0]);
            if (hora >= horaInicio && hora < horaFin) {
            return true;
            }
        }
        return false;
    }
    function seleccionarHora(e) {
        var hora = e.target.textContent.split(':')[0] * 1;
        if (e.target.classList.contains('available')) {
            e.target.classList.add('selected');
            e.target.classList.remove('available');
            console.log(hora)
        }else if (e.target.classList.contains('occupied')) {
            alert("La hora seleccionada no se puede reservar, ya está ocupada")   
        }
    }

  </script>
</html>