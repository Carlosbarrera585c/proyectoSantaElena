<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<h1><?php echo i18n::__('newCity') ?></h1>
<?php view::includePartial('ciudad/formCiudad', array('mensaje' => $mensaje)) ?>