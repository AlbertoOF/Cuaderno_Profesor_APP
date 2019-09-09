<?php 
class CursosModel extends ModeloBase{
    private $table;
    public function __construct($table){
        $this->table = "asignaturas";
        parent:: __construct($this->table);
    }
    public function getUnCurso(){
        $query="SELECT * from asignaturas WHERE Nombre='montaje'";
        $usuario = $this->ejecutarSql($query);
        return $usuario;
    }
}
?>