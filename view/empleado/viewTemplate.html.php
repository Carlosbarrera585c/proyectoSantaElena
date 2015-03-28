<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = empleadoTableClass::ID ?>
<?php $nom_empleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php $apell_empleado = empleadoTableClass::APELL_EMPLEADO ?>
<?php $telefono = empleadoTableClass::TELEFONO ?>
<?php $direccion = empleadoTableClass::DIRECCION ?>
<?php $tipo_id_id = empleadoTableClass::TIPO_ID_ID ?>
<?php $num_identificacion = empleadoTableClass::NUMERO_IDENTIFICACION ?>
<?php $credencial_id = empleadoTableClass::CREDENCIAL_ID ?>
<?php $correo = empleadoTableClass::CORREO ?>
<?php view::includePartial('empleado/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('infoEmployee') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed">
            <thead>
                <tr class="active">
                    <th><?php echo i18n::__('id') ?></th>
                    <th><?php echo i18n::__('employeeName') ?></th>
                    <th><?php echo i18n::__('employeeLastName') ?></th>   
                    <th><?php echo i18n::__('phone') ?></th>  
                    <th><?php echo i18n::__('direction') ?></th>   
                    <th><?php echo i18n::__('identification') ?></th>
                    <th><?php echo i18n::__('numberIdentification') ?></th>                    
                    <th><?php echo i18n::__('credential') ?></th>   
                    <th><?php echo i18n::__('mail') ?></th>   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$id : '') ?></td>
                    <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$nom_empleado : '') ?></td>
                    <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$apell_empleado : '') ?></td>
                    <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$telefono : '') ?></td>
                    <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$direccion : '') ?></td>
                    <td><?php echo ((isset($objEmpleado) == true) ? empleadoTableClass::getNameTipoId($objEmpleado[0]->$tipo_id_id) : '') ?></td>
                    <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$num_identificacion : '') ?></td>
                    <td><?php echo ((isset($objEmpleado) == true) ? empleadoTableClass::getNameCredencial($objEmpleado[0]->$credencial_id) : '') ?></td>
                    <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$correo : '') ?></td></tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo empleadoTableClass::getNameField(empleadoTableClass::ID, true) ?>">
    </form>
</div>
