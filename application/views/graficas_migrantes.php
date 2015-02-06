<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<html>
<head>
	<script type="text/javascript" src="../assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/highcharts/highcharts.js"></script>
	<script type="text/javascript" src="../assets/js/highcharts/modules/exporting.js"></script>

	<script type="text/javascript" src="../assets/js/chart_methods.js"></script>
	<title></title>

</head>

<style type='text/css'>
	body
	{
		font-family: Arial;
		font-size: 14px;
	}
	a {
	    color: blue;
	    text-decoration: none;
	    font-size: 14px;
	}
	a:hover
	{
		text-decoration: underline;
	}
	strong { font-size:16px; }
	.link { cursor:pointer; color:blue; font-size:14px; }
	#catalogos { display:none; padding:0;}

	section div.grafica{
		max-width: 600px;
		width: 600px;
		border: 6px solid #ddd;
		float: left;
		margin:6px;
	}

	section{
		margin:6px;
	}

	#cabecera, #personalizar{ 
		display:block;
		width: 100%;
		height: 60px;
		margin:20px;
	}
	
	#periodo{ float:left;}
	#graficar{ 
		float:right;
		margin-right: 30px;
	}

	#cabecera h1{float:left;}
	#cabecera #imprimir{
		float:right;
		margin-right: 30px;
		margin-top: 10px;
	}
	
	.printable { display: none; }

	#periodo_tit{ 
		float:right;
		margin-right: 30px;
		margin-bottom: -8px;
	}

	@media print { 
		.non-printable { display: none; }
		.printable { display: block; }
   }

</style>

<body>
	<!--div>
		<a onclick="javascript: return confirmacion('<?php echo site_url('admin/migrantes')?>')" href="javascript:void(0)">
			<?php if($this->uri->segment(2) == "migrantes") { ?><strong>Migrantes</strong><?php } else { ?>Migrantes<?php } ?>
		</a> |
		<a onclick="javascript: return confirmacion('<?php echo site_url('admin/denuncias')?>')" href="javascript:void(0)">
			<?php if($this->uri->segment(2) == "denuncias") { ?><strong>Denuncias</strong><?php } else { ?>Denuncias<?php } ?>
		</a> |

		<a onclick="javascript: return confirmacion('<?php echo site_url('admin/graficas_migrantes')?>')" href="javascript:void(0)">
			<?php if($this->uri->segment(2) == "graficas_migrantes") { ?><strong>Gráficas</strong><?php } else { ?>Gráficas<?php } ?>
		</a> |
		
		<?php if(isset($_SESSION['user_id'])) { ?>
			<a onclick="javascript: return confirmacion('<?php echo site_url('admin/logout')?>')" href="javascript:void(0)">Cerrar sesión</a> | 
		<?php } ?>
		
		<span class="link" id="ver-catalogos">Mostrar/Ocultar Catalogos</span>
		
		<span id="catalogos" class="hide">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a onclick="javascript: return confirmacion('<?php echo site_url('admin/estados')?>')" href="javascript:void(0)">
				<?php if($this->uri->segment(2) == "estados") { ?><strong>Estados/Departamentos</strong><?php } else { ?>Estados/Departamentos<?php } ?>
			</a> |
			<a onclick="javascript: return confirmacion('<?php echo site_url('admin/autoridades')?>')" href="javascript:void(0)">
				<?php if($this->uri->segment(2) == "autoridades") { ?><strong>Autoridades</strong><?php } else { ?>Autoridades<?php } ?>
			</a> |
			<a onclick="javascript: return confirmacion('<?php echo site_url('admin/paises')?>')" href="javascript:void(0)">
				<?php if($this->uri->segment(2) == "paises") { ?><strong>Paises</strong><?php } else { ?>Paises<?php } ?>
			</a> |
			<a onclick="javascript: return confirmacion('<?php echo site_url('admin/estados_casos')?>')" href="javascript:void(0)">
				<?php if($this->uri->segment(2) == "estados_casos") { ?><strong>Estado de los casos</strong><?php } else { ?>Estado de los casos<?php } ?>
			</a> |
			<a onclick="javascript: return confirmacion('<?php echo site_url('admin/transportes')?>')" href="javascript:void(0)">
				<?php if($this->uri->segment(2) == "transportes") { ?><strong>Transportes</strong><?php } else { ?>Transportes<?php } ?>
			</a>
		</span>
	</div-->

	<div id="cabecera">
		<h4 class="printable" id="periodo_tit"> De <?php echo $start;?> a <?php echo $end;?> </h4>
		<h1> Estadísticas de Denuncias por Violaciones a los Derechos Humanos en Migrantes</h1>
		<input id="imprimir" class="non-printable" type="button" onclick="window.print()" value="Imprimir todo como PDF">
	</div>

	<div id="personalizar" class="non-printable">
		<form id="periodo" class="non-printable"> 
			<h4>Definir Periodo</h4>
			Inicio del Periodo: <input type="date" name="start" id="start" value="<?php echo $start;?>">
			Fin del Periodo: <input type="date" name="end" id="end" value="<?php echo $end;?>">
			
			<input type="submit" value="Rango de Fechas">
		</form>

		<form id="graficar" class="non-printable">
			<h4> Añadir gráfica personalizada </h4>
			<select id="l1">
				<option value="pais_origen" > Pais de Origen </option>
				<option value="estado_origen"> Estado </option>
				<option value="municipio_origen"> Municipio </option>
				<option value="genero"> Género </option>
				<option value="edad"> Edad </option>
				<option value="ocupacion"> Ocupacion </option>
				<option value="estado_civil"> Estado Civil </option>
				<option value="escolaridad"> Escolaridad </option>
				<option value="nombre_pueblo_indigena"> Pueblo Indígena </option>
				<option value="espanol"> Habla Español </option>
				<option value="lugar_denuncia"> Lugar de Denuncia </option>
				<option value="queja"> Motivos de queja" </option>
				<option value="intentos"> Cantidad de Intentos de cruzar la frontera </option>
				<option value="motivo_migracion"> Motivos de Migracion </option>
				<option value="coyote_guia"> Uso Coyote </option>
				<option value="lugar_de_usa"> Lugar de E.U.A al que se dirigía </option>
				<option value="viaja_solo"> Viaja Solo </option>
				<option value="deportado"> Fue deportado </option>
				<option value="autoridad"> Autoridad que cometio el abuso </option>
				<option value="estado_injusticia"> Estado donde se cometio la injusticia </option>
				<option value="espacio_fisico_injusticia"> Espacio físico donde se cometio la injusticia </option>
				<option value="detonante_injusticia"> Detonante de la Injusticia </option>
				<option value="numero_migrantes_injusticia"> Número de inmigrantes presentes durante la injusticia </option>
				<option value="algun_nombre_responsables"> Conoce algun nombre de los responsables </option>
				<option value="uniformado_responsables"> Usaban uniforme los responsables </option>
				<option value="responsables_abordo_vehiculos"> Los responsables estaban a bordo de algún vehículo </option>
				<option value="derecho_violado"> Derecho violado </option>
			</select>

			<select id="l2">
				<option value="pais_origen" > Pais de Origen </option>
				<option value="estado_origen"> Estado </option>
				<option value="municipio_origen"> Municipio </option>
				<option value="genero"> Género </option>
				<option value="edad"> Edad </option>
				<option value="ocupacion"> Ocupacion </option>
				<option value="estado_civil"> Estado Civil </option>
				<option value="escolaridad"> Escolaridad </option>
				<option value="nombre_pueblo_indigena"> Pueblo Indígena </option>
				<option value="espanol"> Habla Español </option>
				<option value="lugar_denuncia"> Lugar de Denuncia </option>
				<option value="queja"> Motivos de queja" </option>
				<option value="intentos"> Cantidad de Intentos de cruzar la frontera </option>
				<option value="motivo_migracion"> Motivos de Migracion </option>
				<option value="coyote_guia"> Uso Coyote </option>
				<option value="lugar_de_usa"> Lugar de E.U.A al que se dirigía </option>
				<option value="viaja_solo"> Viaja Solo </option>
				<option value="deportado"> Fue deportado </option>
				<option value="autoridad"> Autoridad que cometio el abuso </option>
				<option value="estado_injusticia"> Estado donde se cometio la injusticia </option>
				<option value="espacio_fisico_injusticia"> Espacio físico donde se cometio la injusticia </option>
				<option value="detonante_injusticia"> Detonante de la Injusticia </option>
				<option value="numero_migrantes_injusticia"> Número de inmigrantes presentes durante la injusticia </option>
				<option value="algun_nombre_responsables"> Conoce algun nombre de los responsables </option>
				<option value="uniformado_responsables"> Usaban uniforme los responsables </option>
				<option value="responsables_abordo_vehiculos"> Los responsables estaban a bordo de algún vehículo </option>
				<option value="derecho_violado"> Derecho violado </option>
			</select>

			<input type="submit" value="Graficar">
		</form>
		
	</div>

	<section id="mis_graficas">
		
	</section>


	<section id="migrantes">	
		<div class="grafica" id="motivos_x_pais"></div>
		<div class="grafica" id="intentos_x_pais"></div>
  	<div class="grafica" id="pais_origen"></div>
  	<!--div class="grafica" id="estado_origen"></div-->
  	<!--div class="grafica" id="municipio_origen"></div-->
  	<div class="grafica" id="genero"></div>
  	<div class="grafica" id="edad"></div>
  	<div class="grafica" id="ocupacion"></div>
  	<div class="grafica" id="estado_civil"></div>
  	<div class="grafica" id="escolaridad"></div>
  	<div class="grafica" id="nombre_pueblo_indigena"></div>
  	<!--div id="espanol"></div-->
  	<div class="grafica" id="lugar_denuncia"></div>
	</section>

	<section id="migrantes">	
		<div class="grafica" id="queja"></div>
		<div class="grafica" id="intentos"></div>
		<div class="grafica" id="motivo_migracion"></div>
		<div class="grafica" id="coyote_guia"></div>
		<div class="grafica" id="lugar_de_usa"></div>
		<div class="grafica" id="viaja_solo"></div>
		<div class="grafica" id="deportado"></div>
		<div class="grafica" id="autoridad"></div>
		<!--div id="pais_injusticia"></div-->
		<div class="grafica" id="estado_injusticia"></div>
		<div class="grafica" id="espacio_fisico_injusticia"></div>
		<div class="grafica" id="detonante_injusticia"></div>
		<div class="grafica" id="numero_migrantes_injusticia"></div>
		<div class="grafica" id="algun_nombre_responsables"></div>
		<div class="grafica" id="uniformado_responsables"></div>
		<div class="grafica" id="responsables_abordo_vehiculos"></div>
		<div class="grafica" id="derecho_violado"></div>
	</section>
