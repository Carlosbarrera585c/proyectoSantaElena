<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = controlCalidadTableClass::ID ?>
<?php $fecha = controlCalidadTableClass::FECHA ?>
<?php $variedad = controlCalidadTableClass::VARIEDAD ?>
<?php $edad = controlCalidadTableClass::EDAD ?>
<?php $brix = controlCalidadTableClass::BRIX ?>
<?php $ph = controlCalidadTableClass::PH ?>
<?php $ar = controlCalidadTableClass::AR ?>
<?php $sacarosa = controlCalidadTableClass::SACAROSA ?>
<?php $pureza = controlCalidadTableClass::PUREZA ?>
<?php $empleado_id = controlCalidadTableClass::EMPLEADO_ID ?>
<?php $proveedor_id = controlCalidadTableClass::PROVEEDOR_ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
     <div class="page-header text-center titulo">
        <h1><i class="glyphicon glyphicon-th-list"> <?php echo i18n::__('qualityControlInformation') ?></i></h1>
    </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'delete') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new')?></a>
     <a href="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed tables">
      <thead>
        <tr class="columna tr_table">

          <th><?php echo i18n::__('date')?></th>
          <th><?php echo i18n::__('variety')?></th>
          <th><?php echo i18n::__('age')?></th>
          <th><?php echo i18n::__('brix')?></th>
          <th><?php echo i18n::__('ph')?></th>
          <th><?php echo i18n::__('ar')?></th>
          <th><?php echo i18n::__('saccharose')?></th>
          <th><?php echo i18n::__('purity')?></th>
          <th><?php echo i18n::__('idEmployed')?></th>
          <th><?php echo i18n::__('idProvider')?></th>
        </tr>
      </thead>
      <tbody>
          <tr>

          <td><?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$fecha : '') ?></td>
          <td><?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$variedad : '') ?></td>
          <td><?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$edad : '') ?></td>
          <td><?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$brix : '') . ' %' ?></td>
          <td><?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$ph : '') . ' %' ?></td>
          <td><?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$ar : '') . ' %' ?></td>
          <td><?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$sacarosa : '') . ' %' ?></td>
          <td><?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$pureza : '') . ' %' ?></td>
          <td><?php echo ((isset($objControlCalidad) == true) ? controlCalidadTableClass::getNameEmpleado($objControlCalidad[0]->$empleado_id) : '') ?></td>
          <td><?php echo ((isset($objControlCalidad) == true) ? controlCalidadTableClass::getNameProveedor($objControlCalidad[0]->$proveedor_id) : '') ?></td>
          </tr>
      </tbody>
    </table>
  </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'delete') ?>" method="POST">
      <input type="hidden" id="idDelete" name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::ID, true) ?>">
  </form>
</div>
