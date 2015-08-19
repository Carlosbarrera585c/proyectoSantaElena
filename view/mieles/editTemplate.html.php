<?php

use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $fecha = mielesTableClass::FECHA ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="fa fa-pencil-square"> <?php echo i18n::__('editHoneys') ?> <small><?php echo $objMieles[0]->$fecha ?></small></i></h1>
    </div>
<?php view::includePartial('mieles/formMieles', array('objMieles' => $objMieles, 'fecha' => $fecha, 'objEmpleado' => $objEmpleado)) ?>
</div>