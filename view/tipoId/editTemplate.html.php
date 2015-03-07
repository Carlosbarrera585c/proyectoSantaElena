<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $desc_tipo_id = tipoIdTableClass::DESC_TIPO_ID ?>
<pre>
<h1>Editar Tipo Id <?php echo $objTipoId[0]->$desc_tipo_id ?></h1>
<?php view::includePartial('tipoId/formTipo', array('objTipoId' => $objTipoId, 'desc_tipo_id' => $desc_tipo_id)) ?>
</pre>