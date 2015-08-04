<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $idProveedor = proveedorTableClass::ID ?>
<?php $razonSoProv = proveedorTableClass::RAZON_SOCIAL ?>
<?php $dirProveedor = proveedorTableClass::DIRECCION ?>
<?php $telProveedor = proveedorTableClass::TELEFONO ?>
<?php $ciudadId = ciudadTableClass::ID ?>
<?php $ciudadNom = ciudadTableClass::NOM_CIUDAD ?>

<div class="container container-fluid">    
    <form class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('proveedor', ((isset($objProveedor)) ? 'update' : 'create')) ?>">
        <?php if (isset($objProveedor) == true): ?>
            <input name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID, true) ?>" value="<?php echo $objProveedor[0]->$idProveedor ?>" type="hidden">
        <?php endif ?>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('businessName') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$razonSoProv : '') ?>" type="text" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true) ?>" placeholder="Introduce la razon social del Proveedor">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('direction') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$dirProveedor : '') ?>" type="text" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true) ?>" placeholder="Introduce la direccion del Proveedor">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('phone') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$telProveedor : '') ?>" type="text" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true) ?>" placeholder="Introduce el telefono del Proveedor">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('city') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID, TRUE) ?>" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::CIUDAD_ID, TRUE) ?>">
                    <?php foreach ($objCiudad as $ciudad): ?>
                        <option value="<?php echo $ciudad->$ciudadId ?>">
                            <?php echo $ciudad->$ciudadNom ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>
        </div>
            
             <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objProveedor)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </form>
</div>
