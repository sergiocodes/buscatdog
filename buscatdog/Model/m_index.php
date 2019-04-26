<?php
include_once("BD.php");
class m_index extends BD {
    public function publicar(){
        return $this->PgModelo("SELECT * FROM publicacion,mascota WHERE pub_mascota=mas_id;");
    }
}
?>