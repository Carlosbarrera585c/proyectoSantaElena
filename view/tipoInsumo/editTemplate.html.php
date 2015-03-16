<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $desc_tipo_insumo = tipoInsumoTableClass::DESC_TIPO_INSUMO ?>
<pre>
<h1><?php echo i18n::__('newInputType') ?> <?php echo $objTipoInsumo[0]->$desc_tipo_insumo ?></h1>
<?php view::includePartial('tipoInsumo/formTipo', array('objTipoInsumo' => $objTipoInsumo, 'desc_tipo_insumo' => $desc_tipo_insumo)) ?>
</pre>