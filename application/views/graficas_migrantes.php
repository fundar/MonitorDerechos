<!DOCTYPE html>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<html>
<head>
	<title></title>
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

		section#grafica{
			min-width: 98%;
			min-height: 800px;
			border: 6px solid #ddd;
			float: left;
			margin:0 auto;
		}

		section{
			margin:6px;
		}

		form{
			margin-right: 20px;
			/*max-width: 18%;*/
			float:left;
			padding: 10px;
		}

		#cabecera, #personalizar{ 
			display:block;
			width: 100%;
			height: 60px;
			margin:20px;
		}
		
		h4{ 
			margin: 0;
			border-bottom: 2px solid #ccc
		}

		.field{
			float: left;
			margin: 10px;
		}

		label{
			display: block;
		}

		input[type="submit"]{
			margin-left: 10px;
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
</head>

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
			<div class="field">
				<label> Inicio del Periodo: </label>
				<input type="date" name="start" id="start" value="<?php echo $start;?>">
			</div>
			<div class="field">
				<label> Fin del Periodo: </label>
				<input type="date" name="end" id="end" value="<?php echo $end;?>">
			</div>
			
			<input type="submit" class="def_periodo" value="Rango de Fechas">
		</form>


		<form id="graficar" class="non-printable">
			<h4> Crear gráfica de un criterio </h4>
			<div class="field">
				<label> Elige un criterio: </label>
				<select id="l"></select>
			</div>

			<input type="submit" value="Graficar">
		</form>


		<form id="graficar_2_var" class="non-printable">
			<h4> Crear gráfica de dos criterios </h4>
			<div class="field">
				<label> Elige el primer criterio: </label>
				<select id="l1"></select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l2"></select>
			</div>

			<input type="submit" value="Graficar">
		</form>

		<form id="graficar_derechos" class="non-printable">
			<h4> Crear gráfica de Derechos Violentados en la Denuncia </h4>
			<div class="field">
				<label> Elige el Derecho: </label>
				<select id="l3"> </select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l4"></select>
			</div>

			<input type="submit" value="Graficar">
		</form>
		
		<form id="graficar_violaciones_derechos" class="non-printable">
			<h4> Crear gráfica de Violaciones a los Derechos en la Denuncia </h4>
			<div class="field">
				<label> Elige el tipo de Violación a los Derechos: </label>
				<select id="l5"> </select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l6"></select>
			</div>

			<input type="submit" value="Graficar">
		</form>
	</div>
 
	<section id="grafica">
		
	</section>

</body>

	<!--script type="text/javascript" src="<?php echo asset_url('js/jquery-1.11.1.min.js'); ?>"></script-->
	
	<script type="text/javascript" src="../../assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../../assets/js/highcharts/highcharts.js"></script>
	<script type="text/javascript" src="../../assets/js/highcharts/modules/exporting.js"></script>
	<script type="text/javascript" src="../../assets/js/chart_methods.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function() {
		var denuncias = <?php echo json_encode($denuncias);?>;
		var histograma_denuncias = actualizar_histograma( generar_histograma(denuncias) )

		var derechos = []
		var violaciones_derechos = []

		for(var i in denuncias) {
			var pos = derechos.indexOf(denuncias[i]["derechos"]); 
			if( pos < 0 ) derechos.push(denuncias[i]["derechos"])

			var pos2 = violaciones_derechos.indexOf(denuncias[i]["violaciones_derechos"]); 
			if( pos2 < 0 ) violaciones_derechos.push(denuncias[i]["violaciones_derechos"])
		}

		crear_select(tags_denuncias, "l")
		crear_select(tags_denuncias, "l1")
		crear_select(tags_denuncias, "l2")

		crear_select(derechos, "l3")
		crear_select(tags_denuncias, "l4")

		crear_select(violaciones_derechos, "l5")
		crear_select(tags_denuncias, "l6")

		graficar_por_subtema(denuncias, "violaciones_derechos", violaciones_derechos[0], "autoridad")
		

		$("#graficar").on("submit", function(){
			var l = $("#l").val();
			graficar(l, histograma_denuncias[l], tags_denuncias[l])
			return false;
		})

		$("#graficar_2_var").on("submit", function(){
			var l1 = $("#l1").val();
			var l2 = $("#l2").val();

			var nombre = $("#nombre").val();
			var tag = l1 + "_x_" + l2;

			var histograma_mxd = generar_histograma_l2(denuncias, l1, l2)
			var nombre = tags_denuncias[l1] + " por " + tags_denuncias[l2];
			
			graficar_l2(tag, histograma_mxd, nombre, tags_denuncias[l1], tags_denuncias[l2])
			return false;
		})

		$("#graficar_derechos").on("submit", function(){
			var i = $("#l3").val();
			var topico = $("#l4").val();
			graficar_por_subtema(denuncias, "derechos", subtemas[i], topico)
			return false;
		})

		$("#graficar_violaciones_derechos").on("submit", function(){
			var i = $("#l5").val();
			var topico = $("#l6").val();
			graficar_por_subtema(denuncias, "violaciones_derechos", subtemas[i], topico)
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