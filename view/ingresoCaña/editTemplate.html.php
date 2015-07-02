<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = ingresoCañaTableClass::ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="page-header text-center titulo">
<h1><i class="glyphicon glyphicon-th-list"> <?php echo i18n::__('editCaneIncome') ?> <small><?php echo $objIngresoCaña[0]->$id?></small></i></h1>
</div>
<?php view::includePartial('ingresoCaña/formIngreso', array('objIngresoCaña' => $objIngresoCaña, 'ingresoCaña' => $id, 'objEmpleado' => $objEmpleado, 'objProveedor' => $objProveedor)) ?>
