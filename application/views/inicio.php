<!-- Page Content -->
  <div class="container">

    <!-- Page Heading -->
    <h2 class="my-4" style="text-align:center; background-color:#343A40; color:white; ">Noticias
    </h2>

    <?php 
        $x = 0;
        $container = '<div id="news-container">';
        echo $container;
        foreach($noticias->result() as $n)
        {    
            if($x % 4 == 0 && $x != 0)
                echo '<div id="news-container">';
        
            echo '
                <div class="row">
                    <div class="col-md-7">
                        <a href="#">
                            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300">
                        </a>
                    </div>
                    <div class="col-md-5">
                        <h3>'.$n->Titulo.'</h3>
                        <p>'.$n->Descripcion.'</p>
                        <a class="btn btn-primary" href="'.base_url('index.php/inicio/noticia?id='.$n->idNoticias).'">Ver noticia</a>
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

    ?>

    <!-- Pagination -->
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>

  </div>
