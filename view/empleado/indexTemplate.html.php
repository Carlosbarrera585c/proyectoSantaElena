<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\config\configClass as config ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = empleadoTableClass::ID ?>
<?php $nomEmpleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
  <!-- ventana Modal Error al Eliminar Foraneas-->
  <div class="modal fade" id="myModalErrorDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('delete') ?></h4>
		</div>
		<div class="modal-body"></div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-warning" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
		</div>
	  </div>
	</div>
  </div>
  <!-- Fin Ventana Modal Error al Eliminar Foraneas-->
  <!-- Inicio Ventana Modal Filtros. -->
  <div class="modal fade" id="myModalFilters" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('filters') ?></h4>
		</div>
		<div class="modal-body">
		  <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>">
			<?php view::getMessageError('errorNombre') ?>
			<div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true)) === TRUE) ? 'has-error has-feedback' : ''; ?> ">
			  <label for="filterNombre" class="col-sm-2 control-label"><?php echo i18n::__('employeeName') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterNombre" name="filter[Nombre]" placeholder="<?php echo i18n::__('employeeName') ?>">
				<?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::NOM_EMPLEADO, true)) === TRUE) : ?><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><?php endif; ?>
			  </div>
			</div>
			<?php view::getMessageError('errorApellido') ?>
			<div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true)) === TRUE) ? 'has-error has-feedback' : ''; ?>">
			  <label for="filterApellido" class="col-sm-2 control-label"><?php echo i18n::__('employeeLastName') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterApellido" name="filter[Apellido]" placeholder="<?php echo i18n::__('employeeLastName') ?>">
				<?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::APELL_EMPLEADO, true)) === TRUE) : ?><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><?php endif; ?>
			  </div>
			</div>
			<?php view::getMessageError('errorNumeroIdentificacion') ?>
			<div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true)) === TRUE) ? 'has-error has-feedback' : ''; ?>">
			  <label for="filterNumIdentificacion" class="col-sm-2 control-label"><?php echo i18n::__('numberIdentification') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterNumIdentificacion" name="filter[NumIdentificacion]" placeholder="<?php echo i18n::__('numberIdentification') ?>">
				<?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::NUMERO_IDENTIFICACION, true)) === TRUE) : ?><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><?php endif; ?>
			  </div>
			</div>
			<?php view::getMessageError('errorTelefono') ?>
			<div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true)) === TRUE) ? 'has-error has-feedback' : ''; ?>">
			  <label for="filterTelefono" class="col-sm-2 control-label"><?php echo i18n::__('phone') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterTelefono" name="filter[Telefono]" placeholder="<?php echo i18n::__('phone') ?>">
				<?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::TELEFONO, true)) === TRUE) : ?><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><?php endif; ?>
			  </div>
			</div>
			<?php view::getMessageError('errorDireccion') ?>
			<div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true)) === TRUE) ? 'has-error has-feedback' : ''; ?>">
			  <label for="filterDireccion" class="col-sm-2 control-label"><?php echo i18n::__('direction') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterDireccion" name="filter[Direccion]" placeholder="<?php echo i18n::__('direction') ?>">
				<?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::DIRECCION, true)) === TRUE) : ?><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><?php endif; ?>
			  </div>
			</div>
			<?php view::getMessageError('errorCorreo') ?>
			<div class="form-group <?php echo (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true)) === TRUE) ? 'has-error has-feedback' : ''; ?>">
			  <label for="filterCorreo" class="col-sm-2 control-label"><?php echo i18n::__('mail') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterCorreo" name="filter[Correo]" placeholder="<?php echo i18n::__('mail') ?>">
				<?php if (session::getInstance()->hasFlash(empleadoTableClass::getNameField(empleadoTableClass::CORREO, true)) === TRUE) : ?><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><?php endif; ?>
			  </div>
			</div>
		  </form>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
		  <button type="button" onclick="$('#filterForm').submit()" class="btn btn-primary"><?php echo i18n::__('filtrate') ?></button>
		</div>
	  </div>
	</div>
  </div>
  <?php if (session::getInstance()->hasFlash('modalFilter')): ?>
    <script>
  	$(document).ready(function () {
  	  $('#myModalFilters').modal('toggle');
  	});
    </script>
  <?php endif; ?>
  <!--Termina Ventana Modal de Filtros-->
  <!-- Ventana Modal Para Reportes Con Filtros -->
  <div class="modal fade" id="myModalReport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('generate report') ?></h4>
		</div>
		<div class="modal-body">
		  <form method="POST" class="form-horizontal" id="reportFilterForm" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'report') ?>">
			<div class="form-group">
			  <label for="filterNombre" class="col-sm-2 control-label"><?php echo i18n::__('employeeName') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterNombre" name="report[Nombre]" placeholder="<?php echo i18n::__('employeeName') ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label for="filterApellido" class="col-sm-2 control-label"><?php echo i18n::__('employeeLastName') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterApellido" name="report[Apellido]" placeholder="<?php echo i18n::__('employeeLastName') ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label for="filterNumIdentificacion" class="col-sm-2 control-label"><?php echo i18n::__('numberIdentification') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterNumIdentificacion" name="report[NumIdentificacion]" placeholder="<?php echo i18n::__('numberIdentification') ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label for="filterTelefono" class="col-sm-2 control-label"><?php echo i18n::__('phone') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterTelefono" name="report[Telefono]" placeholder="<?php echo i18n::__('phone') ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label for="filterDireccion" class="col-sm-2 control-label"><?php echo i18n::__('direction') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterDireccion" name="report[Direccion]" placeholder="<?php echo i18n::__('direction') ?>">
			  </div>
			</div>
			<div class="form-group">
			  <label for="filterCorreo" class="col-sm-2 control-label"><?php echo i18n::__('mail') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterCorreo" name="report[Correo]" placeholder="<?php echo i18n::__('mail') ?>">
			  </div>
			</div>
		  </form>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
		  <button type="button" onclick="$('#reportFilterForm').submit()" class="btn btn-primary"><?php echo i18n::__('generate') ?></button>
		</div>
	  </div>
	</div>
  </div>
  <!-- Fin De Los Filtros Para Reporte -->
  <div class="page-header titulo">
	<h1><i class="fa fa-male"></i> <?php echo i18n::__('employee') ?></h1>
  </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'deleteSelect') ?>" method="POST">
	<div style="margin-bottom: 10px; margin-top: 30px">
	  <?php if (session::getInstance()->hasCredential('admin')): ?>
  	  <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
  	  <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
	  <?php endif; ?>
	  <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
	  <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
