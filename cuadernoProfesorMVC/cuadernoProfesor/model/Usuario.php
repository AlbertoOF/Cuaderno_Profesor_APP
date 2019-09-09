<?php
class Usuario extends EntidadBase{
    private $User, $Id,$Password,$Nombre,$Apellido1,$Apellido2,$Mail;

    public function __construct($table){
        $table="usuarios";
        parent:: __construct($table);
    }
    public function getUsuario(){
        return $this->User;
    }
    public function setUsuario($User){
        $this->User = $User;
    }
    public function getId(){
        return $this->Id;
    }
    public function setId($Id){
        $this->Id = $Id;
    }
    public function getPassword(){
        return $this->Password;
    }
    public function setPassword($Password){
        $this->Password = $Password;
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
    public function getMail(){
        return $this->Mail;
    }
    public function setMail($Mail){
        $this->Mail = $Mail;
    }
    public function save(){
        $query = "INSERT INTO usuarios(Id,Usuario,Password,Nombre,Apellido1,Apellido2,Mail) VALUES (Null,"
        ."'".$this->Nombre."',"
        ."'".$this->Password."',"
        ."'".$this->Nombre."',"
        ."'".$this->Apellido1."',"
        ."'".$this->Apellido2."',"
        ."'".$this->Mail."'"
        .");";
        
        $save = $this->getdb()->query($query);
        return $save;
    }
    /*public function search(){
        $Existe = false;
        $query = $this->getdb()->query("SELECT * FROM usuarios where Usuario='".$this->User."' and Password='".$this->Password."';");
        if ($row = $query-> fetch_object()){
            $Existe  = true;
        }
        /*$query="SELECT * from usuarios WHERE Usuario='".$this->User."' and Password='".$this->Password."';";
        $usuario = $this->ejecutarSql($query);*/
        /*return $Existe;
    }*/
    public function search(){
        $idUser = 0;
        $query = $this->getdb()->query("SELECT * FROM usuarios where Usuario='".$this->User."' and Password='".$this->Password."';");
        while ($row = $query-> fetch_assoc()){
            $idUser  = $row["Id"];
        }
        /*$query="SELECT * from usuarios WHERE Usuario='".$this->User."' and Password='".$this->Password."';";
        $usuario = $this->ejecutarSql($query);*/
        return $idUser;
    }
    

}
?>