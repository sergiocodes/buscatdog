<?php
include_once("../Model/BD.php");
class ingresa extends BD {

    public function ingresar($nombre, $paterno, $materno, $email){
    	return $this->PgModelo("INSERT INTO persona (per_nombre,per_paterno, per_materno, per_email)
    							VALUES ('".$nombre."','".$paterno."','".$materno."','".$email."');");
    }

    public function registrar($nombre,$paterno,$materno,$email,$pass,$direccion){

    	$mail=$this->PgModelo("SELECT * FROM usuario WHERE per_email='".$email."';");    	
    	if(empty($mail)){
    		return $this->PgModelo("INSERT INTO usuario (per_nombre,per_paterno, per_materno,per_email, usu_dir, usu_pass) 
    						VALUES ('".$nombre."','".$paterno."','".$materno."','".$email."','".$direccion."','".$pass."');");
    	}else{
    		echo 'El correo ya existe';
    	}
    }
}


?>