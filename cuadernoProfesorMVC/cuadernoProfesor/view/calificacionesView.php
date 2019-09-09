<!DOCTYPE HTML>
<HTML lang="es">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE> Calificaciones </TITLE>
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
                    <form class="form-horizontal" ACTION="<?PHP echo $helper->url("alumno","indexCalificaciones") ?>"method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Calificaciones</button>
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
                    <form class="form-horizontal" ACTION=" <?PHP echo $helper->url("falta","index") ?>" method= "POST">
	                    <div class="form-group">
		                     <div class="col-sm-offset-2 col-sm-10">
			                     <button type="submit" class="btn"> Faltas</button>
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
                <h3 class="text-center"> Calificaciones de los alumnos: </h3>
            </div>
            <div class="col-sm-3"> </div>

        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-10">
                <table class="table table-responsive-sm" id="tabla">
                    <thead class="table-dark">
                        <tr class="text-white-50 text-center">
                            <th>Nombre </th>
                            <th>Evaluacion 1</th>
                            <th>Evaluacion 2</th>
                            <th>Evaluacion 3</th>
                            <th>Final evaluación continua</th>
                            <th>Final 1</th>
                            <th>Final 2</th>
                            <th></th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($allalumnos as $alumno){
                    ?>
                    <tr class="info text-center text-dark">
                    <th > <?php echo $alumno->Nombre." ".$alumno->Apellido1." ".$alumno->Apellido2  ; ?> </th>
                    <th class="small">
                            
                                <div>
                                    <?php echo $alumno->Evaluacion1 ; ?>
                                    
                                </div>
                                <div>
                                    <form class="form-horizontal" action="<?PHP echo $helper->url("alumno","calificarEvaluacion") ?>" method="post">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2" "col-sm-10">
                                                <input type="hidden" name="idUsuarioCalificar" value=<?php echo $_SESSION["idUsuario"]; ?>>
                                                <input type="hidden" name="idCursoCalificar" value=<?php echo $_SESSION["idCurso"]; ?>>
                                                <input type="hidden" name="idAlumnoCalificar" value=<?php echo $alumno->ID ;  ?>>
                                                <input type="hidden" name="idEvCalificar" value="1">
                                                <button type="submit" class="btn btn-sm btn-primary"> Calificar </button>
                                        </div>
                                    </div>
                                </form> 
                                </div>
                                
                            
                    </th>
                    <th class="small">
                            
                                <div>
                                    <?php echo $alumno->Evaluacion2 ; ?>
                                </div>
                                <div>
                                    <form class="form-horizontal" action="<?PHP echo $helper->url("alumno","calificarEvaluacion") ?>" method="post">
                                        <div class="form-group">
                                            <div class="col-sm-offset-2" "col-sm-10">
                                                <input type="hidden" name="idUsuarioCalificar" value=<?php echo $_SESSION["idUsuario"]; ?>>
                                                <input type="hidden" name="idCursoCalificar" value=<?php echo $_SESSION["idCurso"]; ?>>
                                                <input type="hidden" name="idAlumnoCalificar" value=<?php echo $alumno->ID ;  ?>>
                                                <input type="hidden" name="idEvCalificar" value="2">
                                                <button type="submit" class="btn btn-sm btn-primary"> Calificar </button>
                                            </div>
                                        </div>
                                    </form> 
                                </div>
                                
                            
                    </th>
                    <th class="small">
                            
                                <div>
                                    <?php echo $alumno->Evaluacion3 ; ?>
                                </div>
                                <div>
                                    <form class="form-horizontal" action="<?PHP echo $helper->url("alumno","calificarEvaluacion") ?>" method="post">
                                        <div class="form-group">
                                            <div class="col-sm-offset-2" "col-sm-10">
                                                    <input type="hidden" name="idUsuarioCalificar" value=<?php echo $_SESSION["idUsuario"]; ?>>
                                                    <input type="hidden" name="idCursoCalificar" value=<?php echo $_SESSION["idCurso"]; ?>>
                                                    <input type="hidden" name="idAlumnoCalificar" value=<?php echo $alumno->ID ;  ?>>
                                                    <input type="hidden" name="idEvCalificar" value="3">
                                                    <button type="submit" class="btn btn-sm btn-primary"> Calificar </button>
                                            </div>
                                        </div>
                                    </form> 
                                </div>
                            
                    </th>
                    
                    <th class="small">
                    <form class="form-horizontal"  ACTION="<?PHP echo $helper->url("alumno","calificarEvaluacionEvCFinal") ?>" method= "POST">
                                <div class="form-group">
                                        
                                            <div>
                                            <?php echo $alumno->CalificacionFinal ; ?>                 
                                            </div>
                                            <div>
                                                <input type="hidden" name="idCursoCalificar" value=<?php echo $_SESSION["idCurso"]; ?>>
                                                <input type="hidden" name="idAlumnoCalificar" value=<?php echo $alumno->ID ;  ?>>
                                                <button type="submit" class="btn btn-sm btn-primary"> Calificar</button>  
                                            </div>
                                        
                                </div>
                            </form>
                    </th>
                    <th class="small">
                    <form class="form-horizontal"  ACTION="<?PHP echo $helper->url("alumno","calificarFinal1") ?>" method= "POST">
                                <div class="form-group">
                                        <div class="row">
                                            <div>
                                                <input type="hidden" name="idCursoCalificar" value=<?php echo $_SESSION["idCurso"]; ?>>
                                                <input type="hidden" name="idAlumnoCalificar" value=<?php echo $alumno->ID ;  ?>>
                                                <input type="text" class="form-control" name="final1" id="final1" value="<?php echo $alumno->CalificacionFinal2 ; ?> ">  
                                                                                            
                                            </div>
                                            <div>
                                                <button type="submit" name="calFinal1" id = "calFinal1" class="btn btn-sm btn-primary"> Calificar</button>  
                                            </div>
                                        </div>
                                </div>
                            </form>
                            
                    </th>
                    <th class="small">
                    <form class="form-horizontal"  ACTION="<?PHP echo $helper->url("alumno","calificarFinal2") ?>" method= "POST">
                                <div class="form-group">
                                        <div class="row">
                                            <div>
                                                <input type="hidden" name="idCursoCalificar" value=<?php echo $_SESSION["idCurso"]; ?>>
                                                <input type="hidden" name="idAlumnoCalificar" value=<?php echo $alumno->ID ;  ?>>
                                                <input type="text" class="form-control" name="final2" id="final2" value="<?php echo $alumno->CalificacionFinal3 ; ?>" >  
                                                                                            
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-sm btn-primary" name="calFinal3" id="calFinal3"> Calificar</button>  
                                            </div>
                                        </div>
                                </div>
                            </form>
                            
                    </th>
                    <th hidden><?php echo $alumno->ID ; ?> </th>
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
                            <button type="submit" class="btn btn-dark col-sm-2" name="volver" id="volver"> Volver</button>
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
    
    
    
    

   
    
</HTML>