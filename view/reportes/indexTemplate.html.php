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
                <br>
                <div class="rwd">
                    <table class="tablaUsuario table table-bordered table-responsive table-hover tables">
                        <tr>
                        <thead>
                        <th>
                            <?php echo i18n::__('name') ?>
                        </th>
                        <th>
                            <?php echo i18n::__('description') ?>
                        </th>
                        <th id="acciones">
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
<script>
$(document).ready(function(){
  var texto = ['id','nombre','apellido'];
  var line2=[['2008-08-12 4:00PM',4], ['2008-09-12 4:00PM',6.5], ['2008-10-12 4:00PM',5.7], ['2008-11-12 4:00PM',9], ['2008-12-12 4:00PM',8.2]];
  var line3=[['2008-08-14 4:00PM',5], ['2008-09-12 4:00PM',7], ['2008-10-12 4:00PM',6], ['2008-11-12 4:00PM',10], ['2008-12-12 4:00PM',8.5]];
  var line4=[['2008-08-14 4:00PM',3], ['2008-09-12 4:00PM',2], ['2008-10-12 4:00PM',4], ['2008-11-12 4:00PM',10], ['2008-12-12 4:00PM',3.5]];
  var plot1 = $.jqplot('chart1', [line2,line3,line4], {
    title:'Default Date Axis',
    axes:{
        xaxis:{
            renderer:$.jqplot.DateAxisRenderer
        }
    },
    series:[{lineWidth:4, markerOptions:{style:'square'}}],
    legend:{
        show:true,
        labels: texto
    }
  });
});
</script>
<div id="chart1" style="width:800px;height:300px ;"></div>