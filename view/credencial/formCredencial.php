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
<?php $idCredencial = credencialTableClass::ID ?>
<?php $nombreCredencial = credencialTableClass::NOMBRE ?>
<?php $create = credencialTableClass::CREATED_AT ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">    
    <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('credencial', ((isset($objCredencial)) ? 'update' : 'create')) ?>">
        <?php if (isset($objCredencial) == true): ?>
            <input name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true) ?>" value="<?php echo $objCredencial[0]->$idCredencial ?>" type="hidden">
        <?php endif ?>
        <?php view::includeHandlerMessage() ?>
        <div class="container container-fluid">
            <div class="form-group <?php echo (session::getInstance()->hasFlash(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true)) === true) ? 'has-error has-feedback' : '' ?>">
                <label for="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('credential') ?>:</label>
                <div class="col-xs-6">
                    <input id="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objCredencial) == true) ? $objCredencial[0]->$nombreCredencial : ((session::getInstance()->hasFlash(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true)) === true) ? '' : (request::getInstance()->hasPost(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true))) ? request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true)) : '' )) ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>" placeholder="Introduce la Credencial">
                    <?php if (session::getInstance()->hasFlash(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true)) === true): ?>
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-6">
                    <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objCredencial)) ? 'update' : 'register')) ?>"> 
                    <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
                </div>
            </div>
        </div>
    </form>
</div>