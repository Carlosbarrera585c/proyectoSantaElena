<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n?>
<?php $id = pagoTrabajadoresTableClass::ID ?>
<?php $fecha = pagoTrabajadoresTableClass::FECHA ?>
<?php $periodo_inicio = pagoTrabajadoresTableClass::PERIODO_INICIO ?>
<?php $periodo_fin = pagoTrabajadoresTableClass::PERIODO_FIN ?>
<?php $id_empresa = pagoTrabajadoresTableClass::EMPRESA_ID ?>

<div class="container container-fluid">
    <h1>Información de las Ciudades</h1>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new')?></a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
     <a href="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed">
      <thead>
        <tr>
          <th><?php echo i18n::__('id')?></th>
          <th><?php echo i18n::__('date')?></th>
          <th><?php echo i18n::__('periodBeginning')?></th>
          <th><?php echo i18n::__('orderPeriod')?></th>
          <th><?php echo i18n::__('idBusiness')?></th>
        </tr>
      </thead>
      <tbody>
          <tr>
          <td><?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$id : '') ?></td>
          <td><?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$fecha : '') ?></td>
          <td><?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodo_inicio : '') ?></td>
          <td><?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodo_fin : '') ?></td>
          <td><?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$id_empresa : '') ?></td>
          </tr>
      </tbody>
    </table>
  </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::ID, true) ?>">
  </form>
</div>
