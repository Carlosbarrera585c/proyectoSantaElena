<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = bagazoTableClass::ID ?>
<?php $humedad = bagazoTableClass::HUMEDAD ?>
<?php $brix = bagazoTableClass::BRIX ?>
<?php $sacarosa = bagazoTableClass::SACAROSA ?>
<?php $control_id = bagazoTableClass::CONTROL_ID ?>

<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header text-center titulo">
        <h1><i class="glyphicon glyphicon-oil"> <?php echo i18n::__('chaff') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('bagazo', 'delete') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('bagazo', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('bagazo', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="columna tr_table">
 
                    <th><?php echo i18n::__('humidity') ?></th>
                    <th><?php echo i18n::__('brix') ?></th>
                    <th><?php echo i18n::__('saccharose') ?></th>
                    <th><?php echo i18n::__('qualityControl') ?></th>

                </tr>
            </thead>
            <tbody>
                <tr>

                    <td><?php echo ((isset($objBagazo) == true) ? $objBagazo[0]->$humedad : '') ?></td>
                    <td><?php echo ((isset($objBagazo) == true) ? $objBagazo[0]->$brix : ''). ' %' ?></td>
                    <td><?php echo ((isset($objBagazo) == true) ? $objBagazo[0]->$sacarosa : ''). ' %' ?></td>
                    <td><?php echo ((isset($objBagazo) == true) ? bagazoTableClass::getNameControl($objBagazo[0]->$control_id) : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('bagazo', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo bagazoTableClass::getNameField(bagazoTableClass::ID, true) ?>">
    </form>
</div>
