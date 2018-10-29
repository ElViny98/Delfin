<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-dialog.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/cryptoJS.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">

    <div class="Imagen" >
    <img src="<?php echo base_url('assets/img/logolargo.png');?>">
    </div>

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
    		</div>
    		<div class="modal-footer">
            	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            	<button type="button" class="btn btn-primary" id="btnIniciar">Iniciar sesión</button>
    		</div>
	   </div>
    </div>
</div>

  </body>
  <script type="text/javascript">
	function iniciarSesion(){
		$("#iniciarSesionModal").modal('show');
	}
	 
	$("#btnIniciar").on('click', function() {
		var pass = CryptoJS.MD5(document.getElementById('inputPassword').value);
		console.log(pass.toString());
		var data = 'email=' + $("#inputEmail").val() + '&password=' + pass.toString();
		var init = new XMLHttpRequest();
		init.onreadystatechange = function() {
			if(init.readyState == 4 && init.status == 200) {
				if(init.responseText == "0")
					alert('Contraseña o correo incorrectos');
				else
					alert('Inicio de sesión correcto');
			}
		}
		init.open('POST', '<?php echo base_url('index.php/inicio/ingresar'); ?>', true);
		init.setRequestHeader('Content-type', 'applitcation/x-www-form-urlenconded');
		init.send(data);
		console.log(pass.toString());
	});
  </script>
</html>
