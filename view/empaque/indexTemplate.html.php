<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = empaqueTableClass::ID ?>
<?php $fecha = empaqueTableClass::FECHA ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('packing') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('empaque', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="tablaUsuario table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th class="tamano"><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('IdPacking') ?></th>
                    <th><?php echo i18n::__('date') ?></th>
                    <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objEmpaque as $empaque): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $empaque->$id ?>"></td>
                        <td><?php echo $empaque->$id ?></td>
                        <td><?php echo $empaque->$fecha ?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'view', array(empaqueTableClass::ID => $empaque->$id)) ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('view') ?></a>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'edit', array(empaqueTableClass::ID => $empaque->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
                            <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $empaque->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a></a>
                            <a href="#" class="btn btn-success btn-xs"><?php echo i18n::__('detail') ?></a>
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
                                <?php echo i18n::__('questionDelete') ?> <?php echo $empaque->$id ?>?
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