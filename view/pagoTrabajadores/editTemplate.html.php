<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $fecha = pagoTrabajadoresTableClass::FECHA ?>
 <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('editPlayWorkers') ?></i></h1>
         <?php echo $objPagoTrabajadores[0]->$fecha ?>
    </div>
<?php view::includePartial('pagoTrabajadores/formPagoTrabajadores', array('objPagoTrabajadores' => $objPagoTrabajadores, 'pagoTrabajadores' => $fecha)) ?>
