<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $idTipoId = tipoIdTableClass::ID ?>
<?php $desc_tipo_id = tipoIdTableClass::DESC_TIPO_ID ?>
<pre>
<div class="container container-fluid">    
    <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('tipoId', ((isset($objTipoId)) ? 'update' : 'create')) ?>">
            <?php if (isset($objTipoId) == true): ?>
    <input name="<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::ID, true) ?>" value="<?php echo $objTipoId[0]->$idTipoId ?>" type="hidden">
                    <?php endif ?>
    <?php view::includeHandlerMessage() ?>
      <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
           <th><?php echo i18n::__('desc') ?>:<input value="<?php echo ((isset($objTipoId) == true) ? $objTipoId[0]->$desc_tipo_id : '') ?>" type="text" class="frm-control" name="<?php echo tipoIdTableClass::getNameField(tipoIdTableClass::DESC_TIPO_ID, true) ?>"></th>
           <th><input class="btn btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objTipoId)) ? 'update' : 'register')) ?>"> <a href="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a></th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>