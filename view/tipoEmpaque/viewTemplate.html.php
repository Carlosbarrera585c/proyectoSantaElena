<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $id = tipoEmpaqueTableClass::ID ?>
<?php $desc_tipo_empaque = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>

<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-folder-close"> <?php echo i18n::__('infoTypePacking') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="columna tr_table">
                  
                    <th><?php echo i18n::__('desc') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  
                    <td><?php echo ((isset($objTipoEmpaque) == true) ? $objTipoEmpaque[0]->$desc_tipo_empaque : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::ID, true) ?>">
    </form>
</div>
