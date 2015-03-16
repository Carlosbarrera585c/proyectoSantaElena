<?php
use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>

<?php $id = entradaBodegaTableClass::ID ?>
<?php $fecha = entradaBodegaTableClass::FECHA ?>
<?php $provee = entradaBodegaTableClass::PROVEEDOR_ID ?>

<div class="container container-fluid">
    <h1><?php echo i18n::__('infoCellarEntrance') ?></h1>
    
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="#" class="btn btn-danger btn-xs" onclick="borrarSeleccion()"><?php echo i18n::__('delete') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed">
            <thead>
                <tr>
                    <th><?php echo i18n::__('id') ?></th>
                    <th><?php echo i18n::__('date') ?></th>
                    <th><?php echo i18n::__('idProvider') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo ((isset($objEntradaBodega) == true) ? $objEntradaBodega[0]->$id : '') ?></td>
                    <td><?php echo ((isset($objEntradaBodega) == true) ? $objEntradaBodega[0]->$fecha : '') ?></td>
                    <td><?php echo ((isset($objEntradaBodega) == true) ? $objEntradaBodega[0]->$provee : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo entradaBodegaTableClass::getNameField(entradaBodegaTableClass::ID, true) ?>">
    </form>
</div>
