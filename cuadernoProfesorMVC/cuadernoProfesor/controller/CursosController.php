<?php
SESSION_START();
class CursosController extends ControladorBase{
    public function __construct(){
        parent:: __construct();
    }
    public function index(){
        $curso=new Curso("asignaturas");
        $idusuarioCurso = $_SESSION["idUsuario"];
        $allcursos = $curso->searchUser($idusuarioCurso);
        
        $this->view("cursos",array(
            "allcursos" => $allcursos,
            "Hola"=> "SALUDO PRUEBA"
        ));
        
        }

     public function crear(){
        if(isset($_POST["nombre"])){
           

            $cursoBBDD = new Curso("asignaturas");

            $nombre=$_POST["nombre"];
            $etapa=$_POST["etapa"];
            $curso=$_POST["curso"];
            $nHoras=$_POST["nHoras"];
            $idUsuario= $_POST["idUsuario"];
            
            //Segun el valor que se recibe de etapa y curso se le asigna un valor u otro en BD
            if($etapa=="uno"){
                $etapa="ESO";
            }elseif($etapa=="dos"){
                $etapa="Bachillerato";
            }elseif($etapa=="tres"){
                $etapa="FPB";
            }elseif($etapa=="cuatro"){
                $etapa="FPGM";
            }elseif($etapa=="cinco"){
                $etapa="FPGS";
            }
            
            if($curso=="uno"){
                $curso="1";
            }elseif($curso=="dos"){
                $curso="2";
            }elseif($curso=="tres"){
                $curso="3";
            }elseif($curso=="cuatro"){
                $curso="4";
            }
            
            
            $cursoBBDD -> setNombre($nombre);
            $cursoBBDD -> setEtapa($etapa);
            $cursoBBDD -> setCurso($curso);
            $cursoBBDD -> setNhoras($nHoras);
            $cursoBBDD -> setIdUsuario($idUsuario);
            
            $save = $cursoBBDD->save();
        }
        $this-> redirect("Cursos","index");
       //$this->redirectCursos();
    }
    public function redirectCursos(){
        $this->view("cursos",array(
            "Hola"=> "SALUDO PRUEBA",
            
            
        ));
    }

    public function borrar(){
        if(isset($_POST["id"])){
           

            $cursoBBDD = new Curso("asignaturas");

            $id= $_POST["id"];
            
                     
            $cursoBBDD -> setId($id);
                       
            $delete = $cursoBBDD->delete();
        }
        $this-> redirect("Cursos","index");
       //$this->redirectCursos();
    }

    public function actualizar(){
        if(isset($_POST["idCursoEditar"])){
            $cursoBBDD = new Curso("asignaturas");

            $nombre=$_POST["nombreEditar"];
            $etapa=$_POST["etapaEditar"];
            $curso=$_POST["cursoEditar"];
            $nHoras=$_POST["nHorasEditar"];
            $idUsuario= $_POST["idUsuarioEditar"];
            $idCurso=$_POST["idCursoEditar"];
            
            //Segun el valor que se recibe de etapa y curso se le asigna un valor u otro en BD
            if($etapa=="uno"){
                $etapa="ESO";
            }elseif($etapa=="dos"){
                $etapa="Bachillerato";
            }elseif($etapa=="tres"){
                $etapa="FPB";
            }elseif($etapa=="cuatro"){
                $etapa="FPGM";
            }elseif($etapa=="cinco"){
                $etapa="FPGS";
            }
            
            if($curso=="uno"){
                $curso="1";
            }elseif($curso=="dos"){
                $curso="2";
            }elseif($curso=="tres"){
                $curso="3";
            }elseif($curso=="cuatro"){
                $curso="4";
            }
            echo $nombre;
            $cursoBBDD -> setNombre($nombre);
            $cursoBBDD -> setEtapa($etapa);
            $cursoBBDD -> setCurso($curso);
            $cursoBBDD -> setNhoras($nHoras);
            $cursoBBDD -> setIdUsuario($idUsuario);
            $cursoBBDD -> setId($idCurso);
                 
            $update = $cursoBBDD->update();
        }
        $this-> redirect("Cursos","index");
        
    }

    public function redirectResumen(){
        SESSION_START();
        $_SESSION["idCurso"]=$_POST["id"];
        $this->redirect("resumen","index");
    }
    
    
  
    
    
    
    
    

    
    
    
}
?>