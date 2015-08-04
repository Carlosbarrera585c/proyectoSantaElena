<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $rasonS = proveedorTableClass::RAZON_SOCIAL ?>
<?php view::includePartial('menu/menu') ?>
<div class="page-header text-center titulo">
<h1><i class="glyphicon glyphicon-th-list"> <?php echo i18n::__('editProvider') ?> <small><?php echo $objProveedor[0]->$rasonS ?></small></i></h1>
</div>
<?php view::includePartial('proveedor/formProveedor', array('objProveedor' => $objProveedor, 'proveedor' => $rasonS, 'objCiudad' => $objCiudad)) ?>
