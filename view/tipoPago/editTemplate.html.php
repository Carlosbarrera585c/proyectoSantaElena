<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $desc = tipoPagoTableClass::DESC_TIPO_PAGO ?>
 <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('editPaymentType') ?></i></h1>
        <?php echo $objTipoPago[0]->$desc ?>
    </div>
<?php view::includePartial('tipoPago/formTipoPago', array('objTipoPago' => $objTipoPago, 'tipoPago' => $desc)) ?>
