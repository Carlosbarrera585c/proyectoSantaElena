<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php
use mvc\request\requestClass as request ?>
<?php $idPago = pagoTrabajadoresTableClass::ID ?>
<?php $fecha = pagoTrabajadoresTableClass::FECHA ?>
<?php $periodoInicio = pagoTrabajadoresTableClass::PERIODO_INICIO ?>
<?php $periodoFin = pagoTrabajadoresTableClass::PERIODO_FIN ?>
<?php $empleadoId = empleadoTableClass::ID ?>
<?php $pagoEmpleadoId = pagoTrabajadoresTableClass::EMPLEADO_ID ?>
<?php $nomEmpleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php $apellEmpleado = empleadoTableClass::APELL_EMPLEADO ?>
<?php $numeroIdentificacionEmpleado = empleadoTableClass::NUMERO_IDENTIFICACION ?>
<?php $pagoTipoPagoId = pagoTrabajadoresTableClass::TIPO_PAGO_ID ?>
<?php $tipoPagoId = tipoPagoTableClass::ID ?>
<?php $descTipoPago = tipoPagoTableClass::DESC_TIPO_PAGO ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', ((isset($objPagoTrabajadores)) ? 'update' : 'create')) ?>">
    <?php if (isset($objPagoTrabajadores) == true): ?>
        <input name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::ID, true) ?>" value="<?php echo $objPagoTrabajadores[0]->$idPago ?>" type="hidden">
    <?php endif ?>
    <?php // view::getMessageError('') ?>
    <div class="container container-fluid">
        <div class="form-group <?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-lg-10">
                <input id="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true) ?>" class="form-control" value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$fecha : '') ?><?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true)) === true) ? request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true)) : '' ?>" type="text" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true) ?>" placeholder="Introduce la Fecha de Pago">
                <?php if (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('periodBeginning') ?>:</label>
            <div class="col-lg-10">
                <input id="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true) ?>" class="form-control" value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodoInicio : '') ?><?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true)) === true) ? request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true)) : '' ?>" type="text" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true) ?>" placeholder="Introduce el Periodo de Inicio">
                <?php if (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('orderPeriod') ?>:</label>
            <div class="col-lg-10">
                <input id="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true) ?>" class="form-control" value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodoFin : '') ?><?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true)) === true) ? request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true)) : '' ?>" type="text" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true) ?>" placeholder="Introduce el Periodo de Finalizacion">
                <?php if (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objPagoTrabajadores)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>
