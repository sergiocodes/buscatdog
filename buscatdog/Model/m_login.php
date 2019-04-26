<?php
  include_once("../Model/BD.php");
  class m_login extends BD {
    public function comprobar($email, $password){
        return $this->PgModelo("SELECT * FROM usuario WHERE per_email='".$email."';");
    }

    public function logout($email){
    	session_destroy();
  		echo 'Cerraste sesión';
  		echo '<script> window.location="../login.php"; </script>';
    }
}