<?php
include_once("BD.php");
class m_pub extends BD {
    public function getinfo($id){
    	$info=$this->PgModelo("SELECT pub_id FROM perdida,gato WHERE pub_id=".$id." AND mas_id=pub_mascota;");
    	if(!empty($info[0]['pub_id'])){
    		return $this->PgModelo("SELECT * FROM perdida,gato WHERE pub_id=".$id."AND mas_id=pub_mascota;");
    	}elseif(empty($info[0]['pub_id'])){
    		$info=$this->PgModelo("SELECT pub_id FROM perdida,perro WHERE pub_id=".$id." AND mas_id=pub_mascota;");
	    	if(!empty($info[0]['pub_id'])){
	    		return $this->PgModelo("SELECT * FROM perdida,perro WHERE pub_id=".$id."AND mas_id=pub_mascota;");
	    	}elseif(empty($info[0]['pub_id'])){
	    		$info=$this->PgModelo("SELECT pub_id FROM abandonada,gato WHERE pub_id=".$id."AND mas_id=pub_mascota;");
		    	if(!empty($info[0]['pub_id'])){
		    		return $this->PgModelo("SELECT * FROM abandonada,gato WHERE pub_id=".$id."AND mas_id=pub_mascota;");
		    	}elseif(empty($info[0]['pub_id'])){
		    		$info=$this->PgModelo("SELECT pub_id FROM abandonada,perro WHERE pub_id=".$id."AND mas_id=pub_mascota;");
			    	if(!empty($info[0]['pub_id'])){
			    		return $this->PgModelo("SELECT * FROM abandonada,perro WHERE pub_id=".$id."AND mas_id=pub_mascota;");
			    	}elseif(empty($info[0]['pub_id'])){
			    		$info=$this->PgModelo("SELECT pub_id FROM alojamiento,gato WHERE pub_id=".$id."AND mas_id=pub_mascota;");
				    	if(!empty($info[0]['pub_id'])){
				    		return $this->PgModelo("SELECT * FROM alojamiento,gato WHERE pub_id=".$id."AND mas_id=pub_mascota;");
				    	}elseif(empty($info[0]['pub_id'])){
				    		$info=$this->PgModelo("SELECT pub_id FROM alojamiento,perro WHERE pub_id=".$id."AND mas_id=pub_mascota;");
					    	if(!empty($info[0]['pub_id'])){
					    		return $this->PgModelo("SELECT * FROM alojamiento,perro WHERE pub_id=".$id."AND mas_id=pub_mascota;");
					    	}
				    	}
			    	} 	
		    	}
	    	}
    	}	
    }
    public function getalojo($id){
    	$info=$this->PgModelo("SELECT pub_id FROM alojamiento,gato WHERE pub_id=".$id."AND mas_id=pub_mascota;");
    	if(!empty($info[0]['pub_id'])){
    		return $this->PgModelo("SELECT * FROM alojamiento,gato WHERE pub_id=".$id."AND mas_id=pub_mascota;");
    	}elseif(empty($info[0]['pub_id'])){
    		$info=$this->PgModelo("SELECT pub_id FROM alojamiento,perro WHERE pub_id=".$id."AND mas_id=pub_mascota;");
	    	if(!empty($info[0]['pub_id'])){
	    		return $this->PgModelo("SELECT * FROM alojamiento,perro WHERE pub_id=".$id."AND mas_id=pub_mascota;");
	    	}
    	}
    }
    public function actualizar($pubid,$new){
    	$hoy=getdate();
        $d=$hoy['mday'];
        $m=$hoy['mon'];
        $y=$hoy['year'];
    	$info=$this->PgModelo("SELECT pub_id FROM perdida,gato WHERE pub_id=".$pubid." AND mas_id=pub_mascota;");
    	if(!empty($info[0]['pub_id'])){
    		return $this->PgModelo("UPDATE perdida SET pper_ubicacion_act='".$new."', pub_fecha_act='".$y."-".$m."-".$d."' WHERE pub_id=".$pubid." ;");
    	}elseif(empty($info[0]['pub_id'])){
    		$info=$this->PgModelo("SELECT pub_id FROM perdida,perro WHERE pub_id=".$pubid." AND mas_id=pub_mascota;");
	    	if(!empty($info[0]['pub_id'])){
	    		return $this->PgModelo("UPDATE perdida SET pper_ubicacion_act='".$new."', pub_fecha_act='".$y."-".$m."-".$d."' WHERE pub_id=".$pubid.";");
	    	}elseif(empty($info[0]['pub_id'])){
	    		$info=$this->PgModelo("SELECT pub_id FROM abandonada,gato WHERE pub_id=".$pubid."AND mas_id=pub_mascota;");
		    	if(!empty($info[0]['pub_id'])){
		    		return $this->PgModelo("UPDATE abandonada SET pabd_direccion='".$new."', pub_fecha_act='".$y."-".$m."-".$d."' WHERE pub_id=".$pubid.";");
		    	}elseif(empty($info[0]['pub_id'])){
		    		$info=$this->PgModelo("SELECT pub_id FROM abandonada,perro WHERE pub_id=".$pubid."AND mas_id=pub_mascota;");
			    	if(!empty($info[0]['pub_id'])){
			    		return $this->PgModelo("UPDATE abandonada SET pabd_direccion='".$new."', pub_fecha_act='".$y."-".$m."-".$d."' WHERE pub_id=".$pubid.";");
			    	}elseif(empty($info[0]['pub_id'])){
			    		$info=$this->PgModelo("SELECT pub_id FROM alojamiento,gato WHERE pub_id=".$pubid."AND mas_id=pub_mascota;");
				    	if(!empty($info[0]['pub_id'])){
				    		return $this->PgModelo("UPDATE alojamiento SET pali_lugaralojo='".$new."', pub_fecha_act='".$y."-".$m."-".$d."' WHERE pub_id=".$pubid.";");
				    	}elseif(empty($info[0]['pub_id'])){
				    		$info=$this->PgModelo("SELECT pub_id FROM alojamiento,perro WHERE pub_id=".$pubid."AND mas_id=pub_mascota;");
					    	if(!empty($info[0]['pub_id'])){
					    		return $this->PgModelo("UPDATE alojamiento SET pali_lugaralojo='".$new."', pub_fecha_act='".$y."-".$m."-".$d."' WHERE pub_id=".$pubid." ;");
					    	}
				    	}
			    	} 	
		    	}
	    	}
    	}	

    }
}
?>