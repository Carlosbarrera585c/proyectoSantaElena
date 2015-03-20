<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>

<?php $id = empaqueTableClass::ID ?>
<?php $fecha = empaqueTableClass::FECHA ?>
<?php $empleado_id = empaqueTableClass::EMPLEADO_ID ?>
<?php $tipo_empaque_id = empaqueTableClass::EMPLEADO_ID ?>
<?php view::includePartial('empleado/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('informationPacking') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('empaque', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()">Borrar</a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed">
            <thead>
                <tr>
                    <th><?php echo i18n::__('id') ?></th>
                    <th><?php echo i18n::__('date') ?></th>
                    <th><?php echo i18n::__('employee') ?></th>   
                    <th><?php echo i18n::__('typePacking') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo ((isset($objEmpaque) == true) ? $objEmpaque[0]->$id : '') ?></td>
                    <td><?php echo ((isset($objEmpaque) == true) ? $objEmpaque[0]->$fecha : '') ?></td>
                    <td><?php echo ((isset($objEmpaque) == true) ? $objEmpaque[0]->$empleado_id : '') ?></td>
                    <td><?php echo ((isset($objEmpaque) == true) ? $objEmpaque[0]->$tipo_empaque_id : '') ?></td>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('empaque', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo empaqueTableClass::getNameField(empaqueTableClass::ID, true) ?>">
    </form>
</div>
