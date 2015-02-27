<?php

use mvc\routing\routingClass as routing ?>
<?php $id = tipoEmpaqueTableClass::ID ?>
<?php $desc_tipo_empaque = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>

<div class="container container-fluid">
    <h1>Información del Tipo de Empaque</h1>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
            <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'index') ?>" class="btn btn-info btn-xs">Atras</a>
        </div>
        <table class="table table-bordered table-responsive table-condensed">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo ((isset($objTipoEmpaque) == true) ? $objTipoEmpaque[0]->$id : '') ?></td>
                    <td><?php echo ((isset($objTipoEmpaque) == true) ? $objTipoEmpaque[0]->$desc_tipo_empaque : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::ID, true) ?>">
    </form>
</div>
