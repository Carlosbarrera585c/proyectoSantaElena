<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = tipoDocTableClass::ID ?>
<?php $desc = tipoDocTableClass::DESC_TIPO_DOC ?>
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
                        <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'index') ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label"><?php echo i18n::__('descDoc') ?></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="filterdescripcion" name="filter[descripcion]" placeholder="Descripcion del Documento">
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
            <h1><i class="glyphicon glyphicon-duplicate"></i> <?php echo i18n::__('docType') ?></h1>
        </div>
        <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'deleteSelect') ?>" method="POST">
            <div style="margin-bottom: 10px; margin-top: 30px">
                <?php if (session::getInstance()->hasCredential('admin')): ?>
                <a href="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
                <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
                 <?php endif; ?>
                <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
                <a href="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
            </div>
            <?php view::includeHandlerMessage() ?>
            <table class="tablaUsuario table table-bordered table-responsive table-hover tables">
                <thead>
                    <tr class="columna tr_table">
                        <th class="tamano"><input type="checkbox" id="chkAll"></th>
                        <th><?php echo i18n::__('desc') ?></th>
                        <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($objTipoDoc as $tipoDoc): ?>
                        <tr>
                            <td><input type="checkbox" name="chk[]" value="<?php echo $tipoDoc->$id ?>"></td>
                            <td><?php echo $tipoDoc->$desc ?></td>
                            <td>
                                <a href="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'view', array(tipoDocTableClass::ID => $tipoDoc->$id)) ?>" class="btn btn-info btn-xs"><?php echo i18n::__('view') ?></a></a>
                                <?php if (session::getInstance()->hasCredential('admin')): ?>
                                <a href="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'edit', array(tipoDocTableClass::ID => $tipoDoc->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a></a>
                                <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $tipoDoc->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <div class="modal fade" id="myModalDelete<?php echo $tipoDoc->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
                                </div>
                                <div class="modal-body">
                                    <?php echo i18n::__('questionDelete') ?> <?php echo $tipoDoc->$desc ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                                    <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $tipoDoc->$id ?>, '<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
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
        <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'delete') ?>" method="POST">
            <input type="hidden" id="idDelete" name="<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::ID, true) ?>">
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