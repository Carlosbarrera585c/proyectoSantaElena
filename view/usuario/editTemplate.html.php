<?php

use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $usuario = usuarioTableClass::USER ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="fa fa-pencil-square"><?php echo i18n::__('editUser') ?> <small><?php echo $objUsuario[0]->$usuario ?></small></i></h1>
    </div>
    <?php view::includeHandlerMessage() ?>
    <?php view::includePartial('usuario/formUser', array('objUsuario' => $objUsuario, 'usuario' => $usuario)) ?>
</div>