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
<?php $idE = entradaBodegaTableClass::ID ?>
<?php $fechaE = entradaBodegaTableClass::FECHA ?>
<?php $proveedorId = entradaBodegaTableClass::PROVEEDOR_ID ?>
<?php $proveeId = proveedorTableClass::ID ?>
<?php $proveeNom = proveedorTableClass::RAZON_SOCIAL ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid divTamaño">    
    <form class="form-horizontal" method="post" action="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', ((isset($objEntradaBodega)) ? 'update' : 'create')) ?>">
        <?php if (isset($objEntradaBodega) == true): ?>
        <input name="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID, true) ?>" value="<?php echo $objEntradaBodega[0]->$idE ?>" type="hidden">
        <?php endif ?>
        <?php view::includeHandlerMessage() ?>

        <div class="form-group <?php echo (session::getInstance()->hasFlash(entradaBodegaTableClass::getNameField(entradaBodegaTableClass::FECHA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-xs-6">
			  <input type="datetime" class="form-control" value="<?php echo date("Y-m-d") ?>" name="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::FECHA, true) ?>" placeholder="<?php echo i18n::__('enterTheDate') ?>">
            </div>
        </div>
            
            <div class="form-group <?php echo (session::getInstance()->hasFlash(entradaBodegaTableClass::getNameField(entradaBodegaTableClass::PROVEEDOR_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::PROVEEDOR_ID, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('provider') ?>:</label>
           <div class="col-xs-6">
                <select class="form-control" id="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID, TRUE) ?>" id="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::PROVEEDOR_ID, TRUE) ?>" name="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::PROVEEDOR_ID, TRUE) ?>">
                    <?php foreach ($objProveedor as $proveedor): ?>
                        <option <?php echo (isset($objEntradaBodega[0]->$proveedorId) === true and $objEntradaBodega[0]->$proveedorId == $proveedor->$proveeId) ? 'selected' : '' ?> value="<?php echo $proveedor->$proveeId ?>">
                            <?php echo $proveedor->$proveeNom ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 

        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objEntradaBodega)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </form>
</div>

