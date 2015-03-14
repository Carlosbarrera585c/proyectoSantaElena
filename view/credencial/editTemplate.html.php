<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $nomCredencial = credencialTableClass::NOMBRE ?>
<pre>
<h1>Editar Credencial <?php echo $objCredencial[0]->$nomCredencial ?></h1>
<?php view::includePartial('credencial/formCredencial', array('objCredencial' => $objCredencial, 'credencial' => $nomCredencial)) ?>
</pre>