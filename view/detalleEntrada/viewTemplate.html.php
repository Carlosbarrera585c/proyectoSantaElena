<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view?>

<?php $id = detalleEntradaTableClass::ID ?>
<?php $cant = detalleEntradaTableClass::CANTIDAD ?>
<?php $valor = detalleEntradaTableClass::VALOR ?>
<?php $fechaFB = detalleEntradaTableClass::FECHA_FABRICACION ?>
<?php $fechaVC = detalleEntradaTableClass::FECHA_VENCIMIENTO ?>
<?php $idDoc = tipoDocTableClass::ID ?>
<?php $desDoc = tipoDocTableClass::DESC_TIPO_DOC ?>
<?php $enBodegaId = entradaBodegaTableClass::ID ?>
<?php $fecha = entradaBodegaTableClass::FECHA ?>
<?php $insuId = insumoTableClass::ID ?>
<?php $descInsu = insumoTableClass::DESC_INSUMO ?>
        
 <?php view::includePartial('empleado/menu') ?>

<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('cellarEntrance') ?></i></h1>
    </div>
    <div>
        <table class="table table-bordered table-responsive table-condensed">
            <tr>
                <th><?php echo i18n::__('id') ?></th>
                <th><?php echo i18n::__('date') ?></th>
            </tr>
            <tr>
                <?php foreach ($objEntradaBodega as $entradaB): ?>
                <td><?php echo ((isset($objEntradaBodega) == true) ? $objEntradaBodega[0]->$id : '') ?></td>
                <td><?php echo ((isset($objEntradaBodega) == true) ? $objEntradaBodega[0]->$fecha : '') ?></td>
                <?php endforeach ?>
            </tr>
        </table>
     </div>
<div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('infoDetailEntrance') ?></i></h1>
</div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed">
            <thead>
                <tr>
                    <th><?php echo i18n::__('idEntrance') ?></th>
                    <th><?php echo i18n::__('date') ?></th>        
                    <th><?php echo i18n::__('id') ?></th>
                    <th><?php echo i18n::__('amount') ?></th>
                    <th><?php echo i18n::__('value') ?></th>
                    <th><?php echo i18n::__('manuFacturingDate') ?></th>
                    <th><?php echo i18n::__('expirationDate') ?></th>
                    <th><?php echo i18n::__('idDoc') ?></th>
                    <th><?php echo i18n::__('descDoc') ?></th>
                    <th><?php echo i18n::__('idInput') ?></th> 
                    <th><?php echo i18n::__('descriptionInput') ?></th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($objEntradaBodega as $entradaB): ?>
                    <td><?php echo ((isset($objEntradaBodega) == true) ? $objEntradaBodega[0]->$enBodegaId : '') ?></td>
                    <td><?php echo ((isset($objEntradaBodega) == true) ? $objEntradaBodega[0]->$fecha : '') ?></td>
                    <?php endforeach ?>
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$id : '') ?></td>
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$cant : '') ?></td>
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$valor : '') ?></td>
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$fechaFB : '') ?></td>                    
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$fechaVC : '') ?></td>
                    <?php foreach ($objTipoDoc as $tipoDoc): ?>
                    <td><?php echo ((isset($objTipoDoc) == true) ? $objTipoDoc[0]->$idDoc : '') ?></td>
                    <td><?php echo ((isset($objTipoDoc) == true) ? $objTipoDoc[0]->$desDoc : '') ?></td>
                    <?php endforeach ?>
                    <?php foreach ($objInsu as $insu): ?>
                    <td><?php echo ((isset($objInsu) == true) ? $objInsu[0]->$insuId : '') ?></td>
                    <td><?php echo ((isset($objInsu) == true) ? $objInsu[0]->$descInsu : '') ?></td> 
                    <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('detalleEntrada', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ID, true) ?>">
    </form>
</div>
