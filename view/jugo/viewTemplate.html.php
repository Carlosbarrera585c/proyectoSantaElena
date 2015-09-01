<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = jugoTableClass::ID ?>
<?php $procedencia = jugoTableClass::PROCEDENCIA ?>
<?php $brix = jugoTableClass::BRIX ?>
<?php $ph = jugoTableClass::PH ?>
<?php $control_id = jugoTableClass::CONTROL_ID ?>

<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header text-center titulo">
        <h1><i class="glyphicon glyphicon-th-list"> <?php echo i18n::__('infoJuice') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('jugo', 'delete') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('jugo', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('jugo', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="columna tr_table">

                    <th><?php echo i18n::__('provenance') ?></th>
                    <th><?php echo i18n::__('brix') ?></th>
                    <th><?php echo i18n::__('ph') ?></th>
                    <th><?php echo i18n::__('qualityControl') ?></th>

                </tr>
            </thead>
            <tbody>
                <tr>

                    <td><?php echo ((isset($objJugo) == true) ? jugoTableClass::getNameProveedor($objJugo[0]->$procedencia) : '') ?></td>
                    <td><?php echo ((isset($objJugo) == true) ? $objJugo[0]->$brix : ''). ' %' ?></td>
                    <td><?php echo ((isset($objJugo) == true) ? $objJugo[0]->$ph : ''). ' %' ?></td>
                    <td><?php echo ((isset($objJugo) == true) ? jugoTableClass::getNameControl($objJugo[0]->$control_id) : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('jugo', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo jugoTableClass::getNameField(jugoTableClass::ID, true) ?>">
    </form>
</div>
