<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = detalleEmpaqueTableClass::ID ?>
<?php $cant = detalleEmpaqueTableClass::CANTIDAD ?>
<?php $insuId = insumoTableClass::ID ?>
<?php $descInsu = insumoTableClass::DESC_INSUMO ?>
<?php $empaqueId = empaqueTableClass::ID ?>
<?php $empaqueFecha = empaqueTableClass::FECHA ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', ((isset($objDetalleEmpaque)) ? 'update' : 'create')) ?>">
    <?php if (isset($objDetalleEmpaque) == true): ?>
        <input name="<?php echo detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::ID, true) ?>" value="<?php echo $objDetalleEmpaque[0]->$id ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::includeHandlerMessage() ?>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('amount') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objDetalleEmpaque) == true) ? $objDetalleEmpaque[0]->$cant : '') ?>" name="<?php echo detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::CANTIDAD, true) ?>" placeholder="Introduce la Cantidad">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('idInput') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::ID, TRUE) ?>" name="<?php echo detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::INSUMO_ID, TRUE) ?>">
                    <?php foreach ($objInsu as $insu): ?>
                        <option value="<?php echo $insu->$insuId ?>">
                            <?php echo $insu->$descInsu ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('idPacking') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::ID, TRUE) ?>" name="<?php echo detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::EMPAQUE_ID, TRUE) ?>">
                    <?php foreach ($objEmpaque as $empaque): ?>
                        <option value="<?php echo $empaque->$empaqueId ?>">
                            <?php echo $empaque->$empaqueFecha ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objDetalleEmpaque)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>