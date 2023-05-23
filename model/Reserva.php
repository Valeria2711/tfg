<?php
class Reserva {
    private $id;
    private $instalacion;
    private $usuario;
    private $hora;
    private $fecha;
    function __construct($instalacion,$usuario,$hora,$fecha)
    {
        $this->instalacion = $instalacion;
        $this->usuario = $usuario;
        $this->hora = $hora;
        $this->fecha = $fecha;             
    }
    function reservar()
    {
        require_once( "../model/bdConnection.php" );
        $sql = "INSERT INTO 
                    `tbl_reservas`(`fk_instalacion`, `fk_usuario`, `hora_inicio`, `fecha`) 
                VALUES (
                    '$this->instalacion',
                    '$this->usuario',
                    '$this->hora',
                    '$this->fecha'
                )";
        $result = $conn->query($sql);
        return $result;
    }
    function importeReserva(){
        require_once( "Conexion.php" );
        $conn = new Conexion();
        $sql = "SELECT precio FROM tbl_precios WHERE id_precio = (SELECT fk_precio FROM tbl_instalaciones WHERE id_instalacion = $this->instalacion)";
        $result = $conn->realizar_consulta($sql);
        return $result;
    }
    function __toString()
    {
        return "<br/> Nº instalacion ➜ ".$this->instalacion."<br/> ID Usuario ➜ "
        .$this->usuario."<br/> Hora inicio ➜ ".$this->hora."<br/> Fecha ➜ ".$this->fecha
        ."<br/><h1> El precio de la reserva es ➜ ".$this->importeReserva()."00€</h1>
        <br/><br/>
        <a type='button' href='reservations.php'>Volver</a>";

    }
}
?>
