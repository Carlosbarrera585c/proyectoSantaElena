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
<?php $idUsuario = usuarioTableClass::ID ?>
<?php $user = usuarioTableClass::USER ?>
<?php $password = usuarioTableClass::PASSWORD ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('usuario', ((isset($objUsuario)) ? 'update' : 'create')) ?>">
    <?php if (isset($objUsuario) == true): ?>
      <input name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>" value="<?php echo $objUsuario[0]->$idUsuario ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::includeHandlerMessage() ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('user') ?>:</label>
            <div class="col-XS-6">
                <input id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objUsuario) == true) ? $objUsuario[0]->$user : '') ?><?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, true)) === true) ? request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true)) : '' ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" placeholder="<?php echo i18n::__('Enter your User') ?>">
                <?php if (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::USER, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('pass') ?>:</label>
            <div class="col-XS-6">
                <input id="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" type="password" class="form-control" value="<?php echo ((isset($objUsuario) == true) ? $objUsuario[0]->$user : '') ?><?php echo (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true)) === true) ? request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true)) : '' ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>" placeholder="<?php echo i18n::__('Enter your Password') ?>">
                <?php if (session::getInstance()->hasFlash(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objUsuario)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>