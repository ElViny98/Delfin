    <!-- Footer -->
	 <footer class="page-footer font-small footer-dark">
		<br>
		<h4>Estrategias Educativas y Tecnologicas de la Información para la Construcción de Conocimiento</h4>
		<h5>Innovación para la Educación</h5>

      	<div class="col-lg footer-copyright text-center py-3">
            © 2018
      	</div>
    </footer> 
    <!-- Footer -->
	</body>
	<script type="text/javascript">
		function modificar(index) {
			location.href = '<?php echo base_url('index.php/user/editarNoticia?id='); ?>'+index;
		}

		function borrar(index) {
			var url = '<?php echo base_url('index.php/user/eliminarNoticia'); ?>';
			var data = {
				id: index
			};
			if(confirm('¿Seguro que desea eliminar la noticia?')) {
				$.post(url, data, function(ans) {
					switch(ans) {
						case "1":
							alert('Noticia eliminada');
							location.href = '<?php echo base_url('index.php/user/Noticias_MisNoticias'); ?>'
							break;

						case "0":
							alert('Error al eliminar el registro');
							break;

						default:
							alert('Error al eliminar');
							break;
					}
				});
			}
		}
	</script>
</html>
