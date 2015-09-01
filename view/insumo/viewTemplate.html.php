<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $id = insumoTableClass::ID ?>
<?php $desc_insumo = insumoTableClass::DESC_INSUMO ?>
<?php $precio = insumoTableClass::PRECIO ?>
<?php $tipo_insumo_id = insumoTableClass::TIPO_INSUMO_ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-baby-formula"> <?php echo i18n::__('infoInput') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('insumo', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="columna tr_table">

                    <th><?php echo i18n::__('descriptionInput') ?></th>
                    <th><?php echo i18n::__('price') ?></th>
                    <th><?php echo i18n::__('IdentificatiOfInpuType') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td><?php echo ((isset($objInsu) == true) ? $objInsu[0]->$desc_insumo : '') ?></td>
                    <td><?php echo '$' . number_format($objInsu[0]->$precio, 0, ',', '.'); ?></td>
                    <td><?php echo ((isset($objInsu) == true) ? insumoTableClass::getNameDInsumo($objInsu[0]->$tipo_insumo_id) : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('insumo', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, true) ?>">
    </form>
</div>
