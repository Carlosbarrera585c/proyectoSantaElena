<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $idTipo = tipoEmpaqueTableClass::ID ?>
<?php $desc_tipo_empaque = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>
<pre>
<div class="container container-fluid">    
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', ((isset($objTipoEmpaque)) ? 'update' : 'create')) ?>">
            <?php if (isset($objTipoEmpaque) == true): ?>
    <input name="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::ID, true) ?>" value="<?php echo $objTipoEmpaque[0]->$idTipo ?>" type="hidden">
                    <?php endif ?>
   <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
            <th><?php echo i18n::__('desc') ?>:<input value="<?php echo ((isset($objTipoEmpaque) == true) ? $objTipoEmpaque[0]->$desc_tipo_empaque : '') ?>" type="text" name="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE, true) ?>"></th>
            <th><input type="submit" value="<?php echo i18n::__(((isset($objTipoEmpaque)) ? 'update' : 'register')) ?>"></th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>