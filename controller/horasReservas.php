<?php

require_once( "../model/bdConnection.php" );
// Obtener los parámetros de instalación y deporte
$instalacion = $_POST['instalacion'];
$fecha = $_POST['fecha'];

$sql = "SELECT hora_inicio FROM tbl_reservas WHERE fk_instalacion = '$instalacion' AND fecha = '$fecha'";
$result = $conn->query($sql);
$selectHoras = "";
if ($result->num_rows > 0) {
    $horaInicio = array();
    while ($row = $result->fetch_assoc()) {
        $horaInicio[] = $row['hora_inicio'];
    }

    for ($i = 8; $i <= 22; $i++) {
        if (!in_array($i, $horaInicio)) {
            $selectHoras .= "<option value='" . $i . ":00'>" . $i . ":00";
        }
    }
    if ($selectHoras === "") {
        echo "Todas las horas están reservadas.";
    } else {
        echo $selectHoras;
    }
} else {
    for ($i = 8; $i <= 22; $i++) {
        $selectHoras .= "<option value='" . $i . ":00'>" . $i . ":00";
    }
    echo "No se encontraron reservas.";
    echo $selectHoras;
}

$conn->close(); 
?>