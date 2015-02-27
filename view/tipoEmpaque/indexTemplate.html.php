<?php

use mvc\routing\routingClass as routing ?>
<?php $id = tipoEmpaqueTableClass::ID ?>
<?php $desc = tipoEmpaqueTableClass::DESC_TIPO_EMPAQUE ?>
<div class="container container-fluid">
    <h1>Tipo Empaque</h1>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'insert') ?>" class="btn btn-success btn-xs">Nuevo</a>
            <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
        </div>
        <table class="table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th><input type="checkbox" id="chkAll"></th>
                    <th>Tipo Empaque</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($objTipoEmpaque as $tipo): ?>
                    <tr>
                        <td><input type="checkbox" name="chk[]" value="<?php echo $tipo->$id ?>"></td>
                        <td><?php echo $tipo->$desc ?></td>
                        <td>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'view', array(tipoEmpaqueTableClass::ID => $tipo->$id)) ?>" class="btn btn-warning btn-xs">Ver</a>
                            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'edit', array(tipoEmpaqueTableClass::ID => $tipo->$id)) ?>" class="btn btn-primary btn-xs">Editar</a>
                            <a href="#" onclick="confirmarEliminar(<?php echo $tipo->$id ?>)" class="btn btn-danger btn-xs">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo tipoEmpaqueTableClass::getNameField(tipoEmpaqueTableClass::ID, true) ?>">
    </form>
</div>
