<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $idEmpresa = empresaTableClass::ID ?>
<?php $nit = empresaTableClass::NIT ?>
<?php $nom_empresa = empresaTableClass::NOM_EMPRESA ?>
<?php $razon_social = empresaTableClass::RAZON_SOCIAL ?>
<?php $direccion = empresaTableClass::DIRECCION ?>
<?php $telefono = empresaTableClass::TELEFONO ?>
<?php $usuario_id = empresaTableClass::USUARIO_ID ?>

<div class="container container-fluid">
        <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('infoEmployee') ?></i></h1>
    </div>
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
                    <td><?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$idEmpresa : '') ?></td>
                    <td><?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$nit : '') ?></td>
                    <td><?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$nom_empresa : '') ?></td>
                    <td><?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$razon_social : '') ?></td>
                    <td><?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$direccion : '') ?></td>                    
                    <td><?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$telefono : '') ?></td>
                    <td><?php echo ((isset($objEmpresa) == true) ? $objEmpresa[0]->$usuario_id : '') ?></td>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('empresa', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo empresaTableClass::getNameField(empresaTableClass::ID, true) ?>">
    </form>
</div>
