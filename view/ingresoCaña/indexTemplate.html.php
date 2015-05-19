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
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
      <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass" data-toggle="modal" data-target="#myModalDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
     
    </div>
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
 </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::ID, true) ?>">
  </form>
</div>
<div class="modal fade" id="myModalDeleteMass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDeleteMass') ?></h4>
      </div>
      <div class="modal-body">
        <?php echo i18n::__('confirmDeleteMass') ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
        <button type="button" class="btn btn-primary" onclick="$('#frmDeleteAll').submit()"><?php echo i18n::__('confirmDelete') ?></button>
      </div>
    </div>
  </div>
</div>
