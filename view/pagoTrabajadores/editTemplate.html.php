<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $fecha = pagoTrabajadoresTableClass::FECHA ?>
<pre>
<h1><?php echo i18n::__('editPlayWorkers') ?> <?php echo $objPagoTrabajadores[0]->$fecha ?></h1>
<?php view::includePartial('pagoTrabajadores/formPagoTrabajadores', array('objPagoTrabajadores' => $objPagoTrabajadores, 'pagoTrabajadores' => $fecha)) ?>
</pre>