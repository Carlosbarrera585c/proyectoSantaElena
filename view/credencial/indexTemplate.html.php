<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = credencialTableClass::ID ?>
<?php $nom = credencialTableClass::NOMBRE ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="modal fade" id="myModalFilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filters') ?></h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('credencial', 'index') ?>">
                        <div class="form-group">
                            <label for="filterCredencial" class="col-sm-2 control-label"><?php echo i18n::__('credential') ?></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="filterCredencial" name="filter[Credencial]" placeholder="<?php echo i18n::__('credential') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="filterCreado" class="col-sm-2 control-label"><?php echo i18n::__('created') ?></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="filterCreado1" name="filter[creado1]" placeholder="<?php echo i18n::__('created') ?>">
                                <br>
                                <input type="date" class="form-control" id="filterCreado2" name="filter[creado2]" placeholder="<?php echo i18n::__('created') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="filterActualizado" class="col-sm-2 control-label"><?php echo i18n::__('updated') ?></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="filterActualizado1" name="filter[editado1]" placeholder="<?php echo i18n::__('updated') ?>">
                                <br>
                                <input type="date" class="form-control" id="filterActualizado2" name="filter[editado2]" placeholder="<?php echo i18n::__('updated') ?>">
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
    <!-- vetana REPORTES -->
    <div class="modal fade" id="myModalReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('generate report') ?></h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" class="form-horizontal" id="reportFilterForm" action="<?php echo routing::getInstance()->getUrlWeb('credencial', 'report') ?>">
                        <div class="form-group">
                            <label for="reportCredencial" class="col-sm-2 control-label"><?php echo i18n::__('credential') ?></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="reportCredencial" name="report[Credencial]" placeholder="<?php echo i18n::__('credential') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reportCreado" class="col-sm-2 control-label"><?php echo i18n::__('created') ?></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="reportCreado1" name="report[creado1]" placeholder="<?php echo i18n::__('created') ?>">
                                <br>
                                <input type="date" class="form-control" id="reportCreado2" name="report[creado2]" placeholder="<?php echo i18n::__('created') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reportActualizado" class="col-sm-2 control-label"><?php echo i18n::__('updated') ?></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="reportActualizado1" name="report[editado1]" placeholder="<?php echo i18n::__('updated') ?>">
                                <br>
                                <input type="date" class="form-control" id="reportActualizado2" name="report[editado2]" placeholder="<?php echo i18n::__('updated') ?>">
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
    <!-- FINALIZA REPORTE -->
    <div class="page-header titulo">
        <h1><i class="fa fa-credit-card"> <?php echo i18n::__('credential') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('credencial', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <?php if (session::getInstance()->hasCredential('admin')): ?>
              <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
              <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
            <?php endif; ?>
            <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
            <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
            <a class="btn btn-warning btn-xs col-lg-offset-7" data-toggle="modal" data-target="#myModalReport" ><?php echo i18n::__('printReport') ?></a>
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="tablaUsuario table table-bordered table-responsive table-hover tables">
            <thead>
                <tr class="columna tr_table">
                    <th class="tamano"><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('nameCredential') ?></th>
                    <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objCredencial as $credencial): ?>
                  <tr>
                      <td><input type="checkbox" name="chk[]" value="<?php echo $credencial->$id ?>"></td>
                      <td><?php echo $credencial->$nom ?></td>
                      <td>
                          <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'view', array(credencialTableClass::ID => $credencial->$id)) ?>" class="btn btn-info btn-xs"><?php echo i18n::__('view') ?></a>
                          <?php if (session::getInstance()->hasCredential('admin')): ?>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'edit', array(credencialTableClass::ID => $credencial->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
                            <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $credencial->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a></a>
                          <?php endif; ?>
                      </td>
                  </tr>
              <div class="modal fade" id="myModalDelete<?php echo $credencial->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
                          </div>
                          <div class="modal-body">
                              <?php echo i18n::__('questionDelete') ?> <?php echo $credencial->$nom ?>?
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                              <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $credencial->$id ?>, '<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('credencial', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
                          </div>
                      </div>
                  </div>
              </div>
            <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <div class="text-right">
        <?php echo i18n::__('page') ?>  <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('credencial', 'index') ?>')">
        <?php for ($x = 1; $x <= $cntPages; $x++): ?>
              <option <?php echo(isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
            <?php endfor ?>
        </select> <?php echo i18n::__('of') ?> <?php echo $cntPages ?>
    </div>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('credencial', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true) ?>">
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