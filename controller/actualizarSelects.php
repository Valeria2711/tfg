<?php
require_once( "../model/bdConnection.php" );
if(isset($_POST["deporte"])){
  return actualizarInstalaciones($conn, $_POST["deporte"]);
}else if (isset($_POST["instalacion"])){
  return actualizarDeportes($conn, $_POST["instalacion"]);
}else if ( isset($_POST["get"]) && $_POST["get"] == "deportes" ){
  return getDeportes($conn);
}else if ( isset($_POST["get"]) && $_POST["get"] == "instalaciones"){
  return getInstalaciones($conn);
};
function actualizarInstalaciones($conn, $deporteSeleccionado){
  $sql = "SELECT 
    depor_insta.id_instalacion id, denominacion 
  FROM 
    tbl_deporte_instalacion as depor_insta,
    tbl_instalaciones as insta 
  WHERE 
    depor_insta.id_deporte = $deporteSeleccionado 
    AND depor_insta.id_instalacion = insta.id_instalacion;";
  $result = $conn->query($sql);
  $selectInstalaciones = "";
  while ($row = $result->fetch_assoc()) {
    $selectInstalaciones .= "<option value='" . $row["id"] . "'>" . $row["denominacion"] . "</option>";
  }
  echo $selectInstalaciones;
  return $selectInstalaciones;
}
function actualizarDeportes( $conn, $instalacionSeleccionada ){
  $sql = "SELECT depor_insta.id_deporte id, nombre 
  FROM 
      tbl_deporte_instalacion as depor_insta,
      tbl_deportes as depor 
  WHERE 
      depor_insta.id_instalacion = $instalacionSeleccionada 
      AND depor_insta.id_deporte = depor.id_deporte;";
  $result = $conn->query($sql);
  $selectDeportes = "";
  while ($row = $result->fetch_assoc()) {
      $selectDeportes .= "<option value='" . $row["id"] . "'>" . $row["nombre"] . "</option>";
  }
  echo $selectDeportes;
  return $selectDeportes;
}
function getDeportes ($conn) {
  $result = $conn->query("SELECT id_deporte, nombre from tbl_deportes");
  echo  "<option value='0'>Selecciona un deporte</option>";
  while ($row = $result->fetch_assoc()) {
    $idDeporte = $row['id_deporte'];
    $nombre = $row['nombre'];
    echo "<option value='".$idDeporte."'>".$nombre."</option>";
  }
}
function getInstalaciones ($conn) {
  $result = $conn->query("SELECT id_instalacion, denominacion from tbl_instalaciones");
  echo "<option value='0'>Selecciona una instalación</option>";
  while ($row = $result->fetch_assoc()) {
    $idInstalacion = $row['id_instalacion'];
    $denominacion = $row['denominacion'];
    echo "<option value='".$idInstalacion."'>".$denominacion."</option>";
  }
}
?>
