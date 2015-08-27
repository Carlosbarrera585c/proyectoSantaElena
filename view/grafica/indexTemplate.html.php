<script class="code" type="text/javascript">
$(document).ready(function(){
  // Some simple loops to build up data arrays.
  var cosPoints = [];
  for (var i=0; i<2*Math.PI; i+=1){ 
    cosPoints.push([i, Math.cos(i)]); 
  }
   
  var sinPoints = []; 
  for (var i=0; i<2*Math.PI; i+=0.4){ 
     sinPoints.push([i, 2*Math.sin(i-.8)]); 
  }
   
  var powPoints1 = []; 
  for (var i=0; i<2*Math.PI; i+=1) { 
      powPoints1.push([i, 2.5 + Math.pow(i/4, 2)]); 
  }
   
  var powPoints2 = []; 
  for (var i=0; i<2*Math.PI; i+=1) { 
      powPoints2.push([i, -2.5 - Math.pow(i/4, 2)]); 
  } 

  var plot3 = $.jqplot('chart3', [[1,2,3,4,5,8], [3,6,8,4,3,6,8]], 
    { 
        title:'Reporte en Control de calidad', 
      // Set default options on all series, turn on smoothing.
      seriesDefaults: {
          rendererOptions: {
              smooth: true
          }
      },
      // Series options are specified as an array of objects, one object
      // for each series.
      series:[ 
          {
            // Change our line width and use a diamond shaped marker.
            lineWidth:2, 
            markerOptions: { style:'dimaond' }
          }, 
          {
            // Don't show a line, just show markers.
            // Make the markers 7 pixels with an 'x' style
            showLine:false, 
            markerOptions: { size: 7, style:"x" }
          },
          { 
            // Use (open) circlular markers.
            markerOptions: { style:"circle" }
          }, 
          {
            // Use a thicker, 5 pixel line and 10 pixel
            // filled square markers.
            lineWidth:5, 
            markerOptions: { style:"filledSquare", size:10 }
          }
      ]
    }
  );
   
});
</script>
<div id="chart3" style="height:300px; width:500px;"></div>