<?php
SESSION_START();
class AlumnoController extends ControladorBase{
    public function __construct(){
        parent:: __construct();
    }
    public function index(){
        $alumno=new Alumno("alumnos");
        $idCurso = $_SESSION["idCurso"];
        $allalumnos = $alumno->buscarAlumnos($idCurso);
        
        $this->view("alumnos",array(
            "allalumnos" => $allalumnos,
            "Hola"=> "SALUDO PRUEBA"
        ));
        
    }
    public function crear(){
        if(isset($_POST["nombreInsertar"])){
           

            $alumnoBBDD = new Alumno("alumnos");

            $nombre=$_POST["nombreInsertar"];
            $ap1=$_POST["ap1Insertar"];
            $ap2=$_POST["ap2Insertar"];
            $telefono=$_POST["telefonoInsertar"];
            $mail= $_POST["mailInsertar"];
            $fechaNac= $_POST["fNacInsertar"];
            $idUsuario =$_POST["idUsuario"];
            $idCurso = $_POST["idCurso"];

                                    
            $alumnoBBDD -> setNombre($nombre);
            $alumnoBBDD -> setApellido1($ap1);
            $alumnoBBDD -> setApellido2($ap2);
            $alumnoBBDD -> setEmail($mail);
            $alumnoBBDD -> setFechaNacimiento($fechaNac);
            $alumnoBBDD -> setTelefono($telefono);
            $alumnoBBDD -> setIdusuario($idUsuario);
            $alumnoBBDD -> setIdcurso($idCurso);

                        
            $save = $alumnoBBDD->save();
        }
        $this-> redirect("alumno","index");
       
    }

    public function borrar(){
        if(isset($_POST["id"])){
           

            $alumnoBBDD = new Alumno("alumnos");

            $id= $_POST["id"];
            
                     
            $alumnoBBDD -> setIdalumno($id);
                       
            $delete = $alumnoBBDD->delete();
        }
        $this-> redirect("alumno","index");
       
    }


    public function actualizar(){
        if(isset($_POST["idAlumnoEditar"])){
            $alumnoBBDD = new Alumno("alumnos");

            $nombre=$_POST["nombreEditar"];
            $ap1=$_POST["ap1Editar"];
            $ap2=$_POST["ap2Editar"];
            $telefono=$_POST["telefonoEditar"];
            $mail= $_POST["mailEditar"];
            $fechaNac= $_POST["fNacEditar"];
            $idUsuario =$_POST["idUsuarioEditar"];
            $idAlumno = $_POST["idAlumnoEditar"];
            
                                   
            $alumnoBBDD -> setNombre($nombre);
            $alumnoBBDD -> setApellido1($ap1);
            $alumnoBBDD -> setApellido2($ap2);
            $alumnoBBDD -> setEmail($mail);
            $alumnoBBDD -> setFechaNacimiento($fechaNac);
            $alumnoBBDD -> setTelefono($telefono);
            $alumnoBBDD -> setIdusuario($idUsuario);
            $alumnoBBDD -> setIdalumno($idAlumno);
                 
            $update = $alumnoBBDD->update();
        }
        $this-> redirect("alumno","index");
        
    }

    //CAlificaciones
    public function indexCalificaciones(){
        $alumno=new Alumno("alumnos");
        $idCurso = $_SESSION["idCurso"];
        $allalumnos = $alumno->buscarAlumnosCalificaciones($idCurso);
        
        $this->view("calificaciones",array(
            "allalumnos" => $allalumnos,
            "Hola"=> "SALUDO PRUEBA"
        ));
        
    }

    public function calificarEvaluacion(){
        if(isset($_POST["idEvCalificar"]) AND isset($_POST["idAlumnoCalificar"]) ){
           

            $alumnoBBDD = new Alumno("alumnos");

            $evaluacion=$_POST["idEvCalificar"];
            $idAlumno=$_POST["idAlumnoCalificar"];
            $idCurso=$_SESSION["idCurso"];

            $searchInfoCalification = $alumnoBBDD->searchInfoCalification($evaluacion,$idCurso,$idAlumno);
            $PonderacionExEv=0;
            $PonderacionEjEv=0;
            $PonderacionOtrosEv=0;
            $notaintermediaEx = 0;
            $notaintermediaEj = 0;
            $notaintermediaOtros = 0;
            $notaFinalev1 = 0;
            $notaFinalev2= 0;
            $notaFinalev3= 0;

            $PonderacionTotalEv1=0;
            $PonderacionTotalEv2=0;
            $PonderacionTotalEv3=0;
            $ExEv1=0;
            $ExEv2=0;
            $ExEv3=0;
            $EjEv1=0;
            $EjEv2=0;
            $EjEv3=0;
            $OtrosEv1 =0;
            $OtrosEv2 =0;
            $OtrosEv3 =0;

            foreach($searchInfoCalification as $info){
                $notaPonderacion = $info->NotaAlumno * $info->Ponderacion;

                if($info->Tipo == "Examen"){
                    $PonderacionExEv+=$info->Ponderacion;
                    $notaintermediaEx +=$notaPonderacion;
                } elseif($info->Tipo == "Ejercicio"){
                    $PonderacionEjEv+=$info->Ponderacion;
                    $notaintermediaEj +=$notaPonderacion;

                }elseif($info->Tipo == "Otros"){
                    $PonderacionOtrosEv+=$info->Ponderacion;
                    $notaintermediaOtros +=$notaPonderacion;
                }
                if($info->Evaluacion == 1){
                    $ExEv1=$info->ExEv1;
                    $EjEv1=$info->EjEv1;
                    $OtrosEv1 =$info->OtrosEv1;
                }elseif($info->Evaluacion == 2){
                    $ExEv2=$info->ExEv2;
                    $EjEv2=$info->EjEv2;
                    $OtrosEv2 =$info->OtrosEv2;
                }elseif($info->Evaluacion == 3){
                    $ExEv3=$info->ExEv3;
                    $EjEv3=$info->EjEv3;
                    $OtrosEv3 =$info->OtrosEv3;
                }
            }

            if($evaluacion == 1){
                $PonderacionTotalEv1 = $ExEv1 + $EjEv1 + $OtrosEv1;
                $notaFinalev1 = ($notaintermediaEx * ($ExEv1 /100)) + ($notaintermediaEj * ($EjEv1 / 100)) + ($notaintermediaOtros * ($OtrosEv1 / 100));
            }elseif($evaluacion == 2){
                $PonderacionTotalEv2 = $ExEv2 + $EjEv2 + $OtrosEv2;
                $notaFinalev2 = ($notaintermediaEx * ($ExEv2 / 100)) + ($notaintermediaEj * ($EjEv2 / 100)) + ($notaintermediaOtros * ($OtrosEv2 / 100));
            }elseif($evaluacion == 3){
                $PonderacionTotalEv3 = $ExEv3 + $EjEv3 + $OtrosEv3;
                $notaFinalev3 = ($notaintermediaEx * ($ExEv3 / 100)) + ($notaintermediaEj * ($EjEv3 / 100)) + ($notaintermediaOtros * ($OtrosEv3 / 100));
            }
            if($PonderacionOtrosEv==0)
            {
                $PonderacionOtrosEv=1;
            }

            if((($evaluacion == 1 and $PonderacionTotalEv1==100) or ($evaluacion == 2 and $PonderacionTotalEv2==100) or ($evaluacion == 3 and $PonderacionTotalEv3==100)) and $PonderacionEjEv==1 and $PonderacionExEv ==1 and $PonderacionOtrosEv==1)
            {
                $checkCalificacion = $alumnoBBDD->checkCalificacion($idCurso,$idAlumno);
                if($checkCalificacion==null){
                    
                        $insertNotaFinal = $alumnoBBDD->insertNotaFinal($evaluacion,$idCurso,$idAlumno,$notaFinalev1,$notaFinalev2,$notaFinalev3);
                    
                }else{
                    
                        $updateCalificacionFinal = $alumnoBBDD->updateCalificacionFinal($evaluacion, $notaFinalev1, $notaFinalev2, $notaFinalev3, $idAlumno, $idCurso);
                    
                }
            }

            

        }
        $this-> redirect("alumno","indexCalificaciones");
    }

    public function calificarEvaluacionEvCFinal(){
        if(isset($_POST["idCursoCalificar"]) AND isset($_POST["idAlumnoCalificar"]) ){
            $alumnoBBDD = new Alumno("alumnos");

            $evaluacion=$_POST["idEvCalificar"];
            $idAlumno=$_POST["idAlumnoCalificar"];
            $idCurso=$_SESSION["idCurso"];

            $checkCalificacion = $alumnoBBDD->checkCalificacion($idCurso,$idAlumno);
            $checkConfiguration = $alumnoBBDD->checkConfiguration($idCurso);
            foreach($checkCalificacion as $calificacion){
                $notaEv1=$calificacion->Evaluacion1;
                $notaEv2=$calificacion->Evaluacion2;
                $notaEv3=$calificacion->Evaluacion3;
            }
            foreach($checkConfiguration as $config){
                $promedioEv1=$config->Evaluacion1;
                $promedioEv2=$config->Evaluacion2;
                $promedioEv3=$config->Evaluacion3;
                $SumaEvaluaciones = $promedioEv1+$promedioEv2+$promedioEv3;
            }
            $notafinal= $notaEv1*($promedioEv1/100) + $notaEv2*($promedioEv2/100) +$notaEv3*($promedioEv3/100);
            if($checkCalificacion!=null and $notaEv1!=null and $notaEv2!=null and $notaEv3!=null and $SumaEvaluaciones==100){
                $updateNotaFinal= $alumnoBBDD->updateNotaFinal($idCurso,$idAlumno,$notafinal);
            }
            
            $this-> redirect("alumno","indexCalificaciones");
        }
    }

    public function calificarFinal1(){
        if(isset($_POST["idCursoCalificar"]) AND isset($_POST["idAlumnoCalificar"]) AND isset($_POST["final1"]) ){
            $alumnoBBDD = new Alumno("alumnos");

            $calificacionFinal1=$_POST["final1"];
            $idAlumno=$_POST["idAlumnoCalificar"];
            $idCurso=$_SESSION["idCurso"];

            $checkCalificacion = $alumnoBBDD->checkCalificacion($idCurso,$idAlumno);
            foreach($checkCalificacion as $calificacion){
                $notaEvContinua=$calificacion->CalificacionFinal;
                
            }
            if($notaEvContinua!=null){
                $updateFinal1=$alumnoBBDD->updateFinal1($idCurso,$idAlumno,$calificacionFinal1);
            }

            $this-> redirect("alumno","indexCalificaciones");
        }
    }

    public function calificarFinal2(){
        if(isset($_POST["idCursoCalificar"]) AND isset($_POST["idAlumnoCalificar"]) AND isset($_POST["final2"]) ){
            $alumnoBBDD = new Alumno("alumnos");

            $calificacionFinal2=$_POST["final2"];
            $idAlumno=$_POST["idAlumnoCalificar"];
            $idCurso=$_SESSION["idCurso"];

            $checkCalificacion = $alumnoBBDD->checkCalificacion($idCurso,$idAlumno);
            foreach($checkCalificacion as $calificacion){
                $notaEvContinua=$calificacion->CalificacionFinal;
                $notaFinal1 = $calificacion->CalificacionFinal2;
                
            }
            if($notaEvContinua!=null and $notaFinal1!=null and $notaFinal1<5 ){
                $updateFinal2=$alumnoBBDD->updateFinal2($idCurso,$idAlumno,$calificacionFinal2);
            }

            $this-> redirect("alumno","indexCalificaciones");
        }
    }

}
?>