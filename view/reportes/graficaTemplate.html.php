<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<?php
use mvc\request\requestClass as request ?>
<?php view::includePartial('menu/menu') ?>
<a href="<?php echo routing::getInstance()->getUrlWeb('reportes', 'insert') ?>" class="btn btn-info btn-xs col-lg-offset-1"><?php echo i18n::__('back') ?></a>
<form action="<?php echo routing::getInstance()->getUrlWeb('reportes', 'report') ?>" method="post" id="formImgData">
    <input type="hidden" id="imgData" name="imgData">
</form>
<a href="javascript:gestionar()" class="btn btn-xs btn-success col-lg-offset-O"><?php echo i18n::__('printReport') ?></a>
<script>
  function gestionar() {
      var imgData2 = $('#chart2b').jqplotToImageStr({});
      $('#imgData').val(imgData2);
      $('#formImgData').submit();
  }
</script>
<br>
<br>
<div class="container container-fluid" id="cuerpo">
    <div class="center-block" id="cuerpo4">
        <div class="center-block" id="cuerpo2">
            <div id="chart2b"></div>
            <div id="info2c"></div>
            <script>
              $(document).ready(function () {
                  var texto = ['Brix', 'Ph', 'Ar', 'Sacaroza', 'Pureza'];
                  plot2b = $.jqplot('chart2b', <?php echo json_encode($datos) ?> /*[
                   
                   [[1,2, { proveedor: 'castilla', fecha: '02/10/2015' } ], [2,4], [3,6], [4,3]],
                   [[1,5], [2,1], [3,3], [4,4]],
                   [[1,4], [2 ,7], [3,1], [4,2]]
                   ]*/, {
                      seriesDefaults: {
                          renderer: $.jqplot.BarRenderer,
                          pointLabels: {show: true, location: 'e', edgeTolerance: -15},
                          shadowAngle: 135,
                          rendererOptions: {
                              barDirection: 'vertical'
                          },
                          pointLabels: {show: false}
                      },
                      axes: {
                          xaxis: {
                              renderer: $.jqplot.DateAxisRenderer,
                              min: '<?php echo json_encode($fechaInicial) ?>',
                              max: '<?php echo json_encode($fechaFin) ?>',
                              tickInterval: "0.5 days",
                              tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                              tickOptions: {
                                  angle: -60
                              }
                          },
                          yaxis: {
                              max: 60
                          }
                      },
                      legend: {show: true, labels: texto, location: 'nw'}

                  });
                  $('#chart2b').bind('jqplotDataClick',
                          function (ev, seriesIndex, pointIndex, data) {
                              $('#info2c').append('___________________' + '<div>Control de calidad: ' + data[2].control + '<br>' + 'Proveedor: ' + data[2].proveedor + '<br>' + 'Porcentaje: ' + data[2].porcentaje + '<br>' + 'Fecha: ' + data[2].fecha + '</div>');
                          }
                  );
              });
            </script>
            <br>
            <div><button id="borrar" class="btn btn-xs btn-primary" onclick="$('#info2c').html('')">Limpiar registros.</button></div>
        </div>    
    </div>    
</div>
