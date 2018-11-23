
    <div class="container emp-profile">
    <div class="row">

        <div class="modal fade" id="photoUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          	<div class="modal-dialog" role="document">
            	<div class="modal-content">
        			<div class="modal-header">
        				<h6 class="modal-title" id="exampleModalLabel">Cambiar Foto</h6>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        				<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
                    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url('index.php/user/upload_img');?>" method="post">
            		<div class="modal-body">
                        <center>
                            <div id="file-preview-zone-user">
                            </div>
                        </center>
                        <br>
                        <div>
                            <input type="file" name="userPhoto" id="userPhoto" accept="image/*" >
                        </div>

            		</div>

            		<div class="modal-footer">
                    	<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrar">Cancelar</button>
                    	<button type="submit" class="btn btn-primary" id="btnAceptar">Aceptar</button>
            		</div>
                    </form>
                    <script type="text/javascript">
                        function archivo(evt) {
                          var files = evt.target.files; // FileList object

                          // Obtenemos la imagen del campo "file".
                          for (var i = 0, f; f = files[i]; i++) {
                            //Solo admitimos imágenes.
                            if (!f.type.match('image.*')) {
                                continue;
                            }

                            var reader = new FileReader();

                            reader.onload = (function(theFile) {
                                return function(e) {
                                  // Insertamos la imagen
                                 document.getElementById("file-preview-zone-user").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
                                };
                            })(f);

                            reader.readAsDataURL(f);
                          }
                      }

                      document.getElementById('userPhoto').addEventListener('change', archivo, true);
                    </script>
        	   </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="profile-img" id="UserPhoto">

                <img src="<?php echo base_url()?>assets/img/<?= $img?>" />
            </div>
            <center>
            <div >
                <a id="btnCambiarFoto" class="bt nav-link" onclick="cambiarFoto()" href="#">Cambiar Foto</a>
            </div>
            </center>
        </div>

        <script type="text/javascript">
    		function cambiarFoto(){
    			$("#photoUserModal").modal('show');
    		}
            $("#btnCerrar").on('click', function() {
                document.getElementById("userPhoto").value = "";
                document.getElementById("file-preview-zone-user").innerHTML = "";
            });
    	</script>

        <div class="col-md-8">
            <div class="profile-head">
                        <h3>
                            <?php echo "$grado $nombre $apaterno $amaterno"; ?>
                        </h3>
                        <h4>
                            <?php echo $institucion; ?>
                        </h4>
                        <br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#infoPersonal" role="tab" aria-controls="home" aria-selected="true">Información personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#infoAcademica" role="tab" aria-controls="profile" aria-selected="false">Información académica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#infoInstitucion" role="tab" aria-controls="projects" aria-selected="false">Información de la Institución</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> <!--fin de primer div row-->

    <div class="row">
        <div class="col-md-4">
            <div class="profile-work" style="margin-top: 0px;">
                <p>LINKs</p>
                <a href="">su Pagina web</a><br/>
                <a href="">Links de otra paginas</a><br/>
                <a href="">o puede ser para fb,insta</a>
                <p>ACADEMICO</p>
                <a href="">Maestria en info</a><br/>
                <a href="">Doctorado en info<br/>
                <a href="">Postgrado</a><br/>
                <a href="">etc.</a><br/>
                <a href="">etc</a><br/>
                <p>OPCIONES</p>
                <a href="">Modificar Datos</a>
                <a href="">Salir</a>
                <a href="">Reportar Problema</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent" >
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row ">
                        <div class="tab-content profile-tab" id="myTabContent" style="width:100%;">
                            <script type="text/javascript">
                                function mostrarParaEditar(){
                                    $('#noEditar').css({'display':'none'});
                                    $('#paraEditar').css({'display':'block'});
                                    $('#noEditar2').css({'display':'none'});
                                    $('#paraEditar2').css({'display':'block'});
                                    $('#noEditar3').css({'display':'none'});
                                    $('#paraEditar3').css({'display':'block'});
                                    $('#noEditar4').css({'display':'none'});
                                    $('#paraEditar4').css({'display':'block'});
                                    $('#noEditar5').css({'display':'none'});
                                    $('#paraEditar5').css({'display':'block'});
                                    $('#noEditar6').css({'display':'none'});
                                    $('#paraEditar6').css({'display':'block'});
                                    $('#noEditar7').css({'display':'none'});
                                    $('#paraEditar7').css({'display':'block'});
                                    $('#noEditar8').css({'display':'none'});
                                    $('#paraEditar8').css({'display':'block'});
                                    $('#noEditar9').css({'display':'none'});
                                    $('#paraEditar9').css({'display':'block'});
                                    $('#noEditar10').css({'display':'none'});
                                    $('#paraEditar10').css({'display':'block'});
                                    $('#noEditar11').css({'display':'none'});
                                    $('#paraEditar11').css({'display':'block'});
                                    $('#noEditar12').css({'display':'none'});
                                    $('#paraEditar12').css({'display':'block'});
                                    $('#noEditar13').css({'display':'none'});
                                    $('#paraEditar13').css({'display':'block'});
                                    $('#noEditar14').css({'display':'none'});
                                    $('#paraEditar14').css({'display':'block'});
                                    $('#noEditar15').css({'display':'none'});
                                    $('#paraEditar15').css({'display':'block'});
                                    $('#noEditar16').css({'display':'none'});
                                    $('#paraEditar16').css({'display':'block'});
                                    $('#noEditar17').css({'display':'none'});
                                    $('#paraEditar17').css({'display':'block'});
                                    $('#noEditar18').css({'display':'none'});
                                    $('#paraEditar18').css({'display':'block'});
                                    $('#noEditar19').css({'display':'none'});
                                    $('#paraEditar19').css({'display':'block'});
                                    $('#mostrarEditar').css({'display':'none'});
                                    $('#guardarCambios').css({'display':'block'});
                                    $('#cancelarEditar').css({'display':'block'});
                                    $('#espacioEditar').css({'display':'none'});
                                    $('#espacio').css({'display':'block'});
                                    document.getElementById("txtSexo").value='<?php echo $sexo ?>';
                                    document.getElementById("txtGrado").value='<?php echo $grado ?>';
                                    document.getElementById("txtConsolidacion").value='<?php echo $consolidacion ?>';
                                    document.getElementById("txtPromep").value='<?php echo $promep ?>';
                                    document.getElementById("txtSni").value='<?php echo $sni ?>';
                                    document.getElementById("txtareaC").value='<?php echo $areaC ?>';
                                    document.getElementById("txtCiudadInst").value='<?php echo $ciudadInst?>';
                                     $("#txtPais").find('option:contains("<?php echo $pais?>")').prop('selected', true);
                                     $("#txtpaisInst").find('option:contains("<?php echo $paisInst?>")').prop('selected', true);
                                     $("#txtEstadoInst").find('option:contains("<?php echo $estadoInst?>")').prop('selected', true);
                                }
                                function Cancelar(){
                                    $('#noEditar').css({'display':'block'});
                                    $('#paraEditar').css({'display':'none'});
                                    $('#noEditar2').css({'display':'block'});
                                    $('#paraEditar2').css({'display':'none'});
                                    $('#noEditar3').css({'display':'block'});
                                    $('#paraEditar3').css({'display':'none'});
                                    $('#noEditar4').css({'display':'block'});
                                    $('#paraEditar4').css({'display':'none'});
                                    $('#noEditar5').css({'display':'block'});
                                    $('#paraEditar5').css({'display':'none'});
                                    $('#noEditar6').css({'display':'block'});
                                    $('#paraEditar6').css({'display':'none'});
                                    $('#noEditar7').css({'display':'block'});
                                    $('#paraEditar7').css({'display':'none'});
                                    $('#noEditar8').css({'display':'block'});
                                    $('#paraEditar8').css({'display':'none'});
                                    $('#noEditar9').css({'display':'block'});
                                    $('#paraEditar9').css({'display':'none'});
                                    $('#noEditar10').css({'display':'block'});
                                    $('#paraEditar10').css({'display':'none'});
                                    $('#noEditar11').css({'display':'block'});
                                    $('#paraEditar11').css({'display':'none'});
                                    $('#noEditar12').css({'display':'block'});
                                    $('#paraEditar12').css({'display':'none'});
                                    $('#noEditar13').css({'display':'block'});
                                    $('#paraEditar13').css({'display':'none'});
                                    $('#noEditar14').css({'display':'block'});
                                    $('#paraEditar14').css({'display':'none'});
                                    $('#noEditar15').css({'display':'block'});
                                    $('#paraEditar15').css({'display':'none'});
                                    $('#noEditar16').css({'display':'block'});
                                    $('#paraEditar16').css({'display':'none'});
                                    $('#noEditar17').css({'display':'block'});
                                    $('#paraEditar17').css({'display':'none'});
                                    $('#noEditar18').css({'display':'block'});
                                    $('#paraEditar18').css({'display':'none'});
                                    $('#noEditar19').css({'display':'block'});
                                    $('#paraEditar19').css({'display':'none'});
                                    $('#espacioEditar').css({'display':'block'});
                                    $('#mostrarEditar').css({'display':'block'});
                                    $('#espacio').css({'display':'none'});
                                    $('#guardarCambios').css({'display':'none'});
                                    $('#cancelarEditar').css({'display':'none'});
                                }
                            </script>
                            <div class="tab-pane fade show active" id="infoPersonal" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombre</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar">
                                                <p><?php echo $nombre; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar">
                                                <input type="cnombre" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre" value="<?php echo $nombre ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Apellido Paterno</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar2">
                                                <p><?php echo $apaterno; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar2">
                                                <input type="cnombre" class="form-control" id="txtPaterno" name="txtPaterno" placeholder="Apellido Paterno" value="<?php echo $apaterno ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Apellido Materno</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar3">
                                                <p><?php echo $amaterno; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar3">
                                                <input type="cnombre" class="form-control" id="txtMaterno" name="txtMaterno" placeholder="Apellido Materno" value="<?php echo $amaterno ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sexo</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar4">
                                                <p><?php echo $sexo; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar4">
                                                <select id="txtSexo" name="txtSexo" class="form-control">
                                                      <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                                                      <option value="Femenino">Femenino</option>
                                                      <option value="Masculino">Masculino</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Fecha de Nacimiento</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar5">
                                                <p><?php echo $fechaNac; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar5">
                                                <input type="cnombre" class="form-control" id="txtFecha" name="txtFecha" placeholder="Fecha de Nacimiento" value="<?php echo $fechaNac ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>País</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar6">
                                                <p><?php echo $pais; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar6">
                                                <select id="txtPais" name="txtPais" class="form-control">
                                                      <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                                                      <?php
                                                        foreach ($countries->result() as $country) {
                                                            echo '<option value="'.$country->id.'">'.$country->name.'</option>';
                                                        }
                                                       ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Telefono</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar7">
                                                <p><?php echo $telefono; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar7">
                                                <input type="cnombre" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Telefono" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $telefono ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Correo</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar8">
                                                <p><?php echo $correo; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar8">
                                                <input type="cnombre" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo" value="<?php echo $correo ?>">
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="infoAcademica" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Grado Académico</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar9">
                                                <p><?php echo $grado; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar9">
                                                <select id="txtGrado" name="txtGrado" class="form-control">
                                                          <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                                                      <option value="Dr.">Dr.</option>
                                                      <option value="M.C.">M.C.</option>
                                                      <option value="Mtro.">Mtro.</option>
                                                      <option value="Lic.">Lic.</option>
                                                      <option value="Ing.">Ing.</option>
                                                      <option value="Tec.">Tec.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Cuerpo Académico</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar10">
                                                <p><?php echo $cuerpoA; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar10">
                                                <input type="cnombre" class="form-control" id="txtCuerpoA" name="txtCuerpoA" placeholder="Cuerpo Académico" value="<?php echo $cuerpoA ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Grado de consolidación del CA</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar11">
                                                <p><?php echo $consolidacion; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar11">
                                                <select id="txtConsolidacion" name="txtConsolidacion" class="form-control">
                                		                  <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                                    		          <option value="Consolidado">Consolidado</option>
                                    		          <option value="En Consolidacion.">En Consolidacion</option>
                                    		          <option value="En Formación">En Formación</option>
                                                      <option value="Ninguno">Ninguno</option>
                                		        </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Perfil PROMEP</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar12">
                                                <p><?php echo $promep; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar12">
                                                <select id="txtPromep" name="txtPromep" class="form-control">
                                		                  <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                                    		          <option value="Con Perfil Deseable">Con Perfil Deseable</option>
                                    		          <option value="Sin Perfil Deseable">Sin Perfil Deseable</option>
                                		        </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nivel SNI</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar13">
                                                <p><?php echo $sni; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar13">
                                                <select id="txtSni" name="txtSni" class="form-control">
                                                          <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                                                    <option value="Candidato">Candidato</option>
                                                      <option value="Nivel 1">Nivel 1</option>
                                                      <option value="Nivel 2">Nivel 2</option>
                                                      <option value="Nivel 3">Nivel 3</option>
                                                      <option value="Emérito">Emérito</option>
                                                      <option value="No Tiene">No Tiene</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Área de conocimiento</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar14">
                                                <p><?php echo $areaC; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar14">
                                                <select id="txtareaC" name="txtareaC" class="form-control">
                                                          <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                                                          <option value="Área I: Física, Matemáticas y Ciencias de la Tierra">Área I: Física, Matemáticas y Ciencias de la Tierra</option>
                                                          <option value="Área II: Biología y Química">Área II: Biología y Química</option>
                                                          <option value="Área III: Madicina y Salud">Área III: Madicina y Salud</option>
                                                          <option value="Área IV: Humanidades y Ciencias de la Conducta">Área IV: Humanidades y Ciencias de la Conducta</option>
                                                          <option value="Área V: Sociales y Económicas">Área V: Sociales y Económicas</option>
                                                          <option value="Área VI: Biotecnología y Ciencias Agropecuarias">Área VI: Biotecnología y Ciencias Agropecuarias</option>
                                                          <option value="Área VII: Ingeniería e Industria">Área VII: Ingeniería e Industria</option>
                                                </select>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="infoInstitucion" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Institución</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar15">
                                                <p><?php echo $institucion; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar15">
                                                <input type="cnombre" class="form-control" id="txtInstitucion" name="txtInstitucion"  value="<?php echo $institucion ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Unidad académica</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar16">
                                                <p><?php echo $unidad; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar16">
                                                <input type="cnombre" class="form-control" id="txtUnidad" name="txtUnidad"  value="<?php echo $unidad ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pais</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar17">
                                                <p><?php echo $paisInst; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar17">
                                                <select id="txtpaisInst" name="txtpaisInst" class="form-control">
                                                      <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                                                      <?php
                                                        foreach ($countries->result() as $country) {
                                                            echo '<option value="'.$country->id.'">'.$country->name.'</option>';
                                                        }
                                                       ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Estado</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar18">
                                                <p><?php echo $estadoInst; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar18">
                                                <select class="form-control" id="txtEstadoInst" name="txtEstadoInst">
                                                    <option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>
                                                    <?php
                                                      foreach ($regions->result() as $region) {
                                                          echo '<option value="'.$region->id.'">'.$region->name.'</option>';
                                                      }
                                                     ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Ciudad</label>
                                            </div>
                                            <div class="col-md-6" style="display:block;" id="noEditar19">
                                                <p><?php echo $ciudadInst; ?></p>
                                            </div>
                                            <div class="col-md-6" style="display:none;" id="paraEditar19">
                                                <input type="cnombre" class="form-control" id="txtCiudadInst" name="txtCiudadInst"  onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?php echo $ciudadInst ?>">
                                            </div>
                                        </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--fin de segundo div row-->
    <div class="row">
        <div class="col-md-10" style="display:block;" id="espacioEditar">

        </div>
        <div class="col-md-2" style="display:block;" id="mostrarEditar">
            <input type="button" class="btn btn-default" name="editar" id="editar" value="Editar Perfil" onclick="mostrarParaEditar()">
        </div>
        <div class="col-md-8" style="display:none;" id="espacio">

        </div>
        <div class="col-md-2" style="display:none;" id="guardarCambios">
            <button type="submit" name='submit' value='upload' class="btn btn-default" id="editar">Guardar Cambios</button>
        </div>
        <div class="col-md-2" style="display:none;" id="cancelarEditar">
            <input type="button" name="cancelar" id="cancelar" class="btn btn-default" value="Cancelar" onclick="Cancelar()">
        </div>
    </div>
  </form>
</div>
<script type="text/javascript">
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

  function esconder(id){
    var divelement = document.getElementById(id);
    if (divelement.style.display == 'none') {
      divelement.style.display= 'block';
    }
    else {
      divelement.style.display= 'none';
      //mostrar editar perfil
    }
  }
</script>
