<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<html>
<head>
	<script type="text/javascript" src="../assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/highcharts/highcharts.js"></script>
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

	<input id="button" onclick="window.print()"> Imprimir Gráficas </input>

	<section id="migrantes">	
		<h2> Estadísticas de Migrantes </h2>
		<div id="motivos_x_pais"></div>
		<div id="intentos_x_pais"></div>
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
		
		var denuncias = <?php echo json_encode($denuncias);?>;

		var histograma_denuncias = generar_histograma(denuncias)

		var h_motivos_x_pais = generar_histograma_l2(denuncias, "pais_origen", "motivo_migracion")
		var h_intentos_x_pais = generar_histograma_l2(denuncias, "pais_origen", "intentos")

		createChart_l2("motivos_x_pais", h_motivos_x_pais, 'Motivos de Migración por País', 'Países', 'Motivo')
		createChart_l2("intentos_x_pais", h_intentos_x_pais, 'Número de Intentos de Migración por País', 'Países', 'No. de Intentos')


		var tags_migrantes = {
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
			lugar_denuncia: "Lugar de Denuncia"
		}

		var tags_denuncias = {
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
			{ name: "0 - 14 años", visible:true, y:0 },
			{ name: "15 - 28 años", visible:true, y:0 },
			{ name: "29 - 43 años", visible:true, y:0 },
			{ name: "44 - 58 años", visible:true, y:0 },
			{ name: "59 años en adelante", visible:true, y:0 }
		]

		var topico_edad = histograma_denuncias.edad
		
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

		for(key in tags_migrantes){ createChart(key, histograma_denuncias[key], tags_migrantes) }
		for(key in tags_denuncias){ createChart(key, histograma_denuncias[key], tags_migrantes) }

});

</script>

</html>