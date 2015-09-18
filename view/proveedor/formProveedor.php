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
<?php $idProveedor = proveedorTableClass::ID ?>
<?php $razonSoProv = proveedorTableClass::RAZON_SOCIAL ?>
<?php $dirProveedor = proveedorTableClass::DIRECCION ?>
<?php $telProveedor = proveedorTableClass::TELEFONO ?>
<?php $ciudadId = ciudadTableClass::ID ?>
<?php $ciudadNom = ciudadTableClass::NOM_CIUDAD ?>
<?php view::includePartial('menu/menu') ?>
    <form class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('proveedor', ((isset($objProveedor)) ? 'update' : 'create')) ?>">
        <?php if (isset($objProveedor) == true): ?>
            <input name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID, true) ?>" value="<?php echo $objProveedor[0]->$idProveedor ?>" type="hidden">
        <?php endif ?>
         <div class="container container-fluid"> 
        <?php view::getMessageError('errorSocial') ?>
            <div class="form-group <?php echo (session::getInstance()->hasFlash(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true)) === true) ? 'has-error has-feedback' : '' ?>">
                <label for="<?php echo proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('businessName') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$razonSoProv : ((session::getInstance()->hasFlash(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true)) === true) ? '' : (request::getInstance()->hasPost(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true))) ? request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true)) : '' )) ?>" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true) ?>" placeholder="<?php echo i18n::__('businessName') ?>">
                <?php if (session::getInstance()->hasFlash(proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorDireccion') ?>
            <div class="form-group <?php echo (session::getInstance()->hasFlash(proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true)) === true) ? 'has-error has-feedback' : '' ?>">
                <label for="<?php echo proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('direction') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$dirProveedor : ((session::getInstance()->hasFlash(proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true)) === true) ? '' : (request::getInstance()->hasPost(proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true))) ? request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true)) : '' )) ?>" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true) ?>" placeholder="<?php echo i18n::__('direction') ?>">
                <?php if (session::getInstance()->hasFlash(proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorTelefono') ?>
            <div class="form-group <?php echo (session::getInstance()->hasFlash(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true)) === true) ? 'has-error has-feedback' : '' ?>">
                <label for="<?php echo proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('phone') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$telProveedor : ((session::getInstance()->hasFlash(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true)) === true) ? '' : (request::getInstance()->hasPost(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true))) ? request::getInstance()->getPost(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true)) : '' )) ?>" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true) ?>" placeholder="<?php echo i18n::__('phone') ?>">
                <?php if (session::getInstance()->hasFlash(proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
         <?php view::getMessageError('errorCiudad') ?>
            <div class="form-group <?php echo (session::getInstance()->hasFlash(proveedorTableClass::getNameField(proveedorTableClass::CIUDAD_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('city') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID, TRUE) ?>" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::CIUDAD_ID, TRUE) ?>">
                    <?php foreach ($objCiudad as $ciudad): ?>
                        <option value="<?php echo $ciudad->$ciudadId ?>">
                            <?php echo $ciudad->$ciudadNom ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>
        </div>
             <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objProveedor)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
         </div>
    </form>
</div>
