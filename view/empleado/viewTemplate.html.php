<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $id = empleadoTableClass::ID ?>
<?php $nomEmpleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php $apellEmpleado = empleadoTableClass::APELL_EMPLEADO ?>
<?php $telefono = empleadoTableClass::TELEFONO ?>
<?php $direccion = empleadoTableClass::DIRECCION ?>
<?php $tipoId = empleadoTableClass::TIPO_ID_ID ?>
<?php $numeroIdentificacion = empleadoTableClass::NUMERO_IDENTIFICACION ?>
<?php $credencialId = empleadoTableClass::CREDENCIAL_ID ?>
<?php $correo = empleadoTableClass::CORREO ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="fa fa-info-circle"> <?php echo i18n::__('infoEmployee') ?> <small><?php echo $objEmpleado[0]->$nomEmpleado ?></small></i></h1>
    </div>
    <div style="margin-bottom: 10px; margin-top: 30px">
        <?php if (session::getInstance()->hasCredential('admin')): ?>
          <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
        <?php endif; ?>
        <a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
    </div>
    <table class="table table-bordered table-responsive table-condensed tables">
        <thead>
            <tr class="columna tr_table">

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

                <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$nomEmpleado : '') ?></td>
                <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$apellEmpleado : '') ?></td>
                <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$telefono : '') ?></td>
                <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$direccion : '') ?></td>
                <td><?php echo ((isset($objEmpleado) == true) ? empleadoTableClass::getNameTipoId($objEmpleado[0]->$tipoId) : '') ?></td>
                <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$numeroIdentificacion : '') ?></td>
                <td><?php echo ((isset($objEmpleado) == true) ? empleadoTableClass::getNameCredencial($objEmpleado[0]->$credencialId) : '') ?></td>
                <td><?php echo ((isset($objEmpleado) == true) ? $objEmpleado[0]->$correo : '') ?></td></tr>
        </tbody>
    </table>
</div>
