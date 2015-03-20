<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $fechaFB = detalleEntradaTableClass::FECHA_FABRICACION ?>
<h1><?php echo i18n::__('editDetailEntrance') ?> <?php echo $objDetalleEntrada[0]->$fechaFB ?></h1>
<?php view::includePartial('detalleEntrada/formEntrada', array('objDetalleEntrada' => $objDetalleEntrada, 'detalleEntrada' => $fechaFB, 'objTipoDoc' => $objTipoDoc, 'objEntradaBodega' => $objEntradaBodega, 'objInsu' => $objInsu)) ?>