<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $idCiudad = ciudadTableClass::ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">    
<form class="form-signin" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('ciudad', ((isset($objCiudad)) ? 'update' : 'create')) ?>">
            <?php if (isset($objCiudad) == true): ?>
      <input name="<?php echo CiudadTableClass::getNameField(ciudadTableClass::ID, true) ?>" value="<?php echo $objCiudad[0]->$idCiudad ?>" type="hidden">
                    <?php endif ?>

      <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('name') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objCiudad) == true) ? $objCiudad[0]->$ciudad : '') ?>" type="text" name="<?php echo ciudadTableClass::getNameField(ciudadTableClass::NOM_CIUDAD, true) ?>" placeholder="Introduce la razon social del Proveedor">
            </div>
      </div>
      <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objCiudad)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
  </form>
</div>
