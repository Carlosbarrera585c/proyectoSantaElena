<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = insumoTableClass::ID ?>
<?php $desc_insumo = insumoTableClass::DESC_INSUMO ?>
<?php $precio = insumoTableClass::PRECIO ?>
<?php $tipo_insumo_id = insumoTableClass::TIPO_INSUMO_ID ?>
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
        <div class="modal fade" id="myModalFiltrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> filtro</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('insumo', 'index') ?>">

                            <div class="form-group">
                                <label for="filterDescripcion" class="col-sm-2 control-label"><?php echo i18n::__('description') ?></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="filterDescripcion" name="filter[Descripcion]" placeholder="Description">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                        <button type="button" onclick="$('#filterForm').submit()" class="btn btn-primary"><?php echo i18n::__('filters') ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModalFILTROSREPORTE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('generate report') ?></h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" class="form-horizontal" id="reportFilterForm" action="<?php echo routing::getInstance()->getUrlWeb('insumo', 'report') ?>">
                            <div class="form-group">
                                <label for="filterDescripcion" class="col-sm-2 control-label"><?php echo i18n::__('description') ?></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="filterDescripcion" name="report[Descripcion]" placeholder="<?php echo i18n::__('description') ?>">
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
        <div class="page-header titulo">
            <h1><i class="glyphicon glyphicon-baby-formula"> <?php echo i18n::__('input') ?></i></h1>
        </div>
        <h1><?php i18n::__('input') ?></h1>
        <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('insumo', 'deleteSelect') ?>" method="POST">
            <div style="margin-bottom: 10px; margin-top: 30px">
                <?php if (session::getInstance()->hasCredential('admin')): ?>
                <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
                <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
                <?php endif; ?>
                <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalFiltrar"><?php echo i18n::__('filters') ?></button>
                <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
<!--                <a  class="btn btn-warning btn-xs col-lg-offset-7" data-toggle="modal" data-target="#myModalFILTROSREPORTE" ><?php echo i18n::__('printReport') ?></a>-->

            </div>
            <?php view::includeHandlerMessage() ?>
            <table class="tablaUsuario table table-bordered table-responsive table-hover tables">
                <thead>
                    <tr class="columna tr_table">
                        <?php if (session::getInstance()->hasCredential('admin')): ?>
                        <th class="tamano"><input type="checkbox" id="chkAll"></th>
                        <?php endif; ?>
                        <th><?php echo i18n::__('descriptionInput') ?></th>
                        <th><?php echo i18n::__('price') ?></th>
                        <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($objInsu as $insu): ?>
                        <tr>
                            <?php if (session::getInstance()->hasCredential('admin')): ?>
                            <td><input type="checkbox" name="chk[]" value="<?php echo $insu->$id ?>"></td>
                            <?php endif; ?>
                            <td><?php echo $insu->$desc_insumo ?></td>
                            <td><?php echo '$' . number_format($objInsu[0]->$precio, 0, ',', '.'); ?></td>
                            <td>
                                <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'view', array(insumoTableClass::ID => $insu->$id)) ?>" class="btn btn-info btn-xs"><?php echo i18n::__('view') ?></a>
                                <?php if (session::getInstance()->hasCredential('admin')): ?>
                                <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'edit', array(insumoTableClass::ID => $insu->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>                               
                                <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $insu->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <div class="modal fade" id="myModalDelete<?php echo $insu->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
                                </div>
                                <div class="modal-body">
                                    <?php echo i18n::__('questionDelete') ?> <?php echo $insu->$desc_insumo ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                                    <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $insu->$id ?>, '<?php echo insumoTableClass::getNameField(insumoTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('insumo', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
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
        <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('insumo', 'delete') ?>" method="POST">
            <input type="hidden" id="idDelete" name="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, true) ?>">
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
