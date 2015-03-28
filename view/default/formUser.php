<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $idUsuario = usuarioTableClass::ID ?>
<?php $password = usuarioTableClass::PASSWORD ?>
<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('default', ((isset($objUsuario)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objUsuario) == true): ?>
    <input name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID,true) ?>" value="<?php echo $objUsuario[0]->$idUsuario ?>" type="hidden">
  <?php endif ?>
  <?php echo i18n::__('user') ?>: <input value="<?php echo ((isset($objUsuario) == true) ? $objUsuario[0]->$usuario : '') ?>" type="text" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>">
  <br>
  <?php echo i18n::__('pass') ?>: <input value="<?php echo ((isset($objUsuario) == true) ? $objUsuario[0]->$password : '') ?>" type="password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>">
  <br>
  <input type="submit" value="<?php echo i18n::__(((isset($objUsuario)) ? 'update' : 'register')) ?>">
</form>