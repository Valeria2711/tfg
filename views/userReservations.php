<?php

$idUsuario = $_COOKIE['user'];

function misReservas($idUsuario)
{
    require_once("../model/bdConnection.php");
    $sql = "SELECT i.denominacion, r.hora_inicio, r.fecha
    FROM tbl_reservas r
    JOIN tbl_instalaciones i ON r.fk_instalacion = i.id_instalacion
    WHERE r.fk_usuario = $idUsuario;";
   
    $result = $conn->query($sql);
    $reservas = [];
    while ($row = $result->fetch_assoc()) {
        $reservas[] = $row;
    }

    $conn->close();

    return $reservas;
}
$reservasUsuario = misReservas($idUsuario);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mis Reservas</title>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include "./nav-bar.php"; ?>

    <div class="container">
        <h2>Mis Reservas</h2>
        <?php if (count($reservasUsuario) > 0) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <!-- <th>ID Reserva</th> -->
                        <th>Fecha</th>
                        <th>Hora Inicio</th>
                        <th>Instalación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservasUsuario as $reserva) : ?>
                        <tr>
                            <!-- <td><?= $reserva['id_reserva'] ?></td> -->
                            <td><?php echo $reserva['fecha']; ?></td>
                            <td><?php echo $reserva['hora_inicio']; ?></td>
                            <td><?php echo $reserva['denominacion']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No se encontraron reservas.</p>
        <?php endif; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
