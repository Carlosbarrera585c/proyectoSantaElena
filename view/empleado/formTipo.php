<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $idEmpleado = empleadoTableClass::ID ?>
<?php $nom_empleado = empleadoTableClass::NOM_EMPLEADO ?>
<pre>
<div class="container container-fluid">    
    <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('empleado', ((isset($objEmpleado)) ? 'update' : 'create')) ?>">
            <?php if (isset($objEmpleado) == true): ?>
    <input name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, true) ?>" value="<?php echo $objEmpleado[0]->$idEmpleado ?>" type="hidden">
                    <?php endif ?>
    <?php view::includeHandlerMessage() ?>
      <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
           <th><?php echo i18n::__('employeeName') ?>:<input value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$nom_empleado : '') ?>" type="text" class="frm-control" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true) ?>"></th>
           <th><?php echo i18n::__('employeeLastName') ?>:<input value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$apell_empleado : '') ?>" type="text" class="frm-control" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true) ?>"></th>
           <th><?php echo i18n::__('phone') ?>:<input value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$telefono : '') ?>" type="text" class="frm-control" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true) ?>"></th>
           <th><?php echo i18n::__('direction') ?>:<input value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$direccion : '') ?>" type="text" class="frm-control" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true) ?>"></th>
           <th><?php echo i18n::__('identification') ?>:<input value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$tipo_id_id : '') ?>" type="text" class="frm-control" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TIPO_ID_ID, true) ?>"></th>
           <th><?php echo i18n::__('credential') ?>:<input value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$credencial_id : '') ?>" type="text" class="frm-control" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CREDENCIAL_ID, true) ?>"></th>
           <th><?php echo i18n::__('mail') ?>:<input value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$correo : '') ?>" type="text" class="frm-control" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) ?>"></th>
           <th><input class="btn btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objEmpleado)) ? 'update' : 'register')) ?>"> <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a></th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>