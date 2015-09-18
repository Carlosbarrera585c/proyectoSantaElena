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
<?php $valor = pagoTrabajadoresTableClass::VALOR ?>
<?php $pagoEmpleadoId = pagoTrabajadoresTableClass::EMPLEADO_ID ?>
<?php $empleadoId = empleadoTableClass::ID ?>
<?php $nomEmpleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php $pagoTipoPagoId = pagoTrabajadoresTableClass::TIPO_PAGO_ID ?>
<?php $tipoPagoId = tipoPagoTableClass::ID ?>
<?php $descTipoPago = tipoPagoTableClass::DESC_TIPO_PAGO ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', ((isset($objPagoTrabajadores)) ? 'update' : 'create')) ?>">
    <?php if (isset($objPagoTrabajadores) == true): ?>
        <input name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::ID, true) ?>" value="<?php echo $objPagoTrabajadores[0]->$idPago ?>" type="hidden">
    <?php endif ?>
    <?php view::getMessageError('errorFecha') ?>
    <div class="container container-fluid">
        <div class="form-group <?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true) ?>" class="form-control" value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$fecha : ((session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true)) === true) ? '' : (request::getInstance()->hasPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true))) ? request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true)) : '' )) ?>" type="date" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true) ?>" placeholder="Introduce la Fecha de Pago">
                <?php if (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::FECHA, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorPeriodoInicio') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('periodBeginning') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true) ?>" class="form-control" value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodoInicio : ((session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true)) === true) ? '' : (request::getInstance()->hasPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true))) ? request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true)) : '' )) ?>" type="date" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true) ?>" placeholder="Introduce el Periodo de Inicio">
                <?php if (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_INICIO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorPeriodoFin') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('orderPeriod') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true) ?>" class="form-control" value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodoFin : ((session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true)) === true) ? '' : (request::getInstance()->hasPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true))) ? request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true)) : '' )) ?>" type="date" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true) ?>" placeholder="Introduce el Periodo de Finalizacion">
                <?php if (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::PERIODO_FIN, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorValor') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::VALOR, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::VALOR, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('value') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::VALOR, true) ?>" class="form-control" value="<?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$valor : ((session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::VALOR, true)) === true) ? '' : (request::getInstance()->hasPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::VALOR, true))) ? request::getInstance()->getPost(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::VALOR, true)) : '' )) ?>" type="number" class="frm-control" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::VALOR, true) ?>" placeholder="Introduce el Valor">
                <?php if (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::VALOR, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorTipoPago') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::TIPO_PAGO_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('paymentType') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::ID, TRUE) ?>" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::TIPO_PAGO_ID, TRUE) ?>">
                    <?php foreach ($objTipoPago as $pago): ?>
                        <option <?php echo (isset($objPagoTrabajadores[0]->$pagoTipoPagoId) === true and $pagoTipoPagoId == $pago->$tipoPagoId) ? 'selected' : '' ?> value="<?php echo $pago->$tipoPagoId ?>">
                            <?php echo $pago->$descTipoPago ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>  
        </div> 
        <?php view::getMessageError('errorEmpleado') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::EMPLEADO_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('employee') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::ID, TRUE) ?>" name="<?php echo pagoTrabajadoresTableClass::getNameField(pagoTrabajadoresTableClass::EMPLEADO_ID, TRUE) ?>">
                    <?php foreach ($objEmpleado as $empleado): ?>
                        <option <?php echo (isset($objPagoTrabajadores[0]->$pagoEmpleadoId) === true and $objPagoTrabajadores[0]->$pagoEmpleadoId == $empleado->$empleadoId) ? 'selected' : '' ?> value="<?php echo $empleado->$empleadoId ?>">
                            <?php echo $empleado->$nomEmpleado ?>
                        </option>     
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objPagoTrabajadores)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>
