<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = controlCalidadTableClass::ID?>
<div class="page-header text-center titulo">
<h1><i class="glyphicon glyphicon-user"> <?php echo i18n::__('editQualityControl') ?></i><?php echo $objControlCalidad[0]->$id ?></h1>
</div>
<?php view::includePartial('controlCalidad/formControl', array('objControlCalidad' => $objControlCalidad, 'controlCalidad' => $id)) ?>
