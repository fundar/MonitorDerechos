<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<html ng-app="graficasMigracion">
<head>
	<link rel="stylesheet" type="text/css" href="../assets/css/angular-chart.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.28/angular.min.js"></script>
	<script type="text/javascript" src="../assets/js/Chart.min.js"></script>
	<script type="text/javascript" src="../assets/js/angular-chart.js"></script>
	<script type="text/javascript" src="../assets/js/migrantes.js"></script>
	<title></title>

	<style type="text/css">
		html, body{
			width: 100%;
			padding: 10 auto;
		}

		section{
			padding: 0, auto;
			min-width: 75%;
			width: 75%;
		}

		h3{
			margin: 0, auto;
			text-align: center;
		}

		articles{
			border: 3px solid rgba(200, 200, 200, 0.7);
			float:left;
			width: 30%;
			margin:5px;
			padding: 10px;
		}
	</style>
	
</head>
<body>
  <div ng-controller="Migrantes">
  	<section>
  		<h2> Estadísticas de Migrantes </h2>
	  	<articles>	
	  		<h3> País de Procedencia </h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_pais" labels="labels_pais"></canvas> 
	  	</articles>

	  	<articles>	
	  		<h3> Estado </h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_estado" labels="labels_estado"></canvas> 
	  	</articles>

	  	<articles>	
	  		<h3> Municipio </h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_municipio" labels="labels_municipio"></canvas> 
	  	</articles>

	  	<articles>	
	  		<h3> Género </h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_genero" labels="labels_genero"></canvas> 
	  	</articles>

	  	<articles>	
	  		<h3> Edad </h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_edad" labels="labels_edad"></canvas> 
	  	</articles>

	  	<articles>	
	  		<h3> Ocupación </h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_ocupacion" labels="labels_ocupacion"></canvas> 
	  	</articles>

	  	<articles>	
	  		<h3> Estado Civil </h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_estado_civil" labels="labels_estado_civil"></canvas> 
	  	</articles>

	  	<articles>	
	  		<h3> Escolaridad </h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_escolaridad" labels="labels_escolaridad"></canvas> 
	  	</articles>

	  	<articles>	
	  		<h3> Pueblo Indígena </h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_nombre_pueblo_indigena" labels="labels_nombre_pueblo_indigena"></canvas> 
	  	</articles>

	  	<articles>	
	  		<h3> Habla Español </h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_espanol" labels="labels_espanol"></canvas> 
	  	</articles>

	  	<articles>	
	  		<h3> Lugar de la denuncia</h3>
	  		<canvas id="pie" class="chart chart-pie" data="data_lugar_denuncia" labels="labels_lugar_denuncia"></canvas> 
	  	</articles>
  	</section>

  </div>
</body>
<script type="text/javascript">

	var crear_mas_colores = function(){
		var cantidad = Chart.defaults.global.colours.length - 1;
		for(i=0; i<=30; i++){
			for(j=0; j<=cantidad; j++){
				Chart.defaults.global.colours.push(Chart.defaults.global.colours[j])
			}
		}
	}

	var generar_histograma = function (data){
		var histograma = {}
		for(var key in data[0] ){
			histograma[key] = {'labels': [], 'data': []}
		}

		for(var i in data){
			for(var key in data[i] ){
				var topico = histograma[key];
				var value = (data[i][key] == null) ? "0" : data[i][key];
				
				var pos = topico.labels.indexOf(value);

				if( pos > -1){
					topico["data"][pos] += 1 
				}else{
					topico["labels"].push(value)
					topico["data"].push(0)
				}
			}
		}
		return histograma;
	}

	var migrantes = <?php echo json_encode($query);?>;
	var histograma = generar_histograma(migrantes)
	console.log(histograma)
	crear_mas_colores()

	console.log(Chart.defaults.global.colours.length)
	var App = angular.module('graficasMigracion', ['chart.js']);

	App.controller("Migrantes", function ($scope) {
	  $scope.labels_pais = histograma.pais.labels
	  $scope.data_pais = histograma.pais.data 
	
	  $scope.labels_estado = histograma.estado.labels
	  $scope.data_estado = histograma.estado.data

	  $scope.labels_municipio = histograma.municipio.labels
	  $scope.data_municipio = histograma.municipio.data

	  $scope.labels_genero = histograma.genero.labels
	  $scope.data_genero = histograma.genero.data 

	  $scope.labels_edad = histograma.edad.labels
	  $scope.data_edad = histograma.edad.data 

	  $scope.labels_ocupacion = histograma.ocupacion.labels
	  $scope.data_ocupacion = histograma.ocupacion.data 

	  $scope.labels_estado_civil = histograma.estado_civil.labels
	  $scope.data_estado_civil = histograma.estado_civil.data 

	  $scope.labels_escolaridad = histograma.escolaridad.labels
	  $scope.data_escolaridad = histograma.escolaridad.data 

	  $scope.labels_nombre_pueblo_indigena = histograma.nombre_pueblo_indigena.labels
	  $scope.data_nombre_pueblo_indigena = histograma.nombre_pueblo_indigena.data 

	  $scope.labels_espanol = histograma.espanol.labels
	  $scope.data_espanol = histograma.espanol.data 

	  $scope.labels_lugar_denuncia = histograma.lugar_denuncia.labels
	  $scope.data_lugar_denuncia = histograma.lugar_denuncia.data 
	});
</script>

</html>