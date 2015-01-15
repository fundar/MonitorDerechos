<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<html>
<head>
	<script type="text/javascript" src="../assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/highcharts/highcharts.js"></script>
	<title></title>

</head>

<style type="text/css">
	#migrantes #div, .highcharts-container {
		max-width: 30%;
		width: 30%;
		float: left;
	}

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

		var migrantes = <?php echo json_encode($migrantes);?>;
		var histograma = generar_histograma(migrantes)

		var tags = {
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

		for(key in tags){
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
	        series: [{ type: 'pie', name: 'Migrantes', data: histograma[key] }]
	    });
			
		}

});

</script>

</html>