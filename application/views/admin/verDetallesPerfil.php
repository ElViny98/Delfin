<div id="main-content" class="content-main" style="height: 1000px; padding:3%;">
	<div class="container emp-profile">
	    <div class="row">
	        <div class="col-md-4">
	            <div class="profile-img" id="UserPhoto">
	                <img src="<?php echo base_url()?>assets/img/<?= $img?>" />
	            </div>
	        </div>
	        <div class="col-md-8">
	            <div class="profile-head">
	                        <h3>
	                            <?php echo "$grado $nombre $apaterno $amaterno"; ?>
	                        </h3>
	                        <h4>
	                            <?php echo $institucion; ?>
	                        </h4>
	                        <hr>
	                        <br>
	                <ul class="nav nav-tabs" id="myTab" role="tablist">
	                    <li class="nav-item">
	                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#infoPersonal" role="tab" aria-controls="home" aria-selected="true">Información personal</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#infoAcademica" role="tab" aria-controls="profile" aria-selected="false">Información académica</a>
	                    </li>
	                    <li class="nav-item">
	                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#infoInstitucion" role="tab" aria-controls="projects" aria-selected="false">Información de la Institución</a>
	                    </li>
	                </ul>
	            </div>
	        </div>
	    </div> <!--fin de primer div row-->

	    <div class="row">
	        <div class="col-md-4">
	            <div class="profile-work" style="margin-top: 0px;">
	            </div>
	        </div>
	        <div class="col-md-8">
	            <div class="tab-content profile-tab" id="myTabContent" >
	                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
	                    <div class="row ">
	                        <div class="tab-content profile-tab" id="myTabContent" style="width:100%;">
	                            <div class="tab-pane fade show active" id="infoPersonal" role="tabpanel" aria-labelledby="home-tab">
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Nombre</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;">
	                                                <p><?php echo $nombre; ?></p>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Apellido Paterno</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $apaterno; ?></p>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Apellido Materno</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $amaterno; ?></p>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Sexo</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $sexo; ?></p>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Fecha de Nacimiento</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $fechaNac; ?></p>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>País</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $pais; ?></p>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Telefono</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $telefono; ?></p>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Correo</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $correo; ?></p>
	                                            </div>
	                                        </div>
	                            </div>
	                            <div class="tab-pane fade" id="infoAcademica" role="tabpanel" aria-labelledby="profile-tab">
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Grado Académico</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $grado; ?></p>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Cuerpo Académico</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $cuerpoA; ?></p>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Grado de consolidación del CA</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $consolidacion; ?></p>
	                                            </div>

	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Perfil PROMEP</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $promep; ?></p>
	                                            </div>

	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Nivel SNI</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $sni; ?></p>
	                                            </div>

	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Área de conocimiento</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $areaC; ?></p>
	                                            </div>

	                                        </div>
	                            </div>
	                            <div class="tab-pane fade" id="infoInstitucion" role="tabpanel" aria-labelledby="profile-tab">
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Pais</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $paisInst; ?></p>
	                                            </div>

	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Estado</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $estadoInst; ?></p>
	                                            </div>
	                                        </div>
	                                        <div class="row">
	                                            <div class="col-md-6">
	                                                <label>Ciudad</label>
	                                            </div>
	                                            <div class="col-md-6" style="display:block;" >
	                                                <p><?php echo $ciudadInst; ?></p>
	                                            </div>
	                                        </div>

	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div><!--fin de segundo div row-->
	</div>
</div>
</body>
<script src="<?php echo base_url('assets/js/sidebar.js'); ?>"></script>
<script type="text/javascript">

</script>
</html>
