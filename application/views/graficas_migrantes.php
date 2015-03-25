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

		.menu_graficas li {
			float:left;
			list-style: none;

		}

		.menu_graficas li a{
			font-weight: bold;
			color:#777;
			padding: 5px;
		}

		.menu_graficas li a:hover{
			background: #eee;
			color:#000;
			text-decoration: none;
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
	<div>
		<a href="<?php echo site_url('admin/migrantes');?>"> Migrantes </a> |
		<a href="<?php echo site_url('admin/denuncias');?>"> Denuncias </a> |
		<a href="#"> <strong> Gráficas </strong> </a> |
		<a href="<?php echo site_url('admin/reporte');?>"> Reporte </a> |
		<?php if(isset($_SESSION['user_id'])) ?>
			<a href="<?php echo site_url('admin/logout');?>">Cerrar sesión</a> | 
		<?php ?>
		
	</div>

	<div id="cabecera">
		<h4 class="printable" id="periodo_tit"> De <?php echo $start;?> a <?php echo $end;?> </h4>
		<h1> Estadísticas de Denuncias por Violaciones a los Derechos Humanos en Migrantes</h1>
		<input id="imprimir" class="non-printable" type="button" onclick="window.print()" value="Imprimir todo como PDF">
	</div>

	<div id="personalizar" class="non-printable">
		<form id="periodo" class="non-printable"> 
			<h4>Definir Periodo y Lugar</h4>
			<div class="field">
				<label> Inicio del Periodo: </label>
				<input type="date" name="start" id="start" value="<?php echo $start;?>">
			</div>
			<div class="field">
				<label> Fin del Periodo: </label>
				<input type="date" name="end" id="end" value="<?php echo $end;?>">
			</div>

			<div class="field">
				<label> Lugar: </label>
				<select id="select_lugar_denuncia">
					<option value=""> Todos </option>
				</select>
			</div>
			
			<input type="submit" class="def_periodo" value="Enviar">
		</form>

		<nav>
			<ul class="menu_graficas">
				<li> | <a href="#graficar_1_var" style="color:#000"> Un criterio </a> | </li>
				<li> | <a href="#graficar_2_var"> Dos criterios </a> | </li>
				<li> | <a href="#graficar_derechos"> Derechos Violentados </a> | </li>
				<li> | <a href="#graficar_violaciones_derechos">  Violaciones a los Derechos </a> | </li>
				<li> | <a href="#graficar_autoridades"> Autoridades que cometieron las Violaciones a los Derechos </a> </li>
			</ul>
		</nav>

		<form id="graficar_1_var" class="non-printable graficar">
			<div class="field">
				<label> Elige un criterio: </label>
				<select id="l"></select>
			</div>
			<br>

			<input type="submit" value="Graficar">
		</form>

		<form id="graficar_2_var" class="non-printable graficar" style="display:none;">
			<div class="field">
				<label> Elige el primer criterio: </label>
				<select id="l1"></select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l2"></select>
			</div>
			<br>
			<input type="submit" value="Graficar">
		</form>

		<form id="graficar_derechos" class="non-printable graficar" style="display:none;">
			<div class="field">
				<label> Elige el Derecho: </label>
				<select id="l3"> </select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l4"></select>
			</div>

			<br>
			<input type="submit" value="Graficar">
		</form>
		
		<form id="graficar_violaciones_derechos" class="non-printable graficar" style="display:none;">
			<div class="field">
				<label> Elige el tipo de Violación a los Derechos: </label>
				<select id="l5"> </select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l6"></select>
			</div>
			<br> <br>
			<input type="submit" value="Graficar">
		</form>

		<form id="graficar_autoridades" class="non-printable graficar" style="display:none;">
			<div class="field">
				<label> Elige la autoridad que cometio la Vioación a los Derechos: </label>
				<select id="l7"> </select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l8"></select>
			</div>
			<br> <br>
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
		  , violaciones_derechos = []
		  , autoridades = []
		  , lugares = []
		  , pos;

		for(var i in denuncias) {
			pos = derechos.indexOf(denuncias[i]["derechos"]); 
			if( pos < 0 ) derechos.push(denuncias[i]["derechos"])

			pos = violaciones_derechos.indexOf(denuncias[i]["violaciones_derechos"]); 
			if( pos < 0 ) violaciones_derechos.push(denuncias[i]["violaciones_derechos"])

			pos = autoridades.indexOf(denuncias[i]["autoridad"]); 
			if( pos < 0 ) autoridades.push(denuncias[i]["autoridad"])

			pos = lugares.indexOf(denuncias[i]["lugar_denuncia"]); 
			if( pos < 0 ) lugares.push(denuncias[i]["lugar_denuncia"])
		}
		/* crear_select(<datos>, <id_tag>)*/
		crear_select(lugares, "select_lugar_denuncia")

		crear_select(tags_denuncias, "l")
		crear_select(tags_denuncias, "l1")
		crear_select(tags_denuncias, "l2")

		crear_select(derechos, "l3")
		crear_select(tags_denuncias, "l4")

		crear_select(violaciones_derechos, "l5")
		crear_select(tags_denuncias, "l6")

		crear_select(autoridades, "l7")
		crear_select(tags_denuncias, "l8")

		graficar_por_subtema(denuncias, "violaciones_derechos", violaciones_derechos[0], "autoridad")
		

		$(".menu_graficas li a").on("click", function(){
			var ref = $(this).attr("href")

			$(".menu_graficas li a").css("color", "#777")
			$(this).css("color", "#000")

			$(".graficar").css("display", "none")
			$(".graficar" + ref).css("display", "block")
			return false;
		})

		$("#graficar_1_var").on("submit", function(){
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
			graficar_por_subtema(denuncias, "derechos", derechos[i], topico)
			return false;
		})

		$("#graficar_violaciones_derechos").on("submit", function(){
			var i = $("#l5").val();
			var topico = $("#l6").val();
			graficar_por_subtema(denuncias, "violaciones_derechos", violaciones_derechos[i], topico)
			return false;
		})

		$("#graficar_autoridades").on("submit", function(){
			var i = $("#l7").val();
			var topico = $("#l8").val();
			graficar_por_subtema(denuncias, "autoridad", autoridades[i], topico)
			console.log(topico)
			/*
			*/
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