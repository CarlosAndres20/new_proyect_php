
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="icon" href="img/logo3.png">
    <link rel="stylesheet" href="css/styleplay.css">
    <title>Niños happy</title>
</head>
<body data-spy="scroll" data-target=".navbaPr" data-offset="50" >
        <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                    <div class="container">
                        <a class="navbar-brand text-white" href="#">Happy`s Child</a>
                        <button class="navbar-toggler collapsed mr-5" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon " style="font-size: 1rem"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto mt-2  bg-success">
                            <li class="nav-item mt-2">
                            <a class="nav-link text-white " href="#Home">Inicio<span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item mt-2">
                            <a class="nav-link text-white " href="#Explore">Explora</a>
                            </li>
                              <li class="nav-item mt-2">
                            <a class="nav-link text-white " href="estadisticas.html">Estadisticas</a>
                            </li>
                            <li class="nav-item mt-2">
                                   <a class="nav-link text-white " href="#Blog">Blog</a>
                                   </li>
                            <li class="nav-item mt-2">
                            <a class="nav-link text-white " href="#Contactenos">Contactenos</a>
                            </li>
                            <li class="nav-item mt-2">
                               <a class="nav-link icon-user-o text-white " href="#">Perfil</a>
                               </li>
                          </ul>
                       </form>
                      </div>
                     </div>
                    </nav>
        </header>
           
    <section  id="lineal">
        <div class=" playes container-fluid">
             <div class="row">
                    <div class="col-sm-12 col-md-12 mt-5 ">
                            <h2 class="text-white mb-5 mt-2">Bola magica</h2>
                            <h4 class="text-white" style="font-size: 1rem">Par momenzar digita 1 y 2 para parar</h4>
                            <input type="text" id="verify" class="form-control mb-2 ml-2" style="width: 25% !important">
                            <button onclick="start();" type="submit" class="btn btn-success mb-2 ml-2">Iniciar</button>
                            <div class="linealSub ">
                                <canvas id="myCanvas" width="700%" height="500vh" ></canvas>
                            </div>
                            
                         </div>
                      </div>
                    </div>





                    
            </section>  
               
    
    
   



    <script>
    

    function start(){
        var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var ballRadius = 10;
    var x = canvas.width/2;
    var y = canvas.height-30;
    var dx = 2;
    var dy = -2;
    var paddleHeight = 10;
    var paddleWidth = 75;
    var paddleX = (canvas.width-paddleWidth)/2;
    var rightPressed = false;
    var leftPressed = false;
    var brickRowCount = 7;
    var brickColumnCount = 4;
    var brickWidth = 75;
    var brickHeight = 20;
    var brickPadding = 10;
    var brickOffsetTop = 30;
    var brickOffsetLeft = 30;
    var score = 0;
    var lives = 3;
    var verify=document.getElementById("verify").value;
        if(verify==1){
    var bricks = [];
    for(c=0; c<brickColumnCount; c++) {
        bricks[c] = [];
        for(r=0; r<brickRowCount; r++) {
            bricks[c][r] = { x: 0, y: 0, status: 1 };
        }
    }

    
    document.addEventListener("keydown", keyDownHandler, false);
    document.addEventListener("keyup", keyUpHandler, false);
    document.addEventListener("mousemove", mouseMoveHandler, false);

    function keyDownHandler(e) {
        if(e.keyCode == 39) {
            rightPressed = true;
        }
        else if(e.keyCode == 37) {
            leftPressed = true;
        }
    }
    function keyUpHandler(e) {
        if(e.keyCode == 39) {
            rightPressed = false;
        }
        else if(e.keyCode == 37) {
            leftPressed = false;
        }
    }
    function mouseMoveHandler(e) {
        var relativeX = e.clientX - canvas.offsetLeft;
        if(relativeX > 0 && relativeX < canvas.width) {
            paddleX = relativeX - paddleWidth/2;
        }
    }
    function collisionDetection() {
        for(c=0; c<brickColumnCount; c++) {
            for(r=0; r<brickRowCount; r++) {
                var b = bricks[c][r];
                if(b.status == 1) {
                    if(x > b.x && x < b.x+brickWidth && y > b.y && y < b.y+brickHeight) {
                        dy = -dy;
                        b.status = 0;
                        score++;
                        if(score == brickRowCount*brickColumnCount) {
                            alert("YOU WIN, CONGRATS!");
                           
                            document.location.reload();
                        }
                    }
                }
            }
        }
    }

    function drawBall() {
        ctx.beginPath();
        ctx.arc(x, y, ballRadius, 0, Math.PI*2);
        ctx.fillStyle = "crimson";
        ctx.fill();
        ctx.closePath();
    }
    function drawPaddle() {
        ctx.beginPath();
        ctx.rect(paddleX, canvas.height-paddleHeight, paddleWidth, paddleHeight);
        ctx.fillStyle = "black";
        ctx.fill();
        ctx.closePath();
    }
    function drawBricks() {
        for(c=0; c<brickColumnCount; c++) {
            for(r=0; r<brickRowCount; r++) {
                if(bricks[c][r].status == 1) {
                    var brickX = (r*(brickWidth+brickPadding))+brickOffsetLeft;
                    var brickY = (c*(brickHeight+brickPadding))+brickOffsetTop;
                    bricks[c][r].x = brickX;
                    bricks[c][r].y = brickY;
                    ctx.beginPath();
                    ctx.rect(brickX, brickY, brickWidth, brickHeight);
                    ctx.fillStyle = "green";
                    ctx.fill();
                    ctx.closePath();
                }
            }
        }
    }
    function drawScore() {
        ctx.font = "16px Arial";
        ctx.fillStyle = "#0095DD";
        ctx.fillText("Score: "+score, 8, 20);
    }
    function drawLives() {
        ctx.font = "16px Arial";
        ctx.fillStyle = "#0095DD";
        ctx.fillText("Lives: "+lives, canvas.width-65, 20);
    }

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawBricks();
        drawBall();
        drawPaddle();
        drawScore();
        drawLives();
        collisionDetection();
        
        if(x + dx > canvas.width-ballRadius || x + dx < ballRadius) {
            dx = -dx;
        }
        if(y + dy < ballRadius) {
            dy = -dy;
        }
        else if(y + dy > canvas.height-ballRadius) {
            if(x > paddleX && x < paddleX + paddleWidth) {
                dy = -dy;
            }
            else {
                lives--;
                if(!lives) {
                    alert("GAME OVER");
                    document.location.reload();
                }
                else {
                    x = canvas.width/2;
                    y = canvas.height-30;
                    dx = 3;
                    dy = -3;
                    paddleX = (canvas.width-paddleWidth)/2;
                }
            }
        }
        
        if(rightPressed && paddleX < canvas.width-paddleWidth) {
            paddleX += 7;
        }
        else if(leftPressed && paddleX > 0) {
            paddleX -= 7;
        }
        
        x += dx;
        y += dy;
        requestAnimationFrame(draw);
    }

    draw();
        }
        else {
          alert("salir");
          document.location.reload();
          return false;
     }
    }
  

    </script>
     
           
                <div class="row ">
                    <div class="col-sm-12">
                            <footer >
                        <ul class="sci">
                            <li><a href="#"><i class="icon-twitter"></i> </a></li>
                            <li><a href="#"><i class="icon-gplus"></i> </a></li>
                            <li><a href="#"><i class="icon-github-circled"></i></a></li>
                            <li><a href="#"><img src="img/sena2logo.jpg" alt=""  width="35px" style="border-radius: 50%" ></a></li>
                            <li><a href="#"><img src="img/vivelab.png" alt=""  width="35px" style="border-radius: 50%" ></a></li>
                        </ul>
                        <p class="cpryt">
                           &#169;  Happy`s child &#64;HC
                           <br>
                          Autores: Carlos y Sebastian 
                        </p>
                        </footer>

                    </div>
                </div>
         



        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/aos.js"></script>
        


      
       
</body>
</html>
