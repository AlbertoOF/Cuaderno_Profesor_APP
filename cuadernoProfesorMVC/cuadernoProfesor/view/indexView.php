<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <title>Cuaderno del profesor</title>
  </head>
  <body class="bg-light">
		<div class="row bg-light">
			<div class="col-sm-3">  </div>
			<div class="col-sm-6"> 
				<h1 class="text-center font-italic">Cuaderno del profesor</h1>
			</div>
		    <div class="col-sm-3">  </div>
		</div>
		<div class="row bg-light ">
			<div class="col-sm-4">  </div>
			<div class="col-sm-6 center"> 
				<form class="form-horizontal"  ACTION="<?PHP echo $helper->url("usuarios","BuscarUsuario") ?>" method= "POST">
					<div class="form-group">
						<label class="control-label col-sm-2" for="usuario">Usuario: </label>
						<div class="col-sm-7">
							<input type="usuario" class="form-control" name="usuario" id="usuario" placeholder="Inserte el nombre de usuario">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="psw">Password: </label>
						<div class="col-sm-7">
							<input type="password" class="form-control" name="psw" id="psw" placeholder="Inserte el password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-7">
							<button type="submit" class="btn btn-primary" name="btnEnviar" id="btnEnviar"> Enviar </button>
						</div>
					</div>
				</form>

				<form class="form-horizontal" ACTION="<?PHP echo $helper->url("usuarios","redirectCrearUsuario") ?>" method= "POST">
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-7">
							<button type="submit" class="btn btn-primary"> Crear cuenta de usuario</button>
						</div>
					</div>
				</form>
			</div>
		    <div class="col-sm-2">  </div>
		</div>

    	
		

	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>

  

</html>