<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = panelaTableClass::ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="page-header text-center titulo">
<h1><i class="glyphicon glyphicon-adjust"> <?php echo i18n::__('editPanela') ?> <small><?php echo $objPanela[0]->$id?></small></i></h1>
</div>
<?php view::includePartial('panela/formPanela', array('objPanela' => $objPanela, 'panela' => $id, 'objControlCalidad' => $objControlCalidad, 'objProveedor' => $objProveedor)) ?>
