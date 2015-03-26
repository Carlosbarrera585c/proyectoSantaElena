<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $idEmpresa = empresaTableClass::ID ?>
<?php $nit = empresaTableClass::NIT ?>
<?php $nom_empresa = empresaTableClass::NOM_EMPRESA ?>
<?php $razon_social = empresaTableClass::RAZON_SOCIAL ?>
<?php $direccion = empresaTableClass::DIRECCION ?>
<?php $telefono = empresaTableClass::TELEFONO ?>
<?php $usuario_id = usuarioTableClass::ID ?>
<?php $usu = usuarioTableClass::USER ?>

<form class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('empresa', ((isset($objEmpresa)) ? 'update' : 'create')) ?>">
    <?php if (isset($objEmpresa) == true): ?>
        <input name="<?php echo empresaTableClass::getNameField(empresaTableClass::ID, true) ?>" value="<?php echo $objEmpresa[0]->$idEmpresa ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::includeHandlerMessage() ?>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('nit') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$nit : '') ?>" name="<?php echo empresaTableClass::getNameField(empresaTableClass::NIT, true) ?>" placeholder="Introduce el NIT de la Empresa">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label" ><?php echo i18n::__('name') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$nom_empresa : '') ?>" name="<?php echo empresaTableClass::getNameField(empresaTableClass::NOM_EMPRESA, true) ?>" placeholder="Introduce el Nombre de la Empresa">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label" ><?php echo i18n::__('businessName') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$razon_social : '') ?>" name="<?php echo empresaTableClass::getNameField(empresaTableClass::RAZON_SOCIAL, true) ?>" placeholder="Introduce la Razon Social de la Empresa">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('direction') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$direccion : '') ?>" name="<?php echo empresaTableClass::getNameField(empresaTableClass::DIRECCION, true) ?>" placeholder="Introduce Tu Direccion">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('phone') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$telefono : '') ?>" name="<?php echo empresaTableClass::getNameField(empresaTableClass::TELEFONO, true) ?>" placeholder="Introduce Tu Telefono">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('id') ?> <?php echo i18n::__('user') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo empresaTableClass::getNameField(empresaTableClass::ID, TRUE) ?>" name="<?php echo empresaTableClass::getNameField(empresaTableClass::USUARIO_ID, TRUE) ?>">
                    <?php foreach ($objUsuarios as $usuario): ?>
                        <option value="<?php echo $usuario->$usuario_id ?>">
                            <?php echo $usuario->$usu ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objEmpresa)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('empresa', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>