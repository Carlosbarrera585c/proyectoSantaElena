<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $desc_tipo_empaque = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>

<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('editTypePacking') ?>: <?php echo $objTipoEmpaque[0]->$desc_tipo_empaque ?></i></h1>
    </div>
    <?php view::includePartial('tipoEmpaque/formTipo', array('objTipoEmpaque' => $objTipoEmpaque, 'desc_tipo_empaque' => $desc_tipo_empaque)) ?>
</div>