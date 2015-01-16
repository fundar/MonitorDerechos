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
  	<div id="pais_origen"></div>
  	<div id="estado_origen"></div>
  	<div id="municipio_origen"></div>
  	<div id="genero"></div>
  	<div id="edad"></div>
  	<div id="ocupacion"></div>
  	<div id="estado_civil"></div>
  	<div id="escolaridad"></div>
  	<div id="nombre_pueblo_indigena"></div>
  	<!--div id="espanol"></div-->
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
		<!--div id="pais_injusticia"></div-->
		<div id="estado_injusticia"></div>
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
			pais_origen: "Pais de Origen",
			estado_origen: "Estado",
			municipio_origen: "Municipio",
			genero: "Género",
			edad: "Edad",
			ocupacion: "Ocupación",
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
			autoridad: "Autoridad que cometio la violación a Derechos Humanos", 
			pais_injusticia: "País donde se cometio la violación a Derechos Humanos", 
			estado_injusticia: "Estado donde se cometio la violación a Derechos Humanos", 
			espacio_fisico_injusticia: "Espacio físico donde se cometio la violación a Derechos Humanos", 
			detonante_injusticia: "Situación que detona la violación a Derechos Humanos", 
			numero_migrantes_injusticia: "Número de victimas directas durante la violación a Derechos Humanos", 
			algun_nombre_responsables: "Conoce algún nombre de los responsables", 
			uniformado_responsables: "Usaban uniforme los responsables", 
			responsables_abordo_vehiculos: "Los responsables estaban a bordo de algún vehículo", 
			derecho_violado: "Derecho violado"
		}

		var n_topico_edad = [ 
			{ name: "0 - 14 años", visible:true, y:0 },
			{ name: "15 - 28 años", visible:true, y:0 },
			{ name: "29 - 43 años", visible:true, y:0 },
			{ name: "44 - 58 años", visible:true, y:0 },
			{ name: "59 años en adelante", visible:true, y:0 }
		]

		var topico_edad = histograma_migrantes.edad
		
		/* Crear rangos de edad */
		for(var i in topico_edad){
			var e = parseInt(topico_edad[i][0]);
			var c = topico_edad[i][1];
			if( e > 0 && e < 14) n_topico_edad[0].y += c
			else if ( e > 15 && e < 28) n_topico_edad[1].y += c
			else if ( e > 29 && e < 43) n_topico_edad[2].y += c
			else if ( e > 44 && e < 58) n_topico_edad[2].y += c
			else if ( e > 59) n_topico_edad[3].y += c
		}

		histograma_migrantes.edad = n_topico_edad

		/* Modificar las etiquetas en el campo habla español */
		histograma_migrantes.espanol[0][0] = "Si";
		histograma_migrantes.espanol[1][0] = "No";
		
		/* Modificar las etiquetas en el campo coyote */
		histograma_denuncias.coyote_guia[0][0] = "Si"; // 1 como tag original
		histograma_denuncias.coyote_guia[1][0] = "NO SABE"; // 0 como tag original
		histograma_denuncias.coyote_guia[2][0] = "No"; // 2 como tag original

		/* Modificar las etiquetas en el campo viaja_solo */
		histograma_denuncias.viaja_solo[0][0] = "Si"; // 1 como tag original
		histograma_denuncias.viaja_solo[1][0] = "NO SABE"; // 0 como tag original
		histograma_denuncias.viaja_solo[2][0] = "No"; // 2 como tag original

		/* Modificar las etiquetas en el campo deportado */
		histograma_denuncias.deportado[0][0] = "Si"; // 1 como tag original
		histograma_denuncias.deportado[1][0] = "NO SABE"; // 0 como tag original
		histograma_denuncias.deportado[2][0] = "No"; // 2 como tag original

		/* Reducir a dos (SI/NO) categorias la pregunta algun_nombre_responsables */
		var n_topico_algun_nombre_responsables = [ 
			{ name: "Si", visible:true, y:0 },
			{ name: "No", visible:true, y:0 }
		]

		var topico_algun_nombre_responsables = histograma_denuncias.algun_nombre_responsables
		
		for(var i in topico_algun_nombre_responsables){
			var e = topico_algun_nombre_responsables[i][0];
			var c = topico_algun_nombre_responsables[i][1];

			if( e == "NO SABE") n_topico_algun_nombre_responsables[1].y += c
			else n_topico_algun_nombre_responsables[0].y += c
		}

		histograma_denuncias.algun_nombre_responsables = n_topico_algun_nombre_responsables

		for(key in tags_migrantes){ createChart(key, histograma_migrantes[key], tags_migrantes) }
		for(key in tags_denuncias){ createChart(key, histograma_denuncias[key], tags_denuncias) }

});

</script>

</html>