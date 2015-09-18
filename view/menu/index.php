<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<!DOCTYPE html>
<html lang="es">
  <head>
	<title>Full Width Pics - Start Bootstrap Template</title>
  </head>
  <?php view::includePartial('menu/menu') ?>
  <body>
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
</html>

