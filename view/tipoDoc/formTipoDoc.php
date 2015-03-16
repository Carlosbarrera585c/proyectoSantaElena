<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $idTipoDoc = tipoDocTableClass::ID ?>

<pre>
<div class="container container-fluid">    
<form class="form-signin" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', ((isset($objTipoDoc)) ? 'update' : 'create')) ?>">
            <?php if (isset($objTipoDoc) == true): ?>
      <input name="<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::ID, true) ?>" value="<?php echo $objTipoDoc[0]->$idTipoDoc ?>" type="hidden">
                    <?php endif ?>
   <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
            <th><?php echo i18n::__('desc') ?>:<input value="<?php echo ((isset($objTipoDoc) == true) ? $objTipoDoc[0]->$tipoDoc : '') ?>" type="text" name="<?php echo tipoDocTableClass::getNameField(tipoDocTableClass::DESC_TIPO_DOC, true) ?>"></th>
            <th><input type="submit" value="<?php echo i18n::__(((isset($objTipoDoc)) ? 'update' : 'register')) ?>">  <a href="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a>
            </th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>