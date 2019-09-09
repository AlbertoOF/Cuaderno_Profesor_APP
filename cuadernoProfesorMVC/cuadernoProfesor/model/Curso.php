<?php
class Curso extends EntidadBase{
    private  $Id,$Nombre,$Etapa,$Curso,$nHoras,$idUsuario;

    public function __construct($table){
        $table="asignaturas";
        parent:: __construct($table);
    }
    public function getEtapa(){
        return $this->Etapa;
    }
    public function setEtapa($Etapa){
        $this->Etapa = $Etapa;
    }
    public function getId(){
        return $this->Id;
    }
    public function setId($Id){
        $this->Id = $Id;
    }
    public function getCurso(){
        return $this->Curso;
    }
    public function setCurso($Curso){
        $this->Curso = $Curso;
    }
    public function getNombre(){
        return $this->Nombre;
    }
    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }
    public function getNhoras(){
        return $this->nHoras;
    }
    public function setNhoras($nHoras){
        $this->nHoras = $nHoras;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    
    public function save(){
        $query = "INSERT INTO asignaturas(ID,Nombre,Etapa,Curso,nHoras,idUsuario) VALUES (Null,"
        ."'".$this->Nombre."',"
        ."'".$this->Etapa."',"
        ."'".$this->Curso."',"
        ."'".$this->nHoras."',"
        ."'".$this->idUsuario."'"
        .");";
        $save = $this->getdb()->query($query);
        return $save;
    }
    public function searchUser($idUsuario){
        $query = $this->getdb()->query("SELECT * FROM asignaturas WHERE  idUsuario='".$idUsuario."' ORDER BY ID DESC ");

            while ($row = $query-> fetch_object()){
                $resultSet[] = $row;
            }
            return $resultSet;
    }
    public function delete(){
        
        $query="DELETE FROM asignaturas WHERE ID='".$this->Id."'";
        $delete = $this->getdb()->query($query);
    } 
    
    public function update(){
        $query="UPDATE asignaturas SET Nombre = '".$this->Nombre."',Etapa = '".$this->Etapa."',Curso = '".$this->Curso."',nHoras = '".$this->nHoras."'  WHERE ID='".$this->Id."'";
        $update= $this->getdb()->query($query);
        return $update;
    }

}
?>