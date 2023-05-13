<?php

require_once( "../model/bdConnection.php" );

$deporteSeleccionado = $_POST["deporte"];
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
return $selectInstalaciones;
?>
