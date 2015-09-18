<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php
use mvc\request\requestClass as request ?>

<?php $id = detalleSalidaTableClass::ID ?>
<?php $cantidad = detalleSalidaTableClass::CANTIDAD ?>
<?php $valor = detalleSalidaTableClass::VALOR ?>
<?php $fechaFB = detalleSalidaTableClass::FECHA_FABRICACION ?>
<?php $fechaVC = detalleSalidaTableClass::FECHA_VENCIMIENTO ?>
<?php $TipoDocId = detalleSalidaTableClass::ID_DOC ?>
<?php $idDoc = tipoDocTableClass::ID ?>
<?php $desDoc = tipoDocTableClass::DESC_TIPO_DOC ?>
<?php $salidaBodegaId = detalleSalidaTableClass::SALIDA_BODEGA_ID ?>
<?php $salidaId = salidaBodegaTableClass::ID ?>
<?php $fecha = salidaBodegaTableClass::FECHA ?>
<?php $insumoId = detalleSalidaTableClass::INSUMO_ID ?>
<?php $insuId = insumoTableClass::ID ?>
<?php $descInsu = insumoTableClass::DESC_INSUMO ?>
<?php view::includePartial('menu/menu') ?>
<form class="form-horizontal" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('detalleSalida', ((isset($objDetalleSalida)) ? 'update' : 'create')) ?>">
    <?php if (isset($objDetalleSalida) == true): ?>
    <input name="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::ID, true) ?>" value="<?php echo $objDetalleSalida[0]->$id ?>" type="hidden">
    <?php endif ?>
    <div class="container container-fluid divTamaño"  >
        <?php view::includeHandlerMessage() ?>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('amount') ?>:</label>
            <div class="col-xs-6">
              <input id="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true) ?>" type="number" class="form-control" value="<?php echo ((isset($objDetalleSalida) == true) ? $objDetalleSalida[0]->$cantidad : '') ?><?php echo (session::getInstance()->hasFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true)) === true) ? request::getInstance()->getPost(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true)) : '' ?>" name="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true) ?>" placeholder="<?php echo i18n::__('amount') ?>">
                <?php if (session::getInstance()->hasFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::CANTIDAD, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group <?php echo (session::getInstance()->hasFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true)) === true) ? 'has-error has-feedback' : '' ?>">
            <label for="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true) ?>" class="col-lg-3 control-label" ><?php echo i18n::__('value') ?>:</label>
            <div class="col-xs-6">
              <input id="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true) ?>" type="number" class="form-control" value="<?php echo ((isset($objDetalleSalida) == true) ? $objDetalleSalida[0]->$valor : '') ?><?php echo (session::getInstance()->hasFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true)) === true) ? request::getInstance()->getPost(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true)) : '' ?>" name="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true) ?>" placeholder="<?php echo i18n::__('value') ?>">
                <?php if (session::getInstance()->hasFlash(detalleSalidaTableClass::getNameField(detalleSalidaTableClass::VALOR, true)) === true): ?>
                  <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label" ><?php echo i18n::__('manuFacturingDate') ?>:</label>
            <div class="col-xs-6">
                <input type="datetime-local" class="form-control" value="<?php echo ((isset($objDetalleSalida) == true) ? $objDetalleSalida[0]->$fechaFB : '') ?>" name="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::FECHA_FABRICACION, true) ?>" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label"><?php echo i18n::__('expirationDate') ?>:</label>
            <div class="col-xs-6">
                <input type="datetime-local" class="form-control" value="<?php echo ((isset($objDetalleSalida) == true) ? $objDetalleSalida[0]->$fechaVC : '') ?>" name="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::FECHA_VENCIMIENTO, true) ?>" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label"><?php echo i18n::__('idDoc') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::ID, TRUE) ?>" name="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::ID_DOC, TRUE) ?>">
                    <?php foreach ($objTipoDoc as $tipoDoc): ?>
                        <option <?php echo (isset($objDetalleSalida[0]->$TipoDocId) === true and $objDetalleSalida[0]->$TipoDocId == $tipoDoc->$idDoc) ? 'selected' : '' ?> value="<?php echo $tipoDoc->$idDoc ?>">
                            <?php echo $tipoDoc->$desDoc ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

      <?php $idBodega = request::getInstance()->getGet('id') ?>
      <div class="form-group">
            <label class="col-lg-3 control-label"><?php echo i18n::__('idOutput') ?>:</label>
            <div class="col-xs-6">
                
                <select class="form-control" id="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::ID, TRUE) ?>" name="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::SALIDA_BODEGA_ID, TRUE) ?>">
                    <?php foreach ($objSalidaBodega as $salidaBodega): ?>
                        <option <?php echo (isset($objDetalleSalida[0]->$salidaBodegaId) === true and $objDetalleSalida[0]->$salidaBodegaId == $salidaBodega->$salidaId) ? 'selected' : '' ?>  <?php echo ($idBodega == $salidaBodega->$salidaId) ? 'selected' : '' ?> value="<?php echo $salidaBodega->$salidaId ?>">
                            <?php echo $salidaBodega->$salidaId ?>
                        </option>
                    <?php endforeach ?>
                </select>
        </div>
            
        </div>

        
        
        <div class="form-group">
            <label class="col-lg-3 control-label"><?php echo i18n::__('idInput') ?>:</label>
            <div class="col-xs-6">
                <select class="form-control" id="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::ID, TRUE) ?>" name="<?php echo detalleSalidaTableClass::getNameField(detalleSalidaTableClass::INSUMO_ID, TRUE) ?>">
                    <?php foreach ($objInsu as $insu): ?>
                        <option <?php echo (isset($objDetalleSalida[0]->$insumoId) === true and $objDetalleSalida[0]->$insumoId == $insu->$insuId) ? 'selected' : '' ?> value="<?php echo $insu->$insuId ?>">
                            <?php echo $insu->$descInsu ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-6">
                <input class="btn btn-success btn-sm" type="submit" value="<?php echo i18n::__(((isset($objDetalleSalida)) ? 'update' : 'register')) ?>">
                <a href="<?=$_SERVER["HTTP_REFERER"]?>" class="btn btn-info btn-sm"><?php echo i18n::__('cancel') ?> </a> 
            </div>
        </div>
    </div>
</form>