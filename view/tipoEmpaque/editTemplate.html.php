<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $desc_tipo_empaque = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>
<div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-folder-close"> <?php echo i18n::__('editTypePacking') ?></i></h1>
        <?php echo $objTipoEmpaque[0]->$desc_tipo_empaque ?>
    </div>
    <?php view::includePartial('tipoEmpaque/formTipo', array('objTipoEmpaque' => $objTipoEmpaque, 'desc_tipo_empaque' => $desc_tipo_empaque)) ?>
</div>