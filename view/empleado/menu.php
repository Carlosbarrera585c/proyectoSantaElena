<?php

use mvc\routing\routingClass as routing ?>
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
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('ciudad', 'index') ?>">Ciudad</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoEmpaque', 'index') ?>">Tipo Empaque</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoPago', 'index') ?>">Tipo Pago</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoId', 'index') ?>">Tipo Identificacion</a></li>
                <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('credencial', 'index') ?>">Credenciales</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
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