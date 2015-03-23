<?php

use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $nom_empleado = empleadoTableClass::NOM_EMPLEADO ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('editEmployee') ?> <?php echo $objEmpleado[0]->$nom_empleado ?></i></h1>
    </div>
    <?php view::includePartial('empleado/formEmpleado', array('objEmpleado' => $objEmpleado, 'nom_empleado' => $nom_empleado, 'objTipoId' => $objTipoId, 'objCredencial' => $objCredencial)) ?>
</div>