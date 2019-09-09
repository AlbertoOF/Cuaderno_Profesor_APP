<?php
class Configuracion extends EntidadBase{
    private  $Id, $Idusuario, $Idcurso,$MaxFaltas,$Evaluacion1,$Evaluacion2,$Evaluacion3,$ExEv1,$EjEv1,$OtrosEv1,$ExEv2,$EjEv2,$OtrosEv2,$ExEv3,$EjEv3,$OtrosEv3;

    public function __construct($table){
        $table="alumnos";
        parent:: __construct($table);
    }
    public function getId(){
        return $this->Id;
    }
    public function setId($Id){
        $this->Id = $Id;
    }
    public function getMaxFaltas(){
        return $this->MaxFaltas;
    }
    public function setMaxFaltas($MaxFaltas){
        $this->MaxFaltas = $MaxFaltas;
    }
    public function getEvaluacion1(){
        return $this->Evaluacion1;
    }
    public function setEvaluacion1($Evaluacion1){
        $this->Evaluacion1 = $Evaluacion1;
    }
    public function getExEv1(){
        return $this->ExEv1;
    }
    public function setExEv1($ExEv1){
        $this->ExEv1 = $ExEv1;
    }
    public function getEjEv1(){
        return $this->EjEv1;
    }
    public function setEjEv1($EjEv1){
        $this->EjEv1 = $EjEv1;
    }
    public function getOtrosEv1(){
        return $this->OtrosEv1;
    }
    public function setOtrosEv1($OtrosEv1){
        $this->OtrosEv1 = $OtrosEv1;
    }
    public function getEvaluacion2(){
        return $this->Evaluacion2;
    }
    public function setEvaluacion2($Evaluacion2){
        $this->Evaluacion2 = $Evaluacion2;
    }
    public function getExEv2(){
        return $this->ExEv2;
    }
    public function setExEv2($ExEv2){
        $this->ExEv2 = $ExEv2;
    }
    public function getEjEv2(){
        return $this->EjEv2;
    }
    public function setEjEv2($EjEv2){
        $this->EjEv2 = $EjEv2;
    }
    public function getOtrosEv2(){
        return $this->OtrosEv2;
    }
    public function setOtrosEv2($OtrosEv2){
        $this->OtrosEv2 = $OtrosEv2;
    
    }
    public function getEvaluacion3(){
        return $this->Evaluacion3;
    }
    public function setEvaluacion3($Evaluacion3){
        $this->Evaluacion3 = $Evaluacion3;
    }
    public function getExEv3(){
        return $this->ExEv3;
    }
    public function setExEv3($ExEv3){
        $this->ExEv3 = $ExEv3;
    }
    public function getEjEv3(){
        return $this->EjEv3;
    }
    public function setEjEv3($EjEv3){
        $this->EjEv3 = $EjEv3;
    }
    public function getOtrosEv3(){
        return $this->OtrosEv3;
    }
    public function setOtrosEv3($OtrosEv3){
        $this->OtrosEv3 = $OtrosEv3;
    
    }

    public function getIdcurso(){
        return $this->Idcurso;
    }
    public function setIdcurso($Idcurso){
        $this->Idcurso = $Idcurso;
    }
    public function getIdusuario(){
        return $this->Idusuario;
    }
    public function setIdusuario($Idusuario){
        $this->Idusuario = $Idusuario;
    }
    
    
    
    public function buscarConfiguraciones($idCurso){
        $query = $this->getdb()->query("SELECT * FROM configuracion WHERE  IdCurso='".$idCurso."' ORDER BY ID DESC ");
        while ($row = $query-> fetch_object()){
            $resultSet[] = $row;
        }
        return $resultSet;
    }

    public function save(){
        $query = "INSERT INTO configuracion(ID,Evaluacion1,ExEv1,EjEv1,OtrosEv1,Evaluacion2,ExEv2,EjEv2,OtrosEv2,Evaluacion3,ExEv3,EjEv3,OtrosEv3,PorcentajeMaxFaltas,IdUsuario,IdCurso) VALUES (Null,"
        ."'".$this->Evaluacion1."',"
        ."'".$this->ExEv1."',"
        ."'".$this->EjEv1."',"
        ."'".$this->OtrosEv1."',"
        ."'".$this->Evaluacion2."',"
        ."'".$this->ExEv2."',"
        ."'".$this->EjEv2."',"
        ."'".$this->OtrosEv2."',"
        ."'".$this->Evaluacion3."',"
        ."'".$this->ExEv3."',"
        ."'".$this->EjEv3."',"
        ."'".$this->OtrosEv3."',"
        ."'".$this->MaxFaltas."',"
        ."'".$this->Idusuario."',"
        ."'".$this->Idcurso."'"
        .");";
        $save = $this->getdb()->query($query);
        return $save;
    }

    

    public function update(){
        $query="UPDATE configuracion SET Evaluacion1 = '".$this->Evaluacion1."',ExEv1 = '".$this->ExEv1."',EjEv1 = '".$this->EjEv1."',OtrosEv1 = '".$this->OtrosEv1."',Evaluacion2 = '".$this->Evaluacion2."',ExEv2 = '".$this->ExEv2."',EjEv2 = '".$this->EjEv2."',OtrosEv2 = '".$this->OtrosEv2."',Evaluacion3 = '".$this->Evaluacion3."',ExEv3 = '".$this->ExEv3."',EjEv3 = '".$this->EjEv3."',OtrosEv3 = '".$this->OtrosEv3."',PorcentajeMaxFaltas = '".$this->MaxFaltas."'  WHERE ID='".$this->Id."'";
        $update= $this->getdb()->query($query);
        return $update;
    }
    

}
?>