<!--	  <a class="btn btn-warning btn-xs col-lg-offset-7" data-toggle="modal" data-target="#myModalReport" ><?php echo i18n::__('printReport') ?></a>-->
	</div>
	<?php view::includeHandlerMessage() ?>
	<table class="tablaUsuario table table-bordered table-responsive table-hover tables">
	  <thead>
		<tr class="columna tr_table">
		  <?php if (session::getInstance()->hasCredential('admin')): ?>
  		  <th class="tamano"><input type="checkbox" id="chkAll"></th>
		  <?php endif; ?>
		  <th><?php echo i18n::__('employeeName') ?></th>
		  <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
		</tr>
	  </thead>
	  <tbody>
		<?php foreach ($objEmpleado as $tipo): ?>
  		<tr><?php if (session::getInstance()->hasCredential('admin')): ?>
			  <td class="tamano"><input type="checkbox" name="chk[]" value="<?php echo $tipo->$id ?>"></td>
			<?php endif; ?>
  		  <td><?php echo $tipo->$nomEmpleado ?></td>
  		  <td>
  			<a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'view', array(empleadoTableClass::ID => $tipo->$id)) ?>" class="btn btn-info btn-xs"><?php echo i18n::__('view') ?></a>
			  <?php if (session::getInstance()->hasCredential('admin')): ?>
				<a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'edit', array(empleadoTableClass::ID => $tipo->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
				<a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $tipo->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a>
			  <?php endif ?>
  		  </td>
  		</tr>
  	  <div class="modal fade" id="myModalDelete<?php echo $tipo->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
  		  <div class="modal-content">
  			<div class="modal-header">
  			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  			  <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
  			</div>
  			<div class="modal-body">
				<?php echo i18n::__('questionDelete') ?> <?php echo $tipo->$nomEmpleado ?>?
  			</div>
  			<div class="modal-footer">
  			  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
  			  <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $tipo->$id ?>, '<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('empleado', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
  			</div>
  		  </div>
  		</div>
  	  </div>
	  <?php endforeach ?>
	  </tbody>
	</table>
  </form>
  <div class="text-right">
	<?php echo i18n::__('page') ?>  <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>')">
	<?php for ($x = 1; $x <= $cntPages; $x++): ?>
  	  <option <?php echo(isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
	  <?php endfor ?>
	</select> <?php echo i18n::__('of') ?> <?php echo $cntPages ?>
  </div>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'delete') ?>" method="POST">
	<input type="hidden" id="idDelete" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, true) ?>">
  </form>
</div>
<div class="modal fade" id="myModalDeleteMass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDeleteMass') ?></h4>
	  </div>
	  <div class="modal-body">
		<?php echo i18n::__('confirmDeleteMass') ?>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
		<button type="button" class="btn btn-primary" onclick="$('#frmDeleteAll').submit()"><?php echo i18n::__('confirmDelete') ?></button>
	  </div>
	</div>
  </div>
</div>