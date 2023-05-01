<?php
	// if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
	// 	$uri = 'https://';
	// } else {
	// 	$uri = 'http://';
	// }
	// $uri .= $_SERVER['HTTP_HOST'];
	// header('Location: '.$uri);
	// // header('Location: '.$uri.'/dashboard/');
	// exit;
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Nuestras instalaciones</title>

    <link href="/images/favicon.png" rel="icon" type="image/png" />


  </head>

  <body >
    <?php 
      @include "./nav-bar.php";
    ?>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="container text-center">
      <div class="row">
      </div>
      <div class="row">
        <div class="col-sm-8">
          <img src="./images/gifReservas.gif" class="rounded img-fluid" width="400px"/>
        </div>
        <div class="col-sm-4">col-sm-4</div>
      </div>
    </div>
  </body>
</html>

