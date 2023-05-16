<?php

require_once( "../model/bdConnection.php" );
// Obtener los parámetros de instalación y deporte
$instalacion = $_GET['instalacion'];
$deporte = $_GET['deporte'];

$sql = "SELECT hora FROM tbl_reservas WHERE fk_pista = $instalacion OR ";

// Ejecutar la consulta y obtener los resultados
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Iterar sobre los resultados y mostrar los datos
    while ($row = $result->fetch_assoc()) {
        $horaInicio = $row["hora_inicio"];
        $horaFin = $horaInicio + 1;
        
    }
} else {
    echo "No se encontraron reservas.";
}

// Devolver la respuesta como un texto plano
echo json_encode($reservas); // Suponiendo que tienes un array llamado $reservas con los datos de las reservas

?>