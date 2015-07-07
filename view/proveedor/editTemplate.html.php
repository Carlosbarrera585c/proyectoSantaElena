<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $rasonS = proveedorTableClass::RAZON_SOCIAL ?>
<?php view::includePartial('menu/menu') ?>
<h1><?php i18n::__('editProvider') ?> <?php echo $objProveedor[0]->$rasonS ?></h1>
<?php view::includePartial('proveedor/formProveedor', array('objProveedor' => $objProveedor, 'proveedor' => $rasonS, 'objCiudad' => $objCiudad)) ?>
