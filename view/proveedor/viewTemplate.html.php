<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $id = proveedorTableClass::ID ?>
<?php $razonS = proveedorTableClass::RAZON_SOCIAL ?>
<?php $direcc = proveedorTableClass::DIRECCION ?>
<?php $telef = proveedorTableClass::TELEFONO ?>
<?php $idC = proveedorTableClass::CIUDAD_ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-shopping-cart"> <?php echo i18n::__('infoProvider') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="columna tr_table">
                 
                    <th><?php echo i18n::__('businessName') ?></th>
                    <th><?php echo i18n::__('phone') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
        
                    <td><?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$razonS : '') ?></td>
                    <td><?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$telef : '') ?></td>
                  
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID, true) ?>">
    </form>
</div>