</body>

<script type="text/javascript">
	$(function () {
		
		var denuncias = <?php echo json_encode($denuncias);?>;

		var histograma_denuncias = generar_histograma(denuncias)

		var h_motivos_x_pais = generar_histograma_l2(denuncias, "pais_origen", "motivo_migracion")
		var h_intentos_x_pais = generar_histograma_l2(denuncias, "pais_origen", "intentos")

		createChart_l2("motivos_x_pais", h_motivos_x_pais, 'Motivos de Migración por País', 'Países', 'Motivo')
		createChart_l2("intentos_x_pais", h_intentos_x_pais, 'Número de Intentos de Migración por País', 'Países', 'No. de Intentos')


		var tags_denuncias = {
			pais_origen: "País de Origen",
			//estado_origen: "Estado",
			//municipio_origen: "Municipio",
			genero: "Género",
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
			lugar_de_usa: "Lugar de E.U.A al que se dirigía", 
			viaja_solo: "Viaja Solo", 
			deportado: "Fue deportado", 
			autoridad: "Autoridad que cometio la violación a Derechos Humanos", 
			//pais_injusticia: "País donde se cometio la violación a Derechos Humanos", 
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
			{ name: "0 - 5", visible:true, y:0 },
			{ name: "6 - 10", visible:true, y:0 },
			{ name: "11 - 15", visible:true, y:0 },
			{ name: "16 - 20", visible:true, y:0 },
			{ name: "21 - 25", visible:true, y:0 },
			{ name: "26 - 30", visible:true, y:0 },
			{ name: "31 - 35", visible:true, y:0 },
			{ name: "36 - 40", visible:true, y:0 },
			{ name: "41 - 45", visible:true, y:0 },
			{ name: "46 - 50", visible:true, y:0 },
			{ name: "51 - 55", visible:true, y:0 },
			{ name: "56 - 60", visible:true, y:0 },
			{ name: "61 - 65", visible:true, y:0 },
			{ name: "66 - 70", visible:true, y:0 },
			{ name: "71 - 75", visible:true, y:0 },
			{ name: "76 - 80", visible:true, y:0 },
			{ name: "81 - 85", visible:true, y:0 },
			{ name: "86 - 90", visible:true, y:0 },
			{ name: "91 - 95", visible:true, y:0 },
			{ name: "96 - 100", visible:true, y:0 }
		]


		var topico_edad = histograma_denuncias.edad
		
		/* Crear rangos de edad */
		for(var i in topico_edad){
			var e = parseInt(topico_edad[i][0]);
			var c = topico_edad[i][1];

			for(){}
			if( e > 0 && e < 14) n_topico_edad[0].y += c
			else if ( e > 15 && e < 28) n_topico_edad[1].y += c
			else if ( e > 29 && e < 43) n_topico_edad[2].y += c
			else if ( e > 44 && e < 58) n_topico_edad[2].y += c
			else if ( e > 59) n_topico_edad[3].y += c
		}

		histograma_denuncias.edad = n_topico_edad

		/* Modificar las etiquetas en el campo habla español */
		histograma_denuncias.espanol[0][0] = "Si";
		histograma_denuncias.espanol[1][0] = "No";
		
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

		for(key in tags_denuncias){ createChart(key, histograma_denuncias[key], tags_denuncias) }

		$("#graficar").on("submit", function(){
			var l1 = $("#l1").val();
			var l2 = $("#l2").val();

			var nombre = $("#nombre").val();
			var tag = l1 + "_x_" + l2;

			$("#mis_graficas").prepend('<div class="grafica" id="' + tag + '"></div>')
			var histograma_mxd = generar_histograma_l2(denuncias, l1, l2)
			var nombre = tags_denuncias[l1] + " por " + tags_denuncias[l2];
			
			createChart_l2(tag, histograma_mxd, nombre, tags_denuncias[l1], tags_denuncias[l1])
			return false;
		})

		$("#periodo").on("submit", function(){
			var start = $("#start").val().split("-");
			var end = $("#end").val().split("-");
			$.ajax({
				type:"GET",
			  url: "http://ddhh.fundarlabs.org.mx/admin/graficas_migrantes",
			  data:{
			  	"start": [start[2], start[1], start[0]].join("-"), 
			  	"end": [end[2], end[1], end[0]].join("-")
			  },
			  async: false
			}).done(function() {});

		})

});

</script>

</html>