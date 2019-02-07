<!-- Barra de búsqueda pendiente -->
<div class="Imagen" >
    <img src="<?php echo base_url('assets/img/logolargo.png');?>">
</div>
<div class="investigaciones-display">
    <div class="header">
        Investigadores
    </div>
    <ul class="investigaciones-list">
        <li>
            <div class="img-perfil-container">
                <img src="https://via.placeholder.com/35">
            </div>
            <div class="perfil-container">
                <a href="#">Dr. Rodolfo Ostos Robles</a>
            </div>

            <div class="ivestigacion-container">
              <?php foreach ($Investigadores->result() as $i) {
                echo '<li>

                <div class="perfil-container">
                <img src="https://via.placeholder.com/35">
                    <a href="#">'.$i->Nombre." ".$i->ApPaterno." ".$i->ApMaterno.'</a>
                </div>
                </li>
                ';
                } ?>
            </div>
        </li>
        <li>
            <img src="https://via.placeholder.com/35">Investigador

        </li>
        <li>
            <img src="https://via.placeholder.com/35">Investigador
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-4">

    </div>
    <div class="col-lg-8">
        <div class="container">

        <!-- Page Heading -->
        <h2 class="my-4" style="text-align:center; background-color:#343A40; color:white;" id="new-container">Noticias
        </h2>

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
                            <div class="col-md-7">
                                <a href="#">
                                    <img class="img-fluid rounded mb-3 mb-md-0" src="'.base_url('assets/img/'.$n->img).'">
                                </a>
                            </div>
                            <div class="col-md-5">
                                <h3>'.$n->Titulo.'</h3>
                                <p>Publicado por '.$n->Nombre.' '.$n->ApPaterno.' '.$n->ApMaterno.'</p>
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
