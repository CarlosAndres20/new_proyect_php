<?php

include('../General/connection.php');
$consulta = "SELECT max(id_Acudientes) as ultimo FROM acudiente";

if ($resultado = $connection->query($consulta)) {
    if($fila = $resultado->fetch_assoc()){
       echo "Dato maximo :" . $fila["ultimo"];
       $max=$fila["ultimo"];
       echo 'maximo almacenado'.$max;

    }

}
?>