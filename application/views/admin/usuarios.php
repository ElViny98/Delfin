<div id="main-content" class="content-main" style="height: 1000px; padding:3%;">

	<div class="contenidoTabla " id="divVerUsuarios">
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
				$table='
				<table class="table table-condensed" style="border-collapse:collapse;">
						<thead>
						</thead>
						<tbody>
				';
				foreach($consulta->result() as $q)
				{
					$table.= '
								<tr data-toggle="collapse" data-target="#demo'.$q->idUsuarios.'" class="accordion-toggle">
									<td></td><td></td>
									<td><p style="font-weight: 600; font-size: 20px">'.$q->Nombre.' '.$q->ApPaterno.' '.$q->ApMaterno.'</p></td>
									<td><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></td>
									<td></td>
								</tr>
								<tr >
									<td colspan="6" class="hiddenRow">
										<div class="accordian-body collapse" id="demo'.$q->idUsuarios.'">
											<div class="row">
													<div class="col-md-2">
													</div>
													<div class="col-md-4">
														<img style="width: 200px; height: 200px;" src="http://localhost:8080/Delfin/assets/img/'.$q->Img.'" />
													</div>
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-3">
																<label>Institución</label>
															</div>
															<div class="col-md-5">
																<p>'.$q->idUsuarios.'</p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label>Correo</label>
															</div>
															<div class="col-md-5">
																<p>'.$q->Telefono.'</p>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label>Telefono</label>
															</div>
															<div class="col-md-5">
																<p>'.$q->Correo.'</p>
															</div>
														</div>
													</div>
											</div>
										</div>
									</td>
								</tr>
					';
				}
				$table.='
					</tbody>
				</table>
				';
				echo $table;
			?>
		</div>
	</div>
</div>
</body>
<script src="<?php echo base_url('assets/js/sidebar.js'); ?>"></script>
<script type="text/javascript">
	function verDetalles(index) {
	}
</script>
</html>
