<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php $idEmpresa = detalleEntradaTableClass::ID ?>
<?php $nit = detalleEntradaTableClass::CANTIDAD ?>
<?php $nom_empresa = detalleEntradaTableClass::VALOR ?>
<?php $razon_social = detalleEntradaTableClass::FECHA_FABRICACION ?>
<?php $direccion = detalleEntradaTableClass::FECHA_VENCIMIENTO ?>
<?php $telefono = detalleEntradaTableClass::ID_DOC ?>
<?php $usuario_id = detalleEntradaTableClass::ENTRADA_BODEGA_ID ?>
<?php $usuario_id = detalleEntradaTableClass::INSUMO_ID ?>

<div class="container container-fluid">
    <h1>Información del Empleado</h1>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('empresa', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('empresa', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('empresa', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed">
            <thead>
                <tr>
                    <th><?php echo i18n::__('id') ?></th>
                    <th><?php echo i18n::__('nit') ?></th>
                    <th><?php echo i18n::__('name') ?></th>   
                    <th><?php echo i18n::__('businessName') ?></th>  
                    <th><?php echo i18n::__('direction') ?></th>   
                    <th><?php echo i18n::__('phone') ?></th>
                    <th><?php echo i18n::__('id') ?> <?php echo i18n::__('user') ?></th>                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$idEmpresa : '') ?></td>
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$nit : '') ?></td>
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$nom_empresa : '') ?></td>
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$razon_social : '') ?></td>
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$direccion : '') ?></td>                    
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$telefono : '') ?></td>
                    <td><?php echo ((isset($objDetalleEntrada) == true) ? $objDetalleEntrada[0]->$usuario_id : '') ?></td>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('empresa', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo detalleEntradaTableClass::getNameField(detalleEntradaTableClass::ID, true) ?>">
    </form>
</div>
