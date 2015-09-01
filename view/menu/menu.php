<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\config\configClass as config ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\session\sessionClass as session ?>
<nav class="navbar navbar-default nav_bar">
  <div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'index') ?>"><?php echo i18n::__('SantaHelena') ?></a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  <ul class="nav navbar-nav">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('reedIncome') ?><span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			<li><a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCana', 'index') ?>"><?php echo i18n::__('reedIncome') ?></a></li></a></li>
	  </ul>
	  </li>
	  <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('honeys') ?><span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('mieles', 'index') ?>"><?php echo i18n::__('honeys') ?></a></li>
		</ul>
	  </li>
	  <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('qualityControl') ?><span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'index') ?>"><?php echo i18n::__('qualityControl') ?></a></li>
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('jugo', 'index') ?>"><?php echo i18n::__('juiceProcess') ?></a></li>
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('aguas', 'index') ?>"><?php echo i18n::__('waters') ?></a></li>
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('bagazo', 'index') ?>"><?php echo i18n::__('chaff') ?></a></li>
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('cachaza', 'index') ?>"><?php echo i18n::__('cachaza') ?></a></li>
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('panela', 'index') ?>"><?php echo i18n::__('panela') ?></a></li>
		</ul>
	  </li>
	  <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('clarification') ?><span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('clarificacion', 'index') ?>"><?php echo i18n::__('clarification') ?></a></li>
		</ul>
	  </li>
	  <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('employee') ?> <span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>"><?php echo i18n::__('employee') ?></a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'index') ?>"><?php echo i18n::__('provider') ?></a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'index') ?>"><?php echo i18n::__('identificationType') ?></a></li>
		</ul>
	  </li>
	  <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('packing') ?><span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'index') ?>"><?php echo i18n::__('packing') ?></a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'index') ?>"><?php echo i18n::__('typePacking') ?></a></li>
		</ul>
	  </li>
	  <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('input') ?> <span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'index') ?>"><?php echo i18n::__('input') ?></a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'index') ?>"><?php echo i18n::__('inputType') ?></a></li>
		</ul>
	  </li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('languages') ?><span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			<li><a href="<?php echo routing::getInstance()->getUrlWeb('menu', 'traductor', array('language' => 'es', 'PATH_INFO' => request::getInstance()->getServer('PATH_INFO'), 'QUERY_STRING' => htmlentities(request::getInstance()->getServer('QUERY_STRING')))) ?>"><img src="<?php echo routing::getInstance()->getUrlImg('Spain.png') ?>"></a></li>
			<li><a href="<?php echo routing::getInstance()->getUrlWeb('menu', 'traductor', array('language' => 'en', 'PATH_INFO' => request::getInstance()->getServer('PATH_INFO'), 'QUERY_STRING' => htmlentities(request::getInstance()->getServer('QUERY_STRING')))) ?>"><img src="<?php echo routing::getInstance()->getUrlImg('United States of America.png') ?>"></a></li>
		  </ul>
		</li>
	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?php echo session::getInstance()->getUserName() ?><span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
			<li><a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>"><i class="glyphicon glyphicon-log-out">&nbsp;<?php echo i18n::__('logout') ?></i></a></li>
			<li><a href="<?php echo routing::getInstance()->getUrlWeb('reportes', 'index') ?>"><?php echo i18n::__('printReport') ?></a></li>
		  </ul>
		</li>
	  </ul>
	  </nav>

