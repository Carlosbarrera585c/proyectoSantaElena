<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = credencialTableClass::ID ?>
<?php $nom = credencialTableClass::NOMBRE ?>
<?php view::includePartial('empleado/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('credential')?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('credencial', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('nameCredential')?></th>
                    <th><?php echo i18n::__('actions')?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objCredencial as $credencial): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $credencial->$id ?>"></td>
                        <td><?php echo $credencial->$nom ?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'view', array(credencialTableClass::ID => $credencial->$id)) ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('view') ?></a>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'edit', array(credencialTableClass::ID => $credencial->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
                            <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $credencial->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a></a>
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
                                <?php echo i18n::__('questionDelete')?> <?php echo $credencial->$nom ?>?
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
                <?php echo i18n::__('confirmDeleteMass')?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                <button type="button" class="btn btn-primary" onclick="$('#frmDeleteAll').submit()"><?php echo i18n::__('confirmDelete') ?></button>
            </div>
        </div>
    </div>
</div>