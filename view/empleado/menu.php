<?php

use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('empleado', 'index') ?>">Santa Helena</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('default', 'index') ?>">Usuarios</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('ciudad', 'index') ?>">Ciudad</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('empleado', 'index') ?>"><?php echo i18n::__('employee') ?></a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoId', 'index') ?>"><?php echo i18n::__('identification') ?></a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('credencial', 'index') ?>"><?php echo i18n::__('credential') ?></a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('empresa', 'index') ?>"><?php echo i18n::__('business') ?></a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('proveedor', 'index') ?>">Proveedores</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('insumo', 'index') ?>">Insumo</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('entradaBodega', 'index') ?>">Entrada Bodega</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoDoc', 'index') ?>">Tipo Documentos</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoInsumo', 'index') ?>">Tipo Insumos</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoPago', 'index') ?>">Tipo Pago</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoEmpaque', 'index') ?>"><?php echo i18n::__('typePacking')?></a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoId', 'index') ?>">Tipo Identificacion</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">MODULOS <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Usuario</a></li>
                         <li class="divider"></li>
                        <li><a href="#">Another action</a></li>
                         <li class="divider"></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><i class="glyphicon glyphicon-log-in"> Login</i></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>"><i class="glyphicon glyphicon-log-out"> Logout</i></a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>