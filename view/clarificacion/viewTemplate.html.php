<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = clarificacionTableClass::ID ?>
<?php $fecha = clarificacionTableClass::FECHA ?>
<?php $numBache = clarificacionTableClass::NUM_BACHE ?>
<?php $turno = clarificacionTableClass::TURNO ?>
<?php $empleadoId = clarificacionTableClass::EMPLEADO_ID ?>
<?php $proveedorId = clarificacionTableClass::PROVEEDOR_ID ?>
<?php $brix = clarificacionTableClass::BRIX ?>
<?php $phDiluido = clarificacionTableClass::PH_DILUIDO ?>
<?php $phClarificado = clarificacionTableClass::PH_CLARIFICADO ?>
<?php $calDosificada = clarificacionTableClass::CAL_DOSIFICADA ?>
<?php $floculante = clarificacionTableClass::FLOCULANTE ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="fa fa-info-circle"> <?php echo i18n::__('infoClarification') ?> <small><?php echo $objClarificacion[0]->$fecha ?></small></i></h1>
    </div>
    <div style="margin-bottom: 10px; margin-top: 30px">
        <?php if (session::getInstance()->hasCredential('admin')): ?>
          <a href="<?php echo routing::getInstance()->getUrlWeb('clarificacion', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
        <?php endif; ?>
        <a href="<?php echo routing::getInstance()->getUrlWeb('clarificacion', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed tables">
        <thead>
            <tr class="columna tr_table">

                <th><?php echo i18n::__('batchNumber') ?></th>
                <th><?php echo i18n::__('date') ?></th>
                <th><?php echo i18n::__('turn') ?></th>   
                <th><?php echo i18n::__('employee') ?></th>  
                <th><?php echo i18n::__('provider') ?></th>   
                <th><?php echo i18n::__('brix') ?></th>                    
                <th><?php echo i18n::__('phDiluted') ?></th>   
                <th><?php echo i18n::__('phClarified') ?></th>   
                <th><?php echo i18n::__('dosedLime') ?></th>   
                <th><?php echo i18n::__('flocculant') ?></th>   
            </tr>
        </thead>
        <tbody>
            <tr>

                <td><?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$numBache : '') ?></td>
                <td><?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$fecha : '') ?></td>
                <td><?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$turno : '') ?></td>
                <td><?php echo ((isset($objClarificacion) == true) ? clarificacionTableClass::getNameEmpleado($objClarificacion[0]->$empleadoId) : '')?> <?php echo ((isset($objClarificacion) == true) ? clarificacionTableClass::getApellEmpleado($objClarificacion[0]->$empleadoId) : '')?></td>
                <td><?php echo ((isset($objClarificacion) == true) ? clarificacionTableClass::getNameProveedor($objClarificacion[0]->$proveedorId) : '') ?></td>
                <td><?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$brix : '') . ' %' ?></td>
                <td><?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$phDiluido : '') . ' %' ?></td>
                <td><?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$phClarificado : '') . ' %' ?></td>
                <td><?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$calDosificada : '') ?></td>
                <td><?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$floculante : '') ?></td></tr>
        </tbody>
    </table>
</div>
