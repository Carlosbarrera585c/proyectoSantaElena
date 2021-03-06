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
<?php $id = mielesTableClass::ID ?>
<?php $fecha = mielesTableClass::FECHA ?>
<?php $turno = mielesTableClass::TURNO ?>
<?php $empleadoId = mielesTableClass::EMPLEADO_ID ?>
<?php $idEmpleado = empleadoTableClass::ID ?>
<?php $nomEmpleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php $caja = mielesTableClass::CAJA ?>
<?php $brix = mielesTableClass::BRIX ?>
<?php $ph = mielesTableClass::PH ?>
<?php $observacion = mielesTableClass::OBSERVACION ?>
<?php $proveedor_id = mielesTableClass::PROVEEDOR_ID ?>
<?php $id_proveedor = proveedorTableClass::ID ?>
<?php $razon_social = proveedorTableClass::RAZON_SOCIAL ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('mieles', ((isset($objMieles)) ? 'update' : 'create')) ?>">
  <?php if (isset($objMieles) == true): ?>
    <input name="<?php echo mielesTableClass::getNameField(mielesTableClass::ID, true) ?>" value="<?php echo $objMieles[0]->$id ?>" type="hidden">
  <?php endif ?>
  <div class="container container-fluid">
	<?php view::getMessageError('errorFecha') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::FECHA, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label class="col-lg-3 control-label"><?php echo i18n::__('date') ?>:</label>
	  <div class="col-xs-6">
		<input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>"  name="<?php echo mielesTableClass::getNameField(mielesTableClass::FECHA, true) ?>" placeholder="<?php echo i18n::__('enterTheDate') ?>">
	  </div>
	</div>
	<?php view::getMessageError('errorTurno') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::TURNO, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label class="col-lg-3 control-label"><?php echo i18n::__('turn') ?>:</label>
	  <div class="col-xs-6">
		<select class="form-control" id="<?php echo mielesTableClass::getNameField(mielesTableClass::TURNO, true) ?>" name="<?php echo mielesTableClass::getNameField(mielesTableClass::TURNO, TRUE) ?>">
		  <option value="Dia" <?php echo(isset($objMieles) and $objMieles[0]->$turno === 'Dia') ? 'selected' : ((session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::TURNO, TRUE)) === TRUE) ? '' : (request::getInstance()->hasPost(mielesTableClass::getNameField(mielesTableClass::TURNO, TRUE)) and request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::TURNO, TRUE)) === 'Dia') ? 'selected' : '') ?>>Dia</option>
		  <option value="Noche" <?php echo(isset($objMieles) and $objMieles[0]->$turno === 'Noche') ? 'selected' : ((session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::TURNO, TRUE)) === TRUE) ? '' : (request::getInstance()->hasPost(mielesTableClass::getNameField(mielesTableClass::TURNO, TRUE)) and request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::TURNO, TRUE)) === 'Noche') ? 'selected' : '') ?>>Noche</option>
		</select>
	  </div> 
	</div> 
	<?php view::getMessageError('errorEmpleadoId') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::EMPLEADO_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label class="col-lg-3 control-label"><?php echo i18n::__('laboratoryAnalyst') ?>:</label>
	  <div class="col-xs-6">
		<select class="form-control" id="<?php echo mielesTableClass::getNameField(mielesTableClass::ID, TRUE) ?>" name="<?php echo mielesTableClass::getNameField(mielesTableClass::EMPLEADO_ID, TRUE) ?>">
		  <?php foreach ($objEmpleado as $empleado): ?>
  		  <option <?php echo (isset($objMieles[0]->$empleadoId) === true and $objMieles[0]->$empleadoId == $empleado->$idEmpleado) ? 'selected' : '' ?> value="<?php echo $empleado->$idEmpleado ?>">
			  <?php echo $empleado->$nomEmpleado ?>
  		  </option>   
		  <?php endforeach ?>
		</select>
	  </div>  
	</div> 
	<?php view::getMessageError('errorCaja') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label class="col-lg-3 control-label"><?php echo i18n::__('box') ?>:</label>
	  <div class="input-group col-xs-6">
		<select class="form-control" id="<?php echo mielesTableClass::getNameField(mielesTableClass::CAJA, true) ?>" name="<?php echo mielesTableClass::getNameField(mielesTableClass::CAJA, TRUE) ?>">
		  <option value="1" <?php echo(isset($objMieles) and $objMieles[0]->$caja === '1') ? 'selected' : ((session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, TRUE)) === TRUE) ? '' : (request::getInstance()->hasPost(mielesTableClass::getNameField(mielesTableClass::CAJA, TRUE)) and request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::CAJA, TRUE)) === '1') ? 'selected' : '') ?>>1</option>
		  <option value="2" <?php echo(isset($objMieles) and $objMieles[0]->$caja === '2') ? 'selected' : ((session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, TRUE)) === TRUE) ? '' : (request::getInstance()->hasPost(mielesTableClass::getNameField(mielesTableClass::CAJA, TRUE)) and request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::CAJA, TRUE)) === '2') ? 'selected' : '') ?>>2</option>
		  <option value="3" <?php echo(isset($objMieles) and $objMieles[0]->$caja === '3') ? 'selected' : ((session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, TRUE)) === TRUE) ? '' : (request::getInstance()->hasPost(mielesTableClass::getNameField(mielesTableClass::CAJA, TRUE)) and request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::CAJA, TRUE)) === '3') ? 'selected' : '') ?>>3</option>	
		</select>
	  </div> 
	</div>
	<?php view::getMessageError('errorBrix') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::BRIX, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo mielesTableClass::getNameField(mielesTableClass::BRIX, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('brix') ?>:</label>
	  <div class="col-xs-6">
		<input id="<?php echo mielesTableClass::getNameField(mielesTableClass::BRIX, true) ?>" type="" class="form-control" value="<?php echo ((isset($objMieles) == true) ? $objMieles[0]->$brix : ((session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::BRIX, true)) === true) ? '' : (request::getInstance()->hasPost(mielesTableClass::getNameField(mielesTableClass::BRIX, true))) ? request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::BRIX, true)) : '' )) ?>" name="<?php echo mielesTableClass::getNameField(mielesTableClass::BRIX, true) ?>" placeholder="<?php echo i18n::__('enterTheBrix') ?>">
		<?php if (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::BRIX, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<?php view::getMessageError('errorPh') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::BRIX, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo mielesTableClass::getNameField(mielesTableClass::PH, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('ph') ?>:</label>
	  <div class="col-xs-6">
		<input id="<?php echo mielesTableClass::getNameField(mielesTableClass::PH, true) ?>" type="" class="form-control" value="<?php echo ((isset($objMieles) == true) ? $objMieles[0]->$ph : ((session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::PH, true)) === true) ? '' : (request::getInstance()->hasPost(mielesTableClass::getNameField(mielesTableClass::PH, true))) ? request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::PH, true)) : '' )) ?>" name="<?php echo mielesTableClass::getNameField(mielesTableClass::PH, true) ?>" placeholder="<?php echo i18n::__('enterThePh') ?>">
		<?php if (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::PH, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<?php view::getMessageError('errorProveedor') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::PROVEEDOR_ID, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label class="col-lg-3 control-label"><?php echo i18n::__('provenance') ?>:</label>
	  <div class="col-xs-6">
		<select class="form-control" id="<?php echo mielesTableClass::getNameField(mielesTableClass::ID, TRUE) ?>" name="<?php echo mielesTableClass::getNameField(mielesTableClass::PROVEEDOR_ID, TRUE) ?>">
		  <?php foreach ($objProveedor as $proveedor): ?>
  		  <option <?php echo (isset($objMieles[0]->$proveedor_id) === true and $objMieles[0]->$proveedor_id == $proveedor->$id_proveedor) ? 'selected' : '' ?> value="<?php echo $proveedor->$id_proveedor ?>">
			  <?php echo $proveedor->$razon_social ?>
  		  </option>   
		  <?php endforeach ?>
		</select>
	  </div>  
	</div> 
	<?php view::getMessageError('errorObservacion') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('observations') ?>:</label>
	  <div class="col-xs-6">
		<input id="<?php echo mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true) ?>" type="" class="form-control" value="<?php echo ((isset($objMieles) == true) ? $objMieles[0]->$observacion : ((session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true)) === true) ? '' : (request::getInstance()->hasPost(mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true))) ? request::getInstance()->getPost(mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true)) : '' )) ?>" name="<?php echo mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true) ?>" placeholder="<?php echo i18n::__('Enter your observation') ?>">
		<?php if (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::OBSERVACION, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<div class="form-group">
	  <div class="col-xs-offset-6">
		<input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objMieles)) ? 'update' : 'register')) ?>">
		<a href="<?php echo routing::getInstance()->getUrlWeb('mieles', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
	  </div>
	</div>
  </div>
</form>