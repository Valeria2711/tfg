<?php
require_once( "../model/bdConnection.php" );
if(isset($_POST["deporte"])){
  return getInstalaciones($conn, $_POST["deporte"]);
}else if (isset($_POST["instalacion"])){
  return getDeportes($conn, $_POST["instalacion"]);
};
function getInstalaciones($conn, $deporteSeleccionado){
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
function getDeportes( $conn, $instalacionSeleccionada ){
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
?>
