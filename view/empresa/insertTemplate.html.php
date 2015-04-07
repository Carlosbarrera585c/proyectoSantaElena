<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<h1><?php echo i18n::__('newBusiness')?></h1>
<?php view::includePartial('empresa/formEmpresa', array('objUsuarios' => $objUsuarios,)) ?>