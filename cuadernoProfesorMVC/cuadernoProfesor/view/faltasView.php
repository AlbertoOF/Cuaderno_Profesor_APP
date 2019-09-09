<!DOCTYPE HTML>
<HTML lang="es">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE> Faltas </TITLE>
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
                    <form class="form-horizontal" ACTION="<?PHP echo $helper->url("falta","index") ?>"method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Faltas</button>
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
                    <form class="form-horizontal" ACTION="<?PHP echo $helper->url("alumno","index") ?>" method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Alumnos</button>
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
                <h3 class="text-center"> Faltas del alumno: </h3>
            </div>
            <div class="col-sm-3"> </div>
        </div>
        <div class="row" >
            <div class="col-sm-9"> </div>
            <div class="col-sm-1"> </div>
            <div class="col-sm-1"> 
                <button class="btn btn-dark col-sm-12" onclick="exportCSV('nFaltasAlumno.csv')"> Exportar </button>
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
                            <th>Faltas totales</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($allalumnos as $alumno){
                    ?>
                    <tr class="info text-center text-dark">
                    <th > <?php echo $alumno->Nombre. " ".$alumno->Apellido1. " ".$alumno->Apellido2 ; ?> </th>
                    <th hidden><?php echo $alumno->ID ; ?> </th>
                    <th class="small"> <?php echo $alumno->faltasTotales." /".$alumno->HorasTotales ; ?> </th>
                                            
                    <th> 
                                                
                            <div class="container">
                                <a href="#ventanaponerFalta" class="btn btn-sm btn-danger" data-toggle="modal" >Poner falta </a>
                                <div class="modal fade text-left" id="ventanaponerFalta">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"> Poner falta:  </h4>
                                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-sm-12">
                                                <FORM class="form-horizontal" name="FormFalta" id="FormFalta" ACTION="<?PHP echo $helper->url("falta","crear") ?>" method= "POST">
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Fecha: <input type="date" class="form-control" name="fechaFalta" id="fechaFalta" >
                                                    </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Número de faltas: <input type="text" class="form-control" name="nFaltasFalta" id="nFaltasFalta" placeholder="Número de faltas del día" >
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Observaciones: <input type="text" class="form-control" name="ObservacionesFalta" id="ObservacionesFalta" placeholder="Observaciones" >
                                                    </div>
                                            </div>
                                            <input type="hidden" name="idUsuarioFalta" value=<?php echo $_SESSION["idUsuario"]; ?>>
                                            <input type="hidden" name="idCursoFalta" value=<?php echo $_SESSION["idCurso"]; ?>>
                                            <input type="hidden" name="idAlumnoFalta" id="idAlumnoFalta">   
                                                                                    
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" class=" btn-primary" name="btnInsertar" id="btnInsertar" value="Insertar">
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
                    <th>
                    <form class="form-horizontal" action="<?PHP echo $helper->url("falta","indexInfoAlumno") ?>" method="post">
                                <div class="form-group">
                                    <div class="col-sm-offset-2" "col-sm-10">
                                            <input type="hidden" name="idVerFalta" value=<?php echo $alumno->ID; ?>>
                                            
                                            <button type="submit" class=" btn btn-sm btn-success"> Ver faltas </button>
                                    </div>
                                </div>
                            </form> 
                    </th>
                    

                    </tr> 
                    <?php   
                    }
                
                    ?>
                    
                    </tbody>
                </table>
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
               
           
       document.forms["FormFalta"]["idAlumnoFalta"].value=col2;
              

    })
    
    $("#btnInsertar").click(function(){
        var fecha =document.forms["FormFalta"]["fechaFalta"].value.trim();
        var numFaltas=document.forms["FormFalta"]["nFaltasFalta"].value;
        var observaciones=document.forms["FormFalta"]["ObservacionesFalta"].value.trim();

        var numFaltasEntero= parseInt(numFaltas);
        var esNum=isNaN(numFaltasEntero);
        var faltasCorrecto = false;
        if((esNum==true) ||(numFaltas<0) ){
                faltasCorrecto=false;
            } else{
                faltasCorrecto=true;
            }

        var comparacion=((fecha.length==0) ||(numFaltas.length==0)|| (faltasCorrecto==false));
        if(comparacion==true){
                alert("Los campos introducidos no son correctos.Debe haber información en todos los campos. El número de faltas debe ser un número entero mayor o igual a 0");
                return false;
            } 
            
            
        })
    //}  

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