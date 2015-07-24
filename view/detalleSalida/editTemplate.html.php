<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = detalleSalidaTableClass::ID ?>
<?php $cantidad = detalleSalidaTableClass::CANTIDAD ?>
<?php view::includePartial('menu/menu') ?>
 <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('editDetailEntrance') ?></i></h1>
        <?php echo $objDetalleSalida[0]->$id ?>
    </div>
<?php view::includePartial('detalleSalida/formSalida', array('objDetalleSalida' => $objDetalleSalida, 'detalleSalida' => $id, 'objTipoDoc' => $objTipoDoc, 'objSalidaBodega' => $objSalidaBodega, 'objInsu' => $objInsu)) ?>


