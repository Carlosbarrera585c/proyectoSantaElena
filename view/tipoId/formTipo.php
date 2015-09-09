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
<?php $idTipoId = tipoIdTableClass::ID ?>
<?php $desc_tipo_id = tipoIdTableClass::DESC_TIPO_ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">    
    <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('tipoId', ((isset($objTipoId)) ? 'update' : 'create')) ?>">
        <?php if (isset($objTipoId) == true): ?>
            <input name="<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::ID, true) ?>" value="<?php echo $objTipoId[0]->$idTipoId ?>" type="hidden">
        <?php endif ?>
        <div class="container container-fluid">
            <?php view::getMessageError('errorDescripcion') ?>
            <div class="form-group <?php echo (session::getInstance()->hasFlash(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
                <label for="<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('identification') ?>:</label>
                <div class="col-xs-6">
                    <input id="<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objTipoId) == true) ? $objTipoId[0]->$desc_tipo_id : '') ?><?php echo (session::getInstance()->hasFlash(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true)) === true) ? request::getInstance()->getPost(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true)) : '' ?>" name="<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true) ?>" placeholder="<?php echo i18n::__('EnterTheIdentification') ?>">
                    <?php if (session::getInstance()->hasFlash(tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true)) === true): ?>
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-offset-6">
                    <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objTipoId)) ? 'update' : 'register')) ?>">
                    <a href="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
                </div>
            </div>
        </div>
    </form>
</div>