<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $desc = tipoDocTableClass::DESC_TIPO_DOC ?>
<pre>
<h1><?php echo i18n::__('editDocType')?> <?php echo $objTipoPago[0]->$desc ?></h1>
<?php view::includePartial('tipoDoc/formTipoDoc', array('objTipoDoc' => $objTipoPago, 'tipoDoc' => $desc)) ?>
</pre>