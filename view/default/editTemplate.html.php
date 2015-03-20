<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $usuario = usuarioTableClass::USER ?>
<pre>
<h1><?php i18n::__('editUser') ?> <?php echo $objUsuario[0]->$usuario ?></h1>
<?php view::includePartial('default/formUser', array('objUsuario' => $objUsuario, 'usuario' => $usuario)) ?>
</pre>