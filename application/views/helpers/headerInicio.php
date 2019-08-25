<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>TICA</title>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap-dialog.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/cryptoJS.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<!--<li class="nav-item active">-->
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/inicio/index');?>">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/inicio/AcercaDe');?>">Acerca de </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" onclick="iniciarSesion()" href="#">Iniciar Sesión</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/inicio/registro'); ?>">Registro</a>
				</li>
			</ul>

			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" id="txtBuscar" type="buscar" placeholder="Buscar" aria-label="Buscar">
				<button id="btnBuscar" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
			</form>
		</div>
	</nav>

    <div class="modal fade" id="iniciarSesionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      	<div class="modal-dialog" role="document">
        	<div class="modal-content">
    			<div class="modal-header">
    				<h6 class="modal-title" id="exampleModalLabel">Iniciar sesión</h6>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
    				</button>
    			</div>
        		<div class="modal-body">
        			<form class="form-signin" method="post" id="formInicio" action="<?php echo base_url('index.php/inicio/ingresar'); ?>">
        				<h1 class="h3 mb-3 font-weight-normal">Usuario</h1>
        				<label for="inputEmail" class="sr-only">Correo</label>
        				<center><input type="email" id="inputEmail" name="email" class="form-control" placeholder="Correo" required="" autofocus=""></center>
                        <br>
        				<label for="inputPassword" class="sr-only">Contraseña</label>
        				<center><input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required=""></center>
        				<br>
        			</form>
					<a href="<?php echo base_url('index.php/inicio/recoverPass'); ?>">¿Olvidó su contraseña?</a>
        		</div>
        		<div class="modal-footer">
                	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrar">Cerrar</button>
                	<button type="button" class="btn btn-primary" id="btnIniciar">Iniciar sesión</button>
        		</div>
    	   </div>
        </div>
    </div>
