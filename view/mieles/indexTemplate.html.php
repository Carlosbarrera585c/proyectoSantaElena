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
<?php $id = mielesTableClass::ID ?>
<?php $fecha = mielesTableClass::FECHA ?>
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
		  <form method="POST" role="form" class="form-horizontal" id="filterForm" action="<?php echo routing::getInstance()->getUrlWeb('mieles', 'index') ?>">
			<?php view::getMessageError('errorFecha') ?>
			<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::FECHA, true)) === TRUE) ? 'has-error has-feedback' : ''; ?>">
			  <label for="filterFecha" class="col-sm-2 control-label"><?php echo i18n::__('date') ?></label>
			  <div class="col-sm-10">
				<input type="date" class="form-control" id="filterFecha1" name="filter[Fecha1]" placeholder="<?php echo i18n::__('date') ?>">
				<br>
				<input type="date" class="form-control" id="filterFecha2" name="filter[Fecha2]" placeholder="<?php echo i18n::__('date') ?>">

				<?php if (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::FECHA, true)) === TRUE) : ?><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><?php endif; ?>
			  </div>
			</div>
			<?php view::getMessageError('errorTurno') ?>
			<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::TURNO, true)) === TRUE) ? 'has-error has-feedback' : ''; ?>">
			  <label for="filterTurno" class="col-sm-2 control-label"><?php echo i18n::__('turn') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterTurno" name="filter[Turno]" placeholder="<?php echo i18n::__('turn') ?>">
				<?php if (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::TURNO, true)) === TRUE) : ?><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><?php endif; ?>
			  </div>
			</div>
			<?php view::getMessageError('errorNumCeba') ?>
			<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::NUM_CEBA, true)) === TRUE) ? 'has-error has-feedback' : ''; ?>">
			  <label for="filterNumCeba" class="col-sm-2 control-label"><?php echo i18n::__('numberOfFattening') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterNumCeba" name="filter[NumCeba]" placeholder="<?php echo i18n::__('numberOfFattening') ?>">
				<?php if (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::NUM_CEBA, true)) === TRUE) : ?><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><?php endif; ?>
			  </div>
			</div>
			<?php view::getMessageError('errorCaja') ?>
			<div class="form-group <?php echo (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, true)) === TRUE) ? 'has-error has-feedback' : ''; ?>">
			  <label for="filterCaja" class="col-sm-2 control-label"><?php echo i18n::__('box') ?></label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" id="filterCaja" name="filter[Caja]" placeholder="<?php echo i18n::__('box') ?>">
				<?php if (session::getInstance()->hasFlash(mielesTableClass::getNameField(mielesTableClass::CAJA, true)) === TRUE) : ?><span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><?php endif; ?>
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
		  <form method="POST" class="form-horizontal" id="reportFilterForm" action="<?php echo routing::getInstance()->getUrlWeb('mieles', 'report') ?>">
			<div class="modal-body">
			  <form method="POST" class="form-horizontal" id="reportFilterForm" action="<?php echo routing::getInstance()->getUrlWeb('mieles', 'report') ?>">
				<div class="form-group">
				  <label for="reportDate1" class="col-sm-2 control-label"><?php echo i18n::__('date') ?></label>
				  <div class="col-sm-10">
					<input type="date" name="report[fechaCreacion1]" class="form-control" id="filterCreacion1" placeholder="<?php echo i18n::__('date') ?>">
				  </div>
				</div>
				<div class="form-group">
				  <label for="reportDate1" class="col-sm-2 control-label"><?php echo i18n::__('date') ?></label>
				  <div class="col-sm-10">
					<input type="date" name="report[fechaCreacion2]" class="form-control" id="filterCreacion2" placeholder="<?php echo i18n::__('date') ?>">
				  </div>
				</div>
			  </form>
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
	<h1><i class="fa fa-beer"></i> <?php echo i18n::__('honeys') ?></h1>
  </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('mieles', 'deleteSelect') ?>" method="POST">
	<div style="margin-bottom: 10px; margin-top: 30px">
	  <?php if (session::getInstance()->hasCredential('admin')): ?>
  	  <a href="<?php echo routing::getInstance()->getUrlWeb('mieles', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
  	  <a href="javascript:eliminarMasivo()" class="btn btn-danger btn-xs" id="btnDeleteMass"><?php echo i18n::__('deleteSelect') ?></a>
	  <?php endif; ?>
	  <button type="button" data-toggle="modal" data-target="#myModalFilters" class="btn btn-primary  btn-xs"><?php echo i18n::__('filters') ?></button>
	  <a href="<?php echo routing::getInstance()->getUrlWeb('mieles', 'deleteFilters') ?>" class="btn btn-default btn-xs"><?php echo i18n::__('deleteFilters') ?></a>
	  <?php if (session::getInstance()->hasCredential('admin')): ?>
  	  <a class="btn btn-warning btn-xs col-lg-offset-7" data-toggle="modal" data-target="#myModalReport" ><?php echo i18n::__('printReport') ?></a>
	  <?php endif; ?>
	</div>
	<?php view::includeHandlerMessage() ?>
	<table class="tablaUsuario table table-bordered table-responsive table-hover tables">
	  <thead>
		<tr class="columna tr_table">
		  <?php if (session::getInstance()->hasCredential('admin')): ?>
  		  <th class="tamano"><input type="checkbox" id="chkAll"></th>
		  <?php endif; ?>
		  <th><?php echo i18n::__('date') ?></th>
		  <th class="tamanoAccion"><?php echo i18n::__('actions') ?></th>
		</tr>
	  </thead>
	  <tbody>
		<?php foreach ($objMieles as $miel): ?>
  		<tr>
			<?php if (session::getInstance()->hasCredential('admin')): ?>
			  <td class="tamano"><input type="checkbox" name="chk[]" value="<?php echo $miel->$id ?>"></td>
			<?php endif; ?>
  		  <td><?php echo $miel->$fecha ?></td>
  		  <td>
  			<a href="<?php echo routing::getInstance()->getUrlWeb('mieles', 'view', array(mielesTableClass::ID => $miel->$id)) ?>" class="btn btn-info btn-xs"><?php echo i18n::__('view') ?></a>
			  <?php if (session::getInstance()->hasCredential('admin')): ?>
				<a href="<?php echo routing::getInstance()->getUrlWeb('mieles', 'edit', array(mielesTableClass::ID => $miel->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('edit') ?></a>
				<a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $miel->$id ?>" class="btn btn-danger btn-xs"><?php echo i18n::__('delete') ?></a>
			  <?php endif ?>
  		  </td>
  		</tr>
  	  <div class="modal fade" id="myModalDelete<?php echo $miel->$id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
  		  <div class="modal-content">
  			<div class="modal-header">
  			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  			  <h4 class="modal-title" id="myModalLabel"><?php echo i18n::__('confirmDelete') ?></h4>
  			</div>
  			<div class="modal-body">
				<?php echo i18n::__('questionDelete') ?> <?php echo $miel->$fecha ?>?
  			</div>
  			<div class="modal-footer">
  			  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo i18n::__('cancel') ?></button>
  			  <button type="button" class="btn btn-primary" onclick="eliminar(<?php echo $miel->$id ?>, '<?php echo mielesTableClass::getNameField(mielesTableClass::ID, true) ?>', '<?php echo routing::getInstance()->getUrlWeb('mieles', 'delete') ?>')"><?php echo i18n::__('confirmDelete') ?></button>
  			</div>
  		  </div>
  		</div>
  	  </div>
	  <?php endforeach ?>
	  </tbody>
	</table>
  </form>
  <div class="text-right">
	<?php echo i18n::__('page') ?>  <select id="slqPaginador" onchange="paginador(this, '<?php echo routing::getInstance()->getUrlWeb('mieles', 'index') ?>')">
	<?php for ($x = 1; $x <= $cntPages; $x++): ?>
  	  <option <?php echo(isset($page) and $page == $x) ? 'selected' : '' ?> value="<?php echo $x ?>"><?php echo $x ?></option>
	  <?php endfor ?>
	</select> <?php echo i18n::__('of') ?> <?php echo $cntPages ?>
  </div>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('mieles', 'delete') ?>" method="POST">
	<input type="hidden" id="idDelete" name="<?php echo mielesTableClass::getNameField(mielesTableClass::ID, true) ?>">
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
