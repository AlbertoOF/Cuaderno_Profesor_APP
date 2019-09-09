<?php
class UsuariosController extends ControladorBase{
    public function __construct(){
        parent:: __construct();
    }
    public function index(){
        $usuario=new Usuario("Usuarios");
        $allusers = $usuario->getAll();
        $this->view("index",array(
            "allusers" => $allusers,
            "Hola"=> "SALUDO PRUEBA"
        ));
    }
    public function crear(){
        if(isset($_POST["Nombre"])){
           

            $usuario = new Usuario("Usuarios");

            $nombre=$_POST["Nombre"];
            $Apellido1=$_POST["Apellido1"];
            $Apellido2=$_POST["Apellido2"];
            $Password=$_POST["Password"];
            $Mail=$_POST["Mail"];

            $usuario -> setNombre($nombre);
            $usuario -> setApellido1($Apellido1);
            $usuario -> setApellido2($Apellido2);
            $usuario -> setPassword($Password);
            $usuario -> setMail($Mail);
            
            $save = $usuario->save();
        }
        $this-> redirect("Usuarios","index");
    }
    public function borrar(){
        if(isset($_GET["Id"])){
            $Id = (int)$_GET["Id"];
            $usuario = new Usuario();
            $usuario->deleteById($Id);
            $this-> redirect();
        }
    }
    public function BuscarUsuario(){
        $usuarioBBDD = new Usuario("Usuarios");
        $Usuario=$_POST["usuario"];
        $Password=$_POST["psw"];

        $usuarioBBDD -> setUsuario($Usuario);
        $usuarioBBDD -> setPassword($Password);

        $Existe=false;
        if(isset($Usuario) && isset($Password)){
            $search = $usuarioBBDD->search();
                      
            if($search > 0){
                SESSION_START();
                $_SESSION["idUsuario"]=$search;
                //$this->redirectCursos();
                $this-> redirect("Cursos","index");
            } else{
                $this->redirectIndex();
            }
            
        }else{
            $this->redirectIndex();
        }
    }
    public function redirectCrearUsuario(){
        $this->view("crearUsuario",array(
            "Hola"=> "SALUDO PRUEBA"
        ));
    }
    public function redirectIndex(){
        $this->view("index",array(
            "Hola"=> "SALUDO PRUEBA"
        ));
    }
    public function redirectCursos(){
        $this->view("cursos",array(
            "Hola"=> "SALUDO PRUEBA",
                   
        ));
    }
}
?>