<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $fecha = clarificacionTableClass::FECHA ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
  <div class="page-header titulo">
    <h1><i class="fa fa-pencil-square"> <?php echo i18n::__('editClarification') ?> <small><?php echo $objClarificacion[0]->$fecha ?></small></i></h1>
  </div>
    <?php view::includePartial('clarificacion/formClarificacion', array('objClarificacion' => $objClarificacion, 'fecha' => $fecha, 'objEmpleado' => $objEmpleado, 'objProveedor' => $objProveedor)) ?>
</div>