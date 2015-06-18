var tags_denuncias = {
    pais_origen: "País de Origen",
    /**/estado_origen: "Estado",
    /**/municipio_origen: "Municipio",
    genero: "Género",
    derechos: "Derechos Violentados en la Denuncia",
    violaciones_derechos: "Violaciones a los Derechos",
    edad: "Edad",
    ocupacion: "Ocupación",
    estado_civil: "Estado Civil",
    escolaridad: "Escolaridad",
    nombre_pueblo_indigena: "Pueblo Indígena",
    espanol: "Habla Español",
    lugar_denuncia: "Lugar de Denuncia",
    queja: "Motivos de queja", 
    intentos: "Cantidad de Intentos de cruzar la frontera", 
    motivo_migracion: "Motivos de Migracion", 
    coyote_guia: "Usó Coyote", 
    //lugar_de_usa: "Lugar de E.U.A al que se dirigía", 
    viaja_solo: "Viaja Solo", 
    deportado: "Fue deportado", 
    autoridad: "Autoridad que cometio la violación a Derechos Humanos", 
    /**/pais_injusticia: "País donde se cometio la violación a Derechos Humanos", 
    estado_injusticia: "Estado donde se cometio la violación a Derechos Humanos", 
    espacio_fisico_injusticia: "Espacio físico donde se cometio la violación a Derechos Humanos", 
    detonante_injusticia: "Situación que detona la violación a Derechos Humanos", 
    numero_migrantes_injusticia: "Número de victimas directas durante la violación a Derechos Humanos", 
    algun_nombre_responsables: "Conoce algún nombre de los responsables", 
    uniformado_responsables: "Usaban uniforme los responsables", 
    responsables_abordo_vehiculos: "Los responsables estaban a bordo de algún vehículo", 
  }

var crear_select = function(topics, target_id){
  var html = ""
  for(var i in topics){
    if(topics[i] != null){
      html += "<option value=" + i + ">" + topics[i] + "</option>"
    }
  }

  $("#" + target_id).append(html)
  //return html 
}

var generar_histograma = function (data){
    var histograma = {}
    var tags = {}

    for(var key in data[0]){ 
        histograma[key] = [] 
        tags[key] = [] 
    }

    //console.log(tags)
    console.log(histograma)

    for(var i in data){
        for(var key in data[i] ){
            var tag = (data[i][key] == null) ? "0" : data[i][key];
            var topico = histograma[key];

            var pos = tags[key].indexOf(tag); 
            if( pos > -1 ) { 
                topico[pos][1]++
            } else {
                topico.push([tag, 1])
                tags[key].push(tag)
            }
        }
    }

    return histograma;
}

var actualizar_histograma = function(histograma){

  var n_topico_edad = [ 
    { name: "0 a 4 años", visible:true, y:0 },
    { name: "5 a 9 años", visible:true, y:0 },
    { name: "10 a 14 años", visible:true, y:0 },
    { name: "15 a 19 años", visible:true, y:0 },
    { name: "20 a 24 años", visible:true, y:0 },
    { name: "25 a 29 años", visible:true, y:0 },
    { name: "30 a 34 años", visible:true, y:0 },
    { name: "35 a 39 años", visible:true, y:0 },
    { name: "40 a 44 años", visible:true, y:0 },
    { name: "45 a 49 años", visible:true, y:0 },
    { name: "50 a 54 años", visible:true, y:0 },
    { name: "55 a 59 años", visible:true, y:0 },
    { name: "60 a 64 años", visible:true, y:0 },
    { name: "65 a 69 años", visible:true, y:0 },
    { name: "70 a 74 años", visible:true, y:0 },
    { name: "75 a 79 años", visible:true, y:0 },
    { name: "80 a 84 años", visible:true, y:0 },
    { name: "85 a 89 años", visible:true, y:0 },
    { name: "90 a 94 años", visible:true, y:0 },
    { name: "95 a 99 años", visible:true, y:0 },
    { name: "100 o más años", visible:true, y:0 }
  ]

  var topico_edad = histograma.edad
  
  /* Crear rangos de edad */
  for(var i in topico_edad){
    var e = parseInt(topico_edad[i][0])
      , index = parseInt(e/5);
      
    if( index > 19) index = 20
    n_topico_edad[index].y += topico_edad[i][1];
  }

  histograma.edad = n_topico_edad

  /* Modificar las etiquetas en el campo habla español */
  //histograma.espanol[0][0] = "Si";
  //histograma.espanol[1][0] = "No";
  
  /* Modificar las etiquetas en el campo coyote */
  //histograma.coyote_guia[0][0] = "Si"; // 1 como tag original
  //histograma.coyote_guia[1][0] = "Dato no disponible"; // 0 como tag original
  //histograma.coyote_guia[2][0] = "No"; // 2 como tag original

  /* Modificar las etiquetas en el campo viaja_solo */
  //histograma.viaja_solo[0][0] = "Si"; // 1 como tag original
  //histograma.viaja_solo[1][0] = "Dato no disponible"; // 0 como tag original
  //histograma.viaja_solo[2][0] = "No"; // 2 como tag original

  /* Modificar las etiquetas en el campo deportado */
  //histograma.deportado[0][0] = "Si"; // 1 como tag original
  //histograma.deportado[1][0] = "Dato no disponible"; // 0 como tag original
  //histograma.deportado[2][0] = "No"; // 2 como tag original

  /* Reducir a dos (SI/NO) categorias la pregunta algun_nombre_responsables */
  var n_topico_algun_nombre_responsables = [ 
    { name: "Si", visible:true, y:0 },
    { name: "No", visible:true, y:0 }
  ]

  var topico_algun_nombre_responsables = histograma.algun_nombre_responsables
  
  for(var i in topico_algun_nombre_responsables){
    var e = topico_algun_nombre_responsables[i][0];
    var c = topico_algun_nombre_responsables[i][1];

    if( e == "Dato no disponible") n_topico_algun_nombre_responsables[1].y += c
    else n_topico_algun_nombre_responsables[0].y += c
  }

  histograma.algun_nombre_responsables = n_topico_algun_nombre_responsables
  return histograma
}

var graficar = function(content_tag, data, text){
  categories = []
  for(var i in data) categories.push(data[i][0])
  $("#grafica").highcharts({
    title: { text: text, style:{"fontSize": "24px"} },
    xAxis: {
      categories: categories
    },
    plotOptions: {
      pie: { 
        allowPointSelect: true, cursor: 'pointer',
        dataLabels: {
          enabled: true, format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: { color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' }
        }
      }
    },
    series: [{ 
      // areaspline line column bar scatter pie polar 
      type: 'pie', 
      name: 'Migrantes', 
      data: data 
    }],
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
      nc = Math.floor( Math.random() * (9 + 1 - 0) + 0 ) // numero aleatorio entre 0 y 9
      h.categories.push(data[i][l1])
      h.data.push({
        y: 1,
        color: colors[nc],
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

var graficar_l2 = function(content_tag, histograma, title, l1_label, l2_label){
  console.log(histograma.categories)
  var categories = []
  for(var i in histograma.categories){
    categories.push(histograma.categories[i].name)
  }
  $('#grafica').highcharts({
    chart: { type: 'pie' },
    title: { text: title, style:{"fontSize": "24px"} },
    /*xAxis: {
      categories: categories
    },*/
    plotOptions: { 
      pie: { 
        shadow: false, 
        allowPointSelect: true, cursor: 'pointer',
        center: ['50%', '50%'],
        dataLabels: {
          /*enabled: true, format: '<b>{point.name}</b>: {point.percentage:.1f} %',*/
          style: { color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' }
        }
      } 
    },
    tooltip: { valueSuffix: '%' },
    series: [{
      name: l1_label,
      data: histograma.categories,
      size: '80%',
      dataLabels: { 
        distance: 90, 
        style: { 
          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' ,
          fontSize: "18px"
        }
      }

    }, {
      name: l2_label,
      data: histograma.data,
      size: '80%',
      innerSize: '60%',
      dataLabels: {
          formatter: function () {
            //return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + this.y + '%'  : null;
            return this.y > 1 ? '<b>Migrantes:</b> ' + this.y : null;
          },
          distance: 10,
          style: { 
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' ,
          }
      }
    }],
    exporting: { filename: content_tag }

  });
}

var graficar_por_subtema = function(denuncias, tema, subtema, tema2){
  var topic_data = [], tags = [];
  for(var i in denuncias){
    if(denuncias[i][tema] == subtema){
      var pos = tags.indexOf(denuncias[i][tema2]); 
      if( pos > -1 ) { 
                topic_data[pos][1]++
            } else {
                topic_data.push( [denuncias[i][tema2], 1] )
        tags.push(denuncias[i][tema2])
            }
    }
  }

  var title = "<b>" + tags_denuncias[tema2] + "</b> <br>" +
              tags_denuncias[tema] + ": " 
              //+ subtema.split(" - ").join(", ")
    , filename = subtema + "_x_" + tags_denuncias[tema2] 

  graficar(filename, topic_data, title)
}