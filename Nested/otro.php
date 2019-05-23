<?php

include('../General/connection.php');

// {$otra= "SELECT max(id_Acudientes) from acudiente as Ultimo";
// $otra2= "SELECT * FROM acudiente where id_Acudientes='1'";}
$max ="SELECT * FROM acudiente";
$result= mysqli_query($connection, $max );
$json= array();

while($row=mysqli_fetch_array($result)){
    echo ("<option taskId=".$row['id_Acudientes'].">
        ".$row['Nombre']."</option>");


    $json[]=array(
        'Nombre'=> $row['Nombre'],
        'id_Acudientes'=> $row['id_Acudientes']
    );
}
//echo("<h1 >")

$jsonstring= json_encode($json);

// if(isset($_POST['Nombre'])){
//     $Nombre= $_POST['Nombre'];
//     $Apellido= $_POST['Apellido'];
//     $Documento= $_POST['Documento'];
//     $FechaNacimiento= $_POST['FechaNacimiento'];
//     $Telefono= $_POST['Telefono'];
    
//     $query= "INSERT into usuario (id_Acudientes,Nombre,Apellido,Documento,FechaNacimiento,Telefono) VALUES('$max','$Nombre','$Apellido','$Documento','$FechaNacimiento','$Telefono')";
   
//    $result= mysqli_query($connection, $query,$max);
//    if($result){
//        die('consulta a fallado');
//    }
//    echo 'tarea agregada satisfactoriamente';
//    }
   





?>