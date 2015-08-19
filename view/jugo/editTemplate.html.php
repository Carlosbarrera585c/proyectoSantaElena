<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = jugoTableClass::ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="page-header text-center titulo">
<h1><i class="glyphicon glyphicon-th-list"> <?php echo i18n::__('editJuice') ?> <small><?php echo $objJugo[0]->$id?></small></i></h1>
</div>
<?php view::includePartial('jugo/formJugo', array('objJugo' => $objJugo, 'jugo' => $id, 'objControlCalidad' => $objControlCalidad, 'objProveedor' => $objProveedor)) ?>
