<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $fecha = pagoTrabajadoresTableClass::FECHA ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
<div class="page-header titulo">
    <h1><i class="fa fa-pencil-square"> <?php echo i18n::__('editPlayWorkers') ?> <small><?php echo $objPagoTrabajadores[0]->$fecha ?></small></i></h1>
  </div>
<?php view::includePartial('pagoTrabajadores/formPagoTrabajadores', array('objPagoTrabajadores' => $objPagoTrabajadores, 'objTipoPago' => $objTipoPago, 'objEmpleado' => $objEmpleado)) ?>
</div>