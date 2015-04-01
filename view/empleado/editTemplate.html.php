<?php

use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $nom_empleado = empleadoTableClass::NOM_EMPLEADO ?>
<?php view::includePartial('empleado/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="fa fa-pencil-square"> <?php echo i18n::__('editEmployee') ?> <small><?php echo $objEmpleado[0]->$nom_empleado ?></small></i></h1>
    </div>
    <?php view::includePartial('empleado/formEmpleado', array('objEmpleado' => $objEmpleado, 'nom_empleado' => $nom_empleado, 'objTipoId' => $objTipoId, 'objCredencial' => $objCredencial)) ?>
</div>
