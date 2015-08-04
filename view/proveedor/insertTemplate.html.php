<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-shopping-cart"> <?php echo i18n::__('newProvider') ?></i></h1>
    </div>
<?php view::includePartial('proveedor/formProveedor', array('objCiudad' => $objCiudad)) ?>
</div>