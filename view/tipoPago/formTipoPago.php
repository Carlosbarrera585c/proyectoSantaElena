<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $idTipoPago = tipoPagoTableClass::ID ?>

<pre>
<div class="container container-fluid">    
<form class="form-signin" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('tipoPago', ((isset($objTipoPago)) ? 'update' : 'create')) ?>">
            <?php if (isset($objTipoPago) == true): ?>
      <input name="<?php echo tipoPagoTableClass::getNameField(tipoPagoTableClass::ID, true) ?>" value="<?php echo $objTipoPago[0]->$idTipoPago ?>" type="hidden">
                    <?php endif ?>
   <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
            <th><?php echo i18n::__('desc') ?>:<input value="<?php echo ((isset($objTipoPago) == true) ? $objTipoPago[0]->$tipoPago : '') ?>" type="text" name="<?php echo tipoPagoTableClass::getNameField(tipoPagoTableClass::DESC_TIPO_PAGO, true) ?>"></th>
            <th><input type="submit" value="<?php echo i18n::__(((isset($objTipoPago)) ? 'update' : 'register')) ?>">  <a href="<?php echo routing::getInstance()->getUrlWeb('tipoPago', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a>
            </th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>