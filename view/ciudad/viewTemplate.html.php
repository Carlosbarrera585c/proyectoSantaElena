<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n?>
<?php $id = ciudadTableClass::ID ?>
<?php $ciu = ciudadTableClass::NOM_CIUDAD ?>

<div class="container container-fluid">
    <h1>Información de las Ciudades</h1>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new')?></a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
     <a href="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a>
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
          <td><?php echo ((isset($objCiudad) == true) ? $objCiudad[0]->$id : '') ?></td>
          <td><?php echo ((isset($objCiudad) == true) ? $objCiudad[0]->$ciu : '') ?></td>
          </tr>
      </tbody>
    </table>
  </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo ciudadTableClass::getNameField(ciudadTableClass::ID, true) ?>">
  </form>
</div>
