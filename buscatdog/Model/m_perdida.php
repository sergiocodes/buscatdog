<?php
include_once("../Model/BD.php");
class m_perdida extends BD {

    public function reggato($nombre,$color,$tamano,$chip,$sexo,$raza,$tipo){
        $this->PgModelo("INSERT INTO gato (mas_nombre, mas_color, mas_tamano, mas_numchip, mas_sexo, mas_especie, cat_raza) 
           VALUES ('".$nombre."','".$color."','".$tamano."','".$chip."','".$sexo."','".$tipo."','".$raza."');");
        $tipoid=$this->PgModelo("SELECT cat_id,mas_id FROM gato ORDER BY cat_id DESC LIMIT 1;");
    	return $this->PgModelo("UPDATE gato SET mas_tipoid=".$tipoid[0]['cat_id']." WHERE mas_id=".$tipoid[0]['mas_id'].";");
    }
    public function regperro($nombre,$color,$tamano,$chip,$sexo,$raza,$tipo){
        $this->PgModelo("INSERT INTO perro (mas_nombre, mas_color, mas_tamano, mas_numchip, mas_sexo, mas_especie, dog_raza) 
           VALUES ('".$nombre."','".$color."','".$tamano."','".$chip."','".$sexo."','".$tipo."','".$raza."');");
        $tipoid=$this->PgModelo("SELECT dog_id, mas_id FROM perro ORDER BY dog_id DESC LIMIT 1;");
        return $this->PgModelo("UPDATE perro SET mas_tipoid='".$tipoid[0]['dog_id']."' WHERE mas_id=".$tipoid[0]['mas_id'].";");
    }

    public function pertoenc($idmascota){
        return $this->PgModelo("UPDATE perdida SET pub_estado='Encontrado' WHERE pub_mascota=".$idmascota.";");
    }
    public function ingpub($nombre,$color,$tamano,$chip,$tipo,$direccion,$descripcion,$img){

        $hoy=getdate();
        $d=$hoy['mday'];
        $m=$hoy['mon'];
        $y=$hoy['year'];
        if($tipo=="gato"){
            $masid=$this->PgModelo("SELECT mas_id FROM gato WHERE mas_nombre='".$nombre."' and mas_color='".$color."' and mas_tamano='".$tamano."' and mas_numchip='".$chip."';");
        }else if($tipo=="perro"){
            $masid=$this->PgModelo("SELECT mas_id FROM perro WHERE mas_nombre='".$nombre."' and mas_color='".$color."' and mas_tamano='".$tamano."' and mas_numchip='".$chip."';");
        }
        $mascid=$masid[0]["mas_id"];
        $usuario=$_SESSION["idusuario"];
        $this->PgModelo("INSERT INTO perdida (pub_estado, pub_imagen, pub_descripcion, pub_fecha,pub_fecha_act, pub_mascota, pub_idusu,pper_ubicacio_ori,pper_ubicacion_act)
                                VALUES('Perdido','".$img."','".$descripcion."','".$y."-".$m."-".$d."','".$y."-".$m."-".$d."',".$mascid.",".$usuario.",'".$direccion."','".$direccion."');");
        $tipoid=$this->PgModelo("SELECT pper_id FROM perdida ORDER BY pper_id DESC LIMIT 1;");
        return $this->PgModelo("UPDATE perdida SET pub_tipo=".$tipoid[0]['pper_id']." WHERE pub_mascota=".$mascid." AND pub_idusu=".$usuario." AND pub_descripcion='".$descripcion."';");
    }
}


?>