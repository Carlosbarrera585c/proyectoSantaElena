<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php use mvc\session\sessionClass as session?>
<?php view::includePartial('menu/menu') ?>
<?php $id = credencialTableClass::ID ?>
<?php $nom = credencialTableClass::NOMBRE ?>
<?php $created = credencialTableClass::CREATED_AT ?>
<?php $updated = credencialTableClass::UPDATED_AT ?>
<div class="container container-fluid">  
  <div class="page-header titulo">
    <h1><i class="fa fa-info-circle"> <?php echo i18n::__('infoCredential') ?></i></h1>
  </div>
  <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('credencial', 'deleteSelect') ?>" method="POST">
    <div style="margin-bottom: 10px; margin-top: 30px">
        <?php if (session::getInstance()->hasCredential('admin')): ?>
      <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
      <?php endif; ?>
      <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed tables">
      <thead>
        <tr class="active columna success">

          <th><?php echo i18n::__('credential') ?></th>
          <th><?php echo i18n::__('created') ?></th>
          <th><?php echo i18n::__('updated') ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>

          <td><?php echo ((isset($objCredencial) == true) ? $objCredencial[0]->$nom : '') ?></td>
          <td><?php echo ((isset($objCredencial) == true) ? $objCredencial[0]->$created : '') ?></td>
          <td><?php echo ((isset($objCredencial) == true) ? $objCredencial[0]->$updated : '') ?></td>

        </tr>
      </tbody>
    </table>
  </form>
  <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('credencial', 'delete') ?>" method="POST">
    <input type="hidden" id="idDelete" name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true) ?>">
  </form>
</div>
