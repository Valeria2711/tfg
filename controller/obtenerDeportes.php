<?php

require_once( "../model/bdConnection.php" );

$instalacionSeleccionada = $_POST['instalacion'];
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
return $selectDeportes;
?>
