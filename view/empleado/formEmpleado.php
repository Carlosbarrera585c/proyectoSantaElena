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
<?php $idEmpleado = empleadoTableClass::ID ?>
<?php $nomEmpleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php $apellEmpleado = empleadoTableClass::APELL_EMPLEADO ?>
<?php $telefono = empleadoTableClass::TELEFONO ?>
<?php $direccion = empleadoTableClass::DIRECCION ?>
<?php $tipo_id = tipoIdTableClass::ID ?>
<?php $tipoIdEmpleado = empleadoTableClass::TIPO_ID_ID ?>
<?php $descTipoId = tipoIdTableClass::DESC_TIPO_ID ?>
<?php $numeroIdentificacion = empleadoTableClass::NUMERO_IDENTIFICACION ?>
<?php $credencial_id_e = empleadoTableClass::CREDENCIAL_ID ?>
<?php $credencialId = credencialTableClass::ID ?>
<?php $nom_credencial = credencialTableClass::NOMBRE ?>
<?php $correo = empleadoTableClass::CORREO ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('empleado', ((isset($objEmpleado)) ? 'update' : 'create')) ?>">
    <?php if (isset($objEmpleado) == true): ?>
        <input name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, true) ?>" value="<?php echo $objEmpleado[0]->$idEmpleado ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::getMessageError('errorNombre') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('employeeName') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objEmpleado)) ? $objEmpleado[0]->$nomEmpleado : ((session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true)) === true) ? '' : (request::getInstance()->hasPost(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true))) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true)) : '' )) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true) ?>" placeholder="<?php echo i18n::__('Enter your Name') ?>">
                <?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorApellido') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('employeeLastName') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$apellEmpleado : ((session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true)) === true) ? '' : (request::getInstance()->hasPost(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true))) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true)) : '' )) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true) ?>" placeholder="<?php echo i18n::__('Enter your Last Name') ?>">
                <?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorTelefono') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('phone') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$telefono : ((session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true)) === true) ? '' : (request::getInstance()->hasPost(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true))) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true)) : '' )) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true) ?>" placeholder="<?php echo i18n::__('Enter your Phone') ?>">
                <?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorDireccion') ?>
                <div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('direction') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$direccion : ((session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true)) === true) ? '' : (request::getInstance()->hasPost(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true))) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true)) : '' )) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true) ?>" placeholder="<?php echo i18n::__('Enter your Direction') ?>">
                <?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorTipoId') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::TIPO_ID_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('identification') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, TRUE) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TIPO_ID_ID, TRUE) ?>">
                    <?php foreach ($objTipoId as $tipoId): ?>
                        <option <?php echo (isset($objEmpleado[0]->$tipoIdEmpleado) === true and $objEmpleado[0]->$tipoIdEmpleado == $tipoId->$tipo_id) ? 'selected' : '' ?> value="<?php echo $tipoId->$tipo_id ?>">
                            <?php echo $tipoId->$descTipoId ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>  
        </div> 
        <?php view::getMessageError('errorNumeroIdentificacion') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('numberIdentification') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$numeroIdentificacion : ((session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true)) === true) ? '' : (request::getInstance()->hasPost(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true))) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true)) : '' )) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true) ?>" placeholder="<?php echo i18n::__('Enter Your Identification Number') ?>">
                <?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::CREDENCIAL_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('credential') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, TRUE) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CREDENCIAL_ID, TRUE) ?>">
                    <?php foreach ($objCredencial as $credencial): ?>
                        <option <?php echo (isset($objEmpleado[0]->$credencial_id_e) === true and $objEmpleado[0]->$credencial_id_e == $credencial->$credencialId) ? 'selected' : '' ?> value="<?php echo $credencial->$credencialId ?>">
                            <?php echo $credencial->$nom_credencial ?>
                        </option>     
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <?php view::getMessageError('errorCorreo') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) . '_1' ?>" class="col-lg-3 control-label"><?php echo i18n::__('mail') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) . '_1' ?>" type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$correo : ((session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true)) === true) ? '' : (request::getInstance()->hasPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true))) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true)) : '' )) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) . '_1' ?>" placeholder="<?php echo i18n::__('Enter your Mail') ?>">
                <?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorCorreo') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) . '_2' ?>" class="col-lg-3 control-label"><?php echo i18n::__('Verify Mail') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) . '_2' ?>" type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$correo : ((session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true)) === true) ? '' : (request::getInstance()->hasPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true))) ? request::getInstance()->getPost(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true)) : '' )) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) . '_2' ?>" placeholder="<?php echo i18n::__('Verify Mail') ?>">
                <?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objEmpleado)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>