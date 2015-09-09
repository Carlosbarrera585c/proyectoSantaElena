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
<?php $id = bagazoTableClass::ID ?>
<?php $humedad = bagazoTableClass::HUMEDAD ?>
<?php $brix = bagazoTableClass::BRIX ?>
<?php $sacarosa = bagazoTableClass::SACAROSA ?>
<?php $control_id = bagazoTableClass::CONTROL_ID ?>
<?php $id_control = controlCalidadTableClass::ID ?>
<?php $fecha_control = controlCalidadTableClass::FECHA ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('bagazo', ((isset($objBagazo)) ? 'update' : 'create')) ?>">
    <?php if (isset($objBagazo) == true): ?>
    <input name="<?php echo bagazoTableClass::getNameField(bagazoTableClass::ID, true) ?>" value="<?php echo $objBagazo[0]->$id ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::getMessageError('errorHumedad') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('humidity') ?>:</label>
            <div class="input-group col-xs-6">
			  <span class="input-group-addon" id="basic-addon3">%</span>
                <input id="<?php echo bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objBagazo) == true) ? $objBagazo[0]->$humedad : ((session::getInstance()->hasFlash(bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true)) === true) ? '' : (request::getInstance()->hasPost(bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true))) ? request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true)) : '' )) ?>" name="<?php echo bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true) ?>" placeholder="<?php echo i18n::__('humidity') ?>" aria-describedby="basic-addon3">
                <?php if (session::getInstance()->hasFlash(bagazoTableClass::getNameField(bagazoTableClass::HUMEDAD, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorBrix') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(bagazoTableClass::getNameField(bagazoTableClass::BRIX, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo bagazoTableClass::getNameField(bagazoTableClass::BRIX, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('brix') ?>:</label>
            <div class="input-group col-xs-6">
			  <span class="input-group-addon" id="basic-addon3">%</span>
                <input id="<?php echo bagazoTableClass::getNameField(bagazoTableClass::BRIX, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objBagazo) == true) ? $objBagazo[0]->$brix : ((session::getInstance()->hasFlash(bagazoTableClass::getNameField(bagazoTableClass::BRIX, true)) === true) ? '' : (request::getInstance()->hasPost(bagazoTableClass::getNameField(bagazoTableClass::BRIX, true))) ? request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::BRIX, true)) : '' )) ?>" name="<?php echo bagazoTableClass::getNameField(bagazoTableClass::BRIX, true) ?>" placeholder="<?php echo i18n::__('brix') ?>" aria-describedby="basic-addon3">
                <?php if (session::getInstance()->hasFlash(bagazoTableClass::getNameField(bagazoTableClass::BRIX, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorSacarosa') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('saccharose') ?>:</label>
            <div class="input-group col-xs-6">
			  <span class="input-group-addon" id="basic-addon3">%</span>
                <input id="<?php echo bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objBagazo) == true) ? $objBagazo[0]->$sacarosa : ((session::getInstance()->hasFlash(bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true)) === true) ? '' : (request::getInstance()->hasPost(bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true))) ? request::getInstance()->getPost(bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true)) : '' )) ?>" name="<?php echo bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true) ?>" placeholder="<?php echo i18n::__('saccharose') ?>" aria-describedby="basic-addon3">
                <?php if (session::getInstance()->hasFlash(bagazoTableClass::getNameField(bagazoTableClass::SACAROSA, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorControl') ?>
        <div class="form-group">
            <label class="col-lg-3 control-label"><?php echo i18n::__('qualityControl') ?>:</label>
            <div class="input-group col-xs-6">
                <select class="form-control" id="<?php echo bagazoTableClass::getNameField(bagazoTableClass::ID, true) ?>" name="<?php echo bagazoTableClass::getNameField(bagazoTableClass::CONTROL_ID, TRUE) ?>">
                    <?php foreach ($objControlCalidad as $controlCalidad): ?>
                        <option <?php echo (isset($objBagazo[0]->$control_id) === true and $objBagazo[0]->$control_id == $controlCalidad->$id_control ) ? 'selected' : '' ?> value="<?php echo $controlCalidad->$id_control ?>">
                            <?php echo $controlCalidad->$fecha_control ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objBagazo)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('bagazo', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>
