<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $fechaEB = entradaBodegaTableClass::FECHA ?>
<?php view::includePartial('menu/menu') ?>
<div class="page-header  text-center titulo">
        <h1><i class="fa fa-pencil-square"> <?php echo i18n::__('editCellarEntrance') ?></i></h1>
        <?php echo $objEntradaBodega[0]->$fechaEB ?>
    </div>
<?php view::includePartial('entradaBodega/formEntradaB', array('objEntradaBodega' => $objEntradaBodega, 'fecha' => $fechaEB, 'objProveedor' => $objProveedor)) ?>
