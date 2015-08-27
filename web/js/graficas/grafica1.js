function crearGrafica(cosPoints) {
  // Some simple loops to build up data arrays.
  var plot3 = $.jqplot('chart3', [cosPoints], {
    title: 'Producción de la semana',
    legend: {show: false},
    axes: {
         pad: 2,
      xaxis: {
          tickRenderer:$.jqplot.CanvasAxisTickRenderer,
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
//        pad: 2,
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

