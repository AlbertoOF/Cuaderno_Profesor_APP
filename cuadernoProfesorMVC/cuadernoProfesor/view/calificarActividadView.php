<!DOCTYPE HTML>
<HTML lang="es">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE> Calificar actividad </TITLE>
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
                <h3 class="text-center"> Calificación del instrumento de evaluación: </h3>
            </div>
            <div class="col-sm-3"> </div>

        </div>
        <div class="row" >
            <div class="col-sm-9"> </div>
            <div class="col-sm-1"> </div>
            <div class="col-sm-1"> 
                <button class="btn btn-dark col-sm-12" onclick="exportCSV('calificacionActividad.csv')"> Exportar </button>
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
                            <th> Nota </th>
                            <th></th>
                            <th> </th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($allAlumnosActividad as $alumno){
                    ?>
                    <tr class="info text-center text-dark">
                    <th > <?php echo $alumno->Nombre ; ?> </th>
                    <th class="small" > <?php echo $alumno->Nota ; ?> </th>
                    <th hidden><?php echo $alumno->Id ; ?> </th>
                    <th>
                            <form class="form-horizontal" name="formCalificar" id= "formCalificar" ACTION="<?PHP echo $helper->url("actividad","calificar") ?>" method= "POST">
                                <div class="form-group">
                                        <div class="row">
                                            <div>
                                                <input type="text" class="form-control" name="calificacionInsertar" id="calificacionInsertar" placeholder="Nota">  
                                                <input type="hidden" name="idAlumno" value=<?php echo $alumno->Id; ?> >
                                                <input type="hidden" name="idActividad" value=<?php echo $alumno->IdActividad; ?> >
                                                <?php $_SESSION["idActividad"] = $alumno->IdActividad ; ?>
                                                
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-sm btn-primary" name="btnCalificar" id="btnCalificar"> Calificar</button>  
                                            </div>
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