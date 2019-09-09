<?php 
    class ControladorBase{
        public function __construct(){
            require_once 'EntidadBase.php';
            require_once 'ModeloBase.php';

            foreach(glob("model/*.php") as $file){
                require_once $file;

            }
        }
        public function view($vista,$datos){
            foreach($datos as $id_assoc=>$valor){
                ${$id_assoc} = $valor;
            }
            require_once 'core/AyudaVistas.php';
            $helper = new AyudaVistas();
            require_once 'view/'.$vista.'View.php';
        }
        public function redirect($controlador ,$accion ){
            echo $accion ."";
            header("location:index.php?controller=".$controlador."&action=".$accion);

        }
    }
?>