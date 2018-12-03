<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delfin</title>
	<script>
		var globalUrl = '<?php echo base_url(); ?>';
	</script>
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/cryptoJS.js'); ?>"></script>
	<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>

	<?php 
	if(isset($privilegio))
		echo '<script src="'.base_url('assets/js/user-utils.js').'"></script>';

	else
		echo '<script src="'.base_url('assets/js/admin-utils.js').'"></script>';

	?>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/side-style.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.css') ?>">
	<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
	<div id="inactive" class="inactive-bar">
		<div class="menu-container" id="menu-toggle">
			<div class="bar1"></div>
			<div class="bar2"></div>
			<div class="bar3"></div>
		</div>
		<div class="icons-container">
			<ul class="icons">
				<?php 
					//Inicio de sesión para usuario común
					if(isset($privilegio))
					{
						echo '
						<li>
							<a class="bar-link" href="#" id="btnInicio">
								<i class="fa fa-home fix-content" aria-hidden="true"></i>
								Inicio
							</a>
						</li>

						<li>
							<a class="bar-link" href="#" id="btnPerfil">
								<i class="fa fa-user fix-content" aria-hidden="true"></i>
								Perfil
							</a>
						</li>

						<li>
							<a class="bar-link" href="#" id="btnInvestigaciones">
								<i class="fa fa-file-text-o fix-content" aria-hidden="true"></i>
								Investigaciones
							</a>
						</li>

										
						<li>
							<a class="bar-link" href="#" id="btnNoticias">
								<i class="fa fa-newspaper-o fix-content" aria-hidden="true"></i>
								Noticias
							</a>
						</li>
						';
					}
					else
					{
						echo '
						<li>
							<a class="bar-link" href="#" id="btnInicio">
								<i class="fa fa-home fix-content" aria-hidden="true"></i>
								Inicio
							</a>
						</li>

						<li>
							<a class="bar-link" href="#" id="btnPerfil">
								<i class="fa fa-user fix-content" aria-hidden="true"></i>
								Perfil
							</a>
						</li>

						<li>
							<a class="bar-link" href="#" id="btnUsuarios">
								<i class="fa fa-users fix-content" aria-hidden="true"></i>
								Usuarios
							</a>
						</li>	

						<li>
							<a class="bar-link" href="#" id="btnInstituciones">
								<i class="fa fa-university fix-content" aria-hidden="true"></i>
								Instituciones
							</a>
						</li>

						<li>
							<a class="bar-link" href="#" id="btnNoticias">
								<i class="fa fa-newspaper-o fix-content" aria-hidden="true"></i>
								Noticias
							</a>
						</li>

						<li>
							<a class="bar-link" href="#" id="btnInvestigaciones">
								<i class="fa fa-file-text-o fix-content" aria-hidden="true"></i>
								Investigaciones
							</a>
						</li>

						<li>
							<a class="bar-link" href="#" id="btnOpciones">
								<i class="fa fa-cog fix-content" aria-hidden="true"></i>
								Opciones
							</a>
						</li>
						';
					}
				?>
			</ul>
		</div>
		<div class="logout-container">
			<ul class="icons">
				<li>	
					<a class="bar-link" href="<?php echo base_url('/index.php/Inicio/salir'); ?>">
						<i class="fa fa-sign-out fix-content" aria-hidden="true"></i>
						Cerrar sesión
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="nav-content" class="nav-container">
		<div class="navbar nav-user">
			<img src="https://via.placeholder.com/50" style="margin: 5px 5px;">
			<div class="user-name">
				<?php echo $this->session->userdata('nombre'); ?>
			</div>
		</div>
	</div>
	<div id="main-content" class="content-main" style="height: 1000px;">
		Contenido aquí
	</div>
</body>
<script src="<?php echo base_url('assets/js/sidebar.js'); ?>"></script>
<script type="text/javascript">
	function usuarios() {
		$("#main-content").load('<?php echo base_url('index.php/admin/usuarios'); ?>')
	}
</script>
</html>
