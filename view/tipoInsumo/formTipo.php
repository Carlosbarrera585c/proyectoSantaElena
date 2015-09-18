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
<?php $idTipo = tipoInsumoTableClass::ID ?>
<?php $desc_tipo_insumo = tipoInsumoTableClass::DESC_TIPO_INSUMO ?>
<div class="container container-fluid">    
    <form class="form-horizontal" method="post"  action="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', ((isset($objTipoInsumo)) ? 'update' : 'create')) ?>">
        <?php if (isset($objTipoInsumo) == true): ?>
            <input name="<?php echo tipoInsumoTableClass::getNameField(tipoInsumoTableClass::ID, true) ?>" value="<?php echo $objTipoInsumo[0]->$idTipo ?>" type="hidden">
        <?php endif ?>
       <?php view::getMessageError('errorDescripcion') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(tipoInsumoTableClass::getNameField(tipoInsumoTableClass::DESC_TIPO_INSUMO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo tipoInsumoTableClass::getNameField(tipoInsumoTableClass::DESC_TIPO_INSUMO, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('desc') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo tipoInsumoTableClass::getNameField(tipoInsumoTableClass::DESC_TIPO_INSUMO, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objTipoInsumo)) ? $objTipoInsumo[0]->$desc_tipo_insumo : ((session::getInstance()->hasFlash(tipoInsumoTableClass::getNameField(tipoInsumoTableClass::DESC_TIPO_INSUMO, true)) === true) ? '' : (request::getInstance()->hasPost(tipoInsumoTableClass::getNameField(tipoInsumoTableClass::DESC_TIPO_INSUMO, true))) ? request::getInstance()->getPost(tipoInsumoTableClass::getNameField(tipoInsumoTableClass::DESC_TIPO_INSUMO, true)) : '' )) ?>" name="<?php echo tipoInsumoTableClass::getNameField(tipoInsumoTableClass::DESC_TIPO_INSUMO, true) ?>" placeholder="<?php echo i18n::__('enterTheDescriptionOfTheInput') ?>">
                <?php if (session::getInstance()->hasFlash(tipoInsumoTableClass::getNameField(tipoInsumoTableClass::DESC_TIPO_INSUMO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
            <div class="form-group">
                <div class="col-xs-offset-6">
                    <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objTipoInsumo)) ? 'update' : 'register')) ?>">
                    <a href="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
                </div>
            </div>
    </form>
</div>
