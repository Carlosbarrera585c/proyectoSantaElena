<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $desc_insumo = insumoTableClass::DESC_INSUMO ?>
 <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-baby-formula"> <?php echo i18n::__('editInput') ?></i></h1>
        <?php echo $objInsu[0]->$desc_insumo ?>
    </div>
<?php view::includePartial('insumo/formInsumo', array('objInsu' => $objInsu, 'desc_insumo' => $desc_insumo, 'objTipoInsumo' => $objTipoInsumo)) ?>
