<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $id = tipoPagoTableClass::ID ?>
<?php $desc = tipoPagoTableClass::DESC_TIPO_PAGO ?>

<div class="container container-fluid">
    <div class="page-header  text-center titulo">
       <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('infoPlaymentType') ?></i></h1>
    </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('tipoPago', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('tipoPago', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new')?></a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
     <a href="<?php echo routing::getInstance()->getUrlWeb('tipoPago', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          
        </tr>
      </thead>
      <tbody>
          <tr>
          <td><?php echo ((isset($objtipoPago) == true) ? $objtipoPago[0]->$id : '') ?></td>
          <td><?php echo ((isset($objtipoPago) == true) ? $objtipoPago[0]->$desc : '') ?></td>
          </tr>
      </tbody>
    </table>
  </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('tipoPago', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo tipoPagoTableClass::getNameField(tipoPagoTableClass::ID, true) ?>">
  </form>
</div>
