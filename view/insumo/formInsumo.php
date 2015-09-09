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
<?php $id = insumoTableClass::ID ?>
<?php $desc_insumo = insumoTableClass::DESC_INSUMO ?>
<?php $precio = insumoTableClass:: PRECIO ?>
<?php $tipo_insumo_id = tipoInsumoTableClass:: ID ?>
<?php $tipo_insumo_desc = tipoInsumoTableClass:: DESC_TIPO_INSUMO ?>
<form class="form-horizontal" method="post" action="<?php echo routing::getInstance()->getUrlWeb('insumo', ((isset($objInsu)) ? 'update' : 'create')) ?>">
    <?php if (isset($objInsu) == true): ?>
        <input name="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, true) ?>" value="<?php echo $objInsu[0]->$id ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid"> 
        
        <?php view::getMessageError('errorDescripcion') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('descriptionInput') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objInsu) == true) ? $objInsu[0]->$desc_insumo : ((session::getInstance()->hasFlash(insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true)) === true) ? '' : (request::getInstance()->hasPost(insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true))) ? request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true)) : '' )) ?>" name="<?php echo insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true) ?>" placeholder="<?php echo i18n::__('EnterTheDescriptionOfTheInput') ?>">
                <?php if (session::getInstance()->hasFlash(insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorPrecio') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(insumoTableClass::getNameField(insumoTableClass::PRECIO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo insumoTableClass::getNameField(insumoTableClass::PRECIO, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('price') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo insumoTableClass::getNameField(insumoTableClass::PRECIO, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objInsu) == true) ? $objInsu[0]->$precio : ((session::getInstance()->hasFlash(insumoTableClass::getNameField(insumoTableClass::PRECIO, true)) === true) ? '' : (request::getInstance()->hasPost(insumoTableClass::getNameField(insumoTableClass::PRECIO, true))) ? request::getInstance()->getPost(insumoTableClass::getNameField(insumoTableClass::PRECIO, true)) : '' )) ?>" name="<?php echo insumoTableClass::getNameField(insumoTableClass::PRECIO, true) ?>" placeholder="<?php echo i18n::__('EnterThePrice') ?>">
                <?php if (session::getInstance()->hasFlash(insumoTableClass::getNameField(insumoTableClass::PRECIO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorTipo') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(insumoTableClass::getNameField(insumoTableClass::TIPO_INSUMO_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, TRUE) ?>" class="col-lg-3 control-label"><?php echo i18n::__('idInput') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, TRUE) ?>" name="<?php echo insumoTableClass::getNameField(insumoTableClass::TIPO_INSUMO_ID, TRUE) ?>">
                    <?php foreach ($objTipoInsumo as $insumo): ?>
                        <option value="<?php echo $insumo->$tipo_insumo_id ?>">
                            <?php echo $insumo->$tipo_insumo_desc ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objDetalleEntrada)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>

    </div>
</form>
