<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = empaqueTableClass::ID ?>
<?php $fecha = empaqueTableClass::FECHA ?>
<?php $cantidad = empaqueTableClass::CANTIDAD ?>
<?php $empleado = empaqueTableClass::EMPLEADO_ID ?>
<?php $empaque = empaqueTableClass::TIPO_EMPAQUE_ID ?>
<?php $insumo = empaqueTableClass::INSUMO_ID ?>

<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="fa fa-info-circle"> <?php echo i18n::__('infoPacking') ?> <small><?php echo $objEmpaque[0]->$fecha ?></small></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('empaque', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="tr_table">

                    <th><?php echo i18n::__('date') ?></th>
                    <th><?php echo i18n::__('amount') ?></th> 
                    <th><?php echo i18n::__('employee') ?></th> 
                    <th><?php echo i18n::__('typePacking') ?></th>                 
                    <th><?php echo i18n::__('input') ?></th> 
  
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td><?php echo ((isset($objEmpaque) == true) ? $objEmpaque[0]->$fecha : '') ?></td>
                    <td><?php echo ((isset($objEmpaque) == true) ? $objEmpaque[0]->$cantidad : '') ?></td>
                    <td><?php echo ((isset($objEmpaque) == true) ? empaqueTableClass::getNameEmpleado($objEmpaque[0]->$empleado) : '') ?></td>
                    <td><?php echo ((isset($objEmpaque) == true) ? empaqueTableClass::getNameTipoEmpaque($objEmpaque[0]->$empaque) : '') ?></td>
                    <td><?php echo ((isset($objEmpaque) == true) ? empaqueTableClass::getNameInsumo($objEmpaque[0]->$insumo) : '') ?></td>

            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('empaque', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, true) ?>">
    </form>
</div>
