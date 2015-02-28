<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $usu = usuarioTableClass::USER ?>
<?php $id = usuarioTableClass::ID ?>
<div class="container container-fluid">
    <h1>Usuario</h1>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="chkAll"></th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objUsuarios as $usuario): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $usuario->$id ?>"></td>
                        <td><?php echo $usuario->$usu ?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'view', array(usuarioTableClass::ID => $usuario->$id)) ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('view') ?></a>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'edit', array(usuarioTableClass::ID => $usuario->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
                            <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $usuario->$id ?>" onclick="confirmarEliminar(<?php echo $usuario->$id ?>)" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a>
                        </td>
                    </tr>
                <div class="modal fade" id="myModalDelete<?php echo $usuario->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
                            </div>
                            <div class="modal-body">
                                ¿Desea Eliminar El Registro <?php echo $usuario->$usu ?>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                                <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $usuario->$id ?>, '<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('default', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('default', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>">
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
                ¿Desea Eliminar Los Elementos Seleccionados?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                <button type="button" class="btn btn-primary" onclick="$('#frmDeleteAll').submit()"><?php echo i18n::__('confirmDelete') ?></button>
            </div>
        </div>
    </div>
</div>