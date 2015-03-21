<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $idCredencial = credencialTableClass::ID ?>
<?php $nombreCredencial = credencialTableClass::NOMBRE ?>
<?php $create = credencialTableClass::CREATED_AT ?>

<div class="container container-fluid">    
    <form method="POST" action="<?php echo routing::getInstance()->getUrlWeb('credencial', ((isset($objCredencial)) ? 'update' : 'create')) ?>">
            <?php if (isset($objCredencial) == true): ?>
    <input name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID, true) ?>" value="<?php echo $objCredencial[0]->$idCredencial ?>" type="hidden">
                    <?php endif ?>
    <?php view::includeHandlerMessage() ?>
      <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
           <th><?php echo i18n::__('credential') ?>:<input value="<?php echo ((isset($objCredencial) == true) ? $objCredencial[0]->$nombreCredencial : '') ?>" type="text" class="frm-control" name="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>"></th>
           <th><input class="btn btn-success btn-xs" type="submit" value="<?php echo i18n::__(((isset($objCredencial)) ? 'update' : 'register')) ?>"> <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a></th>
        </tr>
        </thead>
        </table>
  </form>
</div>