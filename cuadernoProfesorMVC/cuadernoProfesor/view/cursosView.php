<!DOCTYPE HTML>
<HTML lang="es">
    <HEAD>
        <META CHARSET="UTF-8">
        <TITLE> Cursos </TITLE>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        
    </HEAD>
    <BODY class="bg-light">

        <div class="row">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6"> 
                <h3 class="text-center"> Seleccione o inserte un nuevo curso: </h3>
            </div>
            <div class="col-sm-3"> </div>

        </div>

        <div class="row" >
            <div class="col-sm-9"> </div>
            <div class="col-sm-1"> </div>
            <div class="col-sm-1"> 
                <a href="#ventanaInsertar" class="btn btn-dark col-sm-12  " data-toggle="modal">Insertar </a>
            </div>
            <div class="col-sm-1"> </div>

        </div>

         <div class="row">
            <div class="col-sm-1">
            </div>       
            <div class="col-sm-10 table-responsive-sm">
                <table class="table" id="tabla">
                    <thead class="table-dark">
                        <tr class="text-white-50 text-center">
                            <th> Asignatura </th>
                            <th> Etapa</th>
                            <th> Curso</th>
                            <th> Número de horas </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($allcursos as $curso){
                    ?>
                    <tr class="info text-center text-dark">
                    <th id="uno" > <?php echo $curso->Nombre ; ?> </th>
                    <th class="small"> <?php echo $curso->Etapa ; ?> </th>
                    <th class="small"> <?php echo $curso->Curso ; ?> </th>
                    <th class="small"> <?php echo $curso->nHoras ; ?> </th>
                    <th hidden><?php echo $curso->ID ; ?> </th>
                        
                    <th > 
                            <form class="form-horizontal" action="<?PHP echo $helper->url("cursos","borrar") ?>" method="post">
                                <div class="form-group">
                                    <div class="col-sm-offset-2" "col-sm-10">
                                            <input type="hidden" name="id" value=<?php echo $curso->ID; ?>>
                                            <button type="submit" class="btn btn-danger" onclick=" return ConfirmDelete()"> Borrar </button>
                                    </div>
                                </div>
                            </form> 
                    </th>
                    <th> 
                                                
                            <div class="container">
                                <a href="#ventanaEditar" class="btn btn-warning" data-toggle="modal" >Modificar </a>
                                <div class="modal fade text-left" id="ventanaEditar">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"> Editar curso:  </h4>
                                                <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="col-sm-12">
                                        <FORM class="form-horizontal" id="FormEditar" name="FormEditar" ACTION="<?PHP echo $helper->url("cursos","actualizar") ?>" method= "POST">
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Nombre: <input type="text" class="form-control" name="nombreEditar" id="nombreEditar" >
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Etapa: 
                                                        <select id="etapaEditar" name="etapaEditar">
                                                            <option value="uno">ESO </option>
                                                            <option value="dos">Bachillerato </option>
                                                            <option value="tres">FP Básica </option>
                                                            <option value="cuatro">FP GM </option>
                                                            <option value="cinco">FP GS </option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <div class="col-sm-12">
                                                            Curso: 
                                                            <select id="cursoEditar" name="cursoEditar">
                                                                <option value="uno"> 1</option>
                                                                <option value="dos"> 2</option>
                                                                <option value="tres"> 3 </option>
                                                                <option value="cuatro"> 4 </option>
                                                            </select>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    Número de horas: <input type="text" class="form-control" name="nHorasEditar" id ="nHorasEditar"  >
                                                </div>
                                            </div>
                                            <input type="hidden" name="idUsuarioEditar" value=<?php echo $_SESSION["idUsuario"]; ?>>
                                            <input type="hidden" name="idCursoEditar" id="idCursoEditar">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" class="btn-primary" name="btnActualizar" id="btnActualizar" value="Actualizar">
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
                            <!-- fin prueba -->
                    </th>
                    <th> 
                            <form class="form-horizontal" action="<?PHP echo $helper->url("cursos","redirectResumen") ?>" method="post">
                                
                                <div class="form-group">
                                    <div class="col-sm-offset-2" "col-sm-10">
                                            <input type="hidden" name="id" value=<?php echo $curso->ID; ?>>
                                            <button type="submit" class="btn btn-success"> Ir </button>
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
            <div class="col-sm-10 text-dark">
                    <div class="container">
                        <!--a href="#ventanaInsertar" class="btn btn-primary col-sm-2  " data-toggle="modal">Insertar curso </a-->
                        <div class="modal fade" id="ventanaInsertar">
                            <div class="modal-dialog">
                                <div class="modal-content  ">
                                    <div class="modal-header">
                                        <h4 class="modal-title"> Insertar curso </h4>
                                        <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times; </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-sm-12">
                                            <FORM class="form-horizontal" name="FormInsertarCurso" id="FormInsertarCurso" ACTION="<?PHP echo $helper->url("cursos","crear") ?>" method= "POST">
                                                <div class="form-group">
                                                        <div class="col-sm-12">
                                                            Nombre: <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduzca el nombre de la asignatura/modulo">
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <div class="col-sm-12">
                                                            Etapa: 
                                                            <select id="etapa" name="etapa">
                                                                <option value="uno">ESO </option>
                                                                <option value="dos">Bachillerato </option>
                                                                <option value="tres">FP Básica </option>
                                                                <option value="cuatro">FP GM </option>
                                                                <option value="cinco">FP GS </option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <div class="col-sm-12">
                                                                Curso: 
                                                                <select id="curso" name="curso">
                                                                    <option value="uno"> 1</option>
                                                                    <option value="dos"> 2</option>
                                                                    <option value="tres"> 3 </option>
                                                                    <option value="cuatro"> 4 </option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        Número de horas: <input type="text" class="form-control" name="nHoras" id="nHoras" placeholder="Introduzca el número de horas anuales">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="idUsuario" value=<?php echo $_SESSION["idUsuario"]; ?>>
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
                <form class="form-horizontal" ACTION="<?PHP echo $helper->url("usuarios","redirectIndex") ?>" method= "POST">
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-12">
                        <button type="submit" class="btn btn-dark col-sm-2"> SALIR</button>
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

    $("#btnInsertar").click(function(){
            
            var nombre =document.forms["FormInsertarCurso"]["nombre"].value.trim();
            var nHoras=document.forms["FormInsertarCurso"]["nHoras"].value.trim();
            
            
            
            var comparacion=((nombre.length==0) ||(nHoras.length==0)|| (nHoras < 0));

            if(comparacion==true){
                alert("Los campos Nombre y número de horas son obligatorios. Además el número de horas debe ser mayor o igual a 0");
                return false;
            } 
            
        })
        $("#btnActualizar").click(function(){
            var nombre =document.forms["FormEditar"]["nombreEditar"].value.trim();
            var nHoras=document.forms["FormEditar"]["nHorasEditar"].value.trim();
            
            var comparacion=((nombre.length==0) ||(nHoras.length==0) || (nHoras < 0));
                        

            if(comparacion==true){
                alert("Los campos Nombre y número de horas son obligatorios. Además el número de horas debe ser mayor o igual a 0");
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
    </script>
    

   
    
</HTML>