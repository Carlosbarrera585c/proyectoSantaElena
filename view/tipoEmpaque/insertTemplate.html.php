<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-folder-close"> <?php echo i18n::__('newTypePacking') ?></i></h1>
    </div>
<?php view::includePartial('tipoEmpaque/formTipo') ?>
</div>