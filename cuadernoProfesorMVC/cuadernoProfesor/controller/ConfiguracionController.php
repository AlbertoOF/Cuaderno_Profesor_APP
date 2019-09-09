<?php
SESSION_START();
class ConfiguracionController extends ControladorBase{
    public function __construct(){
        parent:: __construct();
    }
    public function index(){
        $configuracion=new Configuracion("configuracion");
        $idCurso = $_SESSION["idCurso"];
        $allconfiguraciones = $configuracion->buscarConfiguraciones($idCurso);
        
        $this->view("configuracion",array(
            "allconfiguraciones" => $allconfiguraciones,
            "Hola"=> "SALUDO PRUEBA"
        ));
        
    }
    public function crear(){
        if(isset($_POST["idCursoConf"])){
           

            $configuracionBBDD = new Configuracion("configuracion");

            $evaluacion1=$_POST["ev1Conf"];
            $ExEv1=$_POST["exEv1Conf"];
            $EjEv1=$_POST["ejEv1Conf"];
            $OtrosEv1=$_POST["otrosEv1Conf"];
            $evaluacion2=$_POST["ev2Conf"];
            $ExEv2=$_POST["exEv2Conf"];
            $EjEv2=$_POST["ejEv2Conf"];
            $OtrosEv2=$_POST["otrosEv2Conf"];
            $evaluacion3=$_POST["ev3Conf"];
            $ExEv3=$_POST["exEv3Conf"];
            $EjEv3=$_POST["ejEv3Conf"];
            $OtrosEv3=$_POST["otrosEv3Conf"];
            $MaxFaltas=$_POST["faltasConf"];
            $idUsuario =$_POST["idUsuarioConf"];
            $idCurso = $_POST["idCursoConf"];
            $idConfiguracion = $_POST["idConfConf"];

            

                                    
            $configuracionBBDD -> setEvaluacion1($evaluacion1);
            $configuracionBBDD -> setExEv1($ExEv1);
            $configuracionBBDD -> setEjEv1($EjEv1);
            $configuracionBBDD -> setOtrosEv1($OtrosEv1);
            $configuracionBBDD -> setEvaluacion2($evaluacion2);
            $configuracionBBDD -> setExEv2($ExEv2);
            $configuracionBBDD -> setEjEv2($EjEv2);
            $configuracionBBDD -> setOtrosEv2($OtrosEv2);
            $configuracionBBDD -> setEvaluacion3($evaluacion3);
            $configuracionBBDD -> setExEv3($ExEv3);
            $configuracionBBDD -> setEjEv3($EjEv3);
            $configuracionBBDD -> setOtrosEv3($OtrosEv3);
            $configuracionBBDD -> setMaxFaltas($MaxFaltas);
            $configuracionBBDD -> setIdusuario($idUsuario);
            $configuracionBBDD -> setIdcurso($idCurso);
            if(($evaluacion1+$evaluacion2+$evaluacion3<=100) AND ($ExEv1+$EjEv1+$OtrosEv1<=100) AND ($ExEv2+$EjEv2+$OtrosEv2<=100) AND ($ExEv3+$EjEv3+$OtrosEv3<=100) AND($MaxFaltas<=100)   ){
                $check = $configuracionBBDD->buscarConfiguraciones($idCurso);
                if($check==null){
                    $save = $configuracionBBDD->save();
                    
                } else{
                    $configuracionBBDD -> setId($idConfiguracion);
                    $update = $configuracionBBDD->update();
                    
                } 
            } else{
                
            }

            //Vemos si ya hay configuracion insertada
            /*$check = $configuracionBBDD->buscarConfiguraciones($idCurso);
            if($check==null){
                $save = $configuracionBBDD->save();
                
            } else{
                $configuracionBBDD -> setId($idConfiguracion);
                $update = $configuracionBBDD->update();
                
            } 
            
*/
                        
           
        }
        $this-> redirect("configuracion","index");
       
    }

    

}
?>