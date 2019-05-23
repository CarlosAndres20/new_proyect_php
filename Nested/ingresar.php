<?php
    include('header.php')
?>

 <div class="row justify-content-center m-5">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 mt-5 registerFont">
            <h1 class=" text-success mb-5 mt-2  text-center icon-user-o" style="font-size: 2.4rem ; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Iniciar</h1>
                            
    <?php 

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
            }else {
            // header("Location:login.php");
            echo "<span class='text-danger'> Datos incorrectos</span>";
            }
            if ($row['Correo'] == "Administrador@gmail.com" && $row['Contrasena'] == $Contrasena ) {
                echo "Login success!!!!!! Welcome". $row ['Correo'];
                header("Location:index.php");
            }
        }
    ?>
        <form action="#" id="login" method="POST">
            <input type="email" id="email" name="email" class="form-control bgprivate text-dark w-70 pb-3 pl-2 mb-5" placeholder="Correo electronico*" style="border: 1px solid white">
            <div class="error" id="error"></div>
            <input type="password" id="pass" name="pass" class="form-control bgprivate text-dark w-70 pb-3 pl-2 mb-5" placeholder="Contraseña*" style="border: 1px solid white">
            <div class="row justify-content-center">
            <input type="submit" class="btn btn-primary logueo  mb-5 mr-1" value="Iniciar" name="enviar" >
            <button type="button" class="btn btn-primary logueo  mb-5" data-toggle="modal" data-target="#modelId">
                        Registrar
            </button>
        </form>
        <div class="olvido">
            <a href="#" style="display:none;" class="olvido">Olvido contraseña</a>
        </div>
        </div>
    </div>
</div>
<script src="js/mensaje.js"></script>
<?php 
    include('footer.php')
?>
<?php
    include("register.php");
?>
<?php
    include("registerUser.php");
?>