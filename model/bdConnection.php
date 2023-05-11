<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'alquiler_instalaciones';
$conn = new mysqli($host, $username, $password, $database);
// if ($conn->connect_error) {
//     die("Error de conexión: " . $conn->connect_error);
// }

// class Conexion{
//     private $bd_connect; //objeto para almacenar la conexión
//     private $host = 'localhost'; // Nombre del host del servidor MySQL
//     private $user = 'root'; // Nombre de usuario de MySQL
//     private $password = ''; // Contraseña de MySQL
//     private $database = 'alquiler_instalaciones'; // Nombre de la base de datos

//     // Crear una conexión a la base de datos
//     function __construct(){
//         $this->bd_connect=new mysqli(
//             $this->host, 
//             $this->user, 
//             $this->password, 
//             $this->database
//         ); 
//         // if($this->bd_connect->connect_errno)
//         //     print_r("Error de conexión a la BD</br>");
//         // else
//         //     print_r("Conexión realizada a la BD</br> </br>");
//     }
//     // Función que lanza una consulta a la bd
//     function realizar_consulta($c){
//         $r=$this->bd_connect->query($c);
//         $mensaje="";
//         while($fila=$r->fetch_array()){
//             $mensaje.=$fila[0].";";
//         }
//         return($mensaje);
//     }
// }

?>
