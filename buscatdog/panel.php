<?php
  session_start();
  if(isset($_SESSION['correo'])){
    $profile = $_SESSION;
  }
  
?>
<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Perdido - Buscatdog</title>
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
            <li><a class="ajax-link" href="index.php">Inicio</a></li>
            <li><a class="ajax-link" href="panel.php">Panel</a></li>
            <li><a href="logout.php">Salir</a></li>
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
            <h1>Hola <?php echo $_SESSION["usuario"] ?></h1> <!-- insertar variable con nombre usuario -->
            <h1>Actualizar estado publicación</h1>
            <!-- hacer for de las publicaciones del usuario -->
            <div class="two-column">
                <table class="table table-hover table-dark">
                        <tr>
                            <td>&nbsp;</td>
                            <td>Mascota</td>
                            <td>Publicación</td>
                            <td>Estado</td>
                            <td>Acción</td>
                        </tr>
                        <?php
                            require_once("Controller/c_index.php");
                            $res=publicaciones();
                            foreach ($res as $fila ){
                              if($profile['idusuario']==$fila['pub_idusu']){
                                if($fila['pub_estado']=="Perdido" ||$fila['pub_estado']=="Encontrado"){?>
                                <tr>
                                    <td><form action="Controller/c_panel.php" method="POST" id="form-publi-1"><input name="id" value="<?php echo $fila['pub_id'];?>" hidden/></form></td> <!-- for de las publicaciones usuario -->
                                    <td><?php echo $fila['mas_nombre'];?></td>
                                    <td><?php echo $fila['pub_fecha'];?></td>
                                    <td><?php echo $fila['pub_estado'];?></td>
                                    <td><input form="form-publi-1" type="submit" value="Encontrado" /></td>                            
                                </tr>  
                            <?php } } }?>                   
                </table>
                <h1>Cambiar clave:</h1>
                <table class="table table-hover table-dark">
                    <tr>
                        <td>&nbsp;</td>
                        <td>Clave antigua</td>
                        <td>Clave nueva</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><form action="Controller/c_panel.php" method="POST" id="form-cambio-clave"><input name="id" value="1" hidden/></form></td> <!-- value variable usuario -->
                        <td><input form="form-cambio-clave" type="password" name="claveantigua"/></td>
                        <td><input form="form-cambio-clave" type="password" name="clavenueva"/></td>
                        <td><input form="form-cambio-clave" type="submit" value="Cambiar" /></td>
                    </tr>
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