<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
 <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('newDetailPacking') ?></i></h1>
    </div>
<?php view::includePartial('detalleEmpaque/formEmpaque', array('objInsu' => $objInsu, 'objEmpaque' => $objEmpaque)) ?>