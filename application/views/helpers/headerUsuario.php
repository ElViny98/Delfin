<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Delfín</title>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap-dialog.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/cryptoJS.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
			<!--<li class="nav-item active">-->
				<li class="nav-item">
					<a class="nav-link" href="#">Perfil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Investigaciones</a>
				</li>
				<li class="nav-item">
					<a class="nav-link"  href="#">Noticias</a>
				</li>
				<div id="salir">
						<li class="nav-item">
							<a class="nav-link" onclick="" href="#">Salir</a>
						</li>
				</div>
			</ul>

		</div>
	</nav>
