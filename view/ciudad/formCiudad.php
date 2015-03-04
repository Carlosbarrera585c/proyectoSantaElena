<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $idCiudad = ciudadTableClass::ID ?>
<pre>
<div class="container container-fluid">    
<form class="form-signin" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('ciudad', ((isset($objCiudad)) ? 'update' : 'create')) ?>">
            <?php if (isset($objCiudad) == true): ?>
      <input name="<?php echo CiudadTableClass::getNameField(ciudadTableClass::ID, true) ?>" value="<?php echo $objCiudad[0]->$idCiudad ?>" type="hidden">
                    <?php endif ?>
   <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
            <th><?php echo i18n::__('city') ?>:<input value="<?php echo ((isset($objCiudad) == true) ? $objCiudad[0]->$ciudad : '') ?>" type="text" name="<?php echo ciudadTableClass::getNameField(ciudadTableClass::NOM_CIUDAD, true) ?>"></th>
            <th><input type="submit" value="<?php echo i18n::__(((isset($objCiudad)) ? 'update' : 'register')) ?>">  <a href="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a>
            </th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>