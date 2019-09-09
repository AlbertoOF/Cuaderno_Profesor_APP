<?php
SESSION_START();
class FaltaController extends ControladorBase{
    public function __construct(){
        parent:: __construct();
    }
    public function index(){
        $falta=new Falta("faltas");
        $idCurso = $_SESSION["idCurso"];
        $allfaltas = $falta->buscarFaltas($idCurso);
        $allalumnos = $falta->buscarAlumnos($idCurso);
        
        $this->view("faltas",array(
            "allfaltas" => $allfaltas,
            "allalumnos" => $allalumnos,
            "Hola"=> "SALUDO PRUEBA"
        ));
        
    }
    public function crear(){

        if(isset($_POST["fechaFalta"])){
           

            $faltaBBDD = new Falta("faltas");

            $fecha=$_POST["fechaFalta"];
            $numFaltas=$_POST["nFaltasFalta"];
            $Observaciones=$_POST["ObservacionesFalta"];
            $idAlumno=$_POST["idAlumnoFalta"];
            $idUsuario =$_POST["idUsuarioFalta"];
            $idCurso = $_POST["idCursoFalta"];

            echo $idAlumno;

            

                                                           
            $faltaBBDD -> setFecha($fecha);
            $faltaBBDD -> setNFaltasFecha($numFaltas);
            $faltaBBDD -> setObservaciones($Observaciones);
            $faltaBBDD -> setIdalumno($idAlumno);
            $faltaBBDD -> setIdusuario($idUsuario);
            $faltaBBDD -> setIdcurso($idCurso);

                        
            $save = $faltaBBDD->save();
        }
        $this-> redirect("falta","index");
       
    }

    public function indexInfoAlumno(){
        $falta=new Falta("faltas");
        $idAlumno =0;
        $idCurso = $_SESSION["idCurso"];
        $idAlumno=$_POST["idVerFalta"];
        
                
        if($idAlumno==0){
            
            $allfaltasAlumno = $falta->buscarFaltasAlumno($_SESSION["idAlumno"]);
            
        } else{
           $allfaltasAlumno = $falta->buscarFaltasAlumno($idAlumno);
           
        }
        
        
        
        
        $this->view("faltasAlumno",array(
            "allfaltasAlumno" => $allfaltasAlumno,
            
            "Hola"=> "SALUDO PRUEBA"
        ));
       
    }

    public function borrar(){
        if(isset($_POST["idFalta"])){
            $faltaBBDD = new Falta("faltas");
            $id= $_POST["idFalta"];
                                 
            $faltaBBDD -> setId($id);
            //Busque el numero de faltas de la ausencia
            $searchNumFaltas = $faltaBBDD->buscarNumFaltasAusencia($id);
            $numFaltas=0;
            foreach($searchNumFaltas as $nfaltas){
                $numFaltas = $nfaltas->NfaltasFecha;
            }
            
           if($numFaltas<=0){
                $delete = $faltaBBDD->delete($id);
               
           }else{
                 $update = $faltaBBDD->update($id);
              
              
           }

                       
            
        }
        
        $this-> redirect("falta","indexInfoAlumno");
       
    }
    public function insertar(){
        if(isset($_POST["idFalta"])){
            $faltaBBDD = new Falta("faltas");
            $id= $_POST["idFalta"];
                                 
            $faltaBBDD -> setId($id);
                $updateSuma = $faltaBBDD->updateSuma($id);
              
              
           

                       
            
        }
        
        $this-> redirect("falta","indexInfoAlumno");
       
    }

    

    

}
?>