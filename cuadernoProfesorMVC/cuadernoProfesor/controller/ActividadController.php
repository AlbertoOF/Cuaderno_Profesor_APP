<?php
SESSION_START();
class ActividadController extends ControladorBase{
    public function __construct(){
        parent:: __construct();
    }
    public function index(){
        $actividad=new Actividad("actividades");
        $idCurso = $_SESSION["idCurso"];
        $allactividades = $actividad->buscarActividades($idCurso);
        
        $this->view("actividades",array(
            "allactividades" => $allactividades,
            "Hola"=> "SALUDO PRUEBA"
        ));
        
    }

    public function crear(){
        if(isset($_POST["nombreInsertar"])){
           

            $actividadBBDD = new Actividad("actividades");

            $nombre=$_POST["nombreInsertar"];
            $tipo=$_POST["tipoInsertar"];
            $ponderacion=$_POST["ponderacionInsertar"];
            $evaluacion=$_POST["evaluacionInsertar"];
            $idUsuario =$_POST["idUsuario"];
            $idCurso = $_POST["idCurso"];

            if($tipo=="uno"){
                $tipo="Examen";
            }elseif($tipo=="dos"){
                $tipo="Ejercicio";
            }elseif($tipo=="tres"){
                $tipo="Otros";
            }

            if($evaluacion=="uno"){
                $evaluacion="1";
            }elseif($evaluacion=="dos"){
                $evaluacion="2";
            }elseif($evaluacion=="tres"){
                $evaluacion="3";
            }
            $ponderacion= $ponderacion/100;

            //Prueba Comprobamos si la ponderacion supera 100 en relacion al tipo y la evaluacion
            
            $searchPonderacion = $actividadBBDD->searchPonderacion($evaluacion,$tipo,$idUsuario);
            $ponderacionTotal=0;
            foreach($searchPonderacion as $nponderacion){
                $ponderacionTotal = $nponderacion->Suma;
            }
            if(($ponderacionTotal+$ponderacion)<=1){
                $actividadBBDD -> setNombre($nombre);
                $actividadBBDD -> setTipo($tipo);
                $actividadBBDD -> setPonderacion($ponderacion);
                $actividadBBDD -> setEvaluacion($evaluacion);
                $actividadBBDD -> setIdusuario($idUsuario);
                $actividadBBDD -> setIdcurso($idCurso);
                $save = $actividadBBDD->save();
                $this-> redirect("actividad","index");
                

            } else{
                //echo '<script>alert("Esta actividad supera el 100% de la ponderacion total relativa a este tipo de instrumentos evaluativos. Introduzca una valoracion adecuada"); </script>';
                
                echo "No puedes insertar la actividad.Te pasas";
                $exceso= ($ponderacionTotal+$ponderacion)-1;
                //echo '<script>alert("Supera el 100% de la ponderacion del conjunto de actividades de este tipo); </script>';
               echo $exceso;
                //$this-> redirect("actividad","index");
            }
            
            
        }
        
       
    }
    
    public function borrar(){
        if(isset($_POST["id"])){
           

            $actividadBBDD = new Actividad("actividades");

            $id= $_POST["id"];
            
                     
            $actividadBBDD -> setId($id);
                       
            $delete = $actividadBBDD->delete();
        }
        $this-> redirect("actividad","index");
       
    }
    public function actualizar(){
        if(isset($_POST["idActividadEditar"])){
            $actividadBBDD = new Actividad("actividades");

            $nombre=$_POST["nombreEditar"];
            $tipo=$_POST["tipoEditar"];
            $ponderacion=$_POST["ponderacionEditar"];
            $evaluacion=$_POST["evaluacionEditar"];
            $idActividad= $_POST["idActividadEditar"];
            
            if($tipo=="uno"){
                $tipo="Examen";
            }elseif($tipo=="dos"){
                $tipo="Ejercicio";
            }elseif($tipo=="tres"){
                $tipo="Otros";
            }
            if($evaluacion=="uno"){
                $evaluacion="1";
            }elseif($evaluacion=="dos"){
                $evaluacion="2";
            }elseif($evaluacion=="tres"){
                $evaluacion="3";
            }
            $ponderacion=$ponderacion/100;
                                   
            $actividadBBDD -> setNombre($nombre);
            $actividadBBDD -> setTipo($tipo);
            $actividadBBDD -> setPonderacion($ponderacion);
            $actividadBBDD -> setEvaluacion($evaluacion);
            $actividadBBDD -> setId($idActividad);
            
            $update = $actividadBBDD->update();
        }
        $this-> redirect("actividad","index");
        
    }

    public function indexInfoAlumno(){
        $actividad=new Actividad("actividades");
        $idActividad =0;
        $idCurso = $_SESSION["idCurso"];
        $idActividad= $_POST["idActividad"];
        if($idActividad==0){
            
            $allAlumnosActividad = $actividad->buscarAlumnosActividad($idCurso,$_SESSION["idActividad"]);
            
        } else{
            $allAlumnosActividad = $actividad->buscarAlumnosActividad($idCurso,$idActividad);
           
        }
        
        //$allAlumnosActividad = $actividad->buscarAlumnosActividad($idCurso,$idActividad);
        
        $this->view("calificarActividad",array(
            "idActividad" => $idActividad,
            "allAlumnosActividad" => $allAlumnosActividad,
            "Hola"=> "SALUDO PRUEBA"
        ));
        
       
    }
    public function calificar(){
        if(isset($_POST["calificacionInsertar"])){
           

            $actividadBBDD = new Actividad("actividades");

            $nota=$_POST["calificacionInsertar"];
            $idActividad=$_POST["idActividad"];
            $idAlumno=$_POST["idAlumno"];

            
            $check = $actividadBBDD->buscarCalificaciones($idActividad,$idAlumno);
            if($check==null){
                $saveCalification = $actividadBBDD->saveCalification($nota,$idActividad,$idAlumno);
                
                
            } else{
                $updateCalification = $actividadBBDD->updateCalification($nota,$idActividad,$idAlumno);
               

                
            } 
            
        }
        $this-> redirect("actividad","indexInfoAlumno");
       
       
    }

}
?>