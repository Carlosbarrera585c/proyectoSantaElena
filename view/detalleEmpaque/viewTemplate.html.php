<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>

<?php $id = detalleEmpaqueTableClass::ID ?>
<?php $cant = detalleEmpaqueTableClass::CANTIDAD ?>
<?php $insuId = detalleEmpaqueTableClass::INSUMO_ID ?>
<?php $descInsu = detalleEmpaqueTableClass::INSUMO_ID ?>
<?php $empaqueId = detalleEmpaqueTableClass::EMPAQUE_ID ?>
<?php $empaqueFecha = detalleEmpaqueTableClass::EMPAQUE_ID ?>

<?php view::includePartial('empleado/menu') ?>

<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('infoDetailPacking') ?></i></h1>
    </div>
    <div>
        <table class="table table-bordered table-responsive table-condensed">
<?php foreach ($objDetalleEmpaque as $key): ?>
                <tr>
                    <th><?php echo i18n::__('id') ?></th>      
                    <th><?php echo empaqueTableClass::getNameId($key->$empaqueId) ?></th>
                </tr>
                <tr>
                    <th><?php echo i18n::__('date') ?></th>      
                    <th><?php echo empaqueTableClass::getEmpaque($key->$empaqueFecha) ?></th>
                </tr>
<?php endforeach; ?> 
        </table>
    </div>
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('infoDetailEntrance') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', 'index') ?>" class="btn btn-info btn-sm"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="tablaUsuario table table-bordered table-responsive table-hover">
            <thead>
                <tr>
                    <th><?php echo i18n::__('idPacking') ?></th>
                    <th><?php echo i18n::__('date') ?></th>
                    <th><?php echo i18n::__('id') ?></th>
                    <th><?php echo i18n::__('amount') ?></th>        
                    <th><?php echo i18n::__('idInput') ?></th>
                    <th><?php echo i18n::__('descriptionInput') ?></th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>              
                        
                        <?php foreach ($objDetalleEmpaque as $key): ?>
                        <th><?php echo empaqueTableClass::getNameId($key->$empaqueId) ?></th>
                        <th><?php echo empaqueTableClass::getEmpaque($key->$empaqueFecha) ?></th>
                        <?php endforeach; ?> 
                        <?php foreach ($objDetalleEmpaque as $key): ?>  
                        <th><?php echo $key->$id ?></th>
                        <th><?php echo $key->$cant ?></th>  
                        <?php endforeach; ?>  
                        <?php foreach ($objDetalleEmpaque as $key): ?>
                        <th><?php echo insumoTableClass::getNameInsumo($key->$insuId) ?></th>
                        <th><?php echo insumoTableClass::getNameDInsumo($key->$descInsu) ?></th>
                        <?php endforeach; ?>                    
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('detalleEmpaque', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo detalleEmpaqueTableClass::getNameField(detalleEmpaqueTableClass::ID, true) ?>">
    </form>
</div>
