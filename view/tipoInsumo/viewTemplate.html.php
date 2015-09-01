<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php $id = tipoInsumoTableClass::ID ?>
<?php $desc_tipo_insumo = tipoInsumoTableClass::DESC_TIPO_INSUMO ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
         <div class="page-header  text-center titulo">
       <h1><i class="glyphicon glyphicon-object-align-bottom"> <?php echo i18n::__('infoInput') ?></i></h1>
    </div>
    <form id="frmDeleteAll" action="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'deleteSelect') ?>" method="POST">
        <div style="margin-bottom: 10px; margin-top: 30px">
            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'insert') ?>" class="btn btn-success btn-xs"><?php echo i18n::__('new') ?></a>
            <a href="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'index') ?>" class="btn btn-info btn-xs"><?php echo i18n::__('back') ?></a>
        </div>
        <table class="table table-bordered table-responsive table-condensed tables">
            <thead>
                <tr class="tr_table">
              
                    <th><?php echo i18n::__('desc') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
         
                    <td><?php echo ((isset($objTipoInsumo) == true) ? $objTipoInsumo[0]->$desc_tipo_insumo : '') ?></td>
                </tr>
            </tbody>
        </table>
    </form>
    <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'delete') ?>" method="POST">
        <input type="hidden" id="idDelete" name="<?php echo tipoInsumoTableClass::getNameField(tipoInsumoTableClass::ID, true) ?>">
    </form>
</div>
