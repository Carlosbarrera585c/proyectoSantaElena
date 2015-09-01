<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>

<?php $id = cachazaTableClass::ID ?>
<?php $humedad = cachazaTableClass::HUMEDAD ?>
<?php $sacaroza = cachazaTableClass::SACAROZA ?>
<?php $control_id = cachazaTableClass::CONTROL_ID ?>

<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header text-center titulo">
        <h1><i class="glyphicon glyphicon-th-list"> <?php echo i18n::__('infoCachaza') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('cachaza', 'delete') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <?php if (session::getInstance()->hasCredential('admin')): ?>
            <a href="<?php echo routing::getInstance()->getUrlWeb('cachaza', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <?php endif; ?>
            <a href="<?php echo routing::getInstance()->getUrlWeb('cachaza', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="columna tr_table">

                    <th><?php echo i18n::__('provenance') ?></th>
                    <th><?php echo i18n::__('sweetDrag') ?></th>
                    <th><?php echo i18n::__('qualityControl') ?></th>

                </tr>
            </thead>
            <tbody>
                <tr>
 
                    <td><?php echo ((isset($objCachaza) == true) ? $objCachaza[0]->$humedad : ''). ' %' ?></td>
                    <td><?php echo ((isset($objCachaza) == true) ? $objCachaza[0]->$sacaroza : ''). ' %' ?></td>
                    <td><?php echo ((isset($objCachaza) == true) ? cachazaTableClass::getNameControl($objCachaza[0]->$control_id) : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('cachaza', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo cachazaTableClass::getNameField(cachazaTableClass::ID, true) ?>">
    </form>
</div>
