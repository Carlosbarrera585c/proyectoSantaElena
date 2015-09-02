function crearGrafica(cosPoints) {
    // Some simple loops to build up data arrays.
    var plot3 = $.jqplot('chart3', [cosPoints], {
        title: 'Producción de la semana',
        legend: {show: false},
        axes: {
            pad: 2,
            xaxis: {
                tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                renderer: $.jqplot.CategoryAxisRenderer,
                label: 'eje x',
                labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
                tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                        tickOptions: {
                            angle: 30,
                            fontFamily: 'Courier New',
                            fontSize: '9pt'
                        }

            },
            yaxis: {
        pad: 2,
                renderer: $.jqplot.CategoryAxisRenderer,
                label: 'eje y',
                labelRenderer: $.jqplot.CanvasAxisLabelRenderer,
                tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                renderer: $.jqplot.DateAxisRenderer,
                        tickOptions: {
                            angle: 30,
                            fontFamily: 'Courier New',
                            fontSize: '9pt'
                        }
            }

        },
        series: [{lineWidth: 1, markerOptions: {style: 'dimaond'}, shadow: false, }],
    }
    );
}


function CrearGrafica2(cosPoints, sinPoints, powPoints1, powPoints2, powPoints3){
$(document).ready(function(){
  // Some simple loops to build up data arrays.
  var cosPoints = [];
  for (var i=0; i<2*Math.PI; i+=0.7){ 
    cosPoints.push([i, Math.cos(i)]); 
  }
   
  var sinPoints = []; 
  for (var i=0; i<2*Math.PI; i+=0.4){ 
     sinPoints.push([i, 2*Math.sin(i-.8)]); 
  }
   
  var powPoints1 = []; 
  for (var i=0; i<2*Math.PI; i+=0.4) { 
      powPoints1.push([i, 2.5 + Math.pow(i/4, 2)]); 
  }
   
  var powPoints2 = []; 
  for (var i=0; i<2*Math.PI; i+=0.4) { 
      powPoints2.push([i, -2.5 - Math.pow(i/4, 2)]); 
  } 
  var powPoints3 = []; 
  for (var i=0; i<2*Math.PI; i+=0.4) { 
      powPoints3.push([i, 3. - Math.pow(i/4, 2)]); 
  } 

  var plot3 = $.jqplot('chart3', [cosPoints, sinPoints, powPoints1, powPoints2, powPoints3], 
    { 
      title:'Hola Mundo', 
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
          },
          {
            // Use a thicker, 5 pixel line and 10 pixel
            // filled square markers.
            lineWidth:5, 
            markerOptions: { style:"filledCircle", size:10 }
          }
      ]
    }
  );
   
});
}
