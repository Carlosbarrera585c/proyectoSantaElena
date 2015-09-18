<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid cuerpo6" >
    <div class="center-block cuerpo5">
        <div class="row">
            <div class="page-header  text-center titulo">
                <h1><i class="glyphicon glyphicon-th-list"> <?php echo i18n::__('newQualityControl') ?></i></h1>
            </div>
        </div>
        <?php view::includePartial('controlCalidad/formControl', array('objEmpleado' => $objEmpleado, 'objProveedor' => $objProveedor)) ?>
    </div>
</div>
