<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $desc = tipoDocTableClass::DESC_TIPO_DOC ?>
 <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-duplicate"> <?php echo i18n::__('editDocType') ?></i></h1>
        <?php echo $objTipoPago[0]->$desc ?>
    </div>
<?php view::includePartial('tipoDoc/formTipoDoc', array('objTipoDoc' => $objTipoPago, 'tipoDoc' => $desc)) ?>
