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
<?php $id = controlCalidadTableClass::ID ?>
<?php $fecha = controlCalidadTableClass::FECHA ?>
<?php $variedad = controlCalidadTableClass::VARIEDAD ?>
<?php $edad = controlCalidadTableClass::EDAD ?>
<?php $brix = controlCalidadTableClass::BRIX ?>
<?php $ph = controlCalidadTableClass::PH ?>
<?php $ar = controlCalidadTableClass::AR ?>
<?php $sacarosa = controlCalidadTableClass::SACAROSA ?>
<?php $pureza = controlCalidadTableClass::PUREZA ?>
<?php $empleado_id_c = controlCalidadTableClass::EMPLEADO_ID ?>
<?php $empleado_id = empleadoTableClass::ID ?>
<?php $empleado_nom = empleadoTableClass::NOM_EMPLEADO ?>
<?php $proveedor_id_c = controlCalidadTableClass::PROVEEDOR_ID ?>
<?php $proveedor_id = proveedorTableClass::ID ?>
<?php $proveedor_nom = proveedorTableClass::RAZON_SOCIAL ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', ((isset($objControlCalidad)) ? 'update' : 'create')) ?>">
    <?php if (isset($objControlCalidad) == true): ?>
        <input name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::ID, true) ?>" value="<?php echo $objControlCalidad[0]->$id ?>" type="hidden">
    <?php endif ?>   
    <div class="container container-fluid">
        <?php view::getMessageError('errorFecha') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-2 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-lg-10">
                <input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>"  name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::FECHA, true) ?>" placeholder="<?php echo i18n::__('enterTheDate') ?>">
            </div>
        </div>
        <?php view::getMessageError('errorVariedad') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('variety') ?>:</label>
            <div class="col-lg-10">
                <input id="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objControlCalidad)) ? $objControlCalidad[0]->$variedad : ((session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true)) === true) ? '' : (request::getInstance()->hasPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true))) ? request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true)) : '' )) ?>" name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true) ?>" placeholder="<?php echo i18n::__('enterTheVariety') ?>">
                <?php if (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::VARIEDAD, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorEdad') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('age') ?>:</label>
            <div class="col-lg-10">
                <input id="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$edad : ((session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true)) === true) ? '' : (request::getInstance()->hasPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true))) ? request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true)) : '' )) ?>" name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true) ?>" placeholder="<?php echo i18n::__('enterTheAge') ?>">
                <?php if (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::EDAD, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorBrix') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('brix') ?>:</label>
            <div class="col-lg-10">
                <input id="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$brix : ((session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true)) === true) ? '' : (request::getInstance()->hasPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true))) ? request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true)) : '' )) ?>" name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true) ?>" placeholder="<?php echo i18n::__('enterTheBrix') ?>">
                <?php if (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::BRIX, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorPh') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('ph') ?>:</label>
            <div class="col-lg-10">
                <input id="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$ph : ((session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true)) === true) ? '' : (request::getInstance()->hasPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true))) ? request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true)) : '' )) ?>" name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true) ?>" placeholder="<?php echo i18n::__('enterThePh') ?>">
                <?php if (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PH, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorAr') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('ar') ?>:</label>
            <div class="col-lg-10">
                <input id="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true) ?>" type="text" class="form-control"   value="<?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$ar : ((session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true)) === true) ? '' : (request::getInstance()->hasPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true))) ? request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true)) : '' )) ?>" name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true) ?>" placeholder="<?php echo i18n::__('enterTheAr') ?>">
                <?php if (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::AR, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorSacarosa') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('saccharose') ?>:</label>
            <div class="col-lg-10">
                <input id="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true) ?>" type="text" class="form-control"   value="<?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$sacarosa : ((session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true)) === true) ? '' : (request::getInstance()->hasPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true))) ? request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true)) : '' )) ?>" name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true) ?>" placeholder="<?php echo i18n::__('enterTheSaccharose') ?>">
                <?php if (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::SACAROSA, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorPureza') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('purity') ?>:</label>
            <div class="col-lg-10">
                <input id="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true) ?>" type="text"  class="form-control" value="<?php echo ((isset($objControlCalidad) == true) ? $objControlCalidad[0]->$pureza : ((session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true)) === true) ? '' : (request::getInstance()->hasPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true))) ? request::getInstance()->getPost(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true)) : '' )) ?>" name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true) ?>" placeholder="<?php echo i18n::__('enterThePurity') ?>">
                <?php if (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PUREZA, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorEmpleado') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::EMPLEADO_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-2 control-label"><?php echo i18n::__('idEmployed') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::ID, true) ?>" name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::EMPLEADO_ID, TRUE) ?>">
                    <?php foreach ($objEmpleado as $empleado): ?>
                        <option <?php echo (isset($objControlCalidad[0]->$empleado_id_c) === true and $objControlCalidad[0]->$empleado_id_c == $empleado->$empleado_id) ? 'selected' : '' ?> value="<?php echo $empleado->$empleado_id ?>">
                            <?php echo $empleado->$empleado_nom ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <?php view::getMessageError('errorProveedor') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-2 control-label"><?php echo i18n::__('idProvider') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::ID, true) ?>" name="<?php echo controlCalidadTableClass::getNameField(controlCalidadTableClass::PROVEEDOR_ID, TRUE) ?>">
                    <?php foreach ($objProveedor as $proveedor): ?>
                        <option <?php echo (isset($objControlCalidad[0]->$proveedor_id_c) === true and $objControlCalidad[0]->$proveedor_id_c == $proveedor->$proveedor_id ) ? 'selected' : '' ?> value="<?php echo $proveedor->$proveedor_id ?>">
                            <?php echo $proveedor->$proveedor_nom ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objControlCalidad)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>