<div class="contenidoTabla" id="divVerMisNoticias">
	<div class="container-fluid" style="margin-bottom: 3%;">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-lg-9 col-xl-9">
				<h2>Mis noticias</h2>
			</div>
			<div class="col-xs-12 col-md-4 col-lg-3 col-xl-3">
				<a href="#" onclick="nuevaNoticia()" style="width: 100%;" class="btn btn-primary"><li class="fa fa-plus-circle"></li>&nbspRedactar</a>
			</div>
		</div>
	</div>
	<hr>
	<div class="container">
		<?php
			foreach($consulta->result() as $q)
			{
				echo '
				<div class="row new-container">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-8 col-xl-8" style="margin-bottom: 10px;">
						<a href="'.base_url('index.php/user/vernoticia?id='.$q->idNoticias).'" class="link-new">'.$q->Titulo.'</a>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2" style="margin-bottom: 10px;">
						<button type="button" class="btn btn-success btn-new" onclick="modificarNoticia('.$q->idNoticias.')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbspModificar</button>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-2 col-xl-2" style="margin-bottom: 10px;">
						<button type="button" class="btn btn-danger btn-new" onclick="borrarNoticia('.$q->idNoticias.')"><i class="fa fa-times" aria-hidden="true"></i>&nbspEliminar</button>
					</div>
				</div>
				';
			}
		?>
	</div>
</div>
<script type="text/javascript">
	function borrarNoticia(id){
		var action= '<?php echo base_url('index.php/user/eliminarNoticia?id='); ?>' + id;
		$.ajax({
            url: action,
            type: 'GET',
            data: id,
            processData: false,
            cache: false,
            contentType: false,
            success: function(data) {
                switch(data) {
                    case '1':
                        $("#main-content").load('<?php echo base_url('index.php/user/Noticias_MisNoticias'); ?>');
                        break;

                    case '0':
                        alert('Algo salió mal. Inténtelo nuevamente en unos segundos.');
                        break;

                    default:
                        alert('Porfavor, verifique la conexión a Internet e inténtelo de nuevo');
                        break;
                }
            }
        });
	}
</script>
