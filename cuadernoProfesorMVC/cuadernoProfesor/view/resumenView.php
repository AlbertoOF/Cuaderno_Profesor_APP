<!DOCTYPE HTML>
<HTML lang="es">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE> Resumen alumnos </TITLE>
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
                <h3 class="text-center"> Información general de los alumnos: </h3>
            </div>
            <div class="col-sm-3"> </div>

        </div>
        <div class="row" >
            <div class="col-sm-10"> </div>
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
                            <th> Nombre </th>
                            <th>Evaluación 1</th>
                            <th>Evaluación 2</th>
                            <th>Evaluación 3</th>
                            <th>Final Ev.continua</th>
                            <th>Final 1</th>
                            <th>Final 2</th>
                            <th> Nº de faltas </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                    <?php
                    foreach ($allresumenes as $resumen){
                        
                    ?>
                    <tr class="info text-center">
                        <th><?php echo $resumen->Nombre." ".$resumen->Apellido1." ".$resumen->Apellido2 ; ?>  </th>
                        <th class="small"><?php echo $resumen->Evaluacion1; ?> </th>
                        <th class="small"><?php echo $resumen->Evaluacion2; ?></th>
                        <th class="small"><?php echo $resumen->Evaluacion3 ;?></th>
                        <th class="small"><?php echo $resumen->CalificacionFinal; ?></th>
                        <th class="small"><?php echo $resumen->CalificacionFinal2; ?></th>
                        <th class="small"><?php echo $resumen->CalificacionFinal3; ?></th>
                        <th class="small"><?php echo $resumen->nFaltas ; ?> </th>
                        
                    <th> 
                            
                    </th>
                    <th> 
                                                
                            
                    </th>
                    <th> 
                            
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
            <div class="col-sm-5">
                <h4 class="text-center">Avisos sobre mayorías de edad:</h4>
                <table class="table table-responsive-sm" >
                    <thead class="table-dark">
                        <tr class="text-white-50 text-center">
                            <th> Nombre </th>
                            <th>Edad del alumno</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark text-center">
                        <?php
                            foreach ($allMayores as $mayores){
                        
                        ?>
                        <tr class="info">
                            <th><?php echo $mayores->Nombre." ".$mayores->Apellido1." ".$mayores->Apellido2 ; ?>  </th>
                                                
                            <th class="small"> 
                            <?php 
                                    echo $mayores->Edad. " años";
                            ?>     
                            </th>
                        </tr> 
                        <?php
                            }
                        ?>
                </tbody>
                    
                    </tbody>
                </table>
                
            </div>
            
            <div class="col-sm-5">
                <h4 class="text-center">Avisos pérdida de evaluación continua:</h4>
                <table class="table table-responsive-sm" >
                    <thead class="table-dark">
                        <tr class="text-white-50 text-center">
                            <th> Nombre </th>
                            <th>Faltas / total</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark text-center">
                        <?php
                                foreach ($allfaltas as $perdida){
                            
                            ?>
                            <tr class="info">
                                <th>
                                    <?php 
                                        if($perdida->faltasTotales >$perdida->HorasTotales ){
                                            echo $perdida->Nombre." ".$perdida->Apellido1." ".$perdida->Apellido2 ; 
                                        } 
                                    ?>  
                                </th>
                                                    
                                <th class="small"> 
                                <?php 
                                        if($perdida->faltasTotales >$perdida->HorasTotales ){
                                            echo $perdida->faltasTotales." / ".round($perdida->HorasTotales,2)." faltas";
                                        }
                                ?>     
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
        <br>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-2">
            <form class="form-horizontal" ACTION="<?PHP echo $helper->url("cursos","index") ?>" method= "POST">
	        <div class="form-group">
		         <div class="col-sm-offset-2 col-sm-12">
			         <button type="submit" class="btn btn-danger"> Volver</button>
		        </div>
	         </div>
         </form>
            </div>
            <div class="col-sm-9">
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
        
       document.forms["FormEditar"]["nombreEditar"].value = col1;
       document.forms["FormEditar"]["nHorasEditar"].value = col4;
       
        switch (col2) {
           case " FPB ":
                document.forms["FormEditar"]["etapaEditar"].selectedIndex=2;
                break;
            case " Bachillerato ":
                document.forms["FormEditar"]["etapaEditar"].selectedIndex=1;
                break;
            case " ESO ":
                document.forms["FormEditar"]["etapaEditar"].selectedIndex=0;
                break;
            case " FPGM ":
                document.forms["FormEditar"]["etapaEditar"].selectedIndex=3;
                break;
            case " FPGS ":
                document.forms["FormEditar"]["etapaEditar"].selectedIndex=4;
                break;
            default:
                
                break;
       }
       switch (col3) {
           case " 1 ":
                document.forms["FormEditar"]["cursoEditar"].selectedIndex=0;
                break;
            case " 2 ":
                document.forms["FormEditar"]["cursoEditar"].selectedIndex=1;
                break;
            case " 3 ":
                document.forms["FormEditar"]["cursoEditar"].selectedIndex=2;
                break;
            case " 4 ":
                document.forms["FormEditar"]["cursoEditar"].selectedIndex=3;
                break;
            
            default:
                
                break;
       }
       document.forms["FormEditar"]["idCursoEditar"].value=col5;
              

    }) 


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
                if(cols[0].innerText =="Nombre"){
                    csv.push(row.join(","));
                }
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