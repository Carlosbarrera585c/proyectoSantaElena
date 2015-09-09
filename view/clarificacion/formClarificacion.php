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
<?php $id = clarificacionTableClass::ID ?>
<?php $fecha = clarificacionTableClass::FECHA ?>
<?php $numBache = clarificacionTableClass::NUM_BACHE ?>
<?php $turno = clarificacionTableClass::TURNO ?>
<?php $empleadoClarificacion = clarificacionTableClass::EMPLEADO_ID ?>
<?php $empleadoId = empleadoTableClass::ID ?>
<?php $nomEmpleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php $proveedorClarificacion = clarificacionTableClass::PROVEEDOR_ID ?>
<?php $proveedorId = proveedorTableClass::ID ?>
<?php $razonSocial = proveedorTableClass::RAZON_SOCIAL ?>
<?php $brix = clarificacionTableClass::BRIX ?>
<?php $phDiluido = clarificacionTableClass::PH_DILUIDO ?>
<?php $phClarificado = clarificacionTableClass::PH_CLARIFICADO ?>
<?php $calDosificada = clarificacionTableClass::CAL_DOSIFICADA ?>
<?php $floculante = clarificacionTableClass::FLOCULANTE ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('clarificacion', ((isset($objClarificacion)) ? 'update' : 'create')) ?>">
    <?php if (isset($objClarificacion) == true): ?>
      <input name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::ID, true) ?>" value="<?php echo $objClarificacion[0]->$id ?>" type="hidden">
    <?php endif ?>
    <?php view::getMessageError('errorFecha') ?>
    <div class="container container-fluid">
        <div class="form-group <?php echo (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::FECHA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-xs-6">
                <input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>"  name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::FECHA, true) ?>" placeholder="<?php echo i18n::__('enterTheDate') ?>">
            </div>
        </div>
        <?php view::getMessageError('errorBache') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('batchNumber') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$numBache : ((session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true)) === true) ? '' : (request::getInstance()->hasPost(clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true))) ? request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true)) : '' )) ?>" name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true) ?>" placeholder="<?php echo i18n::__('Enter your Number Batch') ?>">
                <?php if (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::NUM_BACHE, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorTurno') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('turn') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, true) ?>" name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, TRUE) ?>">
                    <option value="Dia" <?php echo(isset($objClarificacion) and $objClarificacion[0]->$turno === 'Dia') ? 'selected' : ((session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, TRUE)) === TRUE) ? '' : (request::getInstance()->hasPost(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, TRUE)) and request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, TRUE)) === 'Dia') ? 'selected' : '') ?>>Dia</option>
                    <option value="Noche" <?php echo(isset($objClarificacion) and $objClarificacion[0]->$turno === 'Noche') ? 'selected' : ((session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, TRUE)) === TRUE) ? '' : (request::getInstance()->hasPost(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, TRUE)) and request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::TURNO, TRUE)) === 'Noche') ? 'selected' : '') ?>>Noche</option>
                </select>
            </div> 
        </div>
        <?php view::getMessageError('errorEmpleado') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::EMPLEADO_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('employee') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::ID, TRUE) ?>" name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::EMPLEADO_ID, TRUE) ?>">
                    <?php foreach ($objEmpleado as $empleado): ?>
                      <option <?php echo (isset($objClarificacion[0]->$empleadoClarificacion) === true and $objClarificacion[0]->$empleadoClarificacion == $empleado->$empleadoId) ? 'selected' : '' ?> value="<?php echo $empleado->$empleadoId ?>">
                          <?php echo $empleado->$nomEmpleado ?>
                      </option>     
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <?php view::getMessageError('errorProveedor') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PROVEEDOR_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('provider') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::ID, TRUE) ?>" name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::PROVEEDOR_ID, TRUE) ?>">
                    <?php foreach ($objProveedor as $proveedor): ?>
                      <option <?php echo (isset($objClarificacion[0]->$proveedorClarificacion) === true and $objClarificacion[0]->$proveedorClarificacion == $proveedor->$proveedorId) ? 'selected' : '' ?> value="<?php echo $proveedor->$proveedorId ?>">
                          <?php echo $proveedor->$razonSocial ?>
                      </option>     
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <?php view::getMessageError('errorBrix') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('brix') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$brix : ((session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true)) === true) ? '' : (request::getInstance()->hasPost(clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true))) ? request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true)) : '' )) ?>" name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true) ?>" placeholder="<?php echo i18n::__('Enter your Number Brix') ?>">
                <?php if (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::BRIX, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorPhDiluido') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('phDiluted') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$phDiluido : ((session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true)) === true) ? '' : (request::getInstance()->hasPost(clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true))) ? request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true)) : '' )) ?>" name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true) ?>" placeholder="<?php echo i18n::__('Enter your Number Ph') ?>">
                <?php if (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_DILUIDO, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorPhClarificado') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('phClarified') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$phClarificado : ((session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true)) === true) ? '' : (request::getInstance()->hasPost(clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true))) ? request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true)) : '' )) ?>" name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true) ?>" placeholder="<?php echo i18n::__('Enter your Number Ph') ?>">
                <?php if (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::PH_CLARIFICADO, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorCalDosificado') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('dosedLime') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$calDosificada : ((session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true)) === true) ? '' : (request::getInstance()->hasPost(clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true))) ? request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true)) : '' )) ?>" name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true) ?>" placeholder="<?php echo i18n::__('Enter your Number Cal') ?>">
                <?php if (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::CAL_DOSIFICADA, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorFloculante') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('flocculant') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objClarificacion) == true) ? $objClarificacion[0]->$floculante : ((session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true)) === true) ? '' : (request::getInstance()->hasPost(clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true))) ? request::getInstance()->getPost(clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true)) : '' )) ?>" name="<?php echo clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true) ?>" placeholder="<?php echo i18n::__('Enter your Number flocculant') ?>">
                <?php if (session::getInstance()->hasFlash(clarificacionTableClass::getNameField(clarificacionTableClass::FLOCULANTE, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objClarificacion)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('clarificacion', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>