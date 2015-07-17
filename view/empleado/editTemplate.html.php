<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $nomEmpleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
  <div class="page-header titulo">
    <h1><i class="fa fa-pencil-square"> <?php echo i18n::__('editEmployee') ?> <small><?php echo $objEmpleado[0]->$nomEmpleado ?></small></i></h1>
  </div>
    <?php view::includePartial('empleado/formEmpleado', array('objEmpleado' => $objEmpleado, 'nom_empleado' => $nomEmpleado, 'objTipoId' => $objTipoId, 'objCredencial' => $objCredencial)) ?>
</div>