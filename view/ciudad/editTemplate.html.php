<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $ciudad = ciudadTableClass::NOM_CIUDAD ?>
<pre>
<h1>Editar Ciudad <?php echo $objCiudad[0]->$ciudad ?></h1>
<?php view::includePartial('ciudad/formCiudad', array('objCiudad' => $objCiudad, 'ciudad' => $ciudad)) ?>
</pre>