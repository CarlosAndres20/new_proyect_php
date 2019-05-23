<?php

include('../General/connection.php');

if(isset($_POST['Nombre'])){
 $Nombre= $_POST['Nombre'];
 $Apellido= $_POST['Apellido'];
 $Telefono= $_POST['Telefono'];
 $FechaNacimiento= $_POST['FechaNacimiento'];
 $query= "INSERT into acudiente (Nombre,Apellido,Telefono,FechaNacimiento) VALUES('$Nombre','$Apellido','$Telefono','$FechaNacimiento')";

$result= mysqli_query($connection, $query);
if($result){
    die('consulta a fallado');
}
echo 'tarea agregada satisfactoriamente';
}

?>