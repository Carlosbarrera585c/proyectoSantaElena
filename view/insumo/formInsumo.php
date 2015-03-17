<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = insumoTableClass::ID ?>
<?php $desc_insumo = insumoTableClass::DESC_INSUMO ?>
<?php $precio = insumoTableClass:: PRECIO ?>
<?php $tipo_insumo_id = insumoTableClass:: TIPO_INSUMO_ID ?>
<pre>
<div class="container container-fluid">    
    <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('insumo', ((isset($objInsu)) ? 'update' : 'create')) ?>">
            <?php if (isset($objInsu) == true): ?>
    <input name="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, true) ?>" value="<?php echo $objInsu[0]->$id ?>" type="hidden">
                    <?php endif ?>
    <?php view::includeHandlerMessage() ?>
      <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
           <th><?php echo i18n::__('descriptionInput') ?>:<input value="<?php echo ((isset($objInsu) == true) ? $objInsu[0]->$desc_insumo : '') ?>" type="text" class="frm-control" name="<?php echo insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true) ?>"></th>
          <th><?php echo i18n::__('price') ?>:<input value="<?php echo ((isset($objInsu) == true) ? $objInsu[0]->$precio : '') ?>" type="text" class="frm-control" name="<?php echo insumoTableClass::getNameField(insumoTableClass::PRECIO, true) ?>"></th>
           <th><?php echo i18n::__('IdentificatiOfInpuType') ?>:<input value="<?php echo ((isset($objInsu) == true) ? $objInsu[0]->$tipo_insumo_id : '') ?>" type="text" class="frm-control" name="<?php echo insumoTableClass::getNameField(insumoTableClass::TIPO_INSUMO_ID, true) ?>"></th>
            
           <th><input class="btn btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objInsu)) ? 'update' : 'register')) ?>"> <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a></th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>