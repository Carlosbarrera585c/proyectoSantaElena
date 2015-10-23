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
<?php $id = ingresoCanaTableClass::ID ?>
<?php $fecha = ingresoCanaTableClass::FECHA ?>
<?php $empleado_id = empleadoTableClass::ID ?>
<?php $empleado_nom = empleadoTableClass::NOM_EMPLEADO ?>
<?php $proveedor_id = proveedorTableClass::ID ?>
<?php $proveedor_nom = proveedorTableClass::RAZON_SOCIAL ?>
<?php $cantidad = ingresoCanaTableClass::CANTIDAD ?>
<?php $peso_caña = ingresoCanaTableClass::PESO_CAÑA ?>
<?php $peso_caña2 = ingresoCanaTableClass::PESO_CAÑA2 ?>
<?php $peso_caña3 = ingresoCanaTableClass::PESO_CAÑA3 ?>
<?php $peso_caña4 = ingresoCanaTableClass::PESO_CAÑA4 ?>
<?php $peso_caña5 = ingresoCanaTableClass::PESO_CAÑA5 ?>
<?php $variedad = ingresoCanaTableClass::VARIEDAD ?>
<?php $num_vagon = ingresoCanaTableClass::NUM_VAGON ?>
<?php $num_vagon2 = ingresoCanaTableClass::NUM_VAGON2 ?>
<?php $num_vagon3 = ingresoCanaTableClass::NUM_VAGON3 ?>
<?php $num_vagon4 = ingresoCanaTableClass::NUM_VAGON4 ?>
<?php $num_vagon5 = ingresoCanaTableClass::NUM_VAGON5 ?>
<?php $proveedor_id_c = ingresoCanaTableClass::PROVEEDOR_ID ?>
<?php $empleado_id_c = ingresoCanaTableClass::EMPLEADO_ID ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="POST" action="<?php echo routing::getInstance()->getUrlWeb('ingresoCana', ((isset($objingresoCana)) ? 'update' : 'create')) ?>">
  <?php if (isset($objingresoCana) == true): ?>
    <input name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::ID, true) ?>" value="<?php echo $objingresoCana[0]->$id ?>" type="hidden">
  <?php endif ?>
  <div class="container container-fluid">
	<?php view::getMessageError('errorFecha') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::FECHA, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label class="col-lg-3 control-label"><?php echo i18n::__('date') ?>:</label>
	  <div class="input-group col-xs-6">
		<input type="date" class="form-control" value="<?php echo date("Y-m-d") ?>"  name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::FECHA, true) ?>" placeholder="<?php echo i18n::__('enterTheDate') ?>">
	  </div>
	</div>
	<div class="page-header text-center titulo">
	  <h4><i class="glyphicon"> <?php echo i18n::__('train') ?></i></h4>
	</div>
	<?php view::getMessageError('errorVagon') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('wagonNumber') ?>:</label>
	  <div class="input-group col-xs-6">
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON, true) ?>" type="text" class="form-control"   value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$num_vagon : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON, true) ?>" placeholder="<?php echo i18n::__('enterTheWagonNumber') ?>">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<?php view::getMessageError('errorPeso') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('caneWeight') ?>:</label>
	  <div class="input-group col-xs-6 col-sm-4">
		<span class="input-group-addon" id="basic-addon3">Tn</span>
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$peso_caña : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA, true) ?>" placeholder="<?php echo i18n::__('enterTheCaneWeight') ?>" aria-describedby="basic-addon3">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<?php view::getMessageError('errorVagon') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON2, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON2, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('wagonNumber2') ?>:</label>
	  <div class="input-group col-xs-6">
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON2, true) ?>" type="text" class="form-control"   value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$num_vagon2 : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON2, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON2, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON2, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON2, true) ?>" placeholder="<?php echo i18n::__('enterTheWagonNumber') ?>">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON2, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<?php view::getMessageError('errorPeso') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA2, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA2, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('caneWeight2') ?>:</label>
	  <div class="input-group col-xs-6 col-sm-4">
		<span class="input-group-addon" id="basic-addon3">Tn</span>
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA2, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$peso_caña2 : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA2, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA2, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA2, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA2, true) ?>" placeholder="<?php echo i18n::__('enterTheCaneWeight2') ?>" aria-describedby="basic-addon3">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA2, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<?php view::getMessageError('errorVagon') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON3, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON3, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('wagonNumber3') ?>:</label>
	  <div class="input-group col-xs-6">
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON3, true) ?>" type="text" class="form-control"   value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$num_vagon3 : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON3, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON3, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON3, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON3, true) ?>" placeholder="<?php echo i18n::__('enterTheWagonNumber') ?>">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON3, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<?php view::getMessageError('errorPeso') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA3, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA3, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('caneWeight3') ?>:</label>
	  <div class="input-group col-xs-6 col-sm-4">
		<span class="input-group-addon" id="basic-addon3">Tn</span>
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA3, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$peso_caña3 : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA3, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA3, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA3, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA3, true) ?>" placeholder="<?php echo i18n::__('enterTheCaneWeight3') ?>" aria-describedby="basic-addon3">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA3, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<?php view::getMessageError('errorVagon') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON4, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON4, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('wagonNumber4') ?>:</label>
	  <div class="input-group col-xs-6">
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON4, true) ?>" type="text" class="form-control"   value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$num_vagon4 : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON4, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON4, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON4, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON4, true) ?>" placeholder="<?php echo i18n::__('enterTheWagonNumber') ?>">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON4, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
		<?php view::getMessageError('errorPeso') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA4, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA4, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('caneWeight4') ?>:</label>
	  <div class="input-group col-xs-6 col-sm-4">
		<span class="input-group-addon" id="basic-addon3">Tn</span>
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA4, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$peso_caña4 : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA4, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA4, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA4, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA4, true) ?>" placeholder="<?php echo i18n::__('enterTheCaneWeight4') ?>" aria-describedby="basic-addon3">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA4, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<?php view::getMessageError('errorVagon') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON5, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON5, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('wagonNumber5') ?>:</label>
	  <div class="input-group col-xs-6">
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON5, true) ?>" type="text" class="form-control"   value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$num_vagon5 : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON5, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON5, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON5, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON5, true) ?>" placeholder="<?php echo i18n::__('enterTheWagonNumber') ?>">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::NUM_VAGON5, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
		<?php view::getMessageError('errorPeso') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA5, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA5, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('caneWeight5') ?>:</label>
	  <div class="input-group col-xs-6 col-sm-4">
		<span class="input-group-addon" id="basic-addon3">Tn</span>
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA5, true) ?>" type="text" class="form-control"  value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$peso_caña5 : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA5, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA5, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA5, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA5, true) ?>" placeholder="<?php echo i18n::__('enterTheCaneWeight5') ?>" aria-describedby="basic-addon3">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PESO_CAÑA2, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
      <?php view::getMessageError('errorCantidad') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::CANTIDAD, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::CANTIDAD, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('quantity') ?>:</label>
	  <div class="input-group col-xs-6">
		<span class="input-group-addon" id="basic-addon3">Tn</span>
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::CANTIDAD, true) ?>" type="text" class="form-control" value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$cantidad : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::CANTIDAD, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::CANTIDAD, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::CANTIDAD, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::CANTIDAD, true) ?>" placeholder="<?php echo i18n::__('enterTheQuantity') ?>" aria-describedby="basic-addon3">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::CANTIDAD, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	
	<?php view::getMessageError('errorVariedad') ?>
	<div class="form-group <?php echo (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::VARIEDAD, true)) === true) ? 'has-error has-feedback' : '' ?>">
	  <label for="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::VARIEDAD, true) ?>" class="col-lg-3 control-label"><?php echo i18n::__('variety') ?>:</label>
	  <div class="input-group col-xs-6">
		<input id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::VARIEDAD, true) ?>" type="text" class="form-control"   value="<?php echo ((isset($objingresoCana) == true) ? $objingresoCana[0]->$variedad : ((session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::VARIEDAD, true)) === true) ? '' : (request::getInstance()->hasPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::VARIEDAD, true))) ? request::getInstance()->getPost(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::VARIEDAD, true)) : '' )) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::VARIEDAD, true) ?>" placeholder="<?php echo i18n::__('variety') ?>">
		<?php if (session::getInstance()->hasFlash(ingresoCanaTableClass::getNameField(ingresoCanaTableClass::VARIEDAD, true)) === true): ?>
  		<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		<?php endif ?>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-lg-3 control-label"><?php echo i18n::__('idEmployed') ?>:</label>
	  <div class="input-group col-xs-6">
		<select class="form-control" id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::ID, true) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::EMPLEADO_ID, TRUE) ?>">
		  <?php foreach ($objEmpleado as $empleado): ?>
  		  <option <?php echo (isset($objingresoCana[0]->$empleado_id_c) === true and $objingresoCana[0]->$empleado_id_c == $empleado->$empleado_id) ? 'selected' : '' ?> value="<?php echo $empleado->$empleado_id ?>">
			  <?php echo $empleado->$empleado_nom ?>
  		  </option>   
		  <?php endforeach ?>
		</select>
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-lg-3 control-label"><?php echo i18n::__('idProvider') ?>:</label>
	  <div class="input-group col-xs-6">
		<select class="form-control" id="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::ID, true) ?>" name="<?php echo ingresoCanaTableClass::getNameField(ingresoCanaTableClass::PROVEEDOR_ID, TRUE) ?>">
		  <?php foreach ($objProveedor as $proveedor): ?>
  		  <option <?php echo (isset($objingresoCana[0]->$proveedor_id_c) === true and $objingresoCana[0]->$proveedor_id_c == $proveedor->$proveedor_id ) ? 'selected' : '' ?> value="<?php echo $proveedor->$proveedor_id ?>">
			  <?php echo $proveedor->$proveedor_nom ?>
  		  </option>   
		  <?php endforeach ?>
		</select>
	  </div> 
	</div>
	<div class="form-group">
	  <div class="col-xs-offset-6">
		<input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objingresoCana)) ? 'update' : 'register')) ?>">
		<a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCana', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
	  </div>
	</div>
  </div>
</form>