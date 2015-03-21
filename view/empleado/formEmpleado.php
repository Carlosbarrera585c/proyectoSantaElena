<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $idEmpleado = empleadoTableClass::ID ?>
<?php $nom_empleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php $apell_empleado = empleadoTableClass::APELL_EMPLEADO ?>
<?php $telefono = empleadoTableClass::TELEFONO ?>
<?php $direccion = empleadoTableClass::DIRECCION ?>
<?php $tipo_id = tipoIdTableClass::ID ?>
<?php $desc_tipo_id = tipoIdTableClass::DESC_TIPO_ID ?>
<?php $num_identificacion = empleadoTableClass::NUMERO_IDENTIFICACION ?>
<?php $credencial_id = credencialTableClass::ID ?>
<?php $nom_credencial = credencialTableClass::NOMBRE ?>
<?php $correo = empleadoTableClass::CORREO ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('empleado', ((isset($objEmpleado)) ? 'update' : 'create')) ?>">
    <?php if (isset($objEmpleado) == true): ?>
        <input name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, true) ?>" value="<?php echo $objEmpleado[0]->$idEmpleado ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::includeHandlerMessage() ?>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('employeeName') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$nom_empleado : '') ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true) ?>" placeholder="Introduce Tu Nombre">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label" ><?php echo i18n::__('employeeLastName') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$apell_empleado : '') ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true) ?>" placeholder="Introduce Tu Apellido">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('phone') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$telefono : '') ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true) ?>" placeholder="Introduce Tu Telefono">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('direction') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$direccion : '') ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true) ?>" placeholder="Introduce Tu Direccion">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('identification') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, TRUE) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::TIPO_ID_ID, TRUE) ?>">
                    <?php foreach ($objTipoId as $tipoId): ?>
                        <option <?php echo ($objTipoId[0]->$tipo_id == $tipoId->$tipo_id) ? 'selected' : '' ?> value="<?php echo $tipoId->$tipo_id ?>">
                            <?php echo $tipoId->$desc_tipo_id ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('numberIdentification') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$num_identificacion : '') ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true) ?>" placeholder="Introduce Tu Numero de Identifiacion">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('credential') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, TRUE) ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CREDENCIAL_ID, TRUE) ?>">
                    <?php foreach ($objCredencial as $credencial): ?>
                        <option <?php ($objCredencial[0]->$credencial_id == $credencial->$credencial_id) ? 'selected' : ''?> value="<?php echo $credencial->$credencial_id ?>">
                            <?php echo $credencial->$nom_credencial ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('mail') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$correo : '') ?>" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::CORREO, true) ?>" placeholder="Introduce tu E-Mail">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objEmpleado)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>
