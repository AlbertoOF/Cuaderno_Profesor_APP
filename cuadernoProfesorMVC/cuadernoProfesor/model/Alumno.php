<?php
class Alumno extends EntidadBase{
    private  $Idalumno, $Idusuario, $Idcurso, $Telefono,$Nombre,$Apellido1,$Apellido2,$Email,$FechaNacimiento;

    public function __construct($table){
        $table="alumnos";
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
    public function getEmail(){
        return $this->Email;
    }
    public function setEmail($Email){
        $this->Email = $Email;
    }
    public function getFechaNacimiento(){
        return $this->FechaNacimiento;
    }
    public function setFechaNacimiento($FechaNacimiento){
        $this->FechaNacimiento = $FechaNacimiento;
    }
    public function getIdcurso(){
        return $this->Idcurso;
    }
    public function setIdcurso($Idcurso){
        $this->Idcurso = $Idcurso;
    }
    public function getTelefono(){
        return $this->Telefono;
    }
    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }
    public function getIdusuario(){
        return $this->Idusuario;
    }
    public function setIdusuario($Idusuario){
        $this->Idusuario = $Idusuario;
    }
    
    public function buscarAlumnos($idCurso){
        $query = $this->getdb()->query("SELECT * FROM alumnos WHERE  idCurso='".$idCurso."' ORDER BY Apellido1 DESC ");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function save(){
        $query = "INSERT INTO alumnos(ID,Nombre,Apellido1,Apellido2,FechaNac,Telefono,Mail,IDUser,IdCurso) VALUES (Null,"
        ."'".$this->Nombre."',"
        ."'".$this->Apellido1."',"
        ."'".$this->Apellido2."',"
        ."'".$this->FechaNacimiento."',"
        ."'".$this->Telefono."',"
        ."'".$this->Email."',"
        ."'".$this->Idusuario."',"
        ."'".$this->Idcurso."'"
        .");";
        $save = $this->getdb()->query($query);
        return $save;
    }

    public function delete(){
        
        $query="DELETE FROM alumnos WHERE ID='".$this->Idalumno."'";
        $delete = $this->getdb()->query($query);
    } 

    public function update(){
        $query="UPDATE alumnos SET Nombre = '".$this->Nombre."',Apellido1 = '".$this->Apellido1."',Apellido2 = '".$this->Apellido2."',FechaNac = '".$this->FechaNacimiento."',Telefono = '".$this->Telefono."',Mail = '".$this->Email."'  WHERE ID='".$this->Idalumno."'";
        $update= $this->getdb()->query($query);
        return $update;
    }

    //Prueba calificaciones
    public function buscarAlumnosCalificaciones($idCurso){
        //$query = $this->getdb()->query("SELECT * FROM alumnos WHERE  idCurso='".$idCurso."' ORDER BY Apellido1 DESC ");
        $query = $this->getdb()->query("SELECT alumnos.ID, alumnos.Nombre, alumnos.Apellido1, alumnos.Apellido2, calificacionAlumno.Evaluacion1, calificacionAlumno.Evaluacion2, calificacionAlumno.Evaluacion3, calificacionAlumno.CalificacionFinal, calificacionAlumno.CalificacionFinal2, calificacionAlumno.CalificacionFinal3 FROM alumnos left JOIN calificacionAlumno on alumnos.ID = calificacionAlumno.ID_alumno WHERE alumnos.idCurso='".$idCurso."' ORDER BY alumnos.Apellido1, alumnos.Apellido2 DESC");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function searchInfoCalification($evaluacion,$idCurso,$idAlumno){
        $query = $this->getdb()->query("SELECT calificacionActividad.IdAlumno as IdAlumno, calificacionActividad.Nota as NotaAlumno, actividades.Ponderacion as Ponderacion, actividades.Evaluacion as Evaluacion, actividades.Tipo as Tipo, actividades.Id_Asignatura as IdCurso, configuracion.ExEv1, configuracion.EjEv1, configuracion.OtrosEv1, configuracion.ExEv2, configuracion.EjEv2, configuracion.OtrosEv2, configuracion.ExEv3, configuracion.EjEv3, configuracion.OtrosEv3 FROM calificacionActividad left join actividades on actividades.ID=calificacionActividad.IdActividad left join configuracion on configuracion.IdCurso= actividades.Id_Asignatura WHERE calificacionActividad.IdAlumno = '".$idAlumno."' and actividades.Id_Asignatura='".$idCurso."' and actividades.Evaluacion='".$evaluacion."'");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    public function insertNotaFinal($evaluacion,$idCurso,$idAlumno,$notaFinalev1,$notaFinalev2,$notaFinalev3){
        if($evaluacion==1)
        {
            $query = "INSERT INTO calificacionAlumno(ID_alumno, ID_asignatura, Evaluacion1) VALUES ('".$idAlumno."',"
            ."'".$idCurso."',"
            ."'".$notaFinalev1."'"
            .");";   
        }elseif($evaluacion==2)
        {
            $query = "INSERT INTO calificacionAlumno(ID_alumno, ID_asignatura, Evaluacion2) VALUES ('".$idAlumno."',"
            ."'".$idCurso."',"
            ."'".$notaFinalev2."'"
            .");";
        }elseif($evaluacion==3)
        {
            $query = "INSERT INTO calificacionAlumno(ID_alumno, ID_asignatura, Evaluacion3) VALUES ('".$idAlumno."',"
            ."'".$idCurso."',"
            ."'".$notaFinalev3."'"
            .");";
        }
        

        $save = $this->getdb()->query($query);
        return $save;
    }

    public function checkCalificacion($idCurso,$idAlumno){
        $query = $this->getdb()->query("SELECT * FROM calificacionAlumno WHERE ID_alumno= '".$idAlumno."' and ID_asignatura='".$idCurso."'");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }
    public function updateCalificacionFinal($evaluacion, $notaEv1, $notaEv2, $notaEv3, $idAlumno, $idCurso){
        if($evaluacion==1)
        {
            $query="UPDATE calificacionAlumno SET Evaluacion1='".$notaEv1."' WHERE ID_alumno='".$idAlumno."' and ID_asignatura='".$idCurso."'";
        }elseif($evaluacion==2)
        {
            $query="UPDATE calificacionAlumno SET Evaluacion2='".$notaEv2."' WHERE ID_alumno='".$idAlumno."' and ID_asignatura='".$idCurso."'";
        }elseif($evaluacion==3)
        {
            $query="UPDATE calificacionAlumno SET Evaluacion3='".$notaEv3."' WHERE ID_alumno='".$idAlumno."' and ID_asignatura='".$idCurso."'";
        }
        $update= $this->getdb()->query($query);
        return $update;
    }
    public function checkConfiguration($idCurso){
        $query = $this->getdb()->query("SELECT * FROM configuracion WHERE IDCurso= '".$idCurso."'");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function updateNotaFinal($idCurso,$idAlumno,$notafinal){
        $query="UPDATE calificacionAlumno SET CalificacionFinal='".$notafinal."' WHERE ID_alumno='".$idAlumno."' and ID_asignatura='".$idCurso."'";
        $update= $this->getdb()->query($query);
        return $update;
    }

    public function updateFinal1($idCurso,$idAlumno,$calificacionFinal1){
        $query="UPDATE calificacionAlumno SET CalificacionFinal2='".$calificacionFinal1."' WHERE ID_alumno='".$idAlumno."' and ID_asignatura='".$idCurso."'";
        $update= $this->getdb()->query($query);
        return $update;
    }

    public function updateFinal2($idCurso,$idAlumno,$calificacionFinal2){
        $query="UPDATE calificacionAlumno SET CalificacionFinal3='".$calificacionFinal2."' WHERE ID_alumno='".$idAlumno."' and ID_asignatura='".$idCurso."'";
        $update= $this->getdb()->query($query);
        return $update;
    }

}
?>