<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\config\configClass as config ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\session\sessionClass as session ?>
<nav class="navbar navbar-default nav_bar">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'index') ?>"><?php echo i18n::__('SantaHelena') ?></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('user') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'index') ?>"><?php echo i18n::__('user') ?></a></li>   
                        <li class="divider"></li>
                        <li><a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'index') ?>"><?php echo i18n::__('credential') ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('payWorkers') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo routing::getInstance()->getUrlWeb('pagoTrabajadores', 'index') ?>"><?php echo i18n::__('payWorkers') ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('reedIncome') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo routing::getInstance()->getUrlWeb('ingresoCana', 'index') ?>"><?php echo i18n::__('reedIncome') ?></a></li></a></li>
            </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('qualityControl') ?><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('controlCalidad', 'index') ?>"><?php echo i18n::__('qualityControl') ?></a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('inputRequest') ?><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                </ul>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('employee') ?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'index') ?>"><?php echo i18n::__('employee') ?></a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('proveedor', 'index') ?>"><?php echo i18n::__('provider') ?></a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('tipoId', 'index') ?>"><?php echo i18n::__('identificationType') ?></a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('packing') ?><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('empaque', 'index') ?>"><?php echo i18n::__('packing') ?></a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('tipoEmpaque', 'index') ?>"><?php echo i18n::__('typePacking') ?></a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('input') ?> <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'index') ?>"><?php echo i18n::__('input') ?></a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('tipoInsumo', 'index') ?>"><?php echo i18n::__('inputType') ?></a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('cellarEntrance') ?><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('entradaBodega', 'index') ?>"><?php echo i18n::__('cellarEntrance') ?></a></li>                        
                    <li class="divider"></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('salidaBodega', 'index') ?>"><?php echo i18n::__('holdOut') ?></a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('insumo', 'index') ?>"><?php echo i18n::__('input') ?></a></li>   
                    <li class="divider"></li>
                    <li><a href="<?php echo routing::getInstance()->getUrlWeb('tipoDoc', 'index') ?>"><?php echo i18n::__('docType') ?></a></li>
                </ul>
            </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?php echo session::getInstance()->getUserName() ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <img src="<?php echo routing::getInstance()->getUrlImg('b1fabric026.jpg') ?>" width="34px" height="34px" class="img-circle">
                        <li><a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>"><i class="glyphicon glyphicon-log-out">&nbsp;<?php echo i18n::__('logout') ?></i></a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div style="margin-bottom: 10px; margin-top: 30px">
    <form id="frmTraductor" action="<?php echo routing::getInstance()->getUrlWeb('empleado', 'traductor') ?>" method="POST">
        <input type="hidden" name="PATH_INFO" value="<?php echo request::getInstance()->getServer('PATH_INFO') ?>">
    </form>
</div>
<a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'traductor', array('language' => 'es', 'PATH_INFO' => request::getInstance()->getServer('PATH_INFO'), 'QUERY_STRING' => htmlentities(request::getInstance()->getServer('QUERY_STRING')))) ?>"><img src="<?php echo routing::getInstance()->getUrlImg('Spain.png') ?>"></a>
<a href="<?php echo routing::getInstance()->getUrlWeb('empleado', 'traductor', array('language' => 'en', 'PATH_INFO' => request::getInstance()->getServer('PATH_INFO'), 'QUERY_STRING' => htmlentities(request::getInstance()->getServer('QUERY_STRING')))) ?>"><img src="<?php echo routing::getInstance()->getUrlImg('United States of America.png') ?>"></a>