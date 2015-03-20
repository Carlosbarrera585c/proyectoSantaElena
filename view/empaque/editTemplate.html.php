<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $fecha = empaqueTableClass::FECHA ?>
    <?php $nom_empleado = empleadoTableClass::NOM_EMPLEADO ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('editPacking') ?> <?php echo $objEmpaque[0]->$fecha ?></i></h1>
    </div>
<?php view::includePartial('empaque/formEmpaque', array('objEmpaque' => $objEmpaque, 'fecha' => $fecha, 'objEmpleado' => $objEmpleado, 'nom_empleado' => $nom_empleado, 'objTipoEmpaque' => $objTipoEmpaque)) ?>
</div>