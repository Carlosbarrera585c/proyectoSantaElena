<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $idTipoId = tipoIdTableClass::ID ?>
<?php $desc_tipo_id = tipoIdTableClass::DESC_TIPO_ID ?>
<div class="container container-fluid">
    <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('tipoId', ((isset($objTipoId) ) ? 'update' : 'create')) ?>">
        <?php if (isset($objTipoId) == true): ?>
            <input name="<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::ID, true) ?>" value="<?php echo $objTipoId[0]->$idTipoId ?>" type="hidden">
        <?php endif ?>
        <div class="container container-fluid">
            <?php view::includeHandlerMessage() ?>
            <div class="form-group">
                <label class="col-lg-2 control-label" ><?php echo i18n::__('identificationType') ?>:</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" value="<?php echo ((isset($objTipoId) == true) ? $objTipoId[0]->$desc_tipo_id : '') ?>" name="<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true) ?>" placeholder="Introduce la Identificacion">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12 col-xs-offset-6">
                    <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objTipoId)) ? 'update' : 'register')) ?>"> 
                    <a href="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
                </div>
            </div>
        </div>
    </form>
</div>
