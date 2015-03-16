<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<h1><?php echo i18n::__('newDocType')?></h1>
<?php view::includePartial('tipoDoc/formTipoDoc', array('mensaje' => $mensaje)) ?>