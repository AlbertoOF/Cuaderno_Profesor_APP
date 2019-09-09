<?php
SESSION_START();
class ResumenController extends ControladorBase{
    public function __construct(){
        parent:: __construct();
    }
    public function index(){
        $resumen=new Resumen("asignaturas");
        $idusuarioCurso = $_SESSION["idUsuario"];
        $idCurso = $_SESSION["idCurso"];
        $allresumenes = $resumen->buscarAlumnos($idusuarioCurso,$idCurso);
        $allMayores = $resumen->buscarAlumnosMayores($idusuarioCurso,$idCurso);
        $allfaltas = $resumen->buscarFaltasAlumnos($idCurso);
        $this->view("resumen",array(
            "allresumenes" => $allresumenes,
            "allfaltas" => $allfaltas,
            "allMayores" => $allMayores,
            "Hola"=> "SALUDO PRUEBA"
        ));
        
        }

}
?>