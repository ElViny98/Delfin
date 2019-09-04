<!-- Barra de búsqueda pendiente -->
<div class="Imagen" >
    <img src="<?php echo base_url('assets/img/logolargo.png');?>">
</div>
<div class="row">
    <div class="col-lg-4">
    <div class="col-lg-12">
        <h4>Investigaciones recientes</h4>
    </div>
    <hr/>
      <div class="col-lg-12" id="lista_investigaciones">
          <div >
              <?php foreach ($investigaciones->result() as $in) {
                echo '

                <div class="perfil-container" style="margin-top:10px;">
                <img src="http://tica.com.mx/assets/img/'. $in->Img.'" width="35px" height="35px">
                    <a href="#">'.$in->Nombre." ".$in->ApPaterno." ".$in->ApMaterno.'</a>
                    <p>'.$in->Titulo.'</p>
                    <a href="#" onclick="viewDocument(\''.$in->Hash.'\');"><i class="fa fa-1x fa-file " aria-hidden="true"></i></a>
                </div>

                ';
                } ?>
          </div>
      </div>
    </div>
    <!--<div class="col-lg-3" id="lista_investigaciones">
        <div >
            <?php foreach ($Investigadores->result() as $i) {
              echo '

              <div class="perfil-container" style="margin-top:10px;">
              <img src="https://via.placeholder.com/35">
                  <a href="#" onclick="verPerfilUser('.$i->idUsuarios.')">'.$i->Nombre." ".$i->ApPaterno." ".$i->ApMaterno.'</a>
              </div>

              ';
              } ?>
        </div>
    </div>-->
    <div class="col-lg-8">
        <div class="container">

        <!-- Page Heading -->
        <div class="" style="background-color:#343A40; height: 20px; width:100%;" id="new-container"></div>

        <?php
            if($noticias != null)
            {
                $x = 0;
                $container = '<div class="news-container">';
                echo $container;
                foreach($noticias->result() as $n)
                {
                    if($x % 4 == 0 && $x != 0)
                        echo '<div class="news-container">';

                    echo '
                        <div class="row">
                            <div class="col-md-12">
                                <h3>'.$n->Titulo.'</h3>
                                <p>Publicado por <a href="#" onclick="verPerfilUser('.$n->idUsuarios.')">'.$n->Nombre." ".$n->ApPaterno." ".$n->ApMaterno.'</a></p>
                                <p>'.$n->Fecha.'</p>
                                <p>'.$n->Descripcion.'</p>
                            </div>
                        </div>
                        <hr>
                    ';
                    if($x % 4 == 3)
                        echo '</div>
                        ';

                    $x++;
                }
                if($x % 4 != 1)
                    echo '</div>
                    ';
            }

        ?>

        <!-- Pagination -->
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php
                if(isset($x))
                {
                    $p = 0.0;
                    $p = $x / 4;
                    for($i = 0; $i<$p; $i++)
                    {
                        echo '
                            <li class="page-item">
                                <a class="page-link" onclick="mostrar('.$i.')">'.($i + 1).'</a>
                            </li>
                        ';
                    }
                }
            ?>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>

        </div>
    </div>
</div>
<script type="text/javascript">
  function viewDocument(hash){
    window.open('<?php echo base_url('assets/documents/'); ?>'+hash, '_blank');
  }
</script>
