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
<?php $id = empaqueTableClass::ID ?>
<?php $fecha = empaqueTableClass::FECHA ?>
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
    <div class="modal fade" id="myModalFilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filters') ?></h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('empaque', 'index') ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?php echo i18n::__('dateStart') ?></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="filterFecha1" name="filter[fecha1]">
                                <br>
                            </div>
                            <label class="col-sm-2 control-label"><?php echo i18n::__('dateEnd') ?></label>
                            <div class="col-sm-10">    
                                <input type="date" class="form-control" id="filterFecha2" name="filter[fecha2]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="filterCantidad" class="col-sm-2 control-label"><?php echo i18n::__('amount') ?></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="filterApellido" name="filter[cantidad]" placeholder="<?php echo i18n::__('amount') ?>">
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
    <!-- VENTANA MODAL PARA REPORTES CON FILTROS-->
    <div class="modal fade" id="myModalReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('generate report') ?></h4>
                </div>
                <div class="modal-body">
                    <form method="POST" class="form-horizontal" id="reportFilterForm" action="<?php echo routing::getInstance()->getUrlWeb('empaque', 'report') ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?php echo i18n::__('dateStart') ?></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="filterFecha1" name="filter[fecha1]">
                                <br>
                            </div>
                            <label class="col-sm-2 control-label"><?php echo i18n::__('dateEnd') ?></label>
                            <div class="col-sm-10">    
                                <input type="date" class="form-control" id="filterFecha2" name="filter[fecha2]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="filterCantidad" class="col-sm-2 control-label"><?php echo i18n::__('amount') ?></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="filterApellido" name="filter[cantidad]" placeholder="<?php echo i18n::__('amount') ?>">
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
    <div class="page-header titulo">
        <h1><i class="fa fa-male"></i> <?php echo i18n::__('packing') ?></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('empaque', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <?php if (session::getInstance()->hasCredential('admin')): ?>
            <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
             <?php endif; ?>
            <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
            <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
<!--            <a class="btn btn-warning btn-xs col-lg-offset-7" data-toggle="modal" data-target="#myModalReport" ><?php echo i18n::__('printReport') ?></a>-->
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="tablaUsuario table table-bordered table-responsive table-hover tables">
            <thead>
                <tr class="tr_table">
                    <th class="tamano"><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('date') ?></th>
                    <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objEmpaque as $empaque): ?>
                  <tr>
                      <td><input type="checkbox" name="chk[]" value="<?php echo $empaque->$id ?>"></td>
                      <td><?php echo $empaque->$fecha ?></td>
                      <td>
                          <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'view', array(empaqueTableClass::ID => $empaque->$id)) ?>" class="btn btn-info btn-xs"><?php echo i18n::__('view') ?></a></a>
                          <?php if (session::getInstance()->hasCredential('admin')): ?>
                          <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'edit', array(empaqueTableClass::ID => $empaque->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a></a>
                          <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $empaque->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a></a>
                          <?php endif; ?>
                      </td>
                  </tr>
              <div class="modal fade" id="myModalDelete<?php echo $empaque->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
                          </div>
                          <div class="modal-body">
                              <?php echo i18n::__('questionDelete') ?> <?php echo $empaque->$fecha ?>?
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                              <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $empaque->$id ?>, '<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('empaque', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
                          </div>
                      </div>
                  </div>
              </div>
            <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <div class="text-right">
        <?php echo i18n::__('page') ?>  <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>')">
        <?php for ($x = 1; $x <= $cntPages; $x++): ?>
              <option <?php echo(isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
            <?php endfor ?>
        </select> <?php echo i18n::__('of') ?> <?php echo $cntPages ?>
    </div>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('empaque', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, true) ?>">
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
