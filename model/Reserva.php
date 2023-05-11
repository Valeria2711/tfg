<?php
class Reserva {
    private $id;
    private $pista;
    private $usuario;
    private $hora_inicio;
    private $hora_fin;
    private $fecha;
    function __construct($pista,$usuario,$hora_inicio,$hora_fin,$fecha)
    {
        $this->pista = $pista;
        $this->usuario = $usuario;
        $this->hora_inicio = $hora_inicio;
        $this->hora_fin = $hora_fin;
        $this->fecha = $fecha;             
    }
    function reservar()
    {
        require_once( "../model/bdConnection.php" );
        $sql = "INSERT INTO tbl_reservas (
                    fk_pista,
                    fk_usuario,
                    hora_inicio,
                    hora_fin,
                    fecha
                ) VALUES (
                    $this->pista,
                    $this->usuario,
                    $this->hora_inicio,
                    $this->hora_fin,
                    $this->fecha
                )";
        $result = $conn->query($sql);
        echo $result;
    }
    function importeReserva(){
        require_once( "Conexion.php" );
        $conn = new Conexion();
        $sql = "SELECT precio FROM tbl_precios WHERE id_precio = (SELECT fk_precio FROM tbl_instalaciones WHERE id_instalacion = $this->pista);";
        $result = $conn->realizar_consulta($sql);
        return $result;
    }
    function __toString()
    {
        return "<br/> Nº Pista ➜ ".$this->pista."<br/> ID Usuario ➜ "
        .$this->usuario."<br/> Hora inicio ➜ ".$this->hora_inicio."<br/> Hora fin ➜ ".$this->hora_fin."<br/> Fecha ➜ ".$this->fecha
        ."<br/><br/> El precio de la reserva es ➜ ".$this->importeReserva()."€
        <br/><br/>
        <a type='button' href='../index.php'>Volver</a>";

    }
}
?>
