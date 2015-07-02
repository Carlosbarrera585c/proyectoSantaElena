<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $idPG = pagoTrabajadoresTableClass::ID ?>
<?php $fecha = pagoTrabajadoresTableClass::FECHA ?>
<?php $periodo_inicio = pagoTrabajadoresTableClass::PERIODO_INICIO ?>
<?php $periodo_fin = pagoTrabajadoresTableClass::PERIODO_FIN ?>
<?php $empresaId = empresaTableClass::ID ?>
<?php $empresaNom = empresaTableClass::NOM_EMPRESA ?>

<div class="container container-fluid">    
    <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', ((isset($objPagoTrabajadores)) ? 'update' : 'create')) ?>">
            <?php if (isset($objPagoTrabajadores) == true): ?>
    <input name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::ID, true) ?>" value="<?php echo $objPagoTrabajadores[0]->$idPG ?>" type="hidden">
                    <?php endif ?>
    <?php view::includeHandlerMessage() ?>
      
    
            <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$fecha : '') ?>" type="text" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true) ?>" placeholder="Introduce la Fecha de Pago">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('periodBeginning') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodo_inicio : '') ?>" type="text" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true) ?>" placeholder="Introduce el Periodo de Inicio">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('orderPeriod') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodo_fin : '') ?>" type="text" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true) ?>" placeholder="Introduce el Periodo de Fin">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('idBusiness') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::ID, TRUE) ?>" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::EMPRESA_ID, TRUE) ?>">
                    <?php foreach ($objEmpresa as $empresa): ?>
                        <option value="<?php echo $empresa->$empresaId ?>">
                            <?php echo $empresa->$empresaNom ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objPagoTrabajadores)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
  </form>
</div>
