<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id_empaque = empaqueTableClass::ID ?>
<?php $fecha = empaqueTableClass::FECHA ?>
<?php $empleado_id = empaqueTableClass::ID ?>
<?php $nom_empleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php $tipo_empaque_id = empaqueTableClass::ID ?>
<?php $desc_tipo_empaque = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('empaque', ((isset($objEmpaque)) ? 'update' : 'create')) ?>">
    <?php if (isset($objEmpaque) == true): ?>
        <input name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, true) ?>" value="<?php echo $objEmpaque[0]->$id_empaque ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
        <?php view::includeHandlerMessage() ?>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-lg-10">
                <input type="date" class="form-control" value="<?php echo ((isset($objEmpaque) == true) ? $objEmpaque[0]->$fecha : '') ?>" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::FECHA, true) ?>" placeholder="Introduce La Fecha de Empacado">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('employee') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, TRUE) ?>" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::EMPLEADO_ID, TRUE) ?>">
                    <?php foreach ($objEmpleado as $empleado): ?>
                        <option value="<?php echo $empleado->$empleado_id ?>">
                            <?php echo $empleado->$nom_empleado ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('typePacking') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, TRUE) ?>" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::TIPO_EMPAQUE_ID, TRUE) ?>">
                    <?php foreach ($objTipoEmpaque as $tipo_empaque): ?>
                        <option value="<?php echo $tipo_empaque->$tipo_empaque_id ?>">
                            <?php echo $tipo_empaque->$desc_tipo_empaque ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objEmpaque)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>