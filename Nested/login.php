
<?php
//  include("header.php");
//  include("register.php");
//  include("registerUser.php");
?>
  
       
  
      


<div class="modal fade mt-5" id="Usuario" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
           
                <h1 class=" text-success  mt-2  text-center icon-user-o" style="font-size: 2.4rem ; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Registro Usuario  </h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                  
            <div class="modal-body">
                <div class="container-fluid">
                    <section class="bannerTwo mt-5" style="height: 50vh; margin-top: 10% !important;">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 mt-5 registerFont">
                            <h1 class=" text-success mb-5 mt-2  text-center icon-user-o" style="font-size: 2.4rem ; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">Iniciar</h1>
                             <form action="valLogin.php" id="login" method="POST">
                                <input type="email" id="email" name="email" class="form-control bgprivate text-dark w-70 pb-3 pl-2 mb-5" placeholder="Correo electronico*" style="border: 1px solid white">
                                <input type="password" id="pass" name="pass" class="form-control bgprivate text-dark w-70 pb-3 pl-2 mb-5" placeholder="Contraseña*" style="border: 1px solid white">
                                <div class="row justify-content-center">
                                <input type="submit" class="btn btn-primary logueo  mb-5 " value="Iniciar" >
                                 <p class="mb-4 " data-aos="fade-up" data-aos-duration="1000"  data-aos-delay="500"><a href="login.php" class="btn btn-success word mt-2" data-toggle="modal" data-target="#Usuario" >Iniciar</a></p>
                                </div>
                             </form>
                        </div>   
                    </div> 
                </section>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php
include("footer.php");
?>



