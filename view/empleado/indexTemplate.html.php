<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\config\configClass as config ?>
<?php
use mvc\request\requestClass as request ?>
<?php $id = empleadoTableClass::ID ?>
<?php $nom_empleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php view::includePartial('empleado/menu') ?>
<div class="container container-fluid">
  <div class="modal fade" id="myModalFilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filters') ?></h4>
        </div>
        <div class="modal-body">
          <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>">
            <div class="form-group">
              <label for="filterNombre" class="col-sm-2 control-label"><?php echo i18n::__('employeeName') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterNombre" name="filter[Nombre]" placeholder="<?php echo i18n::__('employeeName') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterApellido" class="col-sm-2 control-label"><?php echo i18n::__('employeeLastName') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterApellido" name="filter[Apellido]" placeholder="<?php echo i18n::__('employeeLastName') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterNumIdentificacion" class="col-sm-2 control-label"><?php echo i18n::__('numberIdentification') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterNumIdentificacion" name="filter[NumIdentificacion]" placeholder="<?php echo i18n::__('numberIdentification') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterTelefono" class="col-sm-2 control-label"><?php echo i18n::__('phone') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterTelefono" name="filter[Telefono]" placeholder="<?php echo i18n::__('phone') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterDireccion" class="col-sm-2 control-label"><?php echo i18n::__('direction') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterDireccion" name="filter[Direccion]" placeholder="<?php echo i18n::__('direction') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterCorreo" class="col-sm-2 control-label"><?php echo i18n::__('mail') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterCorreo" name="filter[Correo]" placeholder="<?php echo i18n::__('mail') ?>">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
          <button type="button" onclick="$('#filterForm').submit()" class="btn btn-primary"><?php echo i18n::__('filtrate') ?></button>
        </div>
      </div>
    </div>
  </div>
  <!-- VENTANA MODAL PARA REPORTES CON FILTROS  COMENTEN ESA MIERDA XD NO SE ENTIENDE ATT:DANNY-->
  <div class="modal fade" id="myModalFILTROSREPORTE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('generate report') ?></h4>
        </div>
        <div class="modal-body">
          <form method="POST" class="form-horizontal" id="reportFilterForm" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'report') ?>">
            <div class="form-group">
              <label for="filterNombre" class="col-sm-2 control-label"><?php echo i18n::__('employeeName') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterNombre" name="report[Nombre]" placeholder="<?php echo i18n::__('employeeName') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterApellido" class="col-sm-2 control-label"><?php echo i18n::__('employeeLastName') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterApellido" name="report[Apellido]" placeholder="<?php echo i18n::__('employeeLastName') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterNumIdentificacion" class="col-sm-2 control-label"><?php echo i18n::__('numberIdentification') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterNumIdentificacion" name="report[NumIdentificacion]" placeholder="<?php echo i18n::__('numberIdentification') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterTelefono" class="col-sm-2 control-label"><?php echo i18n::__('phone') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterTelefono" name="report[Telefono]" placeholder="<?php echo i18n::__('phone') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterDireccion" class="col-sm-2 control-label"><?php echo i18n::__('direction') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterDireccion" name="report[Direccion]" placeholder="<?php echo i18n::__('direction') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterCorreo" class="col-sm-2 control-label"><?php echo i18n::__('mail') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterCorreo" name="report[Correo]" placeholder="<?php echo i18n::__('mail') ?>">
              </div>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
          <button type="button" onclick="$('#reportFilterForm').submit()" class="btn btn-primary"><?php echo i18n::__('generate') ?></button>
        </div>
      </div>
    </div>
  </div>
  <!-- FIN DE LOS FILTROS PARA REPORTE -->
  <form id="frmTraductor" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'traductor') ?>" method="POST">
    <select name="languaje" onchange="$('#frmTraductor').submit()">
      <option <?php echo (config::getDefaultCulture() == 'es') ? 'selected' : '' ?> value="es"> Español</option> 
      <option <?php echo (config::getDefaultCulture() == 'en') ? 'selected' : '' ?> value="en"> Ingles</option> 
    </select>
    <input type="hidden" name="PATH_INFO" value="<?php echo request::getInstance()->getServer('PATH_INFO') ?>">
  </form>
  <div class="page-header titulo">
    <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('employee') ?></i></h1>
  </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
      <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
      <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
      <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
      <a  class="btn btn-warning btn-xs col-lg-offset-11" data-toggle="modal" data-target="#myModalFILTROSREPORTE" ><?php echo i18n::__('printReport') ?></a>
    </div>
    <?php view::includeHandlerMessage() ?>
    <table class="tablaUsuario table table-bordered table-responsive table-hover">
      <thead>
        <tr class="active">
          <th class="tamano"><input type="checkbox" id="chkAll"></th>
          <th><?php echo i18n::__('employeeName') ?></th>
          <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objEmpleado as $tipo): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $tipo->$id ?>"></td>
            <td><?php echo $tipo->$nom_empleado ?></td>
            <td>
              <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'view', array(empleadoTableClass::ID => $tipo->$id)) ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('view') ?></a></a>
              <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'edit', array(empleadoTableClass::ID => $tipo->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a></a>
              <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $tipo->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a></a>
            </td>
          </tr>
        <div class="modal fade" id="myModalDelete<?php echo $tipo->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
              </div>
              <div class="modal-body">
                <?php echo i18n::__('questionDelete') ?> <?php echo $tipo->$nom_empleado ?>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $tipo->$id ?>, '<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('empleado', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
      </tbody>
    </table>
  </form>
  <div class="text-right">
    Pàgina  <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>')">
      <?php for ($x = 1; $x <= $cntPages; $x++): ?>
        <option <?php echo(isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
      <?php endfor ?>
    </select> de <?php echo $cntPages ?>
  </div>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, true) ?>">
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
