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
<?php $id = PanelaTableClass::ID ?>
<?php $hora = PanelaTableClass::HORA ?>
<?php $procedencia = PanelaTableClass::PROVEEDOR_ID ?>
<?php $sedimento = PanelaTableClass::SEDIMENTO ?>
<?php $control_id = PanelaTableClass::CONTROL_ID ?>
<?php $id_control = controlCalidadTableClass::ID ?>
<?php $fecha_control = controlCalidadTableClass::FECHA ?>
<?php $proveedor_id = proveedorTableClass::ID ?>
<?php $razon_social = proveedorTableClass::RAZON_SOCIAL ?>

<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('panela', ((isset($objPanela)) ? 'update' : 'create')) ?>">
    <?php if (isset($objPanela) == true): ?>
    <input name="<?php echo PanelaTableClass::getNameField(PanelaTableClass::ID, true) ?>" value="<?php echo $objPanela[0]->$id ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid">
	  <?php view::getMessageError('errorHora') ?>
    <div class="container container-fluid">
        <div class="form-group <?php echo (session::getInstance()->hasFlash(panelaTableClass::getNameField(panelaTableClass::HORA, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo panelaTableClass::getNameField(panelaTableClass::HORA, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('hour') ?>:</label>
            <div class="input-group col-xs-6">
                <input id="<?php echo panelaTableClass::getNameField(panelaTableClass::HORA, true) ?>" class="form-control" value="<?php echo ((isset($objPanela) == true) ? $objPanela[0]->$hora : ((session::getInstance()->hasFlash(panelaTableClass::getNameField(panelaTableClass::HORA, true)) === true) ? '' : (request::getInstance()->hasPost(panelaTableClass::getNameField(panelaTableClass::HORA, true))) ? request::getInstance()->getPost(panelaTableClass::getNameField(panelaTableClass::HORA, true)) : '' )) ?>" type="time" class="frm-control" name="<?php echo panelaTableClass::getNameField(panelaTableClass::HORA, true) ?>" placeholder="<?php echo i18n::__('hour') ?>">
                <?php if (session::getInstance()->hasFlash(panelaTableClass::getNameField(panelaTableClass::HORA, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <?php view::getMessageError('errorProcedencia') ?>
        <div class="form-group">
            <label class="col-lg-3 control-label"><?php echo i18n::__('provenance') ?>:</label>
            <div class="input-group col-xs-6">
                <select class="form-control" id="<?php echo panelaTableClass::getNameField(panelaTableClass::ID, true) ?>" name="<?php echo panelaTableClass::getNameField(panelaTableClass::PROVEEDOR_ID, TRUE) ?>">
                    <?php foreach ($objProveedor as $proveedor): ?>
                        <option <?php echo (isset($objPanela[0]->$procedencia) === true and $objPanela[0]->$procedencia == $proveedor->$proveedor_id ) ? 'selected' : '' ?> value="<?php echo $proveedor->$proveedor_id ?>">
                            <?php echo $proveedor->$razon_social ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
	    <?php view::getMessageError('errorSedimento') ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('sediment') ?>:</label>
            <div class="input-group col-xs-6">
			  <span class="input-group-addon" id="basic-addon3">%</span>
                <input id="<?php echo panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objPanela) == true) ? $objPanela[0]->$sedimento : ((session::getInstance()->hasFlash(panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true)) === true) ? '' : (request::getInstance()->hasPost(panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true))) ? request::getInstance()->getPost(panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true)) : '' )) ?>" name="<?php echo panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true) ?>" placeholder="<?php echo i18n::__('sediment') ?>" aria-describedby="basic-addon3">
                <?php if (session::getInstance()->hasFlash(panelaTableClass::getNameField(panelaTableClass::SEDIMENTO, true)) === true): ?>
                    <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
	 <?php view::getMessageError('errorControl') ?>
        <div class="form-group">
            <label class="col-lg-3 control-label"><?php echo i18n::__('qualityControl') ?>:</label>
            <div class="input-group col-xs-6">
                <select class="form-control" id="<?php echo panelaTableClass::getNameField(panelaTableClass::ID, true) ?>" name="<?php echo panelaTableClass::getNameField(panelaTableClass::CONTROL_ID, TRUE) ?>">
                    <?php foreach ($objControlCalidad as $controlCalidad): ?>
                        <option <?php echo (isset($objPanela[0]->$control_id) === true and $objPanela[0]->$control_id == $controlCalidad->$id_control ) ? 'selected' : '' ?> value="<?php echo $controlCalidad->$id_control ?>">
                            <?php echo $controlCalidad->$fecha_control ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div> 
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objPanela)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('panela', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
    </div>
</form>
