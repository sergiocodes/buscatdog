<?php
  session_start();
  if(isset($_SESSION['correo'])){
    $profile = $_SESSION['correo'];
  }
  
?>
    <!doctype html>

    <html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Inicio - Buscatdog</title>
        <meta name="description" content="About us is minimalist and simplicty information in two column and masonry portfolio logo our photography. Check and download free.">
        <meta name="keywords" content="thomsoon, simplicity, theme, html5, about us">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="thomsoon.com">
        <link rel="icon" type="image/png" href="img/icon.png" />


        <!--Style-->

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-responsive.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
      <script type="text/javascript" src=""></script> <!-- Agregar API Key Google-->
    </head>

    <body>

        <!--Preloader-->

        <div class="preloader" id="preloader">
            <div class="item">
                <div class="spinner">
                </div>
            </div>
        </div>

        <div class="opacity-nav">
            
            <div class="menu-index" id="buttons" style="z-index:999999">
                <i class="fa  fa-close"></i>
            </div>

            <ul class="menu-fullscreen">
                <?php  
                    if(isset($_SESSION["correo"])){
                        echo '<li><a class="ajax-link" href="index.php">Inicio</a></li>';
                        echo '<li><a class="ajax-link" href="panel.php">Panel</a></li>';
                        echo '<li><a href="logout.php">Salir</a></li>';
                    }else{
                        echo '<li><a class="ajax-link" href="index.php">Inicio</a></li>';
                        echo '<li><a class="ajax-link" href="login.php">Iniciar sesión</a></li>';
                        echo '<li><a class="ajax-link" href="registrar.php">Registrarse</a></li>';
                    }
                ?>
            </ul>

        </div>


        <!--Header-->
        <header id="fullscreen">
            <a href="index.php">
                <div class="logo" id="full"><img src="img/logo.png"></div>
            </a>
            <div class="menu-index" id="button">
                <i class="fa fa-bars"></i>
            </div>

        </header>

        <div class="clear"></div>

        <!--Content-->

        <div class="content" id="ajax-content">

            <div class="clear"></div>

            <div class="text-intro" id="site-type">

                <h1>Crear publicación</h1>
                <div class="one-column">
                    <h2>Crear publicación de mascota perdida o abandonada.</h2>
                </div>
            </div>

            <!--Menu opciones-->

            <ul class="portfolio-grid">
                <li class="grid-item" data-jkit="[show:delay=500;speed=800;animation=fade]">
                    <img src="img/logo/button_p.png">
                    <a class="ajax-link" href="cpmp.php">
                        <div class="grid-hover" href="cpmp.php">
                        </div>
                    </a>
                </li>
                <li class="grid-item" data-jkit="[show:delay=500;speed=800;animation=fade]">
                    <img src="img/logo/button_a.png">
                    <a class="ajax-link" href="cpma.php">
                        <div class="grid-hover">
                        </div>
                    </a>
                </li>

            </ul>

            <!--Portfolio grid-->

            <div class="clear"></div>

            <div class="text-intro" id="site-type">

                <h1>Publicaciones de: <span id="myText"></span></h1>
                <div class="one-column">
                    <h2>Publicación de mascotas perdidas y abandonadas en: Santiago.</h2>
                </div>
            </div>

            <ul class="portfolio-grid">
              <?php
                require_once("Controller/c_index.php");
                $res=publicaciones();
                foreach ($res as $fila ) {
                  if($fila['pub_estado']=="Perdido"){
                    $est="perdido";
                  }else if($fila['pub_estado']=="Alojado"){
                    $est="alojamiento";
                  }else if($fila['pub_estado']=="Abandonado"){
                    $est="abandonado";
                  }

                  if($fila['pub_estado']=="Encontrado"){

                  }else{?>
                  <li class="grid-item" data-jkit="[show:delay=3000;speed=500;animation=fade]">
                    <img style="width:250px; height:250px;>" src="img/<?php echo $fila['pub_imagen'];?>">
                    <a href="<?php echo $est;?>.php?id=<?php echo $fila['pub_id'];?>&sw=0">
                        <div class="grid-hover">
                            <h1><?php echo $fila['mas_nombre'];?></h1>
                            <p><?php echo $fila['pub_estado'];?></p>
                        </div>
                    </a>
                </li>
                <?php }}?>
            </ul>

        </div>



        <!--Home Sidebar-->

        <div id="ajax-sidebar"></div>


        <!--Footer-->

        <footer id="ajax-footer">

            <div class="footer-margin">
                <div class="copyright">Buscatdog 2019</div>
            </div>


        </footer>


        <!--Scripts-->

        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery-3.2.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/modernizr.custom.42534.js" type="text/javascript"></script>
        <script src="js/jquery.waitforimages.js" type="text/javascript"></script>
        <script src="js/typed.js" type="text/javascript"></script>
        <script src="js/masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="js/imagesloaded.pkgd.min.js" type="text/javascript"></script>
        <script src="js/jquery.jkit.1.2.16.min.js"></script>
        <script src="js/script.js" type="text/javascript"></script>

        <script>
            $('#button, #buttons').on('click', function() {
                $(".opacity-nav").fadeToggle("slow", "linear");
                // Animation complete.
            });
        </script>


    </body>

    </html>