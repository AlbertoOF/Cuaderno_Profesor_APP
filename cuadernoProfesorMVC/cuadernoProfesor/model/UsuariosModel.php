<?php 
class UsuariosModel extends ModeloBase{
    private $table;
    public function __construct($table){
        $this->table = "usuarios";
        parent:: __construct($this->table);
    }
    public function getUnUsuario(){
        $query="SELECT * from Usuarios WHERE Mail='prueba@prueba.com'";
        $usuario = $this->ejecutarSql($query);
        return $usuario;
    }
}
?>