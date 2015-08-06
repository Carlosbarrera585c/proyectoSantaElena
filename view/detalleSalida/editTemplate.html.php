<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = detalleSalidaTableClass::ID ?>
<?php view::includePartial('menu/menu') ?>
 <div class="page-header  text-center titulo">
        <h1><i class="fa fa-pencil-square"> <?php echo i18n::__('editOutputDetail') ?> <small><?php echo $objDetalleSalida[0]->$id ?></small></i></h1>
    </div>
<?php view::includePartial('detalleSalida/formSalida', array('objDetalleSalida' => $objDetalleSalida, 'detalleSalida' => $id, 'objTipoDoc' => $objTipoDoc, 'objSalidaBodega' => $objSalidaBodega, 'objInsu' => $objInsu)) ?>


