<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = panelaTableClass::ID ?>
<?php $proveedor_id = panelaTableClass::PROVEEDOR_ID ?>
<?php $sedimento = panelaTableClass::SEDIMENTO ?>
<?php $control_id = panelaTableClass::CONTROL_ID ?>

<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header text-center titulo">
        <h1><i class="glyphicon glyphicon-adjust"> <?php echo i18n::__('panela') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('panela', 'delete') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('panela', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('panela', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="columna tr_table">
       
                    <th><?php echo i18n::__('provenance') ?></th>
                    <th><?php echo i18n::__('sediment') ?></th>
                    <th><?php echo i18n::__('qualityControl') ?></th>

                </tr>
            </thead>
            <tbody>
                <tr>
            
                    <td><?php echo ((isset($objPanela) == true) ? panelaTableClass::getNameProveedor($objPanela[0]->$proveedor_id) : '') ?></td>
                    <td><?php echo ((isset($objPanela) == true) ? $objPanela[0]->$sedimento : ''). ' %' ?></td>
                    <td><?php echo ((isset($objPanela) == true) ? panelaTableClass::getNameControl($objPanela[0]->$control_id) : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('panela', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo panelaTableClass::getNameField(panelaTableClass::ID, true) ?>">
    </form>
</div>
