<?php
class Resumen extends EntidadBase{
    private  $Idalumno,$Nombre,$Apellido1,$Apellido2,$notaMedia,$nfaltas;

    public function __construct($table){
        $table="asignaturas";
        parent:: __construct($table);
    }
    public function getIdalumno(){
        return $this->Idalumno;
    }
    public function setIdalumno($Idalumno){
        $this->Idalumno = $Idalumno;
    }
    public function getNombre(){
        return $this->Nombre;
    }
    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }
    public function getApellido1(){
        return $this->Apellido1;
    }
    public function setApellido1($Apellido1){
        $this->Apellido1 = $Apellido1;
    }
    public function getApellido2(){
        return $this->Apellido2;
    }
    public function setApellido2($Apellido2){
        $this->Apellido2 = $Apellido2;
    }
    public function getnotaMedia(){
        return $this->notaMedia;
    }
    public function setnotaMedia($nHoras){
        $this->notaMedia = $notaMedia;
    }
    public function getnfaltas(){
        return $this->nfaltas;
    }
    public function setnfaltas($nfaltas){
        $this->nfaltas = $nfaltas;
    }
    
    public function buscarAlumnos($idUsuarioCurso,$idCurso){
        //$query = $this->getdb()->query("SELECT alumnos.ID as ID, alumnos.Nombre as Nombre, alumnos.Apellido1 as Apellido1, alumnos.Apellido2 as Apellido2, calificacionAlumno.CalificacionFinal as CalificacionFinal, SUM(faltas.NfaltasFecha) as nFaltas  FROM  alumnos LEFT JOIN calificacionAlumno ON alumnos.ID=calificacionAlumno.ID_alumno LEFT join faltas on alumnos.ID = faltas.IdAlumno WHERE alumnos.IdCurso = '".$idCurso."' GROUP BY alumnos.id, alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, calificacionAlumno.CalificacionFinal ORDER BY alumnos.Nombre");
        $query = $this->getdb()->query("SELECT alumnos.ID as ID, alumnos.Nombre as Nombre, alumnos.Apellido1 as Apellido1, alumnos.Apellido2 as Apellido2, calificacionAlumno.Evaluacion1 as Evaluacion1, calificacionAlumno.Evaluacion2 as Evaluacion2, calificacionAlumno.Evaluacion3 as Evaluacion3, calificacionAlumno.CalificacionFinal as CalificacionFinal, calificacionAlumno.CalificacionFinal2 as CalificacionFinal2, calificacionAlumno.CalificacionFinal3 as CalificacionFinal3, SUM(faltas.NfaltasFecha) as nFaltas FROM alumnos LEFT JOIN calificacionAlumno ON alumnos.ID=calificacionAlumno.ID_alumno LEFT join faltas on alumnos.ID = faltas.IdAlumno WHERE alumnos.IdCurso='".$idCurso."' GROUP BY alumnos.id, alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, calificacionAlumno.Evaluacion1, calificacionAlumno.Evaluacion2, calificacionAlumno.Evaluacion3, calificacionAlumno.CalificacionFinal, calificacionAlumno.CalificacionFinal2, calificacionAlumno.CalificacionFinal3 ORDER BY alumnos.Nombre");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function buscarAlumnosMayores($idUsuarioCurso,$idCurso){
        //$query = $this->getdb()->query("SELECT alumnos.ID as ID, alumnos.Nombre as Nombre, alumnos.Apellido1 as Apellido1, alumnos.Apellido2 as Apellido2, calificacionAlumno.CalificacionFinal as CalificacionFinal, SUM(faltas.NfaltasFecha) as nFaltas  FROM  alumnos LEFT JOIN calificacionAlumno ON alumnos.ID=calificacionAlumno.ID_alumno LEFT join faltas on alumnos.ID = faltas.IdAlumno WHERE alumnos.IdCurso = '".$idCurso."' GROUP BY alumnos.id, alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, calificacionAlumno.CalificacionFinal ORDER BY alumnos.Nombre");
        $query = $this->getdb()->query("SELECT alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, alumnos.FechaNac, TIMESTAMPDIFF(YEAR,alumnos.FechaNac, CURRENT_DATE())as Edad FROM alumnos WHERE alumnos.IdCurso='".$idCurso."' and TIMESTAMPDIFF(YEAR,alumnos.FechaNac, CURRENT_DATE())>=18");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function buscarFaltasAlumnos($idCurso){
        //$query = $this->getdb()->query("SELECT alumnos.ID as ID, alumnos.Nombre as Nombre, alumnos.Apellido1 as Apellido1, alumnos.Apellido2 as Apellido2, calificacionAlumno.CalificacionFinal as CalificacionFinal, SUM(faltas.NfaltasFecha) as nFaltas  FROM  alumnos LEFT JOIN calificacionAlumno ON alumnos.ID=calificacionAlumno.ID_alumno LEFT join faltas on alumnos.ID = faltas.IdAlumno WHERE alumnos.IdCurso = '".$idCurso."' GROUP BY alumnos.id, alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, calificacionAlumno.CalificacionFinal ORDER BY alumnos.Nombre");
        $query = $this->getdb()->query("SELECT alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, alumnos.ID, sum(faltas.NfaltasFecha) as faltasTotales, (asignaturas.nHoras * configuracion.PorcentajeMaxFaltas/100) as HorasTotales FROM alumnos LEFT JOIN faltas on alumnos.ID = faltas.IdAlumno LEFT join configuracion on alumnos.IdCurso = configuracion.IdCurso left join asignaturas on alumnos.IdCurso = asignaturas.ID WHERE alumnos.IdCurso='".$idCurso."' GROUP BY alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, alumnos.ID, HorasTotales HAVING faltasTotales > HorasTotales ORDER BY Apellido1, Apellido2 DESC");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    

}
?>