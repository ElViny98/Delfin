<div class="contenidoTabla" id="divVerUsuarios">
	<div class="container-fluid" style="margin-bottom: 5%;">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-9 col-xl-9">
				<h2>Usuarios</h2>
			</div>
			<div class="col-xs-12 col-md-4 col-lg-3 col-xl-3">
				<a href="<?php echo base_url('index.php/admin/newUsuario'); ?>" style="width: 100%;" class="btn btn-primary"><li class="fa fa-plus-circle"></li>&nbspNuevo</a>
			</div>
		</div>
	</div>
	<hr>
	<div class="container noticias">
		<?php
			foreach($consulta->result() as $q)
			{
				echo '
				<div class="row new-container">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 col-xl-8" style="margin-bottom: 10px;">
						<a href="'.base_url('index.php/user/vernoticia?id='.$q->idUsuarios).'" class="link-new">'.$q->Nombre.'</a>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2" style="margin-bottom: 10px;">
						<button type="button" class="btn btn-success btn-new" onclick="modificar('.$q->idUsuarios.')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbspModificar</button>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2" style="margin-bottom: 10px;">
						<button type="button" class="btn btn-danger btn-new" onclick="borrar('.$q->idUsuarios.')"><i class="fa fa-times" aria-hidden="true"></i>&nbspEliminar</button>
					</div>
				</div>
				';
			}
		?>
	</div>
</div>
