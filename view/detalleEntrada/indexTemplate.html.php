<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = detalleEntradaTableClass::ID ?>
<?php $cant = detalleEntradaTableClass::CANTIDAD ?>
<?php $valor = detalleEntradaTableClass::VALOR ?>
<?php $fechaFB = detalleEntradaTableClass::FECHA_FABRICACION ?>
<?php $fechaVC = detalleEntradaTableClass::FECHA_VENCIMIENTO ?>
<?php $idDoc = tipoDocTableClass::ID ?>
<?php $desDoc = tipoDocTableClass::DESC_TIPO_DOC ?>
<?php $enBodegaId = entradaBodegaTableClass::ID ?>
<?php $entradaId = detalleEntradaTableClass::ENTRADA_BODEGA_ID ?>
<?php $fecha = entradaBodegaTableClass::FECHA ?>
<?php $insuId = insumoTableClass::ID ?>
<?php $descInsu = insumoTableClass::DESC_INSUMO ?>

<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">  
    <div class="modal fade" id="myModalFilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filters') ?></h4>
                </div>
                <div class="modal-body">
                    <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'index') ?>">
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
                    <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
                    <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'report') ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('printReport') ?></a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-import"> <?php echo i18n::__('detailEntrance') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
            <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'report') ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('printReport') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <?php view::includeHandlerMessage() ?>
        <table class="tablaUsuario table table-bordered table-responsive table-hover tables">
            <thead>
                <tr class="columna tr_table">
                    <th class="tamano"><input type="checkbox" id="chkAll"></th>
                    <th><?php echo i18n::__('id') ?></th>
                    <th><?php echo i18n::__('amount') ?></th>
                    <th><?php echo i18n::__('value') ?></th>
                    <th><?php echo i18n::__('manuFacturingDate') ?></th>
                    <th><?php echo i18n::__('expirationDate') ?></th>
                    <th><?php echo i18n::__('idEntrance') ?></th>
                    <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objDetalleEntrada as $detalleEntrada): ?>
                  <tr>
                      <td><input type="checkbox" name="chk[]" value="<?php echo $detalleEntrada->$id ?>"></td>

                      <td><?php echo $detalleEntrada->$id ?></td>
                      <td><?php echo $detalleEntrada->$cant ?></td>
                      <td><?php echo $detalleEntrada->$valor ?></td>
                      <td><?php echo $detalleEntrada->$fechaFB ?></td>
                      <td><?php echo $detalleEntrada->$fechaVC ?></td>
                      <td><?php echo $detalleEntrada->$entradaId ?></td>
                      <td>
                          <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'view', array(detalleEntradaTableClass::ID => $detalleEntrada->$id)) ?>" class="btn btn-warning btn-xs"><?php echo i18n::__('view') ?></a>
                          <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'edit', array(detalleEntradaTableClass::ID => $detalleEntrada->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
                          <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $detalleEntrada->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a>
                      </td>
                  </tr>
              <div class="modal fade" id="myModalDelete<?php echo $detalleEntrada->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
                          </div>
                          <div class="modal-body">
                              <?php echo i18n::__('questionDelete') ?> <?php echo $detalleEntrada->$fechaFB ?>?
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                              <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $detalleEntrada->$id ?>, '<?php echo detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
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
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ID, true) ?>">
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
