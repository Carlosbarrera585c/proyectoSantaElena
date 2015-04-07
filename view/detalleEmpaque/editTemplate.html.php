<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<?php $id = detalleEmpaqueTableClass::ID ?>
 <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('editDetailEntrance') ?></i></h1>
                <?php echo $objDetalleEmpaque[0]->$id ?>
    </div>
<?php view::includePartial('detalleEmpaque/formEmpaque', array('objDetalleEmpaque' => $objDetalleEmpaque, 'detalleEntrada' => $id, 'objInsu' => $objInsu, 'objEmpaque' => $objEmpaque)) ?>