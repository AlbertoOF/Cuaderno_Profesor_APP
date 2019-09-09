<?php
class Actividad extends EntidadBase{
    private  $Id, $Idusuario, $Idcurso,$Nombre,$Tipo,$Evaluacion,$Ponderacion;

    public function __construct($table){
        $table="alumnos";
        parent:: __construct($table);
    }
    public function getId(){
        return $this->Id;
    }
    public function setId($Id){
        $this->Id = $Id;
    }
    public function getNombre(){
        return $this->Nombre;
    }
    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }
    public function getTipo(){
        return $this->Tipo;
    }
    public function setTipo($Tipo){
        $this->Tipo = $Tipo;
    }
    public function getEvaluacion(){
        return $this->Evaluacion;
    }
    public function setEvaluacion($Evaluacion){
        $this->Evaluacion = $Evaluacion;
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
    public function getPonderacion(){
        return $this->Ponderacion;
    }
    public function setPonderacion($Ponderacion){
        $this->Ponderacion = $Ponderacion;
    }
    
    
    public function buscarActividades($idCurso){
        $query = $this->getdb()->query("SELECT * FROM actividades WHERE  Id_Asignatura='".$idCurso."' ORDER BY Evaluacion DESC ");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function save(){
        $query = "INSERT INTO actividades(ID,Nombre,Tipo,Ponderacion,Evaluacion,IdUsuario,Id_Asignatura) VALUES (Null,"
        ."'".$this->Nombre."',"
        ."'".$this->Tipo."',"
        ."'".$this->Ponderacion."',"
        ."'".$this->Evaluacion."',"
        ."'".$this->Idusuario."',"
        ."'".$this->Idcurso."'"
        .");";
        $save = $this->getdb()->query($query);
        return $save;
    }

    public function delete(){
        
        $query="DELETE FROM actividades WHERE ID='".$this->Id."'";
        $delete = $this->getdb()->query($query);
    } 

    public function update(){
        $query="UPDATE actividades SET Nombre = '".$this->Nombre."',Tipo = '".$this->Tipo."',Ponderacion = '".$this->Ponderacion."',Evaluacion = '".$this->Evaluacion."'  WHERE ID='".$this->Id."'";
        $update= $this->getdb()->query($query);
        return $update;
    }

    public function searchPonderacion($evaluacion,$tipo,$idUsuario){
        $query = $this->getdb()->query("SELECT SUM(Ponderacion) AS Suma FROM actividades WHERE  Evaluacion='".$evaluacion."' AND Tipo='".$tipo."' AND IdUsuario='".$idUsuario."'  ");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    public function buscarAlumnosActividad($idCurso,$idActividad){
        
        $query = $this->getdb()->query("SELECT alumnos.ID as Id, CONCAT(alumnos.Nombre, ' ' ,alumnos.Apellido1,' ',alumnos.Apellido2) as Nombre, calificacionActividad.Nota as Nota, '".$idActividad."' as IdActividad FROM alumnos left JOIN asignaturas on alumnos.IdCurso= asignaturas.ID LEFT join actividades on asignaturas.ID=actividades.Id_Asignatura left JOIN calificacionActividad ON alumnos.ID=calificacionActividad.IdAlumno and calificacionActividad.IdActividad='".$idActividad."' WHERE  alumnos.IdCurso='".$idCurso."' GROUP BY Id, nombre, Nota, IdActividad ORDER BY Apellido1, Apellido2 DESC");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    public function buscarCalificaciones($idActividad,$idAlumno){
        $query = $this->getdb()->query("SELECT * FROM calificacionActividad WHERE  IdActividad='".$idActividad."' AND IdAlumno='".$idAlumno."' ");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function saveCalification($nota,$idActividad,$idAlumno){
        $query = "INSERT INTO calificacionActividad(IdActividad,IdAlumno,Nota) VALUES ('".$idActividad."',"
        ."'".$idAlumno."',"
        ."'".$nota."'"
        .");";
        $save = $this->getdb()->query($query);
        return $save;
    }

    public function updateCalification($nota,$idActividad,$idAlumno){
        $query="UPDATE calificacionActividad SET Nota = '".$nota."'  WHERE IdActividad='".$idActividad."' AND IdAlumno='".$idAlumno."'";
        $update= $this->getdb()->query($query);
        return $update;
    }

    
    

}
?>