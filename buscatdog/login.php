<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Login - Buscatdog</title>
    <meta name="description" content="Contact page with contact form and simplicty information with e-mail and address. Contact form with check input and textarea. ">
    <meta name="keywords" content="thomsoon, simplicity, theme, html5, contact, form">
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
                    // mandar al index.php
                    echo '<li><a class="ajax-link" href="index.php">Inicio</a></li>';
                    echo '<li><a class="ajax-link" href="panel.php">Panel</a></li>';
                    echo '<li><a class="ajax-link" href="logout.php">Salir</a></li>';
                }else{
                    echo '<li><a class="ajax-link" href="index.php">Inicio</a></li>';
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

            <h1>Iniciar sesión</h1>

            <form action="Controller/c_login.php" method="post">
                <div class="form-group">
                    <label for="correoelectronico">Correo electrónico</label>
                    <input type="text" class="form-control" name="correo" id="usr-email" placeholder="Ej.: usuario@gmail.com">
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="usr-pass">
                </div>
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </form>

        </div>

        <br/><br/><br/><br/><br/><br/><br/><br/>
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