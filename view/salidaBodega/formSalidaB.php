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
<?php $idE = salidaBodegaTableClass::ID ?>
<?php $fechaE = salidaBodegaTableClass::FECHA ?>
<?php $proveedorId = salidaBodegaTableClass::PROVEEDOR_ID ?>
<?php $empleadoId = salidaBodegaTableClass::EMPLEADO_ID ?>
<?php $idProveedor = proveedorTableClass::ID ?>
<?php $proveeNom = proveedorTableClass::RAZON_SOCIAL ?>
<?php $idEmpleado = empleadoTableClass::ID ?>
<?php $empleadoNom = empleadoTableClass::NOM_EMPLEADO ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid divTamaño">    
    <form class="form-horizontal" method="post" action="<?php echo routing::getInstance()->getUrlWeb('salidaBodega', ((isset($objSalidaBodega)) ? 'update' : 'create')) ?>">
        <?php if (isset($objSalidaBodega) == true): ?>
        <input name="<?php echo salidaBodegaTableClass::getNameField(salidaBodegaTableClass::ID, true) ?>" value="<?php echo $objSalidaBodega[0]->$idE ?>" type="hidden">
        <?php endif ?>
        <?php view::includeHandlerMessage() ?>

        <div class="form-group <?php echo (session::getInstance()->hasFlash(salidaBodegaTableClass::getNameField(salidaBodegaTableClass::FECHA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label class="col-lg-3 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-xs-6">
                <input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>" name="<?php echo salidaBodegaTableClass::getNameField(salidaBodegaTableClass::FECHA, true) ?>" placeholder="<?php echo i18n::__('enterTheDate') ?>">
            </div>
        </div>
            
            <div class="form-group <?php echo (session::getInstance()->hasFlash(salidaBodegaTableClass::getNameField(salidaBodegaTableClass::PROVEEDOR_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
             <label for="<?php echo salidaBodegaTableClass::getNameField(salidaBodegaTableClass::PROVEEDOR_ID, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('provider') ?>:</label>
                <div class="col-xs-6">
                     <select class="form-control" id="<?php echo salidaBodegaTableClass::getNameField(salidaBodegaTableClass::ID, TRUE) ?>" id="<?php echo salidaBodegaTableClass::getNameField(salidaBodegaTableClass::PROVEEDOR_ID, TRUE) ?>" name="<?php echo salidaBodegaTableClass::getNameField(salidaBodegaTableClass::PROVEEDOR_ID, TRUE) ?>">
                         <?php foreach ($objProveedor as $proveedor): ?>
                             <option <?php echo (isset($objSalidaBodega[0]->$proveedorId) === true and $objSalidaBodega[0]->$proveedorId == $proveedor->$idProveedor) ? 'selected' : '' ?> value="<?php echo $proveedor->$idProveedor ?>">
                                     <?php echo $proveedor->$proveeNom ?>
                             </option>   
                        <?php endforeach ?>
                </select>
            </div>
           </div>
     
        <div class="form-group <?php echo (session::getInstance()->hasFlash(salidaBodegaTableClass::getNameField(salidaBodegaTableClass::EMPLEADO_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
             <label for="<?php echo salidaBodegaTableClass::getNameField(salidaBodegaTableClass::EMPLEADO_ID, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('employee') ?>:</label>
                <div class="col-xs-6">
                     <select class="form-control" id="<?php echo salidaBodegaTableClass::getNameField(salidaBodegaTableClass::ID, TRUE) ?>" id="<?php echo salidaBodegaTableClass::getNameField(salidaBodegaTableClass::EMPLEADO_ID, TRUE) ?>" name="<?php echo salidaBodegaTableClass::getNameField(salidaBodegaTableClass::EMPLEADO_ID, TRUE) ?>">
                         <?php foreach ($objEmpleado as $empleado): ?>
                             <option <?php echo (isset($objSalidaBodega[0]->$empleadoId) === true and $objSalidaBodega[0]->$empleadoId == $empleado->$idEmpleado) ? 'selected' : '' ?> value="<?php echo $empleado->$idEmpleado ?>">
                                     <?php echo $empleado->$empleadoNom ?>
                             </option>   
                        <?php endforeach ?>
                </select>
            </div>
           </div>
        
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objSalidaBodega)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('salidaBodega', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </form>
</div>

