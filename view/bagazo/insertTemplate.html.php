<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid">
    <div class="page-header titulo">
        <h1><i class="glyphicon glyphicon-oil"> <?php echo i18n::__('newChaff') ?></i></h1>
    </div>
    <?php view::includePartial('bagazo/formBagazo', array('objControlCalidad' => $objControlCalidad)) ?>
</div>
