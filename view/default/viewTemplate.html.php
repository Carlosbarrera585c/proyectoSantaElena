<?php use mvc\routing\routingClass as routing ?>
<?php $id = usuarioTableClass::ID ?>
<?php $usu = usuarioTableClass::USER ?>
<?php $passUsu = usuarioTableClass::PASSWORD ?>
<?php $esUsu = usuarioTableClass::ACTIVED ?>
<?php $creaUsu = usuarioTableClass::CREATED_AT ?>
<?php $updUsu = usuarioTableClass::UPDATED_AT ?>
<?php $delUsu = usuarioTableClass::DELETED_AT ?>

<div class="container container-fluid">
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('default', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
     <a href="<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>" class="btn btn-info btn-xs">Atras</a>
    </div>
    <table class="table table-bordered table-responsive">
      <thead>
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Activado</th>
          <th>Creado</th>
          <th>Actualizado</th>
          <th>Eliminado</th>
        </tr>
      </thead>
      <tbody>
          <tr>
          <td><?php echo ((isset($objUsuarios) == true) ? $objUsuarios[0]->$id : '') ?></td>
          <td><?php echo ((isset($objUsuarios) == true) ? $objUsuarios[0]->$usu : '') ?></td>
          <td><?php echo ((isset($objUsuarios) == true) ? $objUsuarios[0]->$esUsu : '') ?></td>
          <td><?php echo ((isset($objUsuarios) == true) ? $objUsuarios[0]->$creaUsu : '') ?></td> 
          <td><?php echo ((isset($objUsuarios) == true) ? $objUsuarios[0]->$updUsu : '') ?></td> 
          <td><?php echo ((isset($objUsuarios) == true) ? $objUsuarios[0]->$delUsu : '') ?></td>
          </tr>
      </tbody>
    </table>
  </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('default', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>">
  </form>
</div>
