<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $desc_insumo = insumoTableClass::DESC_INSUMO ?>
<pre>
<h1>Editar insumo <?php echo $objInsu[0]->$desc_insumo ?></h1>
<?php view::includePartial('insumo/formInsumo', array('objInsu' => $objInsu, 'desc_insumo' => $desc_insumo)) ?>
</pre>