<div id="main-content" class="content-main" style="height: 1000px; padding:3%;">

	<div class="modal fade" id="PermitirUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
		  <div class="modal-header">
			<h6 class="modal-title" id="exampleModalLabel">Restringir Permisos</h6>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		  </div>
			<div class="modal-body" >
				<p>Permitir Acceso</p>
			</div>
				  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrar3" >Cancelar</button>
						<button type="button" class="btn btn-primary"  id="btnAceptar3">Aceptar</button>
				  </div>

			<script type="text/javascript">
			  function cambiarPermiso(){
				$("#permisoUserModal").modal('show');
			  }
				  $("#btnCerrar3").on('click', function() {
					  var elmnt = document.getElementById("PermitirUserModal");
					  var index = elmnt.getAttributeNode("index").value;
					  var check='0';
					  editarCheck(index,check);

			  });
			</script>
		 </div>
		</div>
	</div>
	<div class="modal fade" id="BloquearUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
		  <div class="modal-header">
			<h6 class="modal-title" id="exampleModalLabel">Restringir Permisos</h6>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		  </div>
			<div class="modal-body" >
				<p>Dloquear Acceso</p>
			</div>
				  <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrar4">Cancelar</button>
						<button type="button" class="btn btn-primary"  id="btnAceptar4">Aceptar</button>
				  </div>

			<script type="text/javascript">
			  function cambiarPermiso(){
				$("#permisoUserModal").modal('show');
			  }
				  $("#btnCerrar4").on('click', function() {
					  var elmnt = document.getElementById("BloquearUserModal");
					  var index = elmnt.getAttributeNode("index").value;
					  var check='1';
					  editarCheck(index,check);
			  });
			</script>
		 </div>
		</div>
	</div>

	<div class="contenidoTabla " id="divVerUsuarios">
		<div class="container-fluid" >
			<div class="row">
				<div class="col-md-1">

				</div>
					<h2>Usuarios</h2>
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
				$x=0;
				foreach($consulta->result() as $q)
				{
					$st = '';
					if($q->status == 1)
						$st = 'checked';

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
													<div class="col-md-3">
														<img style="width: 200px; height: 200px;" src="http://localhost:8080/Delfin/assets/img/'.$q->Img.'" />
													</div>
													<div class="col-md-7">
														<div class="row">
															<div class="col-md-3">
																<label>Institución</label>
															</div>
															<div class="col-md-5">
																<p>'.$q->institucion.'</p>
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
														<br>
														<div class="row">
															<div class="col-md-5">
																<button type="button" name="button" value="upload" class="btn btn-primary" onclick="" >Ver Detalles</button>
															</div>
														</div>
														<div class="row">
															<div class="col-md-5"></div>
															<div class="col-md-5">
																<label class="switch">
																<input type="checkbox" class="chkUser" name="checkStatus" onclick="editarPermiso('.$q->idUsuarios.','.$x.')" '.$st.'>
																<span class="slider round"></span>
																</label>
																<label style="font-size:18px;">Permitir accesso</label>
															</div>
														</div>
														<br>

													</div>
											</div>
										</div>
									</td>
								</tr>
					';
					$x=$x+1;
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
	var inputs = document.getElementsByClassName('chkUser');
	function editarPermiso(index,x){
		var modalVal = document.createAttribute('attr');
		modalVal.value = index;
		var modalVal2 = document.createAttribute('index');
		modalVal2.value = x;
		if(this.checked) {
			document.getElementById('PermitirUserModal').setAttributeNode(modalVal);
			document.getElementById('PermitirUserModal').setAttributeNode(modalVal2);
			$("#PermitirUserModal").modal('show');
		} else {
			document.getElementById('BloquearUserModal').setAttributeNode(modalVal);
			document.getElementById('BloquearUserModal').setAttributeNode(modalVal2);
			$("#BloquearUserModal").modal('show');
		}

	}
	function editarCheck(index,op) {
		var inputs2 = document.getElementsByClassName('chkUser');
		if (op=='0') {
			inputs2[index].checked=false;
		}else if (op=='1') {
			inputs2[index].checked=true;
		}

	}

	$("#btnAceptar4").on('click', function() {
		$.ajax({
			url: '<?php echo base_url('index.php/admin/permisoUsuario'); ?>',
			data: { id: document.getElementById('BloquearUserModal').getAttribute('attr'), p: 0 },
			type: 'POST',
			success: function(ans) {
				switch(ans) {
					case '1':
						alert('Usuario bloqueado');
						document.getElementById('btnCerrar4').click();
						break;

					case '2':
						alert('Error');
						break;
				}
			}
		})

		$("#btnAceptar3").on('click', function() {
			$.ajax({
				url: '<?php echo base_url('index.php/admin/permisoUsuario'); ?>',
				data: { id: document.getElementById('BloquearUserModal').getAttribute('attr'), p: 1 },
				type: 'POST',
				success: function(ans) {
					switch(ans) {
						case '1':
							alert('Usuario bloqueado');
							document.getElementById('btnCerrar4').click();
							break;

						case '2':
							alert('Error');
							break;
					}
				}
			})
		});
	})
</script>
</html>
