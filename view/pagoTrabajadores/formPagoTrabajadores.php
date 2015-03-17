<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $idPG = pagoTrabajadoresTableClass::ID ?>
<?php $fecha = pagoTrabajadoresTableClass::FECHA ?>
<?php $periodo_inicio = pagoTrabajadoresTableClass::PERIODO_INICIO ?>
<?php $periodo_fin = pagoTrabajadoresTableClass::PERIODO_FIN ?>
<?php $id_empresa = pagoTrabajadoresTableClass::EMPRESA_ID ?>
<pre>
<div class="container container-fluid">    
    <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', ((isset($objPagoTrabajadores)) ? 'update' : 'create')) ?>">
            <?php if (isset($objPagoTrabajadores) == true): ?>
    <input name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::ID, true) ?>" value="<?php echo $objPagoTrabajadores[0]->$idPG ?>" type="hidden">
                    <?php endif ?>
    <?php view::includeHandlerMessage() ?>
      <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
           <th><?php echo i18n::__('date') ?>:<input value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$fecha : '') ?>" type="text" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true) ?>"></th>
           <th><?php echo i18n::__('periodBeginning') ?>:<input value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodo_inicio : '') ?>" type="text" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true) ?>"></th>
           <th><?php echo i18n::__('orderPeriod') ?>:<input value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodo_fin : '') ?>" type="text" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true) ?>"></th>
           <th><?php echo i18n::__('idBusiness') ?>:<input value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$id_empresa : '') ?>" type="text" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::EMPRESA_ID, true) ?>"></th>
           <th><input class="btn btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objPagoTrabajadores)) ? 'update' : 'register')) ?>"> <a href="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'index') ?>" class="btn btn-info btn-xs">Atrás</a></th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>