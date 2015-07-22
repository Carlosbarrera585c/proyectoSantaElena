<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $fechaEB = salidaBodegaTableClass::FECHA ?>
<?php view::includePartial('menu/menu') ?>
<div class="page-header  text-center titulo">
        <h1><i class="fa fa-pencil-square"> <?php echo i18n::__('editHoldOut') ?></i></h1>
        <?php echo $objSalidaBodega[0]->$fechaEB ?>
    </div>
<?php view::includePartial('salidaBodega/formSalidaB', array('objSalidaBodega' => $objSalidaBodega, 'fecha' => $fechaEB, 'objProveedor' => $objProveedor, 'objEmpleado' => $objEmpleado)) ?>
