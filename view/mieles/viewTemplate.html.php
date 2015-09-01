<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = mielesTableClass::ID ?>
<?php $fecha = mielesTableClass::FECHA ?>
<?php $turno = mielesTableClass::TURNO ?>
<?php $empleadoId = mielesTableClass::EMPLEADO_ID ?>
<?php $numCeba = mielesTableClass::NUM_CEBA ?>
<?php $caja = mielesTableClass::CAJA ?>
<?php $observacion = mielesTableClass::OBSERVACION ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="fa fa-info-circle"> <?php echo i18n::__('honeysInformation') ?> <small><?php echo $objMieles[0]->$fecha ?></small></i></h1>
    </div>
    <div style="margin-bottom: 10px; margin-top: 30px">
        <?php if (session::getInstance()->hasCredential('admin')): ?>
          <a href="<?php echo routing::getInstance()->getUrlWeb('mieles', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
        <?php endif; ?>
        <a href="<?php echo routing::getInstance()->getUrlWeb('mieles', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed tables">
        <thead>
            <tr class="columna tr_table">

                <th><?php echo i18n::__('date') ?></th>
                <th><?php echo i18n::__('turn') ?></th>   
                <th><?php echo i18n::__('operator') ?></th>  
                <th><?php echo i18n::__('numberOfFattening') ?></th>   
                <th><?php echo i18n::__('box') ?></th>
                <th><?php echo i18n::__('observations') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
 
                <td><?php echo ((isset($objMieles) == true) ? $objMieles[0]->$fecha : '') ?></td>
                <td><?php echo ((isset($objMieles) == true) ? $objMieles[0]->$turno : '') ?></td>
                <td><?php echo ((isset($objMieles) == true) ? mielesTableClass::getNameEmpleado($objMieles[0]->$empleadoId) : '') ?></td>
                <td><?php echo ((isset($objMieles) == true) ? $objMieles[0]->$numCeba : '') ?></td>
                <td><?php echo ((isset($objMieles) == true) ? $objMieles[0]->$caja : '') ?></td>
                <td><?php echo ((isset($objMieles) == true) ? $objMieles[0]->$observacion : '') ?></td></tr>
        </tbody>
    </table>
</div>
