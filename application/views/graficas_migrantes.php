<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<html>
<head>
	<script type="text/javascript" src="../assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/highcharts/highcharts.js"></script>
	<title></title>

</head>

<style type="text/css">
/*
	#migrantes #div, .highcharts-container {
		max-width: 50%;
		width: 50%;
		float: left;
	}
*/
</style>

<body>
	<section id="migrantes">	
		<h2> Estadísticas de Migrantes </h2>
  	<div id="pais"></div>
  	<div id="estado"></div>
  	<div id="municipio"></div>
  	<div id="genero"></div>
  	<div id="edad"></div>
  	<div id="ocupacion"></div>
  	<div id="estado_civil"></div>
  	<div id="escolaridad"></div>
  	<div id="nombre_pueblo_indigena"></div>
  	<div id="espanol"></div>
  	<div id="lugar_denuncia"></div>
	</section>

	<section id="migrantes">	
		<h2> Estadísticas de Denuncias </h2>
		<div id="queja"></div>
		<div id="intentos"></div>
		<div id="motivo_migracion"></div>
		<div id="coyote_guia"></div>
		<div id="lugar_de_usa"></div>
		<div id="viaja_solo"></div>
		<div id="deportado"></div>
		<div id="autoridad"></div>
		<div id="pais"></div>
		<div id="estado"></div>
		<div id="espacio_fisico_injusticia"></div>
		<div id="detonante_injusticia"></div>
		<div id="numero_migrantes_injusticia"></div>
		<div id="algun_nombre_responsables"></div>
		<div id="uniformado_responsables"></div>
		<div id="responsables_abordo_vehiculos"></div>
		<div id="derecho_violado"></div>
	</section>
</body>

<script type="text/javascript">
	$(function () {
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
		var createChart = function(key, data, tags){
			$('#' + key).highcharts({
	        title: { text: tags[key] },
	        plotOptions: {
	          pie: { 
	          	allowPointSelect: true, cursor: 'pointer',
	            dataLabels: {
	              enabled: true, format: '<b>{point.name}</b>: {point.percentage:.1f} %',
	              style: { color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black' }
	            }
	          }
	        },
	        series: [{ type: 'pie', name: 'Migrantes', data: data }]
	    });
		}

		var histograma_migrantes = generar_histograma(<?php echo json_encode($migrantes);?>)
		var histograma_denuncias = generar_histograma(<?php echo json_encode($denuncias);?>)

		var tags_migrantes = {
			pais: "Pais de Origen",
			estado: "Estado",
			municipio: "Municipio",
			genero: "Género",
			edad: "Edad",
			ocupacion: "Ocupacion",
			estado_civil: "Estado Civil",
			escolaridad: "Escolaridad",
			nombre_pueblo_indigena: "Pueblo Indígena",
			espanol: "Habla Español",
			lugar_denuncia: "Lugar de Denuncia"
		}

		var tags_denuncias = {
			queja: "Motivos de queja", 
			intentos: "Cantidad de Intentos de cruzar la frontera", 
			motivo_migracion: "Motivos de Migracion", 
			coyote_guia: "Uso Coyote", 
			lugar_de_usa: "Lugar de E.U.A al que se dirigía", 
			viaja_solo: "Viaja Solo", 
			deportado: "Fue deportado", 
			autoridad: "Autoridad que cometio el abuso", 
			pais: "Pais donde se cometio la injusticia", 
			estado: "Estado donde se cometio la injusticia", 
			espacio_fisico_injusticia: "Espacio físico donde se cometio la injusticia", 
			detonante_injusticia: "Detonante de la Injusticia", 
			numero_migrantes_injusticia: "Número de inmigrantes presentes durante la injusticia", 
			algun_nombre_responsables: "Conoce algun nombre de los responsables", 
			uniformado_responsables: "Usaban uniforme los responsables", 
			responsables_abordo_vehiculos: "Estaban a bordo los responsables", 
			derecho_violado: "Derecho violado"
		}

		for(key in tags_migrantes){ createChart(key, histograma_migrantes[key], tags_migrantes) }
		for(key in tags_denuncias){ createChart(key, histograma_denuncias[key], tags_denuncias) }

});

</script>

</html>