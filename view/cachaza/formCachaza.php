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

<?php $id = cachazaTableClass::ID ?>
<?php $humedad = cachazaTableClass::HUMEDAD ?>
<?php $sacaroza = cachazaTableClass::SACAROZA ?>
<?php $control_id = cachazaTableClass::CONTROL_ID ?>
<?php $id_control = controlCalidadTableClass::ID ?>
<?php $fecha = controlCalidadTableClass::FECHA ?>


<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('cachaza', ((isset($objCachaza)) ? 'update' : 'create')) ?>">
    <?php if (isset($objCachaza) == true): ?>
        <input name="<?php echo cachazaTableClass::getNameField(cachazaTableClass::ID, true) ?>" value="<?php echo $objCachaza[0]->$id ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::getMessageError('errorHumedad') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('humidity') ?>:</label>
            <div class="input-group col-xs-6">
			  <span class="input-group-addon" id="basic-addon3">%</span>
                <input id="<?php echo cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objCachaza) == true) ? $objCachaza[0]->$humedad : ((session::getInstance()->hasFlash(cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true)) === true) ? '' : (request::getInstance()->hasPost(cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true))) ? request::getInstance()->getPost(cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true)) : '' )) ?>" name="<?php echo cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true) ?>" placeholder="<?php echo i18n::__('humidity') ?>" aria-describedby="basic-addon3">
                <?php if (session::getInstance()->hasFlash(cachazaTableClass::getNameField(cachazaTableClass::HUMEDAD, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorSacaroza') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('sacaroza') ?>:</label>
            <div class="input-group col-xs-6">
			  <span class="input-group-addon" id="basic-addon3">%</span>
                <input id="<?php echo cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objCachaza) == true) ? $objCachaza[0]->$sacaroza : ((session::getInstance()->hasFlash(cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true)) === true) ? '' : (request::getInstance()->hasPost(cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true))) ? request::getInstance()->getPost(cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true)) : '' )) ?>" name="<?php echo cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true) ?>" placeholder="<?php echo i18n::__('sacaroza') ?>" aria-describedby="basic-addon3">
                <?php if (session::getInstance()->hasFlash(cachazaTableClass::getNameField(cachazaTableClass::SACAROZA, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorControl') ?>
        <div class="form-group">
            <label class="col-lg-3 control-label"><?php echo i18n::__('qualityControl') ?>:</label>
            <div class="input-group col-xs-6">
                <select class="form-control" id="<?php echo cachazaTableClass::getNameField(cachazaTableClass::ID, true) ?>" name="<?php echo cachazaTableClass::getNameField(cachazaTableClass::CONTROL_ID, TRUE) ?>">
                    <?php foreach ($objControlCalidad as $controlCalidad): ?>
                        <option <?php echo (isset($objCachaza[0]->$control_id) === true and $objCachaza[0]->$control_id == $controlCalidad->$id_control ) ? 'selected' : '' ?> value="<?php echo $controlCalidad->$id_control ?>">
                            <?php echo $controlCalidad->$fecha ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objCachaza)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('cachaza', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>
