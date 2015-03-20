<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n?>
<?php $id = tipoDocTableClass::ID ?>
<?php $desc = tipoDocTableClass::DESC_TIPO_DOC ?>

<div class="container container-fluid">
           <div class="page-header  text-center titulo">
       <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('infoDocType') ?></i></h1>
    </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('tipoPago', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('tipoPago', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new')?></a>
      <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()"><?php echo i18n::__('delete') ?></a>
     <a href="<?php echo routing::getInstance()->getUrlWeb('tipoPago', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed">
      <thead>
        <tr>
          <th><?php echo i18n::__('id')?></th>
          <th><?php echo i18n::__('name')?></th>
          
        </tr>
      </thead>
      <tbody>
          <tr>
          <td><?php echo ((isset($objTipoDoc) == true) ? $objTipoDoc[0]->$id : '') ?></td>
          <td><?php echo ((isset($objTipoDoc) == true) ? $objTipoDoc[0]->$desc : '') ?></td>
          </tr>
      </tbody>
    </table>
  </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::ID, true) ?>">
  </form>
</div>
