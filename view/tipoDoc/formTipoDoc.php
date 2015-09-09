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
<?php $idTipoDoc = tipoDocTableClass::ID ?>
<?php $descTipoDoc = tipoDocTableClass::DESC_TIPO_DOC ?>
<div class="container container-fluid">    
    <form class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', ((isset($objTipoDoc)) ? 'update' : 'create')) ?>">
        <?php if (isset($objTipoDoc) == true): ?>
            <input name="<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::ID, true) ?>" value="<?php echo $objTipoDoc[0]->$idTipoDoc ?>" type="hidden">
        <?php endif ?>
        <?php view::getMessageError('errorDescripcion') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('desc') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objTipoDoc) == true) ? $objTipoDoc[0]->$descTipoDoc : ((session::getInstance()->hasFlash(tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true)) === true) ? '' : (request::getInstance()->hasPost(tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true))) ? request::getInstance()->getPost(tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true)) : '' )) ?>" name="<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true) ?>" placeholder="<?php echo i18n::__('enterTheDescription') ?>">
                <?php if (session::getInstance()->hasFlash(tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objTipoDoc)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </form>
</div>
