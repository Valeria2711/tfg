
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
document.addEventListener("DOMContentLoaded", function() {
  cargarDeportes();
  cargarInstalaciones();
  $('timeline').hide = true;
});