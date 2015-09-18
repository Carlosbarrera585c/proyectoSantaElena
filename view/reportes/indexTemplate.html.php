<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php $nombre = reporteTableClass::NOMBRE ?>
<?php $descripcion = reporteTableClass::DESCRIPCION ?>
<?php $id = reporteTableClass::ID ?>
<?php view::includePartial('menu/menu') ?>
<div class="container container-fluid" id="cuerpo">
    <div class="center-block" id="cuerpo4">
        <div class="center-block" id="cuerpo2">
            <article id='derecha'>
                <div class="page-header titulo">
                    <h1><i class="glyphicon glyphicon-tasks"> <?php echo i18n::__('printReport') ?></i></h1>
                </div>
                <?php view::includeHandlerMessage() ?>
                 <?php view::getMessageError('errorDatos') ?> 
                <br>
                <div class="rwd">
                    <table class="tablaUsuario table table-bordered table-responsive table-hover tables">
                        <tr class="columna tr_table">
                        <thead>
                        <th class="columna tr_table">
                            <?php echo i18n::__('name') ?>
                        </th>
                        <th class="columna tr_table">
                            <?php echo i18n::__('description') ?>
                        </th>
                        <th class="columna tr_table acciones">
                            <?php echo i18n::__('actions') ?>
                        </th>
                        </thead>
                        <tbody>
                            <?php foreach ($objReportes as $key): ?>
                              <tr>
                                  <td>
                                      <?php echo $key->$nombre ?>
                                  </td>
                                  <td>
                                      <?php echo $key->$descripcion ?>
                                  </td>
                                  <td>
                                      <a class="btn btn-warning btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('reportes', 'insert', array(reporteTableClass::ID => $key->$id)) ?>" ><?php echo i18n::__('view') ?></a> 
                                  </td>
                              </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>  
            </article>
        </div>
        <br><br><br><br><br><br><br><br>
    </div>
</div>