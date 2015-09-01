<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php use mvc\session\sessionClass as session ?>
<?php $id = usuarioTableClass::ID ?>
<?php $usuario = usuarioTableClass::USER ?>
<?php $creado = usuarioTableClass::CREATED_AT ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="fa fa-info-circle"> <?php echo i18n::__('infoUser') ?> <small><?php echo $objUsuarios[0]->$usuario ?></small></i></h1>
    </div>
    <div style="margin-bottom: 10px; margin-top: 30px">
        <?php if (session::getInstance()->hasCredential('admin')): ?>
        <a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
        <?php endif; ?>
        <a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed tables">
        <thead>
            <tr class="columna tr_table">
      
                <th><?php echo i18n::__('user') ?></th>
                <th><?php echo i18n::__('created') ?></th>   
            </tr>
        </thead>
        <tbody>
            <tr>
               
                <td><?php echo ((isset($objUsuarios) == true) ? $objUsuarios[0]->$usuario : '') ?></td>
                <td><?php echo ((isset($objUsuarios) == true) ? $objUsuarios[0]->$creado : '') ?></td>
        </tbody>
    </table>
</div>
