<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Delfin</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/normalize.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/demo.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/component.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font-awesome/css/font-awesome.css') ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
		<script src="<?php echo base_url('assets/js/modernizr.custom.js'); ?>"></script>
	</head>
	<body>
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								<li><a class="gn-icon fa-users">Usuarios</a></li>
								<li><a class="gn-icon fa-university">Instituciones</a></li>
								<li><a class="gn-icon fa-user">Perfil</a></li>
								<li><a class="gn-icon fa-cog">Mantenimiento</a></li>
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				<li style="padding: 0px 10px;" class="codrops-icon"><span><?php echo $this->session->userdata('nombre'); ?></span></li>
				<li><a class="codrops-icon" href="<?php echo base_url('index.php/admin/salir'); ?>"><i class="fa fa-sign-out" aria-hidden="true">&nbsp</i><span>Cerrar sesión</span></a></li>
			</ul>
		</div><!-- /container -->
		<script src="<?php echo base_url('assets/js/classie.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/gnmenu.js'); ?>"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
