<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = bagazoTableClass::ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="page-header text-center titulo">
<h1><i class="glyphicon glyphicon-oil"> <?php echo i18n::__('editChaff') ?> <small><?php echo $objBagazo[0]->$id?></small></i></h1>
</div>
<?php view::includePartial('bagazo/formBagazo', array('objBagazo' => $objBagazo, 'bagazo' => $id, 'objControlCalidad' => $objControlCalidad)) ?>
