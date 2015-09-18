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
<?php $id = empaqueTableClass::ID ?>
<?php $fecha = empaqueTableClass::FECHA ?>
<?php $cantidad = empaqueTableClass::CANTIDAD ?>
<?php $id_tipo_empaque = tipoEmpaqueTableClass::ID ?>
<?php $tipo_empaque_id = empaqueTableClass::TIPO_EMPAQUE_ID ?>
<?php $desc_tipo_empaque = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>
<?php $id_empleado = empleadoTableClass::ID ?>
<?php $empleado_id = empaqueTableClass::EMPLEADO_ID ?>
<?php $nombre_empleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php $id_insumo = insumoTableClass::ID ?>
<?php $insumo_id = empaqueTableClass::INSUMO_ID ?>
<?php $desc_insumo = insumoTableClass::DESC_INSUMO ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('empaque', ((isset($objEmpaque)) ? 'update' : 'create')) ?>">
    <?php if (isset($objEmpaque) == true): ?>
    <input name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, true) ?>" value="<?php echo $objEmpaque[0]->$id ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::getMessageError('errorFecha') ?>
         <div class="form-group <?php echo (session::getInstance()->hasFlash(empaqueTableClass::getNameField(empaqueTableClass::FECHA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-xs-6">
                <input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::FECHA, true) ?>" placeholder="<?php echo i18n::__('enterTheDate') ?>">
            </div>
        </div>
        <?php view::getMessageError('errorCantidad') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('amount') ?>:</label>
            <div class="col-xs-6">
                <input id="<?php echo empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objEmpaque)) ? $objEmpaque[0]->$cantidad : ((session::getInstance()->hasFlash(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true)) === true) ? '' : (request::getInstance()->hasPost(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true))) ? request::getInstance()->getPost(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true)) : '' )) ?>" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true) ?>" placeholder="<?php echo i18n::__('amount') ?>">
                <?php if (session::getInstance()->hasFlash(empaqueTableClass::getNameField(empaqueTableClass::CANTIDAD, true)) === true): ?>  
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
         <?php view::getMessageError('errorTipo') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empaqueTableClass::getNameField(empaqueTableClass::TIPO_EMPAQUE_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('typePacking') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, TRUE) ?>" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::TIPO_EMPAQUE_ID, TRUE) ?>">
                    <?php foreach ($objTipoEmpaque as $tipo_empaque): ?>
                      <option <?php echo (isset($objEmpaque[0]->$tipo_empaque_id) === true and $objEmpaque[0]->$tipo_empaque_id == $tipo_empaque->$id_tipo_empaque) ? 'selected' : '' ?> value="<?php echo $tipo_empaque->$id_tipo_empaque ?>">
                          <?php echo $tipo_empaque->$desc_tipo_empaque ?>
                      </option>   
                    <?php endforeach ?>
                </select>
            </div>  
        </div> 
        <?php view::getMessageError('errorEmpleado') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empaqueTableClass::getNameField(empaqueTableClass::EMPLEADO_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('employee') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, TRUE) ?>" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::EMPLEADO_ID, TRUE) ?>">
                    <?php foreach ($objEmpleado as $empleado): ?>
                      <option <?php echo (isset($objEmpaque[0]->$empleado_id) === true and $objEmpaque[0]->$empleado_id == $empleado->$id_empleado) ? 'selected' : '' ?> value="<?php echo $empleado->$id_empleado ?>">
                          <?php echo $empleado->$nombre_empleado ?>
                      </option>     
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <?php view::getMessageError('errorInsumo') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(empaqueTableClass::getNameField(empaqueTableClass::INSUMO_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('input') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, TRUE) ?>" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::INSUMO_ID, TRUE) ?>">
                    <?php foreach ($objInsumo as $insumo): ?>
                      <option <?php echo (isset($objEmpaque[0]->$insumo_id) === true and $objEmpaque[0]->$insumo_id == $insumo->$id_insumo) ? 'selected' : '' ?> value="<?php echo $insumo->$id_insumo ?>">
                          <?php echo $insumo->$desc_insumo ?>
                      </option>     
                    <?php endforeach ?>
                </select>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objEmpaque)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>