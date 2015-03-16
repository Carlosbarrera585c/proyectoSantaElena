<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $fechaEB = entradaBodegaTableClass::FECHA ?>
<pre>
<h1>Editar Tipo Empaque <?php echo $objEntradaBodega[0]->$fechaEB ?></h1>
<?php view::includePartial('entradaBodega/formEntradaB', array('objEntradaBodega' => $objEntradaBodega, 'fecha' => $fechaEB)) ?>
</pre>