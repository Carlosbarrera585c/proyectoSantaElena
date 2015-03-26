<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $nom_empresa = empresaTableClass::NOM_EMPRESA ?>
<h1><?php echo i18n::__('editBusiness') ?> <?php echo $objEmpresa[0]->$nom_empresa ?></h1>
<?php view::includePartial('empresa/formEmpresa', array('objEmpresa' => $objEmpresa, 'nom_empresa' => $nom_empresa, 'objUsuarios' => $objUsuarios)) ?>