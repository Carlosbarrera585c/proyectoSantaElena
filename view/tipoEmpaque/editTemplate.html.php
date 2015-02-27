<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $desc_tipo_empaque = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>
<pre>
<h1>Editar Tipo Empaque <?php echo $objTipoEmpaque[0]->$desc_tipo_empaque ?></h1>
<?php view::includePartial('tipoEmpaque/formTipo', array('objTipoEmpaque' => $objTipoEmpaque, 'desc_tipo_empaque' => $desc_tipo_empaque)) ?>
</pre>