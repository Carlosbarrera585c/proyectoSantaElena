<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php

use mvc\view\viewClass as view ?>
<?php $idTipo = tipoEmpaqueTableClass::ID ?>
<?php $desc_tipo_empaque = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>
<div class="container container-fluid">    
    <form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', ((isset($objTipoEmpaque)) ? 'update' : 'create')) ?>">
        <?php if (isset($objTipoEmpaque) == true): ?>
            <input name="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::ID, true) ?>" value="<?php echo $objTipoEmpaque[0]->$idTipo ?>" type="hidden">
        <?php endif ?>
<?php view::includeHandlerMessage() ?>
        <div class="container container-fluid">
            <div class="form-group">
                <label class="col-lg-2 control-label"><?php echo i18n::__('desc') ?>:</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" value="<?php echo ((isset($objTipoEmpaque) == true) ? $objTipoEmpaque[0]->$desc_tipo_empaque : '') ?>"  name="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true) ?>" placeholder="<?php echo i18n::__('enterTheDescription') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12 col-xs-offset-6">
                    <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objTipoEmpaque)) ? 'update' : 'register')) ?>">
                    <a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
                </div>
            </div>
        </div>
    </form>
</div>