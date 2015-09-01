<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = detalleSalidaTableClass::ID ?>
<?php $cant = detalleSalidaTableClass::CANTIDAD ?>
<?php $valor = detalleSalidaTableClass::VALOR ?>
<?php $fechaFB = detalleSalidaTableClass::FECHA_FABRICACION ?>
<?php $fechaVC = detalleSalidaTableClass::FECHA_VENCIMIENTO ?>
<?php $idDoc = detalleSalidaTableClass::ID_DOC ?>
<?php $desDoc = detalleSalidaTableClass::ID_DOC ?>
<?php $salidaId = salidaBodegaTableClass::ID ?>
<?php $fecha = salidaBodegaTableClass::ID ?>
<?php $detalleSalidaId = detalleSalidaTableClass::SALIDA_BODEGA_ID ?>
<?php $insuId = detalleSalidaTableClass::INSUMO_ID ?>
<?php $descInsu = detalleSalidaTableClass::INSUMO_ID ?>

<?php view::includePartial('menu/menu') ?>

<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-inbox"> <?php echo i18n::__('viewHoldOut') ?></i></h1>
    </div>
    <div class="divTamaño">
        
        <table class="table table-bordered table-responsive table-condensed tables">
<?php foreach ($objSalidaBodega as $key): ?>
                <tr class="columna tr_table">

                   <th><?php echo i18n::__('date') ?></th>   
                </tr>
                <tr>

                    <td><?php echo salidaBodegaTableClass::getNameBodega($key->$fecha) ?></td>
                </tr>
<?php endforeach; ?> 
        </table>
    </div>
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-list-alt"> <?php echo i18n::__('infoOutputDetail') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('detalleSalida', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <?php if (session::getInstance()->hasCredential('admin')): ?>  
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleSalida', 'insert', array(salidaBodegaTableClass::ID => $key->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
            <?php endif; ?>
            <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleSalida', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleSalida', 'report') ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('printReport') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('salidaBodega', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
              <tr class="columna tr_table">
                    
                    <th class="tamano"><input type="checkbox" id="chkAll"></th>    

                    <th><?php echo i18n::__('amount') ?></th>
                    <th><?php echo i18n::__('value') ?></th>
                    <th><?php echo i18n::__('manuFacturingDate') ?></th>
                    <th><?php echo i18n::__('expirationDate') ?></th>
                    <th><?php echo i18n::__('idEntrance') ?></th>
                    <th><?php echo i18n::__('descDoc') ?></th>
                    <th><?php echo i18n::__('descriptionInput') ?></th>
                    <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
               </tr>
            </thead>
            <tbody>
                <tr>            
                        
                        
                        
                        <?php foreach ($objDetalleSalida as $detalleSalida): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $detalleSalida->$id ?>"></td>

                        <td><?php echo $detalleSalida->$cant ?></td>
                        <td><?php echo $detalleSalida->$valor ?></td>
                        <td><?php echo $detalleSalida->$fechaFB ?></td>
                        <td><?php echo $detalleSalida->$fechaVC ?></td>
                        <td><?php echo $detalleSalida->$detalleSalidaId ?></td>
                        <td><?php echo tipoDocTableClass::getNameTipoDes($detalleSalida->$desDoc) ?></td>
                        <td><?php echo insumoTableClass::getNameDInsumo($detalleSalida->$descInsu) ?></td>
                        <td>
                        <?php if (session::getInstance()->hasCredential('admin')): ?>   
                            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleSalida', 'edit', array(detalleSalidaTableClass::ID => $detalleSalida->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
                            <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $detalleSalida->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a>
                        <?php endif; ?>
                        </td>
                    </tr>
            <?php endforeach ?>
                        
                        
                        
                </tr>        
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('detalleSalida', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::ID, true) ?>">
    </form>
     <div class="text-right">
         Pàgina  <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('detalleSalida', 'view', array(detalleSalidaTableClass::ID => $detalleSalida->$detalleSalidaId)) ?>')">
            <?php for ($x = 1; $x <= $cntPages; $x++): ?>
                <option <?php echo(isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
<?php endfor ?>
        </select> de <?php echo $cntPages ?>
    </div>
</div>


 <div class="modal fade" id="myModalFilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filters') ?></h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('detalleSalida', 'view', array(detalleSalidaTableClass::ID=> $detalleSalida-> $detalleSalidaId)) ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?php echo i18n::__('manuFacturingDate') ?></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="filterFechaFB1" name="filter[fechaFB1]">
                                <br>
                                <input type="date" class="form-control" id="filterFechaFB2" name="filter[fechaFB2]">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"><?php echo i18n::__('expirationDate') ?></label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="filterFechaVC1" name="filter[fechaVC1]">
                                <br>
                                <input type="date" class="form-control" id="filterFechaVC2" name="filter[fechaVC2]">
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
   <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('detalleSalida', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::ID, true) ?>">
    </form>
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

<div class="modal fade" id="myModalDelete<?php echo $detalleSalida->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
                            </div>
                            <div class="modal-body">
                                <?php echo i18n::__('questionDelete') ?> <?php echo $detalleSalida->$id ?>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                                <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $detalleSalida->$id ?>, '<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('detalleSalida', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
                            </div>
                        </div>
                    </div>
                </div>