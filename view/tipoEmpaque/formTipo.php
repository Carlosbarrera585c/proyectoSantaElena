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
<?php $idTipo = tipoEmpaqueTableClass::ID ?>
<?php $desc_tipo_empaque = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>
<div class="container container-fluid">    
    <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', ((isset($objTipoEmpaque)) ? 'update' : 'create')) ?>">
        <?php if (isset($objTipoEmpaque) == true): ?>
          <input name="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::ID, true) ?>" value="<?php echo $objTipoEmpaque[0]->$idTipo ?>" type="hidden">
        <?php endif ?>
        <?php view::getMessageError('errorDescripcion') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('desc') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objTipoEmpaque)) ? $objTipoEmpaque[0]->$desc_tipo_empaque : ((session::getInstance()->hasFlash(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true)) === true) ? '' : (request::getInstance()->hasPost(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true))) ? request::getInstance()->getPost(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true)) : '' )) ?>" name="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true) ?>" placeholder="<?php echo i18n::__('enterTheDescription') ?>">
                <?php if (session::getInstance()->hasFlash(tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objTipoEmpaque)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </form>
</div>