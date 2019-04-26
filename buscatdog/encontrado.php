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
    <title>Encontrado - Buscatdog</title>
    <meta name="description" content="THOMSOON - Single page with minimalist two column description and one photo. Download free now with file Photoshop! ">
    <meta name="keywords" content="thomsoon, simplicity, theme, html5, single page, boxed portfolio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="thomsoon.com">
    <link rel="icon" type="image/png" href="img/icon.png" />

    <!--Style-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-responsive.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <style>
        #map {
            max-width: 600px;
            height: 600px;
            min-width: 300px;
            border: 1px solid black;
        }
    </style>
    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->



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


        <div class="text-intro">

            <h1>Encontrado</h1>


            <ul class="portfolio-grid">
                <li class="grid-item" data-jkit="[show:delay=3000;speed=500;animation=fade]">
                    <img src="img/dogs/dog06.jpg">
                </li>
            </ul>

            <h1>Información mascota</h1>
            <div class="two-column">
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr class="bg-success">
                            <!-- "bg-danger verde para encontrado -->
                            <td>Estado</td>
                            <td>Encontrado</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>Spike</td>
                        </tr>
                        <tr>
                            <td>Especie</td>
                            <td>Perro</td>
                        </tr>
                        <tr>
                            <td>Raza</td>
                            <td>Labrador</td>
                        </tr>
                        <tr>
                            <td>Tamaño</td>
                            <td>Grande</td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td>Negro</td>
                        </tr>
                        <tr>
                            <td>Sexo</td>
                            <td>Macho</td>
                        </tr>
                        <tr>
                            <td>Fecha de pérdida</td>
                            <td>31/12/2018</td>
                        </tr>
                        <tr>
                            <td>Descripción adicional</td>
                            <td>Muy juguetón, llevaba puesto un collar rojo, posee una herida en la pata izquierda trasera.</td>
                        </tr>
                    </tbody>
                </table>
                <h1>Información Publicación:</h1>
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr>
                            <td>Fecha Publicación</td>
                            <td>01/01/2019</td>
                        </tr>
                        <tr>
                            <td>Ubicación de pérdida</td>
                            <td>Los Vilos 58966, La Reina, Santiago</td>
                        </tr>
                        <tr>
                            <td>Último avistamiento</td>
                            <td>08/01/2019</td>
                        </tr>
                        <tr>
                            <td>Última ubicación</td>
                            <td>El Volcán 144, La Reina, Santiago</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        </div>

    </div>



    <!--Home Sidebar-->

    <div id="ajax-sidebar"></div>


    <!--Footer-->

    <footer>

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