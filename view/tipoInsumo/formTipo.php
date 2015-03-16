<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $idTipo = tipoInsumoTableClass::ID ?>
<?php $desc_tipo_insumo = tipoInsumoTableClass::DESC_TIPO_INSUMO ?>
<pre>
<div class="container container-fluid">    
    <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', ((isset($objTipoInsumo)) ? 'update' : 'create')) ?>">
            <?php if (isset($objTipoInsumo) == true): ?>
    <input name="<?php echo tipoInsumoTableClass::getNameField(tipoInsumoTableClass::ID, true) ?>" value="<?php echo $objTipoInsumo[0]->$idTipo ?>" type="hidden">
                    <?php endif ?>
    <?php view::includeHandlerMessage() ?>
      <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
           <th><?php echo i18n::__('desc') ?>:<input value="<?php echo ((isset($objTipoInsumo) == true) ? $objTipoInsumo[0]->$desc_tipo_insumo : '') ?>" type="text" class="frm-control" name="<?php echo tipoInsumoTableClass::getNameField(tipoInsumoTableClass::DESC_TIPO_INSUMO, true) ?>"></th>
           <th><input class="btn btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objTipoInsumo)) ? 'update' : 'register')) ?>"> <a href="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'index') ?>" class="btn btn-info btn-xs">Atrás</a></th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>