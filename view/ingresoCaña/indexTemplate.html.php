<?php
use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = ingresoCañaTableClass::ID ?>
<?php $fecha = ingresoCañaTableClass::FECHA ?>
<?php $empleado_id = ingresoCañaTableClass::EMPLEADO_ID ?>
<?php $proveedor_id = ingresoCañaTableClass::PROVEEDOR_ID ?>
<?php $cantidad = ingresoCañaTableClass::CANTIDAD ?>
<?php $procedencia_caña = ingresoCañaTableClass::PROCEDENCIA_CAÑA ?>
<?php $peso_caña = ingresoCañaTableClass::PESO_CAÑA ?>
<?php $num_vagon = ingresoCañaTableClass::NUM_VAGON ?>
<?php view::includePartial('menu/menu') ?>
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
  <!-- Uso de ventana modal para reportes con filtro-->
  <div class="modal fade" id="myModalFILTROSREPORTE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('generate report') ?></h4>
        </div>
        <div class="modal-body">
          <form method="POST" class="form-horizontal" id="reportFilterForm" action="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'report') ?>">
            <div class="form-group">
              <label for="reportDate1" class="col-sm-2 control-label"><?php echo i18n::__('date') ?></label>
              <div class="col-sm-10">
                <input type="date" name="report[fechaCreacion1]" class="form-control" id="filterCreacion1" placeholder="<?php echo i18n::__('date') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="reportDate1" class="col-sm-2 control-label"><?php echo i18n::__('date') ?></label>
              <div class="col-sm-10">
                <input type="date" name="report[fechaCreacion2]" class="form-control" id="filterCreacion2" placeholder="<?php echo i18n::__('date') ?>">
              </div>
            </div>
               <div class="form-group">
              <label for="reportEmpleado" class="col-sm-2 control-label"><?php echo i18n::__('idEmployed') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterPureza" name="report[Empleado]" placeholder="<?php echo i18n::__('idEmployed') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="reportProveedor" class="col-sm-2 control-label"><?php echo i18n::__('idProvider') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterPureza" name="report[Proveedor]" placeholder="<?php echo i18n::__('idProvider') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="reportCantidad" class="col-sm-2 control-label"><?php echo i18n::__('quantity') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterTurno" name="report[Cantidad]" placeholder="<?php echo i18n::__('quantity') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="reportProcedencia" class="col-sm-2 control-label"><?php echo i18n::__('caneOrigin') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterBrix" name="report[Procedencia]" placeholder="<?php echo i18n::__('caneOrigin') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="reportPeso" class="col-sm-2 control-label"><?php echo i18n::__('caneWeight') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterPh" name="report[Peso]" placeholder="<?php echo i18n::__('caneWeight') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="reportVagon" class="col-sm-2 control-label"><?php echo i18n::__('wagonNumber') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterAr" name="report[Vagon]" placeholder="<?php echo i18n::__('wagonNumber') ?>">
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
  <!--Ventana modal para uso de filtros-->
  <div class="modal fade" id="myModalFilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filters') ?></h4>
        </div>
        <div class="modal-body">
          <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'index') ?>">
            <div class="form-group">
              <label for="filterFecha" class="col-sm-2 control-label"><?php echo i18n::__('date') ?></label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="filterFecha1" name="filter[fecha1]" placeholder="<?php echo i18n::__('date') ?>">
                <br>
                <input type="date" class="form-control" id="filterFecha2" name="filter[fecha2]" placeholder="<?php echo i18n::__('date') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterEmpleado" class="col-sm-2 control-label"><?php echo i18n::__('idEmployed') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterTurno" name="filter[Empleado]" placeholder="<?php echo i18n::__('idEmployed') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterProveedor" class="col-sm-2 control-label"><?php echo i18n::__('idProvider') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterBrix" name="filter[Proveedor]" placeholder="<?php echo i18n::__('idProvider') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterCantidad" class="col-sm-2 control-label"><?php echo i18n::__('quantity') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterApellido" name="filter[Cantidad]" placeholder="<?php echo i18n::__('quantity') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterProcedencia" class="col-sm-2 control-label"><?php echo i18n::__('caneOrigin') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterAr" name="filter[Procedencia]" placeholder="<?php echo i18n::__('caneOrigin') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterPeso" class="col-sm-2 control-label"><?php echo i18n::__('caneWeight') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterSacrosa" name="filter[Peso]" placeholder="<?php echo i18n::__('caneWeight') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="filterVagon" class="col-sm-2 control-label"><?php echo i18n::__('wagonNumber') ?></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="filterPureza" name="filter[Vagon]" placeholder="<?php echo i18n::__('wagonNumber') ?>">
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

    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-road"> <?php echo i18n::__('reedIncome') ?></i></h1>
        </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
      <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass" data-toggle="modal" data-target="#myModalDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
      <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
      <a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
      <a class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModalFILTROSREPORTE" ><?php echo i18n::__('printReport') ?></a>
    </div>
    </div>
<?php view::includeHandlerMessage() ?>
    <table class="tablaUsuario table table-bordered table-responsive table-hover tables">
      <thead>
        <tr class="columna tr_table">
          <th class="tamano"><input type="checkbox" id="chkAll"></th>
          <th><?php echo i18n::__('employee') ?></th>
          <th><?php echo i18n::__('provider') ?></th>
          <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($objIngresoCaña as $ingreso): ?>
          <tr>
            <td class="tamano"><input type="checkbox" name="chk[]" value="<?php echo $ingreso->$id ?>"></td>
            <td><?php echo ingresoCañaTableClass::getNameEmpleado($ingreso->$empleado_id) ?></td>
            <td><?php echo ingresoCañaTableClass::getNameProveedor($ingreso->$proveedor_id) ?></td>  
            <td>
                <a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'view', array(ingresoCañaTableClass::ID => $ingreso->$id)) ?>" class="btn btn-info btn-xs"><?php echo i18n::__('view') ?></a>
              <a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'edit', array(ingresoCañaTableClass::ID => $ingreso->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
              <a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $ingreso->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a>
            </td>
          </tr>
          <div class="modal fade" id="myModalDelete<?php echo $ingreso->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
              </div>
              <div class="modal-body">
                <?php echo i18n::__('questionDelete') ?> <?php echo $ingreso->$id ?>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
                <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $ingreso->$id ?>, '<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
      </tbody>
    </table>
 </form>
    <div class="text-right">
    pagina  <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'index') ?>')">
      <?php for ($x = 1; $x <= $cntPages; $x++): ?>
        <option <?php echo(isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
      <?php endfor ?>
    </select> de <?php echo $cntPages; ?>     
  </div>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::ID, true) ?>">
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
