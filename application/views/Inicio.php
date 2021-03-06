    <div class="row">
        <div class="col-6" style="margin-top: 20px;"><a href="#"><img alt="" src="<?php echo base_url('assets/img/logolargo.png');?>" width="100%"></a></div>
        <div class="col-6"><center><a alt="Cuerpo académico" href="http://tica.com.mx/TICOFICIAL/html/"><img alt="Cuerpo académico" src="<?php echo base_url('assets/img/logo.png');?>"></a></center></div>

    </div>

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
                        <div class="col-md-12">
                            <h3>'.$n->Titulo.'</h3>
                            <p>'.word_limiter($n->Descripcion, 50).'</p>
                        </div>
                        <div class="col-3 offset-9"><a class="btn btn-primary" href="'.base_url('index.php/inicio/noticia?id='.$n->idNoticias).'" width="100%">Continuar leyendo</a></div>
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
