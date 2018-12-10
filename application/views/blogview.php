


    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5 class=""><img src="<?php echo base_url()?>assets/img/<?= $img?>" style="height:250px; width:250px" /></h5>
        </div><!--STAYS-->
        <div class="profile-head">
            <h1 style="margin-top:80px;">
              <?php echo "$grado $nombre $apaterno $amaterno"; ?>
          </h1>
          <h1>
              <?php echo $institucion; ?>
          </h1>
          <hr>
          <br>
        </div>
      </div>
        <!-- Blog Entries Column -->
        <div class="row">
        <div class="col-md-4">

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Mas Informacion</h5>
            <div class="card-body">
              <h5 style="text-align:center;">Informacion de Contacto</h5>
              <ul>
                <li>
                  <p>Correo: <?php echo $correo ?> </p>
                </li>
                <li>
                  <p>Telefono: <?php echo $telefono ?></p>
                </li>
                <li>
                  <p>Pais: <?php echo $pais ?> </p>
                </li>
                <li>
                  <p>Estado: <?php echo $estadoInst ?> </p>
                </li>
              </ul>
              <hr>
              <h5 style="text-align:center;">Informacion Academica</h5>
              <ul>
                <li>
                  <p>Grupo: <?php echo $cuerpoA ?> </p>
                </li>
                <li>
                  <p>Consolidcion: <?php echo $consolidacion ?></p>
                </li>
                <li>
                  <p>perfil Promep: <?php echo $promep ?> </p>
                </li>
                <li>
                  <p>Nivel SNI: <?php echo $sni ?> </p>
                </li>
                <li>
                  <p>Area de Conocimiento: <?php echo $areaC ?> </p>
                </li>
              </ul>
              <br>
            </div>
          </div>

        </div>
    <div class="col-md-8">

          <!-- Navigation -->
      <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Noticias</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Investigaciones</a>
                                </li>
       </ul>
                     <div class="row">

                         <div class="row" style="width:100%;">
                             <div class="tab-content profile-tab" id="myTabContent" style="width:100%;">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                   <div class="row">
                                       <?php foreach ($noticias->result() as $noticia) { ?>
                                       <div class="card mb-4" style="margin-top:20px;">
                                       <img src="<?php echo base_url()?>assets/img/<?= $noticia->img?>" style="height:300px; width:665px;" class="card-img-top" alt="Card image cap" />

                                         <div class="card-body">
                                           <h2 class="card-title"> <?php echo $noticia->Titulo; ?></h2>
                                           <p class="card-text"> <p> <?php echo $noticia->Descripcion; ?> </p>
                                           <a href="#" class="btn btn-primary">Read More &rarr;</a>
                                         </div>
                                         <div class="card-footer text-muted">
                                           <?php echo $noticia->Fecha;?>
                                         </div>
                                       </div>
                                       <?php } ?>
                                       <!--end of Blog Post -->

                                       <!-- Pagination -->
                                       <ul class="pagination justify-content-center mb-4">
                                         <li class="page-item">
                                           <a class="page-link" href="#">&larr; Older</a>
                                         </li>
                                         <li class="page-item disabled">
                                           <a class="page-link" href="#">Newer &rarr;</a>
                                         </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                   <div class="row">
                                       <?php foreach ($investigaciones->result() as $investigacion) { ?>
                                           <div class="card mb-3" style="margin-top:20px;width:100%;">
                                             <div class="card-body">
                                               <div class="row">
                                                 <div class="col-md-8">
                                                   <h2 class="card-title"> <?php echo $investigacion->Titulo; ?></h2>
                                                   <p class="card-text"> <p> <?php echo $investigacion->tipo; ?> </p>
                                                   <p class="card-text"> <p> <?php echo $investigacion->Tema; ?> </p>
                                                 </div>
                                                 <div class="col-md-3" style="padding:2%;">
                                                   <a href="#" onclick="viewDocument('<?php echo $investigacion->Hash; ?>')"><i class="fa fa-5x fa-file " aria-hidden="true"></i>
                                                   </a>
                                                 </div>
                                               </div>

                                             </div>
                                             <div class="card-footer text-muted">
                                               <?php echo $investigacion->Fecha;?>
                                             </div>
                                           </div>
                                       <?php } ?>
                                       <!--end of Blog Post -->
                                    </div>
                                 </div>
                             </div>
                         </div>

                       </div>
      </div>
    </div>
  </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      function viewDocument(hash){
        window.open('<?php echo base_url('assets/documents/'); ?>'+hash, '_blank');
      }
    </script>
  </body>

</html>
