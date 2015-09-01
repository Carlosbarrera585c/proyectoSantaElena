<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = tipoIdTableClass::ID ?>
<?php $descTipoId = tipoIdTableClass::DESC_TIPO_ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">  
  <div class="page-header titulo">
    <h1><i class="fa fa-info-circle"> <?php echo i18n::__('identificationType') ?></i></h1>
  </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
      <a href="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
      <a href="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed tables">
      <thead>
        <tr class="columna tr_table">
     
          <th><?php echo i18n::__('desc') ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
         
          <td><?php echo ((isset($objTipoId) == true) ? $objTipoId[0]->$descTipoId : '') ?></td>
        </tr>
      </tbody>
    </table>
  </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::ID, true) ?>">
  </form>
</div>
</div>