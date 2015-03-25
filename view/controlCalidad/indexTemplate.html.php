<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = controlCalidadTableClass::ID ?>
<?php $fecha = controlCalidadTableClass::FECHA ?>
<?php $turno = controlCalidadTableClass::TURNO ?>
<?php $brix = controlCalidadTableClass::BRIX ?>
<?php $ph = controlCalidadTableClass::PH ?>
<?php $ar = controlCalidadTableClass::AR ?>
<?php $sacarosa = controlCalidadTableClass::SACAROSA ?>
<?php $pureza = controlCalidadTableClass::PUREZA ?>
<?php $empleado_id = controlCalidadTableClass::EMPLEADO_ID ?>
<?php $proveedor_id = controlCalidadTableClass::PROVEEDOR_ID ?>
<?php view::includePartial('controlCalidad/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('qualityControl') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass" data-toggle="modal" data-target="#myModalDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
             <a href="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'report') ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('printReport') ?></a>
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="tablaUsuario table table-bordered table-responsive table-hover">
            <thead>
                <tr class="columna">
                    <th class="tamano"><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('date') ?></th>
                    <th><?php echo i18n::__('idEmployed') ?></th>
                    <th><?php echo i18n::__('idProvider') ?></th>
                    <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objControlCalidad as $control): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $control->$id ?>"></td>
                        <td><?php echo $control->$fecha ?></td>
                        <td><?php echo controlCalidadTableClass::getNameEmpleado($control->$empleado_id)?></td>
                        <td><?php echo controlCalidadTableClass::getNameProveedor($control->$proveedor_id)?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'view', array(controlCalidadTableClass::ID => $control->$id)) ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('view') ?></a></a>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'edit', array(controlCalidadTableClass::ID => $control->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a></a>
                            <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $control->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a>
                        </td>
                    </tr>
                <div class="modal fade" id="myModalDelete<?php echo $control->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
                            </div>
                            <div class="modal-body">
                                <?php echo i18n::__('questionDelete') ?> <?php echo $control->$id ?>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                                <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $control->$id ?>, '<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <div class="text-right">
        pagina  <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'index') ?> ')">
            <?php for ($x = 1; $x <= $cntPages; $x++): ?>
           
                <option <?php echo(isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
            <?php endfor ?>
                </select> de <?php echo $cntPages; ?>     
    </div>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, true) ?>">
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