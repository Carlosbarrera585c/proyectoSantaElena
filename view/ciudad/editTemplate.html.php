<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $ciudad = ciudadTableClass::NOM_CIUDAD ?>
 <div class="page-header  text-center titulo">
        <h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('editCity') ?></i></h1>
        <?php echo $objCiudad[0]->$ciudad ?>
    </div>
<?php view::includePartial('ciudad/formCiudad', array('objCiudad' => $objCiudad, 'ciudad' => $ciudad)) ?>
