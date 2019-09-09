<?php
class Falta extends EntidadBase{
    private  $Id, $Idusuario, $Idcurso,$Idalumno,$Fecha,$NFaltasFecha,$Observaciones,$Ponderacion;

    public function __construct($table){
        $table="faltas";
        parent:: __construct($table);
    }
    public function getId(){
        return $this->Id;
    }
    public function setId($Id){
        $this->Id = $Id;
    }
    public function getFecha(){
        return $this->Fecha;
    }
    public function setFecha($Fecha){
        $this->Fecha = $Fecha;
    }
    public function getNFaltasFecha(){
        return $this->NFaltasFecha;
    }
    public function setNFaltasFecha($NFaltasFecha){
        $this->NFaltasFecha = $NFaltasFecha;
    }
    public function getObservaciones(){
        return $this->Observaciones;
    }
    public function setObservaciones($Observaciones){
        $this->Observaciones = $Observaciones;
    }
    public function getPonderacion(){
        return $this->Ponderacion;
    }
    public function setPonderacion($Ponderacion){
        $this->Ponderacion = $Ponderacion;
    }
    
    public function getIdcurso(){
        return $this->Idcurso;
    }
    public function setIdcurso($Idcurso){
        $this->Idcurso = $Idcurso;
    }
    public function getIdusuario(){
        return $this->Idusuario;
    }
    public function setIdusuario($Idusuario){
        $this->Idusuario = $Idusuario;
    }
    public function getIdalumno(){
        return $this->Idalumno;
    }
    public function setIdalumno($Idalumno){
        $this->Idalumno = $Idalumno;
    }
    
    
    public function buscarFaltas($idCurso){
        $query = $this->getdb()->query("SELECT * FROM actividades WHERE  Id_Asignatura='".$idCurso."' ORDER BY Evaluacion DESC ");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    public function buscarAlumnos($idCurso){
        //$query = $this->getdb()->query("SELECT * FROM alumnos WHERE  IdCurso='".$idCurso."' ORDER BY Apellido1 DESC ");
        $query = $this->getdb()->query("SELECT alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, alumnos.ID, sum(faltas.NfaltasFecha) as faltasTotales, (asignaturas.nHoras * configuracion.PorcentajeMaxFaltas/100) as HorasTotales FROM alumnos LEFT JOIN faltas on alumnos.ID = faltas.IdAlumno LEFT join configuracion on alumnos.IdCurso = configuracion.IdCurso left join asignaturas on alumnos.IdCurso = asignaturas.ID WHERE alumnos.IdCurso='".$idCurso."' GROUP BY alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, alumnos.ID, HorasTotales ORDER BY Apellido1, Apellido2 DESC");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function save(){
        
        $query = "INSERT INTO faltas(ID,Fecha,NfaltasFecha,Observaciones,IdUser,IdCurso,IdAlumno) VALUES (Null,"
        ."'".$this->Fecha."',"
        ."'".$this->NFaltasFecha."',"
        ."'".$this->Observaciones."',"
        ."'".$this->Idusuario."',"
        ."'".$this->Idcurso."',"
        ."'".$this->Idalumno."'"
        .");";
        $save = $this->getdb()->query($query);
        echo $query;
        return $save;
    }

    public function buscarFaltasAlumno($idAlumno){
        $query = $this->getdb()->query("SELECT * FROM faltas WHERE  IdAlumno='".$idAlumno."' ORDER BY Fecha DESC ");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    public function buscarNumFaltasAusencia($id){
        
        $query = $this->getdb()->query("SELECT NfaltasFecha FROM faltas WHERE  ID='".$id."'");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
         
        return $resultSet;
    }

    public function update($id){
        $query="UPDATE faltas SET NfaltasFecha  = IFNULL(NfaltasFecha,0)-1 WHERE ID='".$this->Id."'";
        $update= $this->getdb()->query($query);
        return $update;
    }
    public function delete($id){
        
        $query="DELETE FROM faltas WHERE ID='".$this->Id."'";
        echo $query;
        $delete = $this->getdb()->query($query);
    } 
    
    public function updateSuma($id){
        $query="UPDATE faltas SET NfaltasFecha  = IFNULL(NfaltasFecha,0)+1 WHERE ID='".$this->Id."'";
        $update= $this->getdb()->query($query);
        return $update;
    }

    

    
    

}
?>