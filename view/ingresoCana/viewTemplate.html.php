<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = ingresoCanaTableClass::ID ?>
<?php $fecha = ingresoCanaTableClass::FECHA ?>
<?php $empleado_id = ingresoCanaTableClass::EMPLEADO_ID ?>
<?php $proveedor_id = ingresoCanaTableClass::PROVEEDOR_ID ?>
<?php $cantidad = ingresoCanaTableClass::CANTIDAD ?>
<?php $peso_caña = ingresoCanaTableClass::PESO_CAÑA ?>
<?php $num_vagon = ingresoCanaTableClass::NUM_VAGON ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header text-center titulo">
        <h1><i class="glyphicon glyphicon-th-list"> <?php echo i18n::__('infoCaneIncome') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('ingresoCana', 'delete') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCana', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCana', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="columna tr_table">

                    <th><?php echo i18n::__('date') ?></th>
                    <th><?php echo i18n::__('idEmployed') ?></th>
                    <th><?php echo i18n::__('idProvider') ?></th>
                    <th><?php echo i18n::__('quantity') ?></th>
                    <th><?php echo i18n::__('caneWeight') ?></th>
                    <th><?php echo i18n::__('wagonNumber') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td><?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$fecha : '') ?></td>
                    <td><?php echo ((isset($objingresoCana) == true) ? ingresoCanaTableClass::getNameEmpleado($objingresoCana[0]->$empleado_id) : '') ?></td>
                    <td><?php echo ((isset($objingresoCana) == true) ? ingresoCanaTableClass::getNameProveedor($objingresoCana[0]->$proveedor_id) : '') ?></td>
                    <td><?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$cantidad : '') ?></td>
                    <td><?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$peso_caña : '') ?></td>
                    <td><?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$num_vagon : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('ingresoCana', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::ID, true) ?>">
    </form>
</div>
