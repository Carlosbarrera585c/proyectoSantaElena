<?php

use mvc\routing\routingClass as routing ?>
<?php use mvc\view\viewClass as view ?>
<div class="container container-fluid">
    <form class="form-signin">
        <div class="alert alert-danger">
            <h3 class="form-signin-heading">Usted No Tiene Permisos Para Entrar Aquí.</h3>
            <a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>" class="alert-link">Presione aqui Para Volver.</a>

        </div>
    </form>
</div>