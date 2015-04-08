<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php $desc_tipo_id = tipoIdTableClass::DESC_TIPO_ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">  
    <div class="page-header titulo">
        <h1><i class="fa fa-pencil-square"> <?php echo i18n::__('EditIdentification') ?>: <small><?php echo $objTipoId[0]->$desc_tipo_id ?></small></i></h1>
    </div>
    <?php view::includePartial('tipoId/formTipo', array('objTipoId' => $objTipoId, 'desc_tipo_id' => $desc_tipo_id)) ?>
</div>