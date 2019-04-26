<?php 
class BD {
    //Datos Privados de la BD
    private $db_name = "buscatdog";
    private $db_host = "127.0.0.1";
    private $db_port = "5432";
    private $db_username = "postgres";
    private $db_password = "00scml00";

    // la conexion a la BD, inicialmente no conectada
    private $BDCon = null;

    // la consulta Select del query
    private $SQuery = null;
    // la ultima consulta es correcta?
    private $SQuery_correct = false;

    //creamos la conexión a la base de datos prueba
    public function __construct() {
        // $this->StartBD();
        // $this->EndBD();
    }
    public function StartBD(){ // establece una conexion a la BD
        if (!$this->BDCon){
            $this->BDCon = pg_connect("dbname=$this->db_name port=$this->db_port host=$this->db_host user=$this->db_username password=$this->db_password") or die("No se pudo CONECTAR a la BD");
        }else{
            $this->EndBD();
            die("Doble conexion a BD");
        }
        
    }
    public function EndBD(){ // Cierra una conexion existente en la BD
        pg_close($this->BDCon) or die("No se pudo CERRAR la conexion a la BD");
        $this->BDCon = null;
    }

    public function PgQuery($sql){ // realiza una consulta
        if ($this->BDCon){
            return pg_query($this->BDCon,$sql);
        }else{
            die("NO se puede HACER CONSULTAS, no se ha establecido CONEXION a BD");
        }
    }

    public function PgModelo($sql){
        $this->StartBD();
        $this->SQuery = $this->PgQuery($sql);
        $this->EndBD();
        if (!$this->SQuery){
            die("Error en la consulta del Modelo.");
        }else{
            if (pg_num_rows($this->SQuery)){
                return pg_fetch_all($this->SQuery);    
            }else{
                return Array();
            }
        }  
    }

    public function PgSelect($sql){ // realiza la consulta Select, NO tiene RETORNO
        $this->StartBD();
        $this->SQuery = $this->PgQuery($sql);
        if (!$this->SQuery){
            die("SELECT Erroneo!");
        }
        $this->EndBD();
    }

    public function PgGetArraySelect(){ // Retorna un arreglo de la ultima consulta Select
        if ($this->SQuery){
            if (pg_num_rows($this->SQuery)){
                return pg_fetch_all($this->SQuery);    
            }else{
                return Array();
            }
            
        } else {
            die("NO Existe Consulta SELECT Valida!");
        }
    }

    public function PgIUD($sql){ // fusion generica
        $this->StartBD();
        $tmp = $this->PgQuery($sql);
        if (!$tmp){
            die("INSERT|UPDATE|DELETE Erroneo!");
        }
        $this->EndBD();
        return pg_affected_rows($tmp);
    }

    public function PgInsert($sql){
        $this->StartBD();
        $tmp = $this->PgQuery("INSERT INTO ".$sql);
        if (!$tmp){
            die("INSERT Erroneo!");
        }
        $this->EndBD();
        return pg_affected_rows($tmp);
    }

    public function PgUpdate($sql){
        $this->StartBD();
        $tmp = $this->PgQuery("UPDATE ".$sql);
        if (!$tmp){
            die("UPDATE Erroneo!");
        }
        $this->EndBD();
        return pg_affected_rows($tmp);
    }

    public function PgDelete($sql){
        $this->StartBD();
        $tmp = $this->PgQuery("DELETE FROM ".$sql);
        if (!$tmp){
            die("DELETE Erroneo!");
        }
        $this->EndBD();
        return pg_affected_rows($tmp);
    }
}


?>