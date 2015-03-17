<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = tipoIdTableClass::ID ?>
<?php $desc = tipoIdTableClass::DESC_TIPO_ID ?>
<?php view::includePartial('empleado/menu') ?>
<div class="container container-fluid">  
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('identification') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('identificationType') ?></th>
                    <th><?php echo i18n::__('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objTipoId as $tipo): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $tipo->$id ?>"></td>
                        <td><?php echo $tipo->$desc ?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'view', array(tipoIdTableClass::ID => $tipo->$id)) ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('view') ?></a></a>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'edit', array(tipoIdTableClass::ID => $tipo->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a></a>
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
                                <?php echo i18n::__('questionDelete') ?> <?php echo $tipo->$desc ?>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                                <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $tipo->$id ?>, '<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('tipoId', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::ID, true) ?>">
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