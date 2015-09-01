<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = pagoTrabajadoresTableClass::ID ?>
<?php $fecha = pagoTrabajadoresTableClass::FECHA ?>
<?php $periodoInicio = pagoTrabajadoresTableClass::PERIODO_INICIO ?>
<?php $periodoFin = pagoTrabajadoresTableClass::PERIODO_FIN ?>
<?php $idEmpleado = pagoTrabajadoresTableClass::EMPLEADO_ID ?>
<?php $idTipoPago = pagoTrabajadoresTableClass::TIPO_PAGO_ID ?>
<?php $valor = pagoTrabajadoresTableClass::VALOR ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="fa fa-info-circle"> <?php echo i18n::__('infoPlayWokers') ?></i></h1>
    </div>
    <div style="margin-bottom: 10px; margin-top: 30px">
        <?php if (session::getInstance()->hasCredential('admin')): ?>
          <a href="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
        <?php endif; ?>
        <a href="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed tables">
        <thead>
            <tr class="columna tr_table">
  
                <th><?php echo i18n::__('date') ?></th>
                <th><?php echo i18n::__('periodBeginning') ?></th>
                <th><?php echo i18n::__('orderPeriod') ?></th>
                <th><?php echo i18n::__('value') ?></th>
                <th><?php echo i18n::__('employee') ?></th>
                <th><?php echo i18n::__('numberIdentification') ?></th>
                <th><?php echo i18n::__('paymentType') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
       
                <td><?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$fecha : '') ?></td>
                <td><?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodoInicio : '') ?></td>
                <td><?php echo ((isset($objPagoTrabajadores) == true) ? $objPagoTrabajadores[0]->$periodoFin : '') ?></td>
                <td><?php echo '$' . number_format($objPagoTrabajadores[0]->$valor, 0, ',', '.'); ?></td>
                <td><?php echo ((isset($objPagoTrabajadores) == true) ? pagoTrabajadoresTableClass::getNameEmpleado($objPagoTrabajadores[0]->$idEmpleado) : '') ?></td>
                <td><?php echo ((isset($objPagoTrabajadores) == true) ? pagoTrabajadoresTableClass::getNameNumeroIdEmpleado($objPagoTrabajadores[0]->$idEmpleado) : '') ?></td>
                <td><?php echo ((isset($objPagoTrabajadores) == true) ? pagoTrabajadoresTableClass::getNameTipoPago($objPagoTrabajadores[0]->$idTipoPago) : '') ?></td>
            </tr>
        </tbody>
    </table>
</div>
