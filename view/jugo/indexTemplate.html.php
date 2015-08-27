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
<?php
use mvc\session\sessionClass as session ?>
<?php $id = jugoTableClass::ID ?>
<?php $procedencia = jugoTableClass::PROCEDENCIA ?>
<?php $brix = jugoTableClass::BRIX ?>
<?php $ph = jugoTableClass::PH ?>
<?php $control_id = jugoTableClass::CONTROL_ID ?>
<?php $proveedor_id = proveedorTableClass::ID ?>
<?php $razon_social = proveedorTableClass::RAZON_SOCIAL ?>

<?php view::includePartial('menu/menu') ?>

<div class="container container-fluid">

    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-filter"> <?php echo i18n::__('juiceProcess') ?></i></h1>
        </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('jugo', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <?php if (session::getInstance()->hasCredential('admin')): ?>
      <a href="<?php echo routing::getInstance()->getUrlWeb('jugo', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
      <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass" data-toggle="modal" data-target="#myModalDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
      <?php endif; ?>
      <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
      <a href="<?php echo routing::getInstance()->getUrlWeb('jugo', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
      <a class="btn btn-warning btn-xs col-lg-offset-7"  data-toggle="modal" data-target="#myModalFILTROSREPORTE" ><?php echo i18n::__('printReport') ?></a>
    </div>
    
<?php view::includeHandlerMessage() ?>
    <table class="tablaUsuario table table-bordered table-responsive table-hover tables">
      <thead>
        <tr class="columna tr_table">
          <th class="tamano"><input type="checkbox" id="chkAll"></th>
          <th><?php echo i18n::__('provenance') ?></th>
          <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objJugo as $jugo): ?>
          <tr>
            <td class="tamano"><input type="checkbox" name="chk[]" value="<?php echo $jugo->$id ?>"></td>
            <td><?php echo jugoTableClass::getNameProveedor($jugo->$procedencia) ?></td>  
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('jugo', 'view', array(jugoTableClass::ID => $jugo->$id)) ?>" class="btn btn-info btn-xs"><?php echo i18n::__('view') ?></a>
                <?php if (session::getInstance()->hasCredential('admin')): ?>
              <a href="<?php echo routing::getInstance()->getUrlWeb('jugo', 'edit', array(jugoTableClass::ID => $jugo->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
              <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $jugo->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a>
              <?php endif; ?>
            </td>
          </tr>
          <div class="modal fade" id="myModalDelete<?php echo $jugo->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
              </div>
              <div class="modal-body">
                <?php echo i18n::__('questionDelete') ?> <?php echo $jugo->$id ?>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $jugo->$id ?>, '<?php echo jugoTableClass::getNameField(jugoTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('jugo', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </tbody>
    </table>
 </form>
    <div class="text-right">
    <?php echo i18n::__('page') ?>  <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('jugo', 'index') ?>')">
      <?php for ($x = 1; $x <= $cntPages; $x++): ?>
        <option <?php echo(isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
      <?php endfor ?>
    </select> <?php echo i18n::__('of') ?> <?php echo $cntPages ?>
  </div>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('jugo', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo jugoTableClass::getNameField(jugoTableClass::ID, true) ?>">
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
<!-- ventana Modal Error al Eliminar Foraneas-->

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
          <form method="POST" class="form-horizontal" id="reportFilterForm" action="<?php echo routing::getInstance()->getUrlWeb('jugo', 'report') ?>">
            <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('provenance') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="reportProcedencia" name="report[procedencia]" id="<?php echo jugoTableClass::getNameField(jugoTableClass::ID, true) ?>" name="<?php echo jugoTableClass::getNameField(jugoTableClass::PROCEDENCIA, TRUE) ?>">
                    <?php foreach ($objProveedor as $proveedor): ?>
                        <option <?php echo (isset($objJugo[0]->$procedencia) === true and $objJugo[0]->$procedencia == $proveedor->$proveedor_id ) ? 'selected' : '' ?> value="<?php echo $proveedor->$proveedor_id ?>">
                            <?php echo $proveedor->$razon_social ?>
                        </option>   
                    <?php endforeach ?>
                </select>
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
          <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('jugo', 'index') ?>">
            <div class="form-group">
            <label class="col-lg-2 control-label" for="filterProcedencia"><?php echo i18n::__('provenance') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="filterProcedencia" name="filter[procedencia]" id="<?php echo jugoTableClass::getNameField(jugoTableClass::ID, true) ?>" name="<?php echo jugoTableClass::getNameField(jugoTableClass::PROCEDENCIA, TRUE) ?>">
                    <?php foreach ($objProveedor as $proveedor): ?>
                        <option <?php echo (isset($objJugo[0]->$procedencia) === true and $objJugo[0]->$procedencia == $proveedor->$proveedor_id ) ? 'selected' : '' ?> value="<?php echo $proveedor->$proveedor_id ?>">
                            <?php echo $proveedor->$razon_social ?>
                        </option>   
                    <?php endforeach ?>
                </select>
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

