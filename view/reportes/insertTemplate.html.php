
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid" id="cuerpo">
<div class="center-block" id="cuerpo2">
<div class="page-header titulo">
	<h1><i class="glyphicon glyphicon-tasks"> <?php echo i18n::__('printReport') ?></i></h1>
  </div>
  <br><br>
   </div>
<?php view::includePartial('reportes/formularioPrincipal',array('objControlCalidad'=>$objControlCalidad, 'objProveedor' =>$objProveedor)) ?>
</div>