<?php 


// $Correo = $_POST['email'];
// $Contraseña = $_POST['pass'];

//  $Correo = stripcslashes($Correo);
//  $Contraseña = stripcslashes($Contraseña);

//  $Correo =mysql_real_escape_string($Correo);
//  $Contraseña =mysql_real_escape_string($Contraseña);

//  mysql_connect("localhost","root","");
//  mysql_select_db("happy");
//  $consulta = mysql_query("SELECT * FROM usuario WHERE Contrasena = '$Contraseña' and Correo = '$Correo'")
//             or die("error error" . mysql_error());
//             $row = mysql_fetch_array($consulta);

// if ($row['Correo'] == $Correo && $row['Contrasena'] == $Contraseña ) {
//    echo "Login success!!!!!! Welcome". $row ['Correo'];
//    header("Location:PaginaOficial.php");
// } else {
//    echo "Login invalido";
//    // header("Location:login.php");
// }



// if(empty($Correo)){
//    echo "Escribe algo";
// }else{
//    echo "Muy bien";
// }








// $consulta = "SELECT * FROM usuario WHERE Contrasena == '$Contraseña' and Correo == '$Correo'";
// $resultado = mysqli_query($connection,$consulta);
// echo $resultado;
 
//  if($resultado){
//     header('Location:paginaOficial.php');
//  }else{
//     header('Location:login.php?msg="oujihuygyt"');
//  }
 

if(isset($_POST['enviar'])){
           $Correo = $_POST['email'];
           $Contrasena = $_POST['pass'];
   
           $Correo = stripcslashes($Correo);
           $Contrasena = stripcslashes($Contrasena);
   
           $Correo =mysql_real_escape_string($Correo);
           $Contrasena =mysql_real_escape_string($Contrasena);
   
           mysql_connect("localhost","root","");
           mysql_select_db("happy");
           $consulta = mysql_query("SELECT * FROM usuario WHERE Contrasena = '$Contrasena' and Correo = '$Correo'")
                       or die("error error" . mysql_error());
                       $row = mysql_fetch_array($consulta);
   
           if ($row['Correo'] == $Correo && $row['Contrasena'] == $Contrasena ) {
           echo "Login success!!!!!! Welcome". $row ['Correo'];
           header("Location:PaginaOficial.php");
           } else {
           // header("Location:login.php");
           //echo "<span class='text-danger'> Datos incorrectos</span>";
           }
   }
   

?>