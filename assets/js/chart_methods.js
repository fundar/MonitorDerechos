var generar_histograma = function (data){
    var histograma = {}
    var tags = {}

    for(var key in data[0]){ 
        histograma[key] = [] 
        tags[key] = [] 
    }

    for(var i in data){
        for(var key in data[i] ){
            var tag = (data[i][key] == null) ? "0" : data[i][key];
            var topico = histograma[key];

            var pos = tags[key].indexOf(tag); 
            if( pos > -1 ) { 
                histograma[key][pos][1]++
            } else {
                histograma[key].push([tag, 1])
                tags[key].push(tag)
            }
        }
    }
    return histograma;
}

var createChart = function(content_tag, data, tags){
  $('#' + content_tag).highcharts({
    title: { text: tags[content_tag], style:{"fontSize": "24px"} },
    plotOptions: {
      pie: { 
        allowPointSelect: true, cursor: 'pointer',
        dataLabels: {
          enabled: true, format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: { color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' }
        }
      }
    },
    series: [{ type: 'pie', name: 'Migrantes', data: data }],
    exporting: { filename: content_tag}
  });
}

var generar_histograma_l2 = function (data, l1, l2){
  var colors = Highcharts.getOptions().colors, h = {}
  h.categories = []
  h.data = []

  for( var i in data ){ 
    var pos_l1 = h.categories.indexOf(data[i][l1]);
    if( pos_l1 > -1 ){
      var pos_l2 = h.data[pos_l1].drilldown.categories.indexOf(data[i][l2])
      if( pos_l2 > -1 ){
          h.data[pos_l1].drilldown.data[pos_l2] += 1 
      }else{
          h.data[pos_l1].drilldown.categories.push(data[i][l2])
          h.data[pos_l1].drilldown.data.push(1)
      }
      h.data[pos_l1].y += 1 
    }else{
      h.categories.push(data[i][l1])
      h.data.push({
        y: 1,
        color: colors[4],
        drilldown: {
          name: data[i][l1],
          categories: [ data[i][l2] ],
          data: [1]
        }
      })                  
    }
  }

  var histograma = {}, drillDataLen, brightness;
  histograma.categories = [], histograma.data = []

  for (i = 0; i < h.data.length; i++) {
      histograma.categories.push({
          name: h.categories[i],
          y: h.data[i].y,
          color: h.data[i].color
      });

      drillDataLen = h.data[i].drilldown.data.length;
      for (j = 0; j < drillDataLen; j += 1) {
          brightness = 0.2 - (j / drillDataLen) / 5;
          histograma.data.push({
              name: h.data[i].drilldown.categories[j],
              y: h.data[i].drilldown.data[j],
              color: Highcharts.Color(h.data[i].color).brighten(brightness).get()
          });
      }
  }

  return histograma
}

var createChart_l2 = function(content_tag, histograma, title, l1_label, l2_label){
  $('#' + content_tag).highcharts({
    chart: { type: 'pie' },
    title: { text: title, style:{"fontSize": "24px"} },
    plotOptions: { pie: { shadow: false, center: ['50%', '50%'] } },
    tooltip: { valueSuffix: '%' },
    series: [{
      name: l1_label,
      data: histograma.categories,
      size: '80%',
      dataLabels: { color: 'black', distance: 90, style:{"fontSize": "18px"}}
    }, {
      name: l2_label,
      data: histograma.data,
      size: '80%',
      innerSize: '60%',
      dataLabels: {
          formatter: function () {
            return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + this.y + '%'  : null;
          },
          distance: 10
      }
    }],
    exporting: { filename: content_tag }

  });
}