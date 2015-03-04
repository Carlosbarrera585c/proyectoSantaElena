<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $idUsuario = usuarioTableClass::ID ?>
<?php $password = usuarioTableClass::PASSWORD ?>
<pre>
<div class="container container-fluid">    
<form class="form-signin" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('default', ((isset($objUsuario)) ? 'update' : 'create')) ?>">
           
 <?php if (isset($objUsuario) == true): ?>
      <input name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>" value="<?php echo $objUsuario[0]->$idUsuario ?>" type="hidden">
                    <?php endif ?>
      <?php view::includeHandlerMessage() ?>
   <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
            <th><?php echo i18n::__('user') ?>:<input value="<?php echo ((isset($objUsuario) == true) ? $objUsuario[0]->$usuario : '') ?>" type="text" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>"></th>
            <th><?php echo i18n::__('pass') ?>:<input value="<?php echo ((isset($objUsuario) == true) ? $objUsuario[0]->$password : '') ?>" type="password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) ?>"></th>
            <th><input type="submit" value="<?php echo i18n::__(((isset($objUsuario)) ? 'update' : 'register')) ?>"></th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>