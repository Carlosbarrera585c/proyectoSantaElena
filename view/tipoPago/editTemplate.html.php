<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $desc = tipoPagoTableClass::DESC_TIPO_PAGO ?>
<pre>
<h1><?php echo i18n::__('editPaymentType')?> <?php echo $objTipoPago[0]->$desc ?></h1>
<?php view::includePartial('tipoPago/formTipoPago', array('objTipoPago' => $objTipoPago, 'tipoPago' => $desc)) ?>
</pre>