<?php
include_once("../Model/BD.php");
class m_panel extends BD {
    public function actualizar($prev,$new,$mail){
        return $this->PgModelo("UPDATE usuario SET usu_pass='".$new."' WHERE per_email='".$mail."' AND usu_pass='".$prev."';");
    }
    public function cambiarestado($pubid){
        return $this->PgModelo("UPDATE perdida SET pub_estado='Encontrado' WHERE pub_id='".$pubid."';");
    }
}


?>