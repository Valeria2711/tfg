<!DOCTYPE html>
<html>
<head>
  <title>Formulario de Pago</title>
  <style>
    /* Estilos CSS para el formulario de pago */
    form {
      width: 300px;
      margin: 0 auto;
    }
    label {
      display: block;
      margin-top: 10px;
    }
    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 5px;
      margin-top: 5px;
    }
    button {
      display: block;
      margin-top: 10px;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Formulario de Pago</h1>
  <form id="miFormularioDePago">
    <label for="cardNumber">Número de Tarjeta:</label>
    <div id="cardElement"></div>

    <label for="cardName">Nombre del Titular:</label>
    <input type="text" id="cardName" placeholder="Juan Pérez" required>

    <label for="expiryDate">Fecha de Vencimiento:</label>
    <input type="text" id="expiryDate" placeholder="MM/AA" required>

    <label for="cvc">CVC:</label>
    <input type="number" id="cvc" placeholder="123" required>

    <button type="submit">Realizar Pago</button>
  </form>
  <script src="https://js.stripe.com/v3/"></script>

  <script>
     document.addEventListener('DOMContentLoaded', function() {
    
    // Configura la clave API de Stripe
    var stripe = Stripe('pk_test_51N9WXyD8EtAoCL3qJw55Knx9SKYlWtxySWuSjWB1hCwyI6IdZmJqiNhI1Y2UOAM8ddEj0hNoqiuKoZPqhHTi1A0c00UyjiSpvZ');

    // Captura el evento de envío del formulario
    var form = document.getElementById('miFormularioDePago');
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      // Crea un elemento de tarjeta utilizando la biblioteca de Stripe Elements
      var elements = stripe.elements();
      var cardElement = elements.create('card');
      cardElement.mount('#cardElement');

      // Crea un token de pago utilizando el elemento de tarjeta
      stripe.createToken(cardElement).then(function(result) {
        if (result.error) {
          // Manejo de errores
          console.error(result.error.message);
        } else {
          // Envía el token al servidor
          console.log(result.token);
        }
      });
    });
    });
  </script>
</body>
</html>
