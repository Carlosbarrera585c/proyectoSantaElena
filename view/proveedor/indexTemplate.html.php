<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = proveedorTableClass::ID ?>
<?php $razonS = proveedorTableClass::RAZON_SOCIAL ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <!-- ventana Modal Error al Eliminar Foraneas-->
<div class="container container-fluid">
    <div class="modal fade" id="myModalErrorDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('delete') ?></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Ventana Modal Error al Eliminar Foraneas-->
    <!-- Uso de ventana modal para reportes con filtro-->
  <div class="modal fade" id="myModalFILTROSREPORTE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('generate report') ?></h4>
        </div>
        <div class="modal-body">
          <form method="POST" class="form-horizontal" id="reportFilterForm" action="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'report') ?>">
            <div class="form-group">
              <label for="reportRSocial" class="col-sm-2 control-label"><?php echo i18n::__('businessName') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterTurno" name="report[RSocial]" placeholder="<?php echo i18n::__('businessName') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="reportDireccion" class="col-sm-2 control-label"><?php echo i18n::__('direction') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterBrix" name="report[Direccion]" placeholder="<?php echo i18n::__('direction') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="reportTelefono" class="col-sm-2 control-label"><?php echo i18n::__('phone') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterPh" name="report[Telefono]" placeholder="<?php echo i18n::__('phone') ?>">
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
  <!--Ventana modal para uso de filtros-->
    
  <div class="modal fade" id="myModalFilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filters') ?></h4>
        </div>
        <div class="modal-body">
          <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'index') ?>">
            <div class="form-group">
              <label for="filterRSocial" class="col-sm-2 control-label"><?php echo i18n::__('businessName') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterRSocial" name="filter[RSocial]" placeholder="<?php echo i18n::__('businessName') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterDireccion" class="col-sm-2 control-label"><?php echo i18n::__('direction') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterDireccion" name="filter[Direccion]" placeholder="<?php echo i18n::__('direction') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterTelefono" class="col-sm-2 control-label"><?php echo i18n::__('phone') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterTelefono" name="filter[Telefono]" placeholder="<?php echo i18n::__('phone') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterCiudad" class="col-sm-2 control-label"><?php echo i18n::__('idCity') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterCiudad" name="filter[Ciudad]" placeholder="<?php echo i18n::__('idCity') ?>">
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
  <div class="page-header titulo">
    <h1><i class="glyphicon glyphicon-shopping-cart"></i> <?php echo i18n::__('provider') ?></h1>
  </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
        <?php if (session::getInstance()->hasCredential('admin')): ?>
      <a href="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
      <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
      <?php endif; ?>
      <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
      <a href="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
<!--       <a class="btn btn-warning btn-xs col-lg-offset-7" data-toggle="modal" data-target="#myModalFILTROSREPORTE" ><?php //echo i18n::__('printReport') ?></a>-->
    </div>
    <?php view::includeHandlerMessage() ?>
    <table class="tablaUsuario table table-bordered table-responsive table-hover tables">
      <thead>
          <tr class="columna tr_table">
          <th class="tamano"><input type="checkbox" id="chkAll"></th>
          <th><?php echo i18n::__('businessName') ?></th>
          <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objProveedor as $proveed): ?>
          <tr>
            <td><input type="checkbox" name="chk[]" value="<?php echo $proveed->$id ?>"></td>
            <td><?php echo $proveed->$razonS ?></td>
            <td>
              <a href="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'view', array(proveedorTableClass::ID => $proveed->$id)) ?>" class="btn btn-info btn-xs"><?php echo i18n::__('view') ?></a></a>
              <?php if (session::getInstance()->hasCredential('admin')): ?>
              <a href="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'edit', array(proveedorTableClass::ID => $proveed->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a></a>
              <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $proveed->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a></a>
              <?php endif; ?>
            </td>
          </tr>
        <div class="modal fade" id="myModalDelete<?php echo $proveed->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
              </div>
              <div class="modal-body">
                <?php echo i18n::__('questionDelete') ?> <?php echo $proveed->$razonS ?>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $proveed->$id ?>, '<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('proveedor', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach ?>
      </tbody>
    </table>
  </form>
  <div class="text-right">
    pagina  <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('proveedor', 'index') ?>')">
      <?php for ($x = 1; $x <= $cntPages; $x++): ?>

        <option <?php echo(isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
      <?php endfor ?>
    </select> de <?php echo $cntPages; ?>     
  </div>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID, true) ?>">
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
