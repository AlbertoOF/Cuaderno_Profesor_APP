<!DOCTYPE HTML>
<HTML lang="es">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE> Alumnos </TITLE>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        
    </HEAD>
    <BODY>
        
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <form class="form-horizontal" ACTION="" method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Alumnos</button>
		                    </div>
	                    </div>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="form-horizontal" ACTION="<?PHP echo $helper->url("resumen","index") ?>" method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Resumen</button>
		                    </div>
	                    </div>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="form-horizontal" ACTION="<?PHP echo $helper->url("actividad","index") ?>" method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Actividades</button>
		                    </div>
	                    </div>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="form-horizontal" ACTION="<?PHP echo $helper->url("falta","index") ?>" method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Faltas</button>
		                    </div>
	                    </div>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="form-horizontal" ACTION="<?PHP echo $helper->url("alumno","indexCalificaciones") ?>" method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Calificaciones</button>
		                    </div>
	                    </div>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="form-horizontal" ACTION="<?PHP echo $helper->url("configuracion","index") ?>" method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Configuración</button>
		                    </div>
	                    </div>
                    </form>
                </li>
                <li class="nav-item">
                    <form class="form-horizontal" ACTION="<?PHP echo $helper->url("usuarios","redirectIndex") ?>" method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn btn-danger"> SALIR</button>
		                    </div>
	                    </div>
                    </form>
                </li>
            
            </ul>
        </nav>
         
        <div class="row">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6"> 
                <h3 class="text-center"> Alumnos matriculados en el curso: </h3>
            </div>
            <div class="col-sm-3"> </div>

        </div>
        
        <div class="row" >
            <div class="col-sm-9"> </div>
            <div class="col-sm-1">
                <a href="#ventanaInsertar" class="btn btn-dark col-sm-12 " data-toggle="modal">Insertar  </a>
            </div>
            <div class="col-sm-1"> 
                <button class="btn btn-dark col-sm-12" onclick="exportCSV('alumnos.csv')"> Exportar </button>
            </div>
            <div class="col-sm-1"> </div>

        </div>
        
        
        

        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
                <table class="table table-responsive-sm" id="tabla">
                    <thead class="table-dark">
                        <tr class="text-white-50 text-center">
                            <th>Nombre </th>
                            <th>Primer apellido</th>
                            <th>Segundo apellido </th>
                            <th>Fecha de nacimiento</th>
                            <th>Teléfono</th>
                            <th>E-Mail</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($allalumnos as $alumno){
                    ?>
                    <tr class="info text-center text-dark ">
                    <th class="small" id="uno"> <?php echo $alumno->Nombre ; ?> </th>
                    <th class="small"> <?php echo $alumno->Apellido1 ; ?> </th>
                    <th class="small"> <?php echo $alumno->Apellido2 ; ?> </th>
                    <th class="small"> <?php echo $alumno->FechaNac ; ?> </th>
                    <th class="small"> <?php echo $alumno->Telefono ; ?> </th>
                    <th class="small"> <?php echo $alumno->Mail ; ?> </th>
                    <th hidden><?php echo $alumno->ID ; ?> </th>
                        
                    <th> 
                            <form class="form-horizontal" action="<?PHP echo $helper->url("alumno","borrar") ?>" method="post">
                                <div class="form-group">
                                    <div class="col-sm-offset-2" "col-sm-10">
                                            <input type="hidden" name="id" value=<?php echo $alumno->ID; ?>>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return ConfirmDelete()"> Borrar </button>
                                    </div>
                                </div>
                            </form> 
                    </th>
                    <th> 
                                                
                            <div class="container">
                                <a href="#ventanaEditar" class="btn btn-sm btn-warning" data-toggle="modal" >Modificar </a>
                                <div class="modal fade text-left" id="ventanaEditar">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"> Editar alumno:  </h4>
                                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-sm-12">
                                                <FORM class="form-horizontal" name="FormEditar" id="FormEditar" ACTION="<?PHP echo $helper->url("alumno","actualizar") ?>" method= "POST">
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Nombre: <input type="text" class="form-control" name="nombreEditar" id="nombreEditar" >
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Primer apellido: <input type="text" class="form-control" name="ap1Editar" id="ap1Editar" >
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Segundo apellido: <input type="text" class="form-control" name="ap2Editar" id="ap2Editar" >
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Fecha de nacimiento: <input type="date" class="form-control" name="fNacEditar" id="fNacEditar">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Telefono: <input type="text" class="form-control" name="telefonoEditar" id="telefonoEditar" >
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        E-mail: <input type="email" class="form-control" name="mailEditar" id="mailEditar" >
                                                    </div>
                                            </div>
                                            <input type="hidden" name="idUsuarioEditar" value=<?php echo $_SESSION["idUsuario"]; ?>>
                                            <input type="hidden" name="idAlumnoEditar" id="idAlumnoEditar">   
                                                                                    
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" class="btn-primary" name="btnEditar" id="btnEditar" value="Actualizar">
                                                </div>
                                            </div>
                                        </FORM>
                                            
                                                </div> 
                                            </div>
                                            <div class="modal-footer">
                                                <button tyle="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">SALIR </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                    </th>
                    

                    </tr> 
                    <?php   
                    }
                
                    ?>
                    </tbody>
                </table>
            </div>
            </div class="col-sm-1">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
                <div class="container">
                    <!--a href="#ventanaInsertar" class="btn btn-primary col-sm-2 " data-toggle="modal">Insertar alumno </a-->
                    <div class="modal fade" id="ventanaInsertar">
                        <div class="modal-dialog">
                            <div class="modal-content  ">
                                <div class="modal-header">
                                    <h4 class="modal-title"> Insertar alumno:</h4>
                                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-sm-12">
                                        <FORM class="form-horizontal" name="FormInsertar" id="FormInsertar" ACTION="<?PHP echo $helper->url("alumno","crear") ?>" method= "POST">
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Nombre: <input type="text" class="form-control" name="nombreInsertar" id="nombreInsertar" placeholder="Introduzca el nombre del alumno">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Primer apellido: <input type="text" class="form-control" name="ap1Insertar" id="ap1Insertar" placeholder="Introduzca el primer apellido del alumno">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Segundo apellido: <input type="text" class="form-control" name="ap2Insertar" id="ap2Insertar" placeholder="Introduzca el segundo apellido del alumno">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Fecha de nacimiento: <input type="date" class="form-control" name="fNacInsertar" id="fNacInsertar">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Telefono: <input type="text" class="form-control" name="telefonoInsertar" id="telefonoInsertar" placeholder="Introduzca el teléfono del alumno: 9 cifras">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        E-mail: <input type="email" class="form-control" name="mailInsertar" id="mailInsertar" placeholder="Introduzca el e-mail del alumno">
                                                    </div>
                                            </div>
                                            <input type="hidden" name="idUsuario" value=<?php echo $_SESSION["idUsuario"]; ?>>
                                            <input type="hidden" name="idCurso" value=<?php echo $_SESSION["idCurso"]; ?>>

                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" class="btn btn-primary" name="btnInsertar" id="btnInsertar" value="Insertar">
                                                </div>
                                            </div>
                                        </FORM>
                                    </div> 
                                </div>
                                <div class="modal-footer">
                                    <button tyle="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">SALIR </button>
                                </div>
                                </div>
                            
                        </div>
                    </div>
                </div>  
            </div>
            <div class="col-sm-1">
            </div>

        </div>
        
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
                <form class="form-horizontal" ACTION="<?PHP echo $helper->url("cursos","index") ?>" method= "POST">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-dark col-sm-2"> Volver</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-1">
            </div>
        </div>
        

        
        
        
          
        


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </BODY>
    
    <script>
    $('.table tbody').on('click','.btn',function(){
        var currow = $(this).closest('tr');
        var col1= currow.find('th:eq(0)').text();
        var col2= currow.find('th:eq(1)').text();
        var col3= currow.find('th:eq(2)').text();
        var col4= currow.find('th:eq(3)').text();
        var col5= currow.find('th:eq(4)').text();
        var col6= currow.find('th:eq(5)').text();
        var col7= currow.find('th:eq(6)').text();
        
       document.forms["FormEditar"]["nombreEditar"].value = col1;
       document.forms["FormEditar"]["ap1Editar"].value = col2;
       document.forms["FormEditar"]["ap2Editar"].value = col3; 
       document.forms["FormEditar"]["fNacEditar"].value = col4.trim(); 
       document.forms["FormEditar"]["telefonoEditar"].value = col5; 
       document.forms["FormEditar"]["mailEditar"].value = col6; 
       document.forms["FormEditar"]["idAlumnoEditar"].value=col7;
       
              

    }) 

    $("#btnInsertar").click(function(){
            
            var nombre =document.forms["FormInsertar"]["nombreInsertar"].value.trim();
            var apellido1=document.forms["FormInsertar"]["ap1Insertar"].value.trim();
            var apellido2=document.forms["FormInsertar"]["ap2Insertar"].value.trim();
            var fechaNac=document.forms["FormInsertar"]["fNacInsertar"].value.trim();
            var tlfn=document.forms["FormInsertar"]["telefonoInsertar"].value.trim();
            var mail=document.forms["FormInsertar"]["mailInsertar"].value.trim();
            
            var telefonoCorrecto = false;
            var telefonoEntero= parseInt(tlfn);
            var esNum=isNaN(telefonoEntero);
            
            if((tlfn.length !=9) || (esNum==true)) {
                telefonoCorrecto=false;
            } else{
                telefonoCorrecto=true;
            }
            
            var comparacion=((nombre.length==0) ||(apellido1.length==0) || (apellido2.length==0)|| (fechaNac.length==0)|| (tlfn.length==0)|| (mail.length==0)|| (telefonoCorrecto==false));
                
            if(comparacion==true){
                alert("Los campos introducidos no son correctos. El teléfono debe tner 9 cifras y el correo electrónico debe tener el formato usuario@dominio.sufijo");
                return false;
            } 
            
            
        })
        $("#btnEditar").click(function(){
            
            var nombre =document.forms["FormEditar"]["nombreEditar"].value.trim();
            var apellido1=document.forms["FormEditar"]["ap1Editar"].value.trim();
            var apellido2=document.forms["FormEditar"]["ap2Editar"].value.trim();
            var fechaNac=document.forms["FormEditar"]["fNacEditar"].value.trim();
            var tlfn=document.forms["FormEditar"]["telefonoEditar"].value.trim();
            var mail=document.forms["FormEditar"]["mailEditar"].value.trim();

            var telefonoEntero= parseInt(tlfn);
            
            var telefonoCorrecto = false;
            
            var esNum=isNaN(telefonoEntero);
            
            if((tlfn.length != 9) ||(esNum==true) ){
                telefonoCorrecto=false;
            } else{
                telefonoCorrecto=true;
            }
                       
            
            var comparacion=((nombre.length==0) ||(apellido1.length==0) || (apellido2.length==0)|| (fechaNac.length==0)|| (tlfn.length==0)|| (mail.length==0)|| (telefonoCorrecto==false));
                        
            if(comparacion==true){
                alert("Los campos introducidos no son correctos. El teléfono debe tner 9 cifras y el correo electrónico debe tener el formato usuario@dominio.sufijo");
                return false;
            } 
            
            
        })

        function ConfirmDelete(){
            var respuesta = confirm("¿Esta seguro/a?");
            if(respuesta == true){
                return true;

            } else{
                return false;
                
            }
        }

        function downloadCSV(csv,filename){
            var csvFile;
            var downloadLink;
            csvFile = new Blob([csv], {type:'text/csv'});
            downloadLink = document.createElement("a");
            downloadLink.download = filename;
            downloadLink.href = window.URL.createObjectURL(csvFile);
            downloadLink.style.display="none";
            document.body.appendChild(downloadLink);
            downloadLink.click();
        }

        function exportCSV(filename){
            var csv = [];
            var rows = document.querySelectorAll("table tr");

            for(var i=0;i<rows.length;i++){
                var row = [], cols= rows[i].querySelectorAll("th");
                for(var j=0;j<cols.length;j++){
                    row.push(cols[j].innerText);
                    
                }
                csv.push(row.join(","));
                //csv.push(row);
            }
            downloadCSV(csv.join("\n"),filename)
            
        }

    </script>
    

   
    
</HTML>