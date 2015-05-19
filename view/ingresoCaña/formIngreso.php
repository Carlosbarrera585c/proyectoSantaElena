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
<?php $id = ingresoCañaTableClass::ID ?>
<?php $fecha = ingresoCañaTableClass::FECHA ?>
<?php $empleado_id = empleadoTableClass::ID ?>
<?php $empleado_nom = empleadoTableClass::NOM_EMPLEADO ?>
<?php $proveedor_id = proveedorTableClass::ID ?>
<?php $proveedor_nom = proveedorTableClass::RAZON_SOCIAL ?>
<?php $cantidad = ingresoCañaTableClass::CANTIDAD ?>
<?php $procedencia_caña = ingresoCañaTableClass::PROCEDENCIA_CAÑA ?>
<?php $peso_caña = ingresoCañaTableClass::PESO_CAÑA ?>
<?php $num_vagon = ingresoCañaTableClass::NUM_VAGON ?>
<?php $proveedor_id_c = ingresoCañaTableClass::PROVEEDOR_ID ?>
<?php $empleado_id_c = ingresoCañaTableClass::EMPLEADO_ID ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', ((isset($objIngresoCaña)) ? 'update' : 'create')) ?>">
    <?php if (isset($objIngresoCaña) == true): ?>
        <input name="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::ID, true) ?>" value="<?php echo $objIngresoCaña[0]->$id ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::includeHandlerMessage() ?>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-lg-10">
              <input type="date" class="form-control" value="<?php echo ((isset($objIngresoCaña) == true) ? $objIngresoCaña[0]->$fecha : '') ?>" name="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::FECHA, true) ?>" placeholder="<?php echo i18n::__('enterTheDate') ?>">
            </div>
        </div>
      <div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::CANTIDAD, true)) === true) ? 'has-error has-feedback' : '' ?>">
        <label for="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::CANTIDAD, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('quantity') ?>:</label>
            <div class="col-lg-10">
              <input id="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::CANTIDAD, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objIngresoCaña) == true) ? $objIngresoCaña[0]->$turno : '') ?><?php echo (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::CANTIDAD, true)) === true) ? request::getInstance()->getPost(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::CANTIDAD, true)) : '' ?>" name="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::CANTIDAD, true) ?>" placeholder="<?php echo i18n::__('enterTheQuantity') ?>">
                <?php if (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::CANTIDAD, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PROCEDENCIA_CAÑA, true)) === true) ? 'has-error has-feedback' : '' ?>">
        <label for="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PROCEDENCIA_CAÑA, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('caneOrigin') ?>:</label>
            <div class="col-lg-10">
              <input id="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PROCEDENCIA_CAÑA, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objIngresoCaña) == true) ? $objIngresoCaña[0]->$brix : '') ?><?php echo (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PROCEDENCIA_CAÑA, true)) === true) ? request::getInstance()->getPost(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PROCEDENCIA_CAÑA, true)) : '' ?>" name="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PROCEDENCIA_CAÑA, true) ?>" placeholder="<?php echo i18n::__('enterTheCaneOrigin') ?>">
                <?php if (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PROCEDENCIA_CAÑA, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PESO_CAÑA, true)) === true) ? 'has-error has-feedback' : '' ?>">
        <label for="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PESO_CAÑA, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('caneWeight') ?>:</label>
            <div class="col-lg-10">
              <input id="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PESO_CAÑA, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objIngresoCaña) == true) ? $objIngresoCaña[0]->$ph : '') ?><?php echo (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PESO_CAÑA, true)) === true) ? request::getInstance()->getPost(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PESO_CAÑA, true)) : '' ?>" name="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PESO_CAÑA, true) ?>" placeholder="<?php echo i18n::__('enterTheCaneWeight') ?>">
                <?php if (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PESO_CAÑA, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::NUM_VAGON, true)) === true) ? 'has-error has-feedback' : '' ?>">
        <label for="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::NUM_VAGON, true) ?>" class="col-lg-2 control-label"><?php echo i18n::__('wagonNumber') ?>:</label>
            <div class="col-lg-10">
              <input id="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::NUM_VAGON, true) ?>" type="text" class="form-control"   value="<?php echo ((isset($objIngresoCaña) == true) ? $objIngresoCaña[0]->$ar : '') ?><?php echo (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::NUM_VAGON, true)) === true) ? request::getInstance()->getPost(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::NUM_VAGON, true)) : '' ?>" name="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::NUM_VAGON, true) ?>" placeholder="<?php echo i18n::__('enterTheWagonNumber') ?>">
                <?php if (session::getInstance()->hasFlash(ingresoCañaTableClass::getNameField(ingresoCañaTableClass::NUM_VAGON, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('idEmployed') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::ID, true) ?>" name="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::EMPLEADO_ID, TRUE) ?>">
                    <?php foreach ($objEmpleado as $empleado): ?>
                  <option <?php echo (isset($objIngresoCaña[0]->$empleado_id_c) === true and $objIngresoCaña[0]->$empleado_id_c == $empleado->$empleado_id) ? 'selected' : ''  ?> value="<?php echo $empleado->$empleado_id ?>">
                            <?php echo $empleado->$empleado_nom ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('idProvider') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::ID, true) ?>" name="<?php echo ingresoCañaTableClass::getNameField(ingresoCañaTableClass::PROVEEDOR_ID, TRUE) ?>">
                    <?php foreach ($objProveedor as $proveedor): ?>
                  <option <?php echo (isset($objIngresoCaña[0]->$proveedor_id_c) === true and $objIngresoCaña[0]->$proveedor_id_c == $proveedor->$proveedor_id )? 'selected' : '' ?> value="<?php echo $proveedor->$proveedor_id ?>">
                            <?php echo $proveedor->$proveedor_nom ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objIngresoCaña)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCaña', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>