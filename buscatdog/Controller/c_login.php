<?php
    include_once("../Model/m_login.php");
    // Creamos Objetos
    if(isset($_POST["correo"],$_POST["password"])){
      $usuario = new m_login();
      $correo_login = $_POST["correo"];
      $password = $_POST["password"];
      $resp = $usuario->comprobar($correo_login,$password);

      if ($resp[0]['per_email'] == ''){
        die();
      }else{
        // Registramos en la SESSION variables!!
        session_start();
        $_SESSION['correo']=$correo_login;
        $_SESSION['usuario']=$resp[0]['per_nombre'];
        $_SESSION['idusuario']=$resp[0]['per_id'];
        echo '<script> window.location="../index.php"; </script>';
      }
    }

?>