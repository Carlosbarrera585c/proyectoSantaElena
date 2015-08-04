<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $desc_tipo_insumo = tipoInsumoTableClass::DESC_TIPO_INSUMO ?>
 <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-object-align-bottom"> <?php echo i18n::__('editInputType') ?></i></h1>
         <?php echo $objTipoInsumo[0]->$desc_tipo_insumo ?>
    </div>
<?php view::includePartial('tipoInsumo/formTipo', array('objTipoInsumo' => $objTipoInsumo, 'desc_tipo_insumo' => $desc_tipo_insumo)) ?>
