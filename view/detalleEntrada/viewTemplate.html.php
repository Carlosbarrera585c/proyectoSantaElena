<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>

<?php $id = detalleEntradaTableClass::ID ?>
<?php $cant = detalleEntradaTableClass::CANTIDAD ?>
<?php $valor = detalleEntradaTableClass::VALOR ?>
<?php $fechaFB = detalleEntradaTableClass::FECHA_FABRICACION ?>
<?php $fechaVC = detalleEntradaTableClass::FECHA_VENCIMIENTO ?>
<?php $idDoc = detalleEntradaTableClass::ID_DOC ?>
<?php $desDoc = detalleEntradaTableClass::ID_DOC ?>
<?php $enBodegaId = entradaBodegaTableClass::ID ?>
<?php $fecha = entradaBodegaTableClass::ID ?>
<?php $insuId = detalleEntradaTableClass::INSUMO_ID ?>
<?php $descInsu = detalleEntradaTableClass::INSUMO_ID ?>

<?php view::includePartial('menu/menu') ?>

<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('cellarEntrance') ?></i></h1>
    </div>
    <div>
        <table class="table table-bordered table-responsive table-condensed tables">
<?php foreach ($objEntradaBodega as $key): ?>
                <tr>
                  <th class="success tamanoAccion"><?php echo i18n::__('id') ?></th>      
                    <th><?php echo entradaBodegaTableClass::getNameEntrada($key->$enBodegaId) ?></th>
                </tr>
                <tr>
                    <th class="success tamanoAccion"><?php echo i18n::__('date') ?></th>      
                    <th><?php echo entradaBodegaTableClass::getNameBodega($key->$fecha) ?></th>
                </tr>
<?php endforeach; ?> 
        </table>
    </div>
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('infoDetailEntrance') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'insert', array(entradaBodegaTableClass::ID => $key->$id)) ?>" class="btn btn-primary btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('enlist') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
              <tr class="success">
                    <th><?php echo i18n::__('idEntrance') ?></th>
                    <th><?php echo i18n::__('date') ?></th>        
                    <th><?php echo i18n::__('id') ?></th>
                    <th><?php echo i18n::__('amount') ?></th>
                    <th><?php echo i18n::__('value') ?></th>
                    <th><?php echo i18n::__('manuFacturingDate') ?></th>
                    <th><?php echo i18n::__('expirationDate') ?></th>
                    
                    <th><?php echo i18n::__('descDoc') ?></th>
                    
                    <th><?php echo i18n::__('descriptionInput') ?></th> 
               </tr>
            </thead>
            <tbody>
                <tr>              
                        
                        <?php foreach ($objDetalleEntrada as $key): ?>
                        <th><?php echo entradaBodegaTableClass::getNameEntrada($key->$enBodegaId) ?></th>
                        <th><?php echo entradaBodegaTableClass::getNameBodega($key->$fecha) ?></th>
                        <?php endforeach; ?> 
                        <?php foreach ($objDetalleEntrada as $key): ?>  
                        <th><?php echo $key->$id ?></th>
                        <th><?php echo $key->$cant ?></th>  
                        <th><?php echo $key->$valor ?></th>
                        <th><?php echo $key->$fechaFB ?></th>
                        <th><?php echo $key->$fechaVC ?></th>
                        <?php endforeach; ?>       
                        <?php foreach ($objDetalleEntrada as $key): ?>          
                        
                        <th><?php echo tipoDocTableClass::getNameTipoDes($key->$desDoc) ?></th>
                        <?php endforeach; ?>
                        <?php foreach ($objDetalleEntrada as $key): ?>
                        
                        <th><?php echo insumoTableClass::getNameDInsumo($key->$descInsu) ?></th>
                        <?php endforeach; ?>                    
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ID, true) ?>">
    </form>
</div>
