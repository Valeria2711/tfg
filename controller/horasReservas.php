<?php

require_once( "../model/bdConnection.php" );
// Obtener los parámetros de instalación y deporte
$instalacion = $_POST['instalacion'];
$fecha = $_POST['fecha'];

$sql = "SELECT hora_inicio FROM tbl_reservas WHERE fk_instalacion = '$instalacion' AND fecha = '$fecha'";
$result = $conn->query($sql);
$selectHoras = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $horaInicio = $row;
        for ($i = 8; $i <= 22; $i++) {
            // TODO: si encuentra la $horaInicio en $i pasar a siguiente $i
            // OPciones 
             // - marcar esa opcion disabled, aunque se muestre
             // - No aparezca esa opcion
             // - aparezca la opcion en rojo y que saque alert si el usuario la selecciona
            $selectHoras .= "<option value='" . $i . ":00'>" . $hora . ":00</option>";
        }
    }
} else {
    echo "No se encontraron reservas.";
}
echo json_encode($reservas); 
var_dump(json_decode($reservas));die();
?>