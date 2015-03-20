<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
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
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('user') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('default', 'index') ?>"><?php echo i18n::__('user') ?></a></li>   
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('credencial', 'index') ?>"><?php echo i18n::__('credential') ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('payWorkers') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('pagoTrabajadores', 'index') ?>"><?php echo i18n::__('payWorkers') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="#">DETALLE PAGO TRABAJADORES</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('empresa', 'index') ?>"><?php echo i18n::__('business') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('empleado', 'index') ?>"><?php echo i18n::__('employee') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoPago', 'index') ?>"><?php echo i18n::__('paymentType') ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('caneIncome') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">INGRESO CAÑA</a></li>
                        <li class="divider"></li>
                        <li><a href="#">DETALLE INGRESO CAÑA</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('empleado', 'index') ?>"><?php echo i18n::__('employee') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('proveedor', 'index') ?>"><?php echo i18n::__('provider') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('insumo', 'index') ?>"><?php echo i18n::__('input') ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('qualityControl') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('controlCalidad', 'index') ?>"><?php echo i18n::__('qualityControl') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('empleado', 'index') ?>"><?php echo i18n::__('employee') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('proveedor', 'index') ?>"><?php echo i18n::__('provider') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('ciudad', 'index') ?>"><?php echo i18n::__('city') ?></a></li>           
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('inputRequest') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('empleado', 'index') ?>"><?php echo i18n::__('employee') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('proveedor', 'index') ?>"><?php echo i18n::__('provider') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('insumo', 'index') ?>"><?php echo i18n::__('input') ?></a></li>
                    </ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('employee') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('empleado', 'index') ?>"><?php echo i18n::__('employee') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('proveedor', 'index') ?>"><?php echo i18n::__('provider') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoId', 'index') ?>"><?php echo i18n::__('identificationType') ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('packing') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"> <?php echo i18n::__('detailPacking') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoEmpaque', 'index') ?>"><?php echo i18n::__('typePacking') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('insumo', 'index') ?>"><?php echo i18n::__('input') ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('input') ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('insumo', 'index') ?>"><?php echo i18n::__('input') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoInsumo', 'index') ?>"><?php echo i18n::__('inputType') ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo i18n::__('cellarEntrance') ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('entradaBodega', 'index') ?>"><?php echo i18n::__('cellarEntrance') ?></a></li>                        
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('detalleEntrada', 'index') ?>"><?php echo i18n::__('detailEntrance') ?></a></li> 
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('insumo', 'index') ?>"><?php echo i18n::__('input') ?></a></li>   
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('proveedor', 'index') ?>"><?php echo i18n::__('provider') ?></a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo \mvc\routing\routingClass::getInstance()->getUrlWeb('tipoDoc', 'index') ?>"><?php echo i18n::__('docType') ?></a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
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