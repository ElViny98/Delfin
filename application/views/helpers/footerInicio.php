	<!-- Footer -->
	<footer class="page-footer font-small footer-dark">
	  <br>
	  <h2>Contactanos</h2><!---->
	  <form class="form-horizontal" action="/action_page.php">
		  <div class="form-group" >
			  <div class="row">
				  <div class="col-lg-6 col-md-6 col-sm-6" >
					  <div class="row">
						  <div class="col-lg-12">
							<label class="control-label col-lg text-left" for="email">Email:</label>
							<input type="email" class="form-control" id="email" placeholder="Enter email">

							<label class="control-label col-lg text-left" for="cnombre">Nombre Completo:</label>
							<input type="cnombre" class="form-control" id="cnombre" placeholder="Nombre y Apellidos">

							<label class="control-label col-lg text-left" for="casunto">Asunto:</label>
							<input type="cnombre" class="form-control" id="casunto" placeholder="Asunto">
						  </div>
					  </div>
				  </div>
				  <div class="col-lg-6 col-md-6 col-sm-6">
					  <div class="row">
						  <div class="col-lg-12">
							<label class="control-label col-lg text-left" for="mensaje">Mensaje:</label>
							<textarea class="form-control" rows="7" id="cmensaje"></textarea>
						  </div>
					  </div>
				  </div>
			  </div>
			  <div class="row">
				<div class="col-lg">
				  <button type="cenviar" class="btn btn-default" id="btnEnviar">Enviar</button>
				</div>
			  </div>
		  </div>
	  </form>
	  <div class="col-lg footer-copyright text-center py-3">
			© 2018
	  </div>
	</footer>
	<!-- Footer -->
  </body>
	<script type="text/javascript" src="<?php echo base_url('assets/js/noticias.js'); ?>"></script>
  	<script type="text/javascript">
		var url = '<?php echo base_url('index.php/inicio/ingresar'); ?>';
		function iniciarSesion(){
			$("#iniciarSesionModal").modal('show');
		}

		$("#btnIniciar").on('click', function() {
			var pass = CryptoJS.MD5(document.getElementById('inputPassword').value);
			console.log(pass.toString());
			var data = {
				email: $("#inputEmail").val(),
				password: pass.toString()
			}
			$.post(url, data, function(data) {
				switch(data) {
					case "0":
						alert('Usuario y/o contraseña incorrectos.');
						break;

					case "1":
						location.href = '<?php echo base_url('index.php/admin'); ?>';
						break;

					case "2":
						location.href = '<?php echo base_url('index.php/user'); ?>';
						break;

					default:
						alert('Error de conexión');
						break;
				}
			});
		});
	</script>
</html>
