<?php
include_once("../Model/BD.php");
class m_alojo extends BD {

    public function registrar($color,$tamano,$sexo,$raza,$tipo){
        if($tipo=="gato"){
            $animal='cat';
        }else if($tipo=="perro"){
            $animal='dog';
        }
        if($color==""){
            if($raza==""){
                $this->PgModelo("INSERT INTO ".$tipo." (mas_tamano,mas_sexo,mas_especie) VALUES ('".$tamano."','".$sexo."','".$tipo."');");
                $tipoid=$this->PgModelo("SELECT ".$animal."_id ,mas_id FROM ".$tipo." ORDER BY ".$animal."_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE ".$tipo." SET mas_tipoid=".$tipoid[0][$animal.'_id']." WHERE mas_id=".$tipoid[0]['mas_id']."; ");
            }else{
                $this->PgModelo("INSERT INTO ".$tipo." (mas_tamano ,mas_sexo,mas_especie, ".$animal."_raza) VALUES ('".$tamano."','".$sexo."','".$tipo."','".$raza."');");
                $tipoid=$this->PgModelo("SELECT ".$animal."_id ,mas_id FROM ".$tipo." ORDER BY ".$animal."_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE ".$tipo." SET mas_tipoid=".$tipoid[0][$animal.'_id']." WHERE mas_id=".$tipoid[0]['mas_id']."; ");
            }
        }else{
            if($raza==""){
                $this->PgModelo("INSERT INTO ".$tipo." (mas_color, mas_tamano,mas_sexo,mas_especie) VALUES ('".$color."','".$tamano."','".$sexo."','".$tipo."');");
                $tipoid=$this->PgModelo("SELECT ".$animal."_id ,mas_id FROM ".$tipo." ORDER BY ".$animal."_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE ".$tipo." SET mas_tipoid=".$tipoid[0][$animal.'_id']." WHERE mas_id=".$tipoid[0]['mas_id']."; ");
            }else{
                $this->PgModelo("INSERT INTO ".$tipo." (mas_color, mas_tamano,mas_sexo,mas_especie, ".$animal."_raza) VALUES ('".$color."','".$tamano."','".$sexo."','".$tipo."','".$raza."');");
                $tipoid=$this->PgModelo("SELECT ".$animal."_id ,mas_id FROM ".$tipo." ORDER BY ".$animal."_id DESC LIMIT 1;");
                return $this->PgModelo("UPDATE ".$tipo." SET mas_tipoid=".$tipoid[0][$animal.'_id']." WHERE mas_id=".$tipoid[0]['mas_id']."; ");
            }
        }
    }
    public function ingpub($tipo,$color,$tamano,$sexo,$raza,$direccion,$descripcion,$img,$fechaE,$lugar,$fono,$nombrealojo,$duracion){
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
        }
        $this->PgModelo("INSERT INTO alojamiento (pub_estado, pub_imagen, pub_descripcion, pub_fecha, pub_mascota, pub_idusu,pabd_fecha_encon,pabd_direccion,pali_lugaralojo,pali_fono,pali_nombre,pali_duracion)
            VALUES('Alojado','".$img."','".$descripcion."','".$y."-".$m."-".$d."',".$mascid.",".$usuario.",'".$fechaE."','".$direccion."','".$lugar."','".$fono."','".$nombrealojo."','".$duracion."');");
        $tipoid= $this->PgModelo("SELECT pali_id FROM alojamiento ORDER BY pabd_id DESC LIMIT 1 ;");
        return $this->PgModelo("UPDATE alojamiento SET pub_tipo=".$tipoid[0]['pali_id']." WHERE pub_mascota=".$mascid." AND pub_idusu=".$usuario." AND pub_descripcion='".$descripcion."';");
    }
}


?>