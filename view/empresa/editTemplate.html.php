<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $nom_empresa = empresaTableClass::NOM_EMPRESA ?>
<?php view::includePartial('menu/menu') ?>
<div class="page-header text-center titulo">
<h1><i class="glyphicon glyphicon-calendar"> <?php echo i18n::__('editBusiness') ?> <small><?php echo $objEmpresa[0]->$nom_empresa?></small></i></h1>
</div>
<?php view::includePartial('empresa/formEmpresa', array('objEmpresa' => $objEmpresa, 'nom_empresa' => $nom_empresa, 'objUsuarios' => $objUsuarios)) ?>