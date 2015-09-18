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

<?php $id = aguasTableClass::ID ?>
<?php $procedencia = aguasTableClass::PROCEDENCIA ?>
<?php $arrastre_dulce = aguasTableClass::ARRASTRE_DULCE ?>
<?php $ph = aguasTableClass::PH ?>
<?php $cloro_residual = aguasTableClass::CLORO_RESIDUAL ?>
<?php $control_id = aguasTableClass::CONTROL_ID ?>
<?php $id_control = controlCalidadTableClass::ID ?>
<?php $fecha = controlCalidadBaseTableClass::FECHA ?>
<?php view::includePartial('menu/menu') ?>

<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('aguas', ((isset($objAguas)) ? 'update' : 'create')) ?>">
  <?php if (isset($objAguas) == true): ?>
    <input name="<?php echo aguasTableClass::getNameField(aguasTableClass::ID, true) ?>" value="<?php echo $objAguas[0]->$id ?>" type="hidden">
  <?php endif ?>
	<?php date_default_timezone_set('America/Bogota')?>
  <?php view::getMessageError('errorHora') ?>
  <div class="form-group <?php echo (session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::HORA, true)) === true) ? 'has-error has-feedback' : '' ?>">
	<label class="col-xs-3 control-label"><?php echo i18n::__('hour') ?>:</label>
	<div class="input-group col-xs-6">
	  <input type="datetime" class="form-control" value=" <?php echo date("h:i A") ?> "  name="<?php echo aguasTableClass::getNameField(aguasTableClass::HORA, true) ?>" placeholder="<?php echo i18n::__('hour') ?>">
	</div>
  </div>
  <?php view::getMessageError('errorProcedencia') ?>
  <div class="form-group <?php echo (session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, true)) === true) ? 'has-error has-feedback' : '' ?>">
	<label class="col-lg-3 control-label"><?php echo i18n::__('provenance') ?>:</label>
	<div class="input-group col-xs-6">
	  <select class="form-control" id="<?php echo aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, true) ?>" name="<?php echo aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, TRUE) ?>">
		<option value="Caldera" <?php echo(isset($objAguas) and $objAguas[0]->$procedencia === 'Caldera') ? 'selected' : ((session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, TRUE)) === TRUE) ? '' : (request::getInstance()->hasPost(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, TRUE)) and request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, TRUE)) === 'Caldera') ? 'selected' : '') ?>>Caldera</option>
		<option value="Alimentacion" <?php echo(isset($objAguas) and $objAguas[0]->$procedencia === 'Alimentacion') ? 'selected' : ((session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, TRUE)) === TRUE) ? '' : (request::getInstance()->hasPost(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, TRUE)) and request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, TRUE)) === 'Alimentacion') ? 'selected' : '') ?>>Alimentacion</option>
		<option value="Condensados" <?php echo(isset($objAguas) and $objAguas[0]->$procedencia === 'Condensados') ? 'selected' : ((session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, TRUE)) === TRUE) ? '' : (request::getInstance()->hasPost(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, TRUE)) and request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::PROCEDENCIA, TRUE)) === 'Condensados') ? 'selected' : '') ?>>Condensados</option>
	  </select>
	</div> 
  </div>

  <?php view::getMessageError('errorArrastre') ?>
  <div class="form-group <?php echo (session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true)) === true) ? 'has-error has-feedback' : '' ?>">
	<label for="<?php echo aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('sweetDrag') ?>:</label>
	<div class="input-group col-xs-6">
	  <input id="<?php echo aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true) ?>" type="text"  class="form-control"  value="<?php echo ((isset($objAguas) == true) ? $objAguas[0]->$arrastre_dulce : ((session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true)) === true) ? '' : (request::getInstance()->hasPost(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true))) ? request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true)) : '' )) ?>" name="<?php echo aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true) ?>" placeholder="<?php echo i18n::__('sweetDrag') ?>">
	  <?php if (session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::ARRASTRE_DULCE, true)) === true): ?>
  	  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	  <?php endif ?>
	</div>
  </div>
  <?php view::getMessageError('errorPh') ?>
  <div class="form-group <?php echo (session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::PH, true)) === true) ? 'has-error has-feedback' : '' ?>">
	<label for="<?php echo aguasTableClass::getNameField(aguasTableClass::PH, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('ph') ?>:</label>
	<div class="input-group col-xs-6">
	  <span class="input-group-addon" id="basic-addon3">%</span>
	  <input id="<?php echo aguasTableClass::getNameField(aguasTableClass::PH, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objAguas) == true) ? $objAguas[0]->$ph : ((session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::PH, true)) === true) ? '' : (request::getInstance()->hasPost(aguasTableClass::getNameField(aguasTableClass::PH, true))) ? request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::PH, true)) : '' )) ?>" name="<?php echo aguasTableClass::getNameField(aguasTableClass::PH, true) ?>" placeholder="<?php echo i18n::__('ph') ?>" aria-describedby="basic-addon3">
	  <?php if (session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::PH, true)) === true): ?>
  	  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	  <?php endif ?>
	</div>
  </div>
  <?php view::getMessageError('errorCloro') ?>
  <div class="form-group <?php echo (session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true)) === true) ? 'has-error has-feedback' : '' ?>">
	<label for="<?php echo aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('residualChlorine') ?>:</label>
	<div class="input-group col-xs-6">
	  <span class="input-group-addon" id="basic-addon3">%</span>
	  <input id="<?php echo aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objAguas) == true) ? $objAguas[0]->$cloro_residual : ((session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true)) === true) ? '' : (request::getInstance()->hasPost(aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true))) ? request::getInstance()->getPost(aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true)) : '' )) ?>" name="<?php echo aguasTableClass::getNameField(aguasTableClass::CLORO_RESIDUAL, true) ?>" placeholder="<?php echo i18n::__('residualChlorine') ?>" aria-describedby="basic-addon3">
	  <?php if (session::getInstance()->hasFlash(aguasTableClass::getNameField(aguasTableClass::PH, true)) === true): ?>
  	  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
	  <?php endif ?>
	</div>
  </div>
  <?php view::getMessageError('errorControl') ?>
  <div class="form-group">
	<label class="col-lg-3 control-label"><?php echo i18n::__('qualityControl') ?>:</label>
	<div class="input-group col-xs-6">
	  <select class="form-control" id="<?php echo aguasTableClass::getNameField(aguasTableClass::ID, true) ?>" name="<?php echo aguasTableClass::getNameField(aguasTableClass::CONTROL_ID, TRUE) ?>">
		<?php foreach ($objControlCalidad as $controlCalidad): ?>
  		<option <?php echo (isset($objAguas[0]->$control_id) === true and $objAguas[0]->$control_id == $controlCalidad->$id_control ) ? 'selected' : '' ?> value="<?php echo $controlCalidad->$id_control ?>">
			<?php echo $controlCalidad->$fecha ?>
  		</option>   
		<?php endforeach ?>
	  </select>
	</div> 
  </div>
  <div class="form-group">
	<div class="col-xs-offset-5">
	  <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objAguas)) ? 'update' : 'register')) ?>">
	  <a href="<?php echo routing::getInstance()->getUrlWeb('aguas', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
	</div>
  </div>
</div>
</form>
