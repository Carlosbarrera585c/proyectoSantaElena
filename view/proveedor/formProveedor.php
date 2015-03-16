<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $idProveedor = proveedorTableClass::ID ?>
<?php $razonSoProv = proveedorTableClass::RAZON_SOCIAL ?>
<?php $dirProveedor = proveedorTableClass::DIRECCION ?>
<?php $telProveedor = proveedorTableClass::TELEFONO ?>
<?php $idCiudad = proveedorTableClass::CIUDAD_ID ?>

<pre>
<div class="container container-fluid">    
<form class="form-signin" role="form" method="post" action="<?php echo routing::getInstance()->getUrlWeb('proveedor', ((isset($objProveedor)) ? 'update' : 'create')) ?>">
            <?php if (isset($objProveedor) == true): ?>
      <input name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::ID, true) ?>" value="<?php echo $objProveedor[0]->$idProveedor ?>" type="hidden">
                    <?php endif ?>
   <table class="table table-bordered  table-striped table-condensed table-responsive">
       <thead> 
       <tr>
            <th><?php echo i18n::__('businessName') ?>:<input value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$razonSoProv : '') ?>" type="text" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::RAZON_SOCIAL, true) ?>"></th>
            <th><?php echo i18n::__('direction') ?>:<input value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$dirProveedor : '') ?>" type="text" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::DIRECCION, true) ?>"></th>
            <th><?php echo i18n::__('phone') ?>:<input value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$telProveedor : '') ?>" type="text" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::TELEFONO, true) ?>"></th>
            <th><?php echo i18n::__('idCity') ?>:<input value="<?php echo ((isset($objProveedor) == true) ? $objProveedor[0]->$idCiudad : '') ?>" type="text" name="<?php echo proveedorTableClass::getNameField(proveedorTableClass::CIUDAD_ID, true) ?>"></th>
                      
            <th><input type="submit" value="<?php echo i18n::__(((isset($objProveedor)) ? 'update' : 'register')) ?>">  <a href="<?php echo routing::getInstance()->getUrlWeb('ciudad', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back')?></a>
            </th>
        </tr>
        </thead>
        </table>
  </form>
</div>
</pre>