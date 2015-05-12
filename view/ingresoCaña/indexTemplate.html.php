<?php
use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = ingresoCañaTableClass::ID ?>
<?php $fecha = ingresoCañaTableClass::FECHA ?>
<?php $empleado_id = ingresoCañaTableClass::EMPLEADO_ID ?>
<?php $proveedor_id = ingresoCañaTableClass::PROVEEDOR_ID ?>
<?php $cantidad = ingresoCañaTableClass::CANTIDAD ?>
<?php $procedencia_caña = ingresoCañaTableClass::PROCEDENCIA_CAÑA ?>
<?php $peso_caña = ingresoCañaTableClass::PESO_CAÑA ?>
<?php $num_vagon = ingresoCañaTableClass::NUM_VAGON ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-road"> <?php echo i18n::__('reedIncome') ?></i></h1>
    </div>
    <table class="table table-bordered table-responsive tables">
      <thead>
        <tr class="tr_table">
          <th class="tamano"><input type="checkbox" id="chkAll"></th>
          <th><?php echo i18n::__('employee') ?></th>
          <th><?php echo i18n::__('provider') ?></th>
          <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objIngresoCaña as $ingreso): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $ingreso->$id ?>"></td>
            <td><?php echo ingresoCañaTableClass::getNameEmpleado($ingreso->$empleado_id) ?></td>
            <td><?php echo ingresoCañaTableClass::getNameProveedor($ingreso->$proveedor_id) ?></td>          
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
</div>
