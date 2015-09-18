<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = aguasTableClass::ID ?>
<?php $procedencia = aguasTableClass::PROCEDENCIA ?>
<?php $arrastre_dulce = aguasTableClass::ARRASTRE_DULCE ?>
<?php $ph = aguasTableClass::PH ?>
<?php $cloro_residual = aguasTableClass::CLORO_RESIDUAL ?>
<?php $hora = aguasTableClass::HORA ?>
<?php $control_id = aguasTableClass::CONTROL_ID ?>

<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header text-center titulo">
        <h1><i class="glyphicon glyphicon-th-list"> <?php echo i18n::__('infoJuice') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('aguas', 'delete') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('aguas', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('aguas', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="columna tr_table">

                    <th><?php echo i18n::__('hour') ?></th>
                    <th><?php echo i18n::__('provenance') ?></th>
                    <th><?php echo i18n::__('sweetDrag') ?></th>
                    <th><?php echo i18n::__('ph') ?></th>
                    <th><?php echo i18n::__('residualChlorine') ?></th>
                    <th><?php echo i18n::__('qualityControl') ?></th>

                </tr>
            </thead>
            <tbody>
                <tr>

                    <td><?php echo ((isset($objAguas) == true) ? $objAguas[0]->$hora = date ("h:i A") : '') ?></td>
                    <td><?php echo ((isset($objAguas) == true) ? $objAguas[0]->$procedencia : '') ?></td>
                    <td><?php echo ((isset($objAguas) == true) ? $objAguas[0]->$arrastre_dulce : '') ?></td>
                    <td><?php echo ((isset($objAguas) == true) ? $objAguas[0]->$ph : '') ?></td>
                    <td><?php echo ((isset($objAguas) == true) ? $objAguas[0]->$cloro_residual : ''). ' %' ?></td>
                    <td><?php echo ((isset($objAguas) == true) ? aguasTableClass::getNameControl($objAguas[0]->$control_id) : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('aguas', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo aguasTableClass::getNameField(aguasTableClass::ID, true) ?>">
    </form>
</div>
