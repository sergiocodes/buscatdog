<?php
include_once("../Model/BD.php");
class m_abandonada extends BD {

    public function registrargato($tipo,$color,$tamano,$sexo,$raza){
        if($color==""){
            if($raza==""){
                $this->PgModelo("INSERT INTO gato (mas_tamano,mas_especie,mas_sexo) VALUES ('".$tamano."','".$tipo."','".$sexo."');");
                $tipoid=$this->PgModelo("SELECT cat_id ,mas_id FROM gato ORDER BY cat_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE gato SET mas_tipoid=".$tipoid[0]['cat_id']." WHERE mas_id=".$tipoid[0]['mas_id'].";");
            }else{
                $this->PgModelo("INSERT INTO gato (mas_tamano,mas_especie ,mas_sexo, cat_raza) VALUES ('".$tamano."','".$tipo."','".$sexo."','".$raza."');");
                $tipoid=$this->PgModelo("SELECT cat_id ,mas_id FROM gato ORDER BY cat_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE gato SET mas_tipoid=".$tipoid[0]['cat_id']." WHERE mas_id=".$tipoid[0]['mas_id'].";");
            }
        }else{
            if($raza==""){
                $this->PgModelo("INSERT INTO gato (mas_color,mas_especie, mas_tamano,mas_sexo) 
                VALUES ('".$color."','".$tipo."','".$tamano."','".$sexo."');");
                $tipoid=$this->PgModelo("SELECT cat_id ,mas_id FROM gato ORDER BY cat_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE gato SET mas_tipoid=".$tipoid[0]['cat_id']." WHERE mas_id=".$tipoid[0]['mas_id'].";");
            }else{
                $this->PgModelo("INSERT INTO gato (mas_color,mas_especie, mas_tamano,mas_sexo, cat_raza) 
                VALUES ('".$color."','".$tipo."','".$tamano."','".$sexo."','".$raza."');");
                $tipoid=$this->PgModelo("SELECT cat_id ,mas_id FROM gato ORDER BY cat_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE gato SET mas_tipoid=".$tipoid[0]['cat_id']." WHERE mas_id=".$tipoid[0]['mas_id'].";");
            }
        }          
    }
    public function registrarperro($tipo,$color,$tamano,$sexo,$raza){
        if($color==""){
            if($raza==""){
                $this->PgModelo("INSERT INTO perro (mas_tamano,mas_especie,mas_sexo) VALUES ('".$tamano."','".$tipo."','".$sexo."');");
                $tipoid=$this->PgModelo("SELECT dog_id ,mas_id FROM perro ORDER BY dog_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE perro SET mas_tipoid='".$tipoid[0]['dog_id']."' WHERE mas_id=".$tipoid[0]['mas_id'].";");
            }else{
                $this->PgModelo("INSERT INTO perro (mas_tamano,mas_especie ,mas_sexo, dog_raza) VALUES ('".$tamano."','".$tipo."','".$sexo."','".$raza."');");
                $tipoid=$this->PgModelo("SELECT dog_id ,mas_id FROM perro ORDER BY dog_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE perro SET mas_tipoid='".$tipoid[0]['dog_id']."' WHERE mas_id=".$tipoid[0]['mas_id'].";");
            }
        }else{
            if($raza==""){
                $this->PgModelo("INSERT INTO perro (mas_color,mas_especie, mas_tamano,mas_sexo) 
                VALUES ('".$color."','".$tipo."','".$tamano."','".$sexo."');");
                $tipoid=$this->PgModelo("SELECT dog_id ,mas_id FROM perro ORDER BY dog_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE perro SET mas_tipoid='".$tipoid[0]['dog_id']."' WHERE mas_id=".$tipoid[0]['mas_id'].";");
            }else{
                $this->PgModelo("INSERT INTO perro (mas_color,mas_especie, mas_tamano,mas_sexo, dog_raza) 
                VALUES ('".$color."','".$tipo."','".$tamano."','".$sexo."','".$raza."');");
                $tipoid=$this->PgModelo("SELECT dog_id ,mas_id FROM perro ORDER BY dog_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE perro SET mas_tipoid='".$tipoid[0]['dog_id']."' WHERE mas_id=".$tipoid[0]['mas_id'].";");
            }
        }
    }
    public function ingpub($tipo,$color,$tamano,$sexo,$raza,$direccion,$descripcion,$img,$fechaE){
        
        $hoy=getdate();
        $d=$hoy['mday'];
        $m=$hoy['mon'];
        $y=$hoy['year'];
        if($tipo=="gato"){
            $animal='cat';
        }else if($tipo=="perro"){
            $animal='dog';
        }
        if($color==""){
            if($raza==""){
                $masid=$this->PgModelo("SELECT mas_id FROM ".$tipo." WHERE mas_tamano='".$tamano."' and mas_sexo='".$sexo."';");
            }else{
                $masid=$this->PgModelo("SELECT mas_id FROM ".$tipo." WHERE mas_tamano='".$tamano."' and mas_sexo='".$sexo."' and ".$animal."_raza='".$raza."' ;");
            }
        }else{
            if($raza==""){
                $masid=$this->PgModelo("SELECT mas_id FROM ".$tipo." WHERE mas_color='".$color."' and mas_tamano='".$tamano."' and mas_sexo='".$sexo."';");
            }else{
                $masid=$this->PgModelo("SELECT mas_id FROM ".$tipo." WHERE mas_color='".$color."' and mas_tamano='".$tamano."' and mas_sexo='".$sexo."' and ".$animal."_raza='".$raza."' ;");
            }
        }
        $mascid=$masid[0]["mas_id"];
        if(isset($_SESSION["correo"])){
            $usuario=$_SESSION['idusuario'];
        }else{
            $usuario=14;
        }
        $this->PgModelo("INSERT INTO abandonada (pub_estado, pub_imagen, pub_descripcion, pub_fecha, pub_mascota, pub_idusu,pabd_fecha_encon,pabd_direccion)
            VALUES('Abandonado','".$img."','".$descripcion."','".$y."-".$m."-".$d."',".$mascid.",".$usuario.",'".$fechaE."','".$direccion."');");
        $tipoid= $this->PgModelo("SELECT pabd_id FROM abandonada ORDER BY pabd_id DESC LIMIT 1 ;");
        return $this->PgModelo("UPDATE abandonada SET pub_tipo=".$tipoid[0]['pabd_id']." WHERE pub_mascota=".$mascid." AND pub_idusu=".$usuario." AND pub_descripcion='".$descripcion."';");
    }
}
?>