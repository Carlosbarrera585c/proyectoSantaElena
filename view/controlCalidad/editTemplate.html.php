<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = controlCalidadTableClass::ID?>
<h1><i class="glyphicon glyphicon-edit"> <?php echo i18n::__('EditQualityControl') ?></i><?php echo $objControlCalidad[0]->$id ?></h1>
<?php view::includePartial('controlCalidad/formControl', array('objControlCalidad' => $objControlCalidad, 'controlCalidad' => $id)) ?>
