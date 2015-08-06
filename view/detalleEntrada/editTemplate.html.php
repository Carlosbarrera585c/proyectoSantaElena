<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = detalleEntradaTableClass::ID ?>
<?php view::includePartial('menu/menu') ?>
 <div class="page-header  text-center titulo">
        <h1><i class="fa fa-pencil-square"> <?php echo i18n::__('editDetailEntrance') ?></i></h1>
        <?php echo $objDetalleEntrada[0]->$id ?>
    </div>
<?php view::includePartial('detalleEntrada/formEntrada', array('objDetalleEntrada' => $objDetalleEntrada, 'detalleEntrada' => $id, 'objTipoDoc' => $objTipoDoc, 'objEntradaBodega' => $objEntradaBodega, 'objInsu' => $objInsu)) ?>