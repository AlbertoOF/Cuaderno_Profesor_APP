<!DOCTYPE HTML>
<HTML lang="es">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE> Configuración </TITLE>
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
                    <form class="form-horizontal" ACTION="" method= "POST">
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
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <h3 class="text-center">Configuración del curso: </h3>
            </div>
            <div class="col-sm-3">
            </div>
             
        </div>
        
        <div class="row">
            <div class="col-sm-1 ">
                
            </div>
            <div class="col-sm-11 ">
                <?php
                    foreach($allconfiguraciones as $configuracion){
                ?>
                <FORM class="form-horizontal" name="FormConfiguracion" id="FormConfiguracion" ACTION="<?PHP echo $helper->url("configuracion","crear") ?>" method= "POST">
                    <div class="form-group">
                     <div class="row">
                          <div class="col-sm-3 ">
                              <strong>Evaluación 1: </strong>  <input type="text" class="form-control" name="ev1Conf" id="ev1Conf" value="<?php echo $configuracion->Evaluacion1 ; ?> " >
                                 <hr>
                                 Examen Ev1: <input type="text" class="form-control" name="exEv1Conf" id="exEv1Conf" value="<?php echo $configuracion->ExEv1 ; ?>"  >
                                 Ejercicios Ev1: <input type="text" class="form-control" name="ejEv1Conf" id="ejEv1Conf" value="<?php echo $configuracion->EjEv1 ; ?>" >
                                 Otros Ev1: <input type="text" class="form-control" name="otrosEv1Conf" id="otrosEv1Conf" value="<?php echo $configuracion->OtrosEv1 ; ?>" >
                            </div>
                           <div class="col-sm-3">
                                <strong>Evaluación 2:</strong>  <input type="text" class="form-control" name="ev2Conf" id="ev2Conf" value="<?php echo $configuracion->Evaluacion2 ; ?>" >
                                <hr>
                                Examen Ev2: <input type="text" class="form-control" name="exEv2Conf" id="exEv2Conf" value="<?php echo $configuracion->ExEv2 ; ?>" >
                                Ejercicios E2: <input type="text" class="form-control" name="ejEv2Conf" id="ejEv2Conf" value="<?php echo $configuracion->EjEv2 ; ?>" >
                                Otros Ev2: <input type="text" class="form-control" name="otrosEv2Conf" id="otrosEv2Conf" value="<?php echo $configuracion->OtrosEv2 ; ?>" >
                           </div>
                           <div class="col-sm-3">
                                <strong>Evaluación 3:</strong>  <input type="text" class="form-control" name="ev3Conf" id="ev3Conf" value="<?php echo $configuracion->Evaluacion3 ; ?>" >
                                <hr>
                                Examen Ev3: <input type="text" class="form-control" name="exEv3Conf" id="exEv3Conf" value="<?php echo $configuracion->ExEv3 ; ?>" >
                                Ejercicios Ev3: <input type="text" class="form-control" name="ejEv3Conf" id="ejEv3Conf" value="<?php echo $configuracion->EjEv3 ; ?>" >
                                Otros Ev3: <input type="text" class="form-control" name="otrosEv3Conf" id="otrosEv3Conf" value="<?php echo $configuracion->OtrosEv3 ; ?>" >
                            
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-sm-9">
                            <hr>
                            <strong>Porcentaje máximo de ausencias:</strong>  <input type="text" class="form-control" name="faltasConf" id="faltasConf" value="<?php echo $configuracion->PorcentajeMaxFaltas ; ?>" >
                            </div>
                         </div>
                    </div>
                    <input type="hidden" name="idUsuarioConf" value=<?php echo $_SESSION["idUsuario"]; ?>>
                    <input type="hidden" name="idCursoConf" value=<?php echo $_SESSION["idCurso"]; ?>>
                    <input type="hidden" name="idConfConf" value=<?php echo $configuracion->ID ; ?> >
                    <div class="form-group">
                         <div class="col-sm-5">
                            <input type="submit" name="btnActualizar" id= "btnActualizar" class=" btn btn-primary col-sm-4" value="Actualizar">
                            </div>
                        </div>
                </FORM>
                <?php   
                }
               
                ?>
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
    $(document).ready(function(){
        $("#btnActualizar").click(function(){
            var evaluacion1 =$("#ev1Conf").val().trim();
            var evaluacion2 =$("#ev2Conf").val().trim();
            var evaluacion3 =$("#ev3Conf").val().trim();
            var exEv1 =$("#exEv1Conf").val();
            var ejEv1 =$("#ejEv1Conf").val();
            var otrosEv1 =$("#otrosEv1Conf").val();
            var exEv2 =$("#exEv2Conf").val();
            var ejEv2 =$("#ejEv2Conf").val();
            var otrosEv2 =$("#otrosEv2Conf").val();
            var exEv3 =$("#exEv3Conf").val();
            var ejEv3 =$("#ejEv3Conf").val();
            var otrosEv3 =$("#otrosEv3Conf").val();
            var faltas =$("#faltasConf").val();

                        
            var e1=parseInt(evaluacion1);
            var e2=parseInt(evaluacion2);
            var e3=parseInt(evaluacion3);
            var examenEv1 = parseInt(exEv1);
            var ejercicioEv1 = parseInt(ejEv1);
            var otrosEv1 = parseInt(otrosEv1);
            var examenEv2 = parseInt(exEv2);
            var ejercicioEv2 = parseInt(ejEv2);
            var otrosEv2 = parseInt(otrosEv2);
            var examenEv3 = parseInt(exEv3);
            var ejercicioEv3 = parseInt(ejEv3);
            var otrosEv3 = parseInt(otrosEv3);
            var faltasTotales = parseInt(faltas);

            var totalEvaluacion = e1 + e2 +e3;
            var totalEv1 = examenEv1 + ejercicioEv1 + otrosEv1;
            var totalEv2 = examenEv2 + ejercicioEv2 + otrosEv2;
            var totalEv3 = examenEv3 + ejercicioEv3 + otrosEv3;
            
            if(totalEvaluacion>100){
                alert("La suma de las tres evaluaciones no puede ser superior a 100");
            } else if(totalEv1>100){
                alert("La suma de los tres instrumentos evaluativos de la evaluacion 1 no puede ser superior a 100");
            } else if(totalEv2>100){
                alert("La suma de los tres instrumentos evaluativos de la evaluacion 2 no puede ser superior a 100");
            }else if(totalEv3>100){
                alert("La suma de los tres instrumentos evaluativos de la evaluacion 3 no puede ser superior a 100");
            }else if(faltasTotales>100   ){
                alert("El porcentaje máximo de ausencias no justificadas debe ser 100");
            }
            
            

        })
    })
    </script>
    

   
    
</HTML>