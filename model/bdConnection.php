<?php

class Conexion{
    private $bd_connect; //objeto para almacenar la conexión
    private $host = 'localhost'; // Nombre del host del servidor MySQL
    private $user = 'root'; // Nombre de usuario de MySQL
    private $password = ''; // Contraseña de MySQL (dejar en blanco si no tiene)
    private $database = 'alquiler_instalaciones'; // Nombre de la base de datos

    // Crear una conexión a la base de datos
    function __construct(){
        $this->bd_connect=new mysqli(
            $this->host, 
            $this->user, 
            $this->password, 
            $this->database
        ); 
        if($this->bd_connect->connect_errno)
            echo "Error de conexión </br>";
        else
            echo "Conexión realizada </br> </br>";
    }
    // Función que lanza una consulta a la bd
    function realizar_consulta($c){
        $r=$this->bd_connect->query($c);
        $mensaje="";
        while($fila=$r->fetch_array()){
            $mensaje.=$fila[0].";";
        }
        return($mensaje);
    }
}

?>
