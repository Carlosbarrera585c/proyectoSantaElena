<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<title>Full Width Pics - Start Bootstrap Template</title>
	<!--     Bootstrap Core CSS 
		<link href="css/bootstrap.min.css" rel="stylesheet">
		 Custom CSS 
		<link href="css/full-width-pics.css" rel="stylesheet">-->
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>
  <body>
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	  <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="#">Agropanela Santa Helena</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li>
			  <a href="#" data-toggle="modal" data-target="#modalContactenos">Contactenos</a>
			</li>
			<li>
			  <a href="#" data-toggle="modal" data-target="#modalInicioSesion">Iniciar Sesion</a>
			</li>
		  </ul>
		</div>
		<!-- /.navbar-collapse -->
	  </div>
	  <!-- /.container -->
	</nav>
	<!-- Full Width Image Header with Logo -->
	<!-- Image backgrounds are set within the full-width-pics.css file. -->
	<header class="image-bg-fluid-height">
	  <img class="img-responsive img-center" src="<?php echo routing::getInstance()->getUrlImg('sena1.png') ?>" width="20%" height="20%">
	</header>
	<!-- Content Section -->
	<section>
	  <div class="container">
		<div class="row">
		  <div class="col-lg-12">
			<h1 class="section-heading">Misión y Vision</h1>
			<p class="lead section-lead">MISION:<br>
			  Nuestro objetivo al diseñar e implementar el sistema  de información,
			  es facilitar la sistematización en cuanto a la recolección de información,
			  permitiendo optimizar la gestión y el desarrollo de los procesos de producción de panela.</p>
			<p class="lead section-lead">VISION:<br>
			  Nuestro sistema de información se proyecta para un futuro como un software de calidad,
			  sencillo, accesible y fácil de manejar e implementado por muchas empresas para la gestión de sus actividades productivas,
			  cumpliendo con los estándares requeridos por la empresa en que se va a implementar el sistema de información. </p>
		  </div>
		</div>
	  </div>
	</section>
	<!-- Footer -->
	<footer>
	  <div class="container">
		<div class="row">
		  <div class="col-lg-12">
			<p>Copyright &copy; Centro de Diseño Tecnologico Industrial 2015</p>
		  </div>
		</div>
		<!-- /.row -->
	  </div>
	  <!-- /.container -->
	</footer>
  </body>
  <!-- Inicio Ventana Modal. -->
  <div class="modal fade" id="modalInicioSesion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <h4 class="modal-title" id="myModalLabel">Identificación</h4>
		</div>
		<div class="modal-body">
		  <div>
			<form class="form-horizontal" role="form" action="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'login') ?>" method="POST">
			  <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
				<?php view::includeHandlerMessage() ?>
			  <?php endif ?>
			  <div class="form-group">
				<label for="inputUser" class="col-xs-2 control-label">Usuario</label>
				<div class="col-xs-8">
				  <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Usuario" required autofocus>
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputPassword" class="col-xs-2 control-label">Contraseña</label>
				<div class="col-xs-8">
				  <label for="inputPassword" class="sr-only">Password</label>
				  <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
				</div>
			  </div>
			  <div>
				<div class="col-xs-4">
				  <div class="input-group">
					<span class="input-group-addon">
					  <input type="checkbox" value="true" name="chkRememberMe">
					</span>
					<input type="" class="form-control" placeholder="Recordarme" disabled>
				  </div>
				</div>
			  </div>
			  <div class="modal-footer">
				<button class="btn btn-success" type="submit">Entrar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			  </div>
			</form>
		  </div>
		</div>
	  </div>
	</div>
  </div>
  <!-- Inicio Ventana Modal. -->
  <div class="modal fade" id="modalContactenos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <h4 class="modal-title" id="myModalLabel">Contactenos</h4>
		</div>
		<div class="modal-body">
		  <div>
			<form class="form-horizontal" role="form" action="">
			  <div>
				Contáctenos para hacer excelentes negocios con usted, 
				nuestro producto esta posicionado en el mercado como el mejor, denos el gusto de atenderlo, 
				comuníquese con nosotros al siguiente PBX: (2) 6677595<br>
			  </div>
			  <br>
			  <div>
				FAX: (2) 6677610
			  </div>
			  <div>
			  <div>
				Cel: 312-8660828 – 316-2260860
			  </div>
			  <br>
			  <div>
				Cali, Valle de Cauca,<br>
				Colombia / Sur América<br>
				E-mail: ventas@agropanelasantahelena.com<br>
				info@agropanelasantahelena.com<br>
			  </div>
			  <br>
			  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
  </div>
</div>
<?php if (session::getInstance()->hasAttribute('modalInicioSesion')): ?>
  <script>
    $(document).ready(function () {
  	$('#modalInicioSesion').modal('toggle');
    });
  </script>
  <?php session::getInstance()->deleteAttribute('modalInicioSesion') ?>
<?php endif; ?>
</html>
