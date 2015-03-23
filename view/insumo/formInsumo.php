<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = insumoTableClass::ID ?>
<?php $desc_insumo = insumoTableClass::DESC_INSUMO ?>
<?php $precio = insumoTableClass:: PRECIO ?>
<?php $tipo_insumo_id = tipoInsumoTableClass:: ID ?>
<?php $tipo_insumo_desc = tipoInsumoTableClass:: DESC_TIPO_INSUMO ?>

<form class="form-horizontal" method="post" action="<?php echo routing::getInstance()->getUrlWeb('insumo', ((isset($objInsu)) ? 'update' : 'create')) ?>">
            <?php if (isset($objInsu) == true): ?>
    <input name="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, true) ?>" value="<?php echo $objInsu[0]->$id ?>" type="hidden">
                    <?php endif ?>
<div class="container container-fluid">    

    <?php view::includeHandlerMessage() ?>
    
    <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('descriptionInput') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objInsu) == true) ? $objInsu[0]->$desc_insumo : '') ?>" type="text" class="frm-control" name="<?php echo insumoTableClass::getNameField(insumoTableClass::DESC_INSUMO, true) ?>" placeholder="Introduce la Descripcion del insumo">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label" ><?php echo i18n::__('price') ?>:</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="<?php echo ((isset($objInsu) == true) ? $objInsu[0]->$precio : '') ?>" type="text" class="frm-control" name="<?php echo insumoTableClass::getNameField(insumoTableClass::PRECIO, true) ?>" placeholder="Introduce el id tipo insumo">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label"><?php echo i18n::__('idInput') ?>:</label>
            <div class="col-lg-10">
                <select class="form-control" id="<?php echo insumoTableClass::getNameField(insumoTableClass::ID, TRUE) ?>" name="<?php echo insumoTableClass::getNameField(insumoTableClass::TIPO_INSUMO_ID, TRUE) ?>">
                    <?php foreach ($objTipoInsumo as $insumo): ?>
                        <option value="<?php echo $insumo->$tipo_insumo_id ?>">
                            <?php echo $insumo->$tipo_insumo_desc ?>
                        </option>   
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-12 col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objDetalleEntrada)) ? 'update' : 'register')) ?>">
                <a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
            </div>
        </div>
 
</div>
</form>
