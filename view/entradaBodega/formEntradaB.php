<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $idE = entradaBodegaTableClass::ID ?>
<?php $fechaE = entradaBodegaTableClass::FECHA ?>
<?php $proveeId = proveedorTableClass::ID ?>
<?php $proveeNom = proveedorTableClass::RAZON_SOCIAL ?>

<div class="container container-fluid">    
    <form method="post" action="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', ((isset($objEntradaBodega)) ? 'update' : 'create')) ?>">
            <?php if (isset($objEntradaBodega) == true): ?>
    <input name="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID, true) ?>" value="<?php echo $objEntradaBodega[0]->$idE ?>" type="hidden">
                    <?php endif ?>
    <?php view::includeHandlerMessage() ?>
           <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('date') ?>:</label>
            <div class="col-lg-10">
                <input type="datetime-local" class="form-control" value="<?php echo ((isset($objEntradaBodega) == true) ? $objEntradaBodega[0]->$fechaE : '') ?>" type="text" class="frm-control" name="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::FECHA, true) ?>" >
            </div>
        </div>
            <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('idProvider') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID, TRUE) ?>" name="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::PROVEEDOR_ID, TRUE) ?>">
                    <?php foreach ($objProveedor as $proveedor): ?>
                        <option value="<?php echo $proveedor->$proveeId ?>">
                            <?php echo $proveedor->$proveeNom ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objDetalleEntrada)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
  </form>
</div>
