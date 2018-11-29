
<div class="contenidoTabla" id="divVerInstituciones">
	<div class="container-fluid" >
		<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-9 col-xl-9 container" >
				  <h1>Instituciones</h1>
						<?php $table='
					<table class="table table-condensed" style="border-collapse:collapse;">
							<thead>
							</thead>
							<tbody>
					';
			 foreach ($consulta->result() as $q)

				{
					$table.='
					<tr data-toggle="collapse" data-target="#demo'.$q->idInstitucion.'" class="accordion-toggle">
							<td><p style="font-weight: 600; font-size: 20px">'.$q->Nombre.'</p></td>
							<td><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></td>
						<td></td>
					</tr>
					<tr >
						<td colspan="6" class="hiddenRow">
							<div class="accordian-body collapse" id="demo'.$q->idInstitucion.'">
									<div class="row">
											<div class="col-md-6">
													<label>Nombre</label>
											</div>
											<div class="col-md-6" >
													<input type="text" class="form-control" id="txtNombre" name="txtNombre" value="'.$q->Nombre.'">
											</div>
									</div>
									<div class="row">
											<div class="col-md-6">
													<label>Pais</label>
											</div>
											<div class="col-md-6" >
													<select id="txtpaisInst" name="txtpaisInst" class="form-control">
																<option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
																';
																	foreach ($paises->result() as $pais) {
																			$table.='<option value="'.$pais->id.'">'.$pais->name.'</option>';
																	}
												$table.='
													</select>
											</div>
									</div>
									<div class="row">
											<div class="col-md-6">
													<label>Estado</label>
											</div>
											<div class="col-md-6">
													<select class="form-control" id="txtEstadoInst" name="txtEstadoInst">
															<option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option></select>
											</div>
									</div>
									<div class="row">
											<div class="col-md-6">
													<label>Código Postal</label>
											</div>
											<div class="col-md-6" >
													<input type="text" class="form-control" id="txtCP" name="txtNombre" value="'.$q->cp.'">
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

            <br>

				</div>
        </div>
	</div>
</div>
<script type="text/javascript">
	function verDetalles(index) {
	}
	$("#txtpaisInst").change(function() {
			$.ajax({
					url: '<?php echo base_url('index.php/user/getRegions?countryId='); ?>' + this.value,
					type: 'GET',
					success: function(data) {
							var sel = document.getElementById("txtEstadoInst");
							sel.remove(sel.selectedIndex);
							document.getElementById('txtEstadoInst').innerHTML = data;
					}
			});
	})
</script>
