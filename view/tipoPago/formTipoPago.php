<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $idTipoPago = tipoPagoTableClass::ID ?>

<div class="container container-fluid">    
<form class="form-signin" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('tipoPago', ((isset($objTipoPago)) ? 'update' : 'create')) ?>">
            <?php if (isset($objTipoPago) == true): ?>
      <input name="<?php echo tipoPagoTableClass::getNameField(tipoPagoTableClass::ID, true) ?>" value="<?php echo $objTipoPago[0]->$idTipoPago ?>" type="hidden">
                    <?php endif ?>
      <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('desc') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objTipoPago) == true) ? $objTipoPago[0]->$tipoPago : '') ?>" type="text" name="<?php echo tipoPagoTableClass::getNameField(tipoPagoTableClass::DESC_TIPO_PAGO, true) ?>" placeholder="Introduce Descripcion del Pago">
            </div>
           
            <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objTipoPago)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('tipoPago', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
  </form>
</div>