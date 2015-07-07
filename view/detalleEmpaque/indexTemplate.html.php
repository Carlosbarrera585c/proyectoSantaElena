<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>

<?php $id = detalleEmpaqueTableClass::ID ?>
<?php $cant = detalleEmpaqueTableClass::CANTIDAD ?>
<?php $insumoId = detalleEmpaqueTableClass::INSUMO_ID ?>
<?php $empaqueId = detalleEmpaqueTableClass::EMPAQUE_ID ?>

<?php view::includePartial('empleado/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('detailPacking') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="tablaUsuario table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th class="tamano"><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('id') ?></th>
                    <th><?php echo i18n::__('amount') ?></th>
                    <th><?php echo i18n::__('idInput') ?></th>
                    <th><?php echo i18n::__('idPacking') ?></th>
                    <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objDetalleEmpaque as $detalleEmpaque): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $detalleEmpaque->$id ?>"></td>
                      
                        <td><?php echo $detalleEmpaque->$id ?></td>
                        <td><?php echo $detalleEmpaque->$cant ?></td>
                        <td><?php echo $detalleEmpaque->$insumoId ?></td>
                        <td><?php echo $detalleEmpaque->$empaqueId ?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', 'view', array(detalleEmpaqueTableClass::ID => $detalleEmpaque->$id)) ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('view') ?></a>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', 'edit', array(detalleEmpaqueTableClass::ID => $detalleEmpaque->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
                            <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $detalleEmpaque->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a>
                        </td>
                    </tr>
                <div class="modal fade" id="myModalDelete<?php echo $detalleEmpaque->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
                            </div>
                            <div class="modal-body">
                                <?php echo i18n::__('questionDelete') ?> <?php echo $detalleEmpaque->$id ?>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                                <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $detalleEmpaque->$id ?>, '<?php echo detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::ID, true) ?>">
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