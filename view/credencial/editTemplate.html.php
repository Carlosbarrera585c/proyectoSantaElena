<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $nomCredencial = credencialTableClass::NOMBRE ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="fa fa-pencil-square">&nbsp;<?php echo i18n::__('editCredential') ?>: <small><?php echo $objCredencial[0]->$nomCredencial ?></small></i></h1>
    </div>
    <?php view::includePartial('credencial/formCredencial', array('objCredencial' => $objCredencial, 'credencial' => $nomCredencial)) ?>
</div>