<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $idE = entradaBodegaTableClass::ID ?>
<?php $fechaE = entradaBodegaTableClass::FECHA ?>
<?php $proveeId = entradaBodegaTableClass::PROVEEDOR_ID ?>

<div class="container container-fluid">    
    <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', ((isset($objEntradaBodega)) ? 'update' : 'create')) ?>">
            <?php if (isset($objEntradaBodega) == true): ?>
    <input name="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID, true) ?>" value="<?php echo $objEntradaBodega[0]->$idE ?>" type="hidden">
                    <?php endif ?>
    <?php view::includeHandlerMessage() ?>
      <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
           <th><?php echo i18n::__('date') ?>:<input value="<?php echo ((isset($objEntradaBodega) == true) ? $objEntradaBodega[0]->$fechaE : '') ?>" type="text" class="frm-control" name="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::FECHA, true) ?>"></th>
           <th><?php echo i18n::__('idProvider') ?>:<input value="<?php echo ((isset($objEntradaBodega) == true) ? $objEntradaBodega[0]->$proveeId : '') ?>" type="text" class="frm-control" name="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::PROVEEDOR_ID, true) ?>"></th>
           <th><input class="btn btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objEntradaBodega)) ? 'update' : 'register')) ?>"> <a href="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', 'index') ?>" class="btn btn-info btn-xs">Atrás</a></th>
        </tr>
        </thead>
        </table>
  </form>
</div>
