<div class="container emp-profile">
<form method="post">
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                <div class="file btn btn-lg btn-primary">
                    Cambiar Photo
                    <?php echo form_open_multipart('perfilUsuario/do_upload'); ?>
                    <input type="file" name="userfile"/>

                  </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                        <h3>
                            Dra. Vanessa Felix
                        </h3>
                        <h4>
                            Universidad Politecnica de Sinaloa
                        </h4>
                        <br>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">BIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="false">Colaborar</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Editar Perfil"/>
            <!-- aqui se redirige a una pag pa modificar datos-->
        </div>
    </div> <!--fin de primer div row-->
    <div class="row">
        <div class="col-md-4">
            <div class="profile-work">
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
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Id Usuario</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Vfelix232</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nombre</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Vanessa Felix</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Correo</label>
                                </div>
                                <div class="col-md-6">
                                    <p>VanessaFelix@gmail.com</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Telefono</label>
                                </div>
                                <div class="col-md-6">
                                    <p>123 456 7890</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profesion</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Investigadora/maestra</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Academico</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Dra.</p>
                                </div>
                            </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p>10$/hr</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>230</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class="col-md-6">
                                    <p>6 months</p>
                                </div>
                            </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Tu Bio</label><br/>
                            <p>tu descripcion aqui blah blah </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--fin de segundo div row-->
  </form>
</div>