<!DOCTYPE HTML>
<HTML lang="es">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE> Actividades </TITLE>
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
                    <form class="form-horizontal" ACTION="<?PHP echo $helper->url("actividad","index") ?>" method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Actividades</button>
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
                <h3 class="text-center"> Lista de actividades realizadas en el curso: </h3>
            </div>
            <div class="col-sm-3"> </div>

        </div>
        <div class="row" >
            <div class="col-sm-9"> </div>
            <div class="col-sm-1">
                <a href="#ventanaInsertar" class="btn btn-dark col-sm-12 " data-toggle="modal">Insertar</a>
            </div>
            <div class="col-sm-1"> 
                <button class="btn btn-dark col-sm-12" onclick="exportCSV('actividades.csv')"> Exportar </button>
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
                            <th>Tipo</th>
                            <th>Ponderacion </th>
                            <th>Evaluacion</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($allactividades as $actividad){
                    ?>
                    <tr class="info text-center text-dark">
                    <th id="uno"> <?php echo $actividad->Nombre ; ?> </th>
                    <th class="small"> <?php echo $actividad->Tipo ; ?> </th>
                    <th class="small"> <?php echo $actividad->Ponderacion ; ?> </th>
                    <th class="small"> <?php echo $actividad->Evaluacion ; ?> </th>
                    <th hidden><?php echo $actividad->ID ; ?> </th>
                        
                    <th> 
                            <form class="form-horizontal" action="<?PHP echo $helper->url("actividad","borrar") ?>" method="post">
                                <div class="form-group">
                                    <div class="col-sm-offset-2" "col-sm-10">
                                            <input type="hidden" name="id" value=<?php echo $actividad->ID; ?>>
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
                                                <h4 class="modal-title"> Editar actividad:  </h4>
                                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-sm-12">
                                                <FORM class="form-horizontal" name="FormEditar" id="FormEditar" ACTION="<?PHP echo $helper->url("actividad","actualizar") ?>" method= "POST">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            Nombre: <input type="text" class="form-control" name="nombreEditar" id="nombreEditar" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Tipo: 
                                                        <select id="tipoEditar" name="tipoEditar">
                                                            <option value="uno">Examen </option>
                                                            <option value="dos">Ejercicio </option>
                                                            <option value="tres">Otros </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            Ponderación: <input type="text" class="form-control" name="ponderacionEditar" id="ponderacionEditar" >
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        Evaluación: 
                                                        <select id="evaluacionEditar" name="evaluacionEditar">
                                                            <option value="uno">1</option>
                                                            <option value="dos">2</option>
                                                            <option value="tres">3</option>
                                                        </select>
                                                    </div>
                                            
                                                    <input type="hidden" name="idUsuarioEditar" value=<?php echo $_SESSION["idUsuario"]; ?>>
                                                    <input type="hidden" name="idActividadEditar" id="idActividadEditar">   
                                                                                    
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
                    <th> 
                            <form class="form-horizontal" action="<?PHP echo $helper->url("actividad","indexInfoAlumno") ?>" method="post">
                                <div class="form-group">
                                    <div class="col-sm-offset-2" "col-sm-10">
                                            <input type="hidden" name="idActividad" value=<?php echo $actividad->ID; ?>>
                                            <button type="submit" class="btn btn-sm btn-success"> Calificar  </button>
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
                <div class="container">
                    <!--a href="#ventanaInsertar" class="btn btn-primary col-sm-2 " data-toggle="modal">Insertar actividad </a-->
                    <div class="modal fade" id="ventanaInsertar">
                        <div class="modal-dialog">
                            <div class="modal-content  ">
                                <div class="modal-header">
                                    <h4 class="modal-title"> Insertar actividad:</h4>
                                    <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-sm-12">
                                        <FORM class="form-horizontal" name="FormInsertar" id="FormInsertar" ACTION="<?PHP echo $helper->url("actividad","crear") ?>" method= "POST">
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Nombre: <input type="text" class="form-control" name="nombreInsertar" id="nombreInsertar" placeholder="Introduzca el nombre de la actividad">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Tipo: 
                                                        <select id="tipoInsertar" name="tipoInsertar">
                                                            <option value="uno">Examen </option>
                                                            <option value="dos">Ejercicio </option>
                                                            <option value="tres">Otros </option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Ponderación: <input type="text" class="form-control" name="ponderacionInsertar" id="ponderacionInsertar" placeholder="Porcentaje del valor en la evaluación sobre el total">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Evaluación: 
                                                        <select id="evaluacionInsertar" name="evaluacionInsertar">
                                                            <option value="uno">1 </option>
                                                            <option value="dos">2 </option>
                                                            <option value="tres">3 </option>
                                                        </select>
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
                <form class="form-horizontal" ACTION="<?PHP echo $helper->url("cursos","redireindexctIndex") ?>" method= "POST">
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
        
        
       document.forms["FormEditar"]["nombreEditar"].value = col1.trim();
       document.forms["FormEditar"]["ponderacionEditar"].value = col3.trim()*100;

       switch (col2) {
           case " Examen ":
                document.forms["FormEditar"]["tipoEditar"].selectedIndex=0;
                break;
            case " Ejercicio ":
                document.forms["FormEditar"]["tipoEditar"].selectedIndex=1;
                break;
            case " Otros ":
                document.forms["FormEditar"]["tipoEditar"].selectedIndex=2;
                break;
            default:
                break;
       }
       switch (col4) {
           case " 1 ":
                document.forms["FormEditar"]["evaluacionEditar"].selectedIndex=0;
                break;
            case " 2 ":
                document.forms["FormEditar"]["evaluacionEditar"].selectedIndex=1;
                break;
            case " 3 ":
                document.forms["FormEditar"]["evaluacionEditar"].selectedIndex=2;
                break;
            default:
                break;
       }
       document.forms["FormEditar"]["idActividadEditar"].value=col5;
              

    }) 


    $("#btnInsertar").click(function(){
            
            var nombre =document.forms["FormInsertar"]["nombreInsertar"].value.trim();
            var ponderacion=document.forms["FormInsertar"]["ponderacionInsertar"].value;
            
            var ponderacionCorrecta=false;

            var ponderacionFloat = parseFloat(ponderacion);
            var esNum=isNaN(ponderacionFloat);
            
            
            if((ponderacion<0)||(ponderacion >100) || (esNum == true)){
                ponderacionCorrecta=false;
            } else{
                ponderacionCorrecta=true;

            }

            var comparacion=((nombre.length==0) ||(ponderacion.length==0)|| (ponderacionCorrecta==false));
                        
            if(comparacion==true){
                alert("Los campos introducidos no son correctos. Todas las actividades deben tener nombre y ponderación. La ponderacion debe ser un número decimal entre 0 y 100.");
                return false;
            } 

        })

        $("#btnEditar").click(function(){
            
            var nombre =document.forms["FormEditar"]["nombreEditar"].value.trim();
            var ponderacion=document.forms["FormEditar"]["ponderacionEditar"].value;
            
            var ponderacionCorrecta=false;

            var ponderacionFloat = parseFloat(ponderacion);
            var esNum=isNaN(ponderacionFloat);
            
            
            if((ponderacion<0)||(ponderacion >100) || (esNum == true)){
                ponderacionCorrecta=false;
            } else{
                ponderacionCorrecta=true;

            }
            
            var comparacion=((nombre.length==0) ||(ponderacion.length==0)|| (ponderacionCorrecta==false));
                        
            if(comparacion==true){
                alert("Los campos introducidos no son correctos. Todas las actividades deben tener nombre y ponderación. La ponderacion debe ser un número decimal entre 0 y 100.");
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