<?php
class Reserva {
    private $id;
    private $pista;
    private $usuario;
    private $hora;
    private $fecha;
    function __construct($pista,$usuario,$hora,$fecha)
    {
        $this->pista = $pista;
        $this->usuario = $usuario;
        $this->hora = $hora;
        $this->fecha = $fecha;             
    }
    function reservar()
    {
        require_once( "../model/bdConnection.php" );
        $sql = "INSERT INTO tbl_reservas (
                    fk_pista,
                    fk_usuario,
                    hora,
                    fecha
                ) VALUES (
                    $this->pista,
                    $this->usuario,
                    $this->hora,
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
        .$this->usuario."<br/> Hora inicio ➜ ".$this->hora."<br/> Hora fin ➜ ".($this->hora+1)."<br/> Fecha ➜ ".$this->fecha
        ."<br/><br/> El precio de la reserva es ➜ ".$this->importeReserva()."€
        <br/><br/>
        <a type='button' href='../index.php'>Volver</a>";

    }
}
?>
