
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php use mvc\view\viewClass as view ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>

 <?php $value = session::getInstance()->getAttribute('idGrafica'); ?>
 
<div class="container container-fluid" id="cuerpo">
  <div class="center-block" id="cuerpo4">
    <div class="center-block" id="cuerpo2"> 
  
  <h2 class="form-signin-heading">
<!--<script>
//  $(document).ready(function () {
//    crearGrafica(<?php echo json_encode($cosPoints) ?>);  
//  });
//  $(document).ready(function () {
//    CrearGrafica2(<?php echo json_encode($cosPoints) ?>);  
//  });
</script>
<div id="chart3" style="width: 600px; height: 400px"></div>-->
      <script>
$(document).ready(function(){
  CrearGrafica2(<?php echo json_encode($cosPoints) ?>);
  var texto = ['%Brix','%Ph','%Ar', '%Sacaroza', '%Pureza'];
  var line2=[['2008-08-12 4:00PM',5], ['2008-09-12 4:00PM',6.5], ['2008-10-12 4:00PM',5.7], ['2008-11-12 4:00PM',9], ['2008-12-12 4:00PM',8.2]];
  var line3=[['2008-08-14 4:00PM',6], ['2008-09-12 4:00PM',7], ['2008-10-12 4:00PM',6], ['2008-11-12 4:00PM',10], ['2008-12-12 4:00PM',8.5]];
  var line4=[['2008-08-14 4:00PM',7], ['2008-09-12 4:00PM',1], ['2008-10-12 4:00PM',4], ['2008-11-12 4:00PM',5], ['2008-12-12 4:00PM',3.5]];
  var line5=[['2008-08-14 4:00PM',8], ['2008-09-12 4:00PM',3], ['2008-10-12 4:00PM',8], ['2008-11-12 4:00PM',8], ['2008-12-12 4:00PM',3]];
  var plot1 = $.jqplot('chart1', [line2,line3,line4,line5], {
    title:'Hola Mundo',
    axes:{
        xaxis:{
            renderer:$.jqplot.DateAxisRenderer
        }
    },
    series:[{lineWidth:6, markerOptions:{style:'square'}}],
    legend:{
        show:true,
        labels: texto
    }
    
  });
});
</script>
<div id="chart1" style="width:1200px;height:500px ;"></div>
</h2>

           
      
      <br>
 <a class="btn btn-lg btn-success btn-xs" href="<?php echo routing::getInstance()->getUrlWeb('reportes', 'report') ?>" ><?php echo i18n::__('printReport') ?></a>
      <br><br><br><br><br><br><br><br><br><br><br><br>
       </div>    
  </div>    
</div>