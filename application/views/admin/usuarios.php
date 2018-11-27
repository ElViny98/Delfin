<div class="contenidoTabla" id="divVerUsuarios">
	<div class="container-fluid" >
		<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-9 col-xl-9 container" >
				<h2>Usuarios</h2>
			</div>
			<div class="col-xs-12 col-md-4 col-lg-3 col-xl-3 container ">
				<a href="<?php echo base_url('index.php/admin/newUsuario'); ?>" style="width: 100%;" class="btn btn-primary"><li class="fa fa-plus-circle"></li>&nbspNuevo</a>
			</div>

		</div>
<hr>
	</div>

	<div class="container">
		<?php
			foreach($consulta->result() as $q)
			{
				echo '
				<div class="row new-container">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 col-xl-8" style="margin-bottom: 10px;">
						<p style="font-weight: 600; font-size: 20px">'.$q->Nombre.' '.$q->ApPaterno.' '.$q->ApMaterno.'</p>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2" style="margin-bottom: 10px;">
						<button type="button" class="btn btn-success btn-new" onclick="verDetalles('.$q->idUsuarios.')"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i>&nbspVer Detalles</button>
					</div>
				</div>
				<div class="row new-container" style="display:none;" id="user-'.$q->idUsuarios.'">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 col-xl-4">
							<label>Institución</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6">
							<p>'.$q->idUsuarios.'</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 col-xl-4">
							<label>Correo</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6">
							<p>'.$q->idUsuarios.'</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-3 col-lg-4 col-xl-4">
							<label>Telefono</label>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-5 col-lg-6 col-xl-6">
							<p>'.$q->idUsuarios.'</p>
						</div>
					</div>
				</div>
				';
			}
		?>
	</div>
</div>
<script type="text/javascript">
	function verDetalles(index) {
	}
</script>
