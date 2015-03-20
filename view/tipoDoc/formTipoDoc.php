<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $idTipoDoc = tipoDocTableClass::ID ?>

<div class="container container-fluid">    
<form class="form-signin" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', ((isset($objTipoDoc)) ? 'update' : 'create')) ?>">
            <?php if (isset($objTipoDoc) == true): ?>
      <input name="<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::ID, true) ?>" value="<?php echo $objTipoDoc[0]->$idTipoDoc ?>" type="hidden">
                    <?php endif ?>

            <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('desc') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objTipoDoc) == true) ? $objTipoDoc[0]->$tipoDoc : '') ?>" type="text" name="<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true) ?>" placeholder="Introduce el telefono del Proveedor">
            </div>
            </div>
            <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objTipoDoc)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
  </form>
</div>
