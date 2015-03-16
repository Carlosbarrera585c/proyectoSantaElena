<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = tipoInsumoTableClass::ID ?>
<?php $desc = tipoInsumoTableClass::DESC_TIPO_INSUMO ?>
<div class="container container-fluid">
    <h1><?php echo i18n::__('inputType') ?></h1>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('typePacking')?></th>
                    <th><?php echo i18n::__('actions')?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objTipoInsumo as $tipo): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $tipo->$id ?>"></td>
                        <td><?php echo $tipo->$desc ?></td>
                        <td>
                             <a href="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'view', array(tipoInsumoTableClass::ID => $tipo->$id)) ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('view') ?></a></a>
                             <a href="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'edit', array(tipoInsumoTableClass::ID => $tipo->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a></a>
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
                                <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $tipo->$id ?>, '<?php echo tipoInsumoTableClass::getNameField(tipoInsumoTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo tipoInsumoTableClass::getNameField(tipoInsumoTableClass::ID, true) ?>">
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