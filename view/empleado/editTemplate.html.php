<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $nom_empleado = empleadoTableClass::NOM_EMPLEADO ?>
<pre>
<h1>Editar Empleado <?php echo $objEmpleado[0]->$nom_empleado ?></h1>
<?php view::includePartial('empleado/formTipo', array('objEmpleado' => $objEmpleado, 'nom_empleado' => $nom_empleado)) ?>
</pre>