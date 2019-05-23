<?php

include('../General/connection.php');




if(isset($_POST['Nombre'])){
 $Nombre= $_POST['Nombre'];
 $Apellido= $_POST['Apellido'];
 $Documento= $_POST['Documento'];
 $FechaNacimiento= $_POST['FechaNacimiento'];
 $Telefono= $_POST['Telefono'];
 $Contraseña= $_POST['Contraseña'];
 $Correo= $_POST['Correo'];


 $consulta = "SELECT max(id_Acudientes) as ultimo FROM acudiente";

if ($resultado = $connection->query($consulta)) {
    if($fila = $resultado->fetch_assoc()){
       $max=$fila["ultimo"];
    }
}

 $query= "INSERT into usuario (id_Acudientes,Nombre,Apellido,Documento,FechaNacimiento,Telefono,Contrasena,Correo) VALUES('$max','$Nombre','$Apellido','$Documento','$FechaNacimiento','$Telefono','$Contraseña','$Correo')";

$result= mysqli_query($connection, $query);
if($result){
    die('consulta a fallado');
}
echo 'tarea agregada satisfactoriamente';
}


?>