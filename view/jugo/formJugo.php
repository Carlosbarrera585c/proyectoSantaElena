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
<?php $id = jugoTableClass::ID ?>
<?php $procedencia = jugoTableClass::PROCEDENCIA ?>
<?php $brix = jugoTableClass::BRIX ?>
<?php $ph = jugoTableClass::PH ?>
<?php $control_id = jugoTableClass::CONTROL_ID ?>
<?php $id_control = controlCalidadTableClass::ID ?>
<?php $fecha_control = controlCalidadTableClass::FECHA ?>
<?php $proveedor_id = proveedorTableClass::ID ?>
<?php $razon_social = proveedorTableClass::RAZON_SOCIAL ?>

<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('jugo', ((isset($objJugo)) ? 'update' : 'create')) ?>">
    <?php if (isset($objJugo) == true): ?>
    <input name="<?php echo jugoTableClass::getNameField(jugoTableClass::ID, true) ?>" value="<?php echo $objJugo[0]->$id ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::getMessageError('errorProcedencia') ?>
        <div class="form-group">
            <label class="col-lg-3 control-label"><?php echo i18n::__('provenance') ?>:</label>
            <div class="input-group col-xs-6">
                <select class="form-control" id="<?php echo jugoTableClass::getNameField(jugoTableClass::ID, true) ?>" name="<?php echo jugoTableClass::getNameField(jugoTableClass::PROCEDENCIA, TRUE) ?>">
                    <?php foreach ($objProveedor as $proveedor): ?>
                        <option <?php echo (isset($objJugo[0]->$procedencia) === true and $objJugo[0]->$procedencia == $proveedor->$proveedor_id ) ? 'selected' : '' ?> value="<?php echo $proveedor->$proveedor_id ?>">
                            <?php echo $proveedor->$razon_social ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <?php view::getMessageError('errorBrix') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(jugoTableClass::getNameField(jugoTableClass::BRIX, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo jugoTableClass::getNameField(jugoTableClass::BRIX, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('brix') ?>:</label>
            <div class="input-group col-xs-6">
			  <span class="input-group-addon" id="basic-addon3">%</span>
                <input id="<?php echo jugoTableClass::getNameField(jugoTableClass::BRIX, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objJugo) == true) ? $objJugo[0]->$brix : ((session::getInstance()->hasFlash(jugoTableClass::getNameField(jugoTableClass::BRIX, true)) === true) ? '' : (request::getInstance()->hasPost(jugoTableClass::getNameField(jugoTableClass::BRIX, true))) ? request::getInstance()->getPost(jugoTableClass::getNameField(jugoTableClass::BRIX, true)) : '' )) ?>" name="<?php echo jugoTableClass::getNameField(jugoTableClass::BRIX, true) ?>" placeholder="<?php echo i18n::__('brix') ?>" aria-describedby="basic-addon3">
                <?php if (session::getInstance()->hasFlash(jugoTableClass::getNameField(jugoTableClass::BRIX, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorPh') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(jugoTableClass::getNameField(jugoTableClass::PH, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo jugoTableClass::getNameField(jugoTableClass::PH, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('ph') ?>:</label>
            <div class="input-group col-xs-6">
			  <span class="input-group-addon" id="basic-addon3">%</span>
                <input id="<?php echo jugoTableClass::getNameField(jugoTableClass::PH, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objJugo) == true) ? $objJugo[0]->$ph : ((session::getInstance()->hasFlash(jugoTableClass::getNameField(jugoTableClass::PH, true)) === true) ? '' : (request::getInstance()->hasPost(jugoTableClass::getNameField(jugoTableClass::PH, true))) ? request::getInstance()->getPost(jugoTableClass::getNameField(jugoTableClass::PH, true)) : '' )) ?>" name="<?php echo jugoTableClass::getNameField(jugoTableClass::PH, true) ?>" placeholder="<?php echo i18n::__('ph') ?>" aria-describedby="basic-addon3">
                <?php if (session::getInstance()->hasFlash(jugoTableClass::getNameField(jugoTableClass::PH, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorControl') ?>
        <div class="form-group">
            <label class="col-lg-3 control-label"><?php echo i18n::__('qualityControl') ?>:</label>
            <div class="input-group col-xs-6">
                <select class="form-control" id="<?php echo jugoTableClass::getNameField(jugoTableClass::ID, true) ?>" name="<?php echo jugoTableClass::getNameField(jugoTableClass::CONTROL_ID, TRUE) ?>">
                    <?php foreach ($objControlCalidad as $controlCalidad): ?>
                        <option <?php echo (isset($objJugo[0]->$control_id) === true and $objJugo[0]->$control_id == $controlCalidad->$id_control ) ? 'selected' : '' ?> value="<?php echo $controlCalidad->$id_control ?>">
                            <?php echo $controlCalidad->$fecha_control ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objJugo)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('jugo', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>
