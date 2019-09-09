<!DOCTYPE HTML>
<HTML lang="es">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE> Cuaderno del profesor </TITLE>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        
    </HEAD>
    <BODY class="bg-light">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <h3 class="text-center"> Crear cuenta de usuario: </h3>
            </div>
            <div class="col-4">
            </div>
                
        </div>
        <div class="row">
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                
            </div>
            <div class="col-4">
                
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                <FORM class="form-horizontal" name="newUserForm"id="newUserForm" ACTION="<?PHP echo $helper->url("usuarios","crear") ?>" method= "POST">
                        <div class="form-group">
                            <div class="col-sm-12">
                                Nombre*: <input type="text"  class="form-control" name="Nombre" id="Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                Apellido1*: <input type="text" class="form-control" name="Apellido1" id="Apellido1">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                Apellido2*: <input type="text" class="form-control" name="Apellido2" id ="Apellido2">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                Mail: <input type="email" class="form-control" name="Mail">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                Password*: <input type="password" class="form-control" name="Password" id="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" name="btnEnviar" id="btnEnviar" class="btn btn-primary" value="Enviar">
                            </div>
                        </div>
                </FORM>
            </div>
            <div class="col-sm-4">
                
            </div>
                
        </div>
        <div class="row">
            <div class="col-sm-3">
                
            </div>
            <div class="col-sm-4">
                <div class="col-sm-10">
                        
                        <FORM class="form-horizontal" ACTION="<?PHP echo $helper->url("usuarios","redirectIndex") ?>" method= "POST">
                            <input type="submit" class="btn btn-danger" value="Volver">
                        </FORM>
                        
                </div>
            </div>
            <div class="col-5">
                
            </div>
        </div>

        
            
            
        
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    </BODY>

    <script>
    $(document).ready(function(){
        
        $("#btnEnviar").click(function(){
            
            var nombre =document.forms["newUserForm"]["Nombre"].value.trim();
            var apellido1=document.forms["newUserForm"]["Apellido1"].value.trim();
            var apellido2=document.forms["newUserForm"]["Apellido2"].value.trim();
            var psw=document.forms["newUserForm"]["Password"].value.trim();
            var comparacion = (((nombre.length ==0) || (apellido1.length==0) || (apellido2.length==0)|| (psw.length==0)));
            
           console.log(comparacion);
            if(comparacion==true){
                alert("Los campos Nombre, Apellido1 , apellido2 y contraseña son obligatorios");
                return false;
            } 
            
        })
        
    })
    </script>
    

</HTML>