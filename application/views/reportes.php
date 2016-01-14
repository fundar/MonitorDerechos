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
		strong { 
	    color: #000;
			font-size:20px; 
		}	
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


		#_tooltip{
			font-weight: bolder;
			color:#fff;
			//background: rgb(148, 185, 217);
			background: rgba(120, 166, 225, 0.9);
			padding: 6px 3px 3px 6px;
			display: none;
			position: absolute;
			max-width: 70%;
			min-height: 40px;
			overflow:visible;
		}
		a.menu_item {
			font-weight: bolder;
	    color: #555;
	    text-decoration: none;
	    font-size: 16px;
		}
	</style>
</head>

<body>
	<div>
		<a class="menu_item" id="menu_denunciar" href="<?php echo site_url('admin/denunciar');?>"> Registrar Nuevo migrante </a> |
		<a class="menu_item" id="menu_crea_denuncia" href="<?php echo site_url('admin/crea/denuncia');?>"> Agregar denuncia a un migrante ya registrado </a> |
		<a class="menu_item" id="menu_migrantes" href="<?php echo site_url('admin/migrantes');?>"> Migrantes </a> |
		<a class="menu_item" id="menu_denuncias" href="<?php echo site_url('admin/denuncias');?>"> Denuncias </a> |
		<a class="menu_item" id="menu_reportes" href="#"> <strong> Reportes </strong> </a> |
		<?php if(isset($_SESSION['user_id'])) ?>
			<a class="menu_item" href="<?php echo site_url('admin/logout');?>">Cerrar sesión</a> | 
		<?php ?>
		
	</div>

	<div id="_tooltip" style='height:20px;'> </div>  

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
				<!-- Hardcoding time!!! -->
				<select id="location" name="location"> 
					<option value="">Todos</option> 
					<option value="1">Nogales, Sonora</option> 
					<option value="2">Agua Prieta, Sonora</option> 
					<option value="3">Altar, Sonora</option> 
				</select>
			</div>
			
			<input type="submit" class="def_periodo" value="Enviar">
		</form>

		<nav>
			<ul class="menu_graficas">
				<li> | <a href="#graficar_1_var" style="color:#000"> Un criterio </a> | </li>
				<li> | <a href="#graficar_2_var"> Dos criterios </a> | </li>

				<li> | <a href="#graficar_derechos_individual"> Derecho Violentado </a> | </li>
				<li> | <a href="#graficar_derechos"> Derechos Violentados [Patrones] </a> | </li>

				<li> | <a href="#graficar_violaciones_derechos_individual">  Violación al Derecho </a> | </li>
				<li> | <a href="#graficar_violaciones_derechos">  Violaciones a los Derechos [Patrones] </a> | </li>

				<!--li> | <a href="#graficar_autoridades_individual"> Actores involucrados </a> | </li>
				<li> | <a href="#graficar_autoridades"> Actores involucrados [Patrones] </a> | </li-->

				<li> | <a href="#graficar_autoridad_responsable"> Actor responsable </a> </li>
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

		<form id="graficar_derechos_individual" class="non-printable graficar" style="display:none;">
			<div class="field">
				<label> Elige el Derecho: </label>
				<select id="l3i"> </select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l4i"></select>
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

		<form id="graficar_violaciones_derechos_individual" class="non-printable graficar" style="display:none;">
			<div class="field">
				<label> Elige el tipo de Violación a los Derechos: </label>
				<select id="l5i"> </select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l6i"></select>
			</div>
			<br> <br>
			<input type="submit" value="Graficar">
		</form>

		<form id="graficar_autoridades" class="non-printable graficar" style="display:none;">
			<div class="field">
				<label> Elige el patron de autoridades involucradas: </label>
				<select id="l7"> </select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l8"></select>
			</div>
			<br> <br>
			<input type="submit" value="Graficar">
		</form>

		<form id="graficar_autoridades_individual" class="non-printable graficar" style="display:none;">
			<div class="field">
				<label> Elige la autoridad involucrada: </label>
				<select id="l7i"> </select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l8i"></select>
			</div>
			<br> <br>
			<input type="submit" value="Graficar">
		</form>

		<form id="graficar_autoridad_responsable" class="non-printable graficar" style="display:none;">
			<div class="field">
				<label> Elige la autoridad que cometio la Violación a los Derechos: </label>
				<select id="l9"></select>
			</div>
			<div class="field">
				<label> Elige el segundo criterio: </label>
				<select id="l10"></select>
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
			, derechos_individual = []
		  , violaciones_derechos = []
		  , violaciones_derechos_individual = []
		  , autoridades = []
		  , autoridades_individual = []
		  , lugares = []
		  , autoridad_responsable = []
		  , pos;

		
		for(var i = 0 in histograma_denuncias.derechos_individual){
			derechos_individual.push( histograma_denuncias.derechos_individual[i][0] )
		}

		for(var i = 0 in histograma_denuncias.violaciones_derechos_individual){
			violaciones_derechos_individual.push( histograma_denuncias.violaciones_derechos_individual[i][0] )
		}

		for(var i = 0 in histograma_denuncias.autoridad_individual){
			autoridades_individual.push( histograma_denuncias.autoridad_individual[i][0] )
		}

		for(var i = 0 in histograma_denuncias.autoridad_responsable){
			autoridad_responsable.push( histograma_denuncias.autoridad_responsable[i][0] )
		}

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

		crear_select(lugares, null, "select_lugar_denuncia")

		crear_select(tags_denuncias, null, "l")

		crear_select(tags_denuncias, ['derechos_individual', 'violaciones_derechos_individual', 'autoridad_individual','derechos','violaciones_derechos','autoridad'], "l1")
		crear_select(tags_denuncias, ['derechos_individual', 'violaciones_derechos_individual', 'autoridad_individual','derechos','violaciones_derechos','autoridad'], "l2")

		crear_select(derechos, null, "l3")
		crear_select(tags_denuncias, null, "l4")

		crear_select(derechos_individual, null, "l3i")
		crear_select(tags_denuncias, null, "l4i")

		crear_select(violaciones_derechos, null, "l5")
		crear_select(tags_denuncias, null, "l6")

		crear_select(violaciones_derechos_individual, null, "l5i")
		crear_select(tags_denuncias, null, "l6i")

		crear_select(autoridades, null, "l7")
		crear_select(tags_denuncias, null, "l8")

		crear_select(autoridades_individual, null, "l7i")
		crear_select(tags_denuncias, null, "l8i")

		crear_select(autoridad_responsable, null, "l9")
		crear_select(tags_denuncias, null, "l10")


		graficar_por_subtema(denuncias, "violaciones_derechos", true, "Tratos crueles Inhumanos y degradantes", "autoridad_individual")
		//graficar_por_subtema(denuncias, "derechos", true, derechos_individual[0], "autoridad_individual")

		$(".menu_graficas li a").on("click", function(){
			var ref = $(this).attr("href")

			$(".menu_graficas li a").css("color", "#777")
			$(this).css("color", "#000")

			$(".graficar").css("display", "none")
			$(".graficar" + ref).css("display", "block")
			return false;
		})

		$("#graficar_1_var").on("submit", function(){
			var l = $("#l").val()
			  , type;

			if( l.indexOf("_individual") > -1 ) type = 'bar'

			graficar( l, histograma_denuncias[l], tags_denuncias[l], '', type)
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
			graficar_por_subtema( denuncias, "derechos", false, derechos[i], topico)
			return false;
		})

		$("#graficar_violaciones_derechos").on("submit", function(){
			var i = $("#l5").val();
			var topico = $("#l6").val();
			graficar_por_subtema(denuncias, "violaciones_derechos", false, violaciones_derechos[i], topico)
			return false;
		})

		$("#graficar_autoridades").on("submit", function(){
			var i = $("#l7").val();
			var topico = $("#l8").val();
			graficar_por_subtema(denuncias, "autoridad", false, autoridades[i], topico)
			return false;
		})
		/*
		graficar_por_subtema(denuncias, "violaciones_derechos", true, "Tratos crueles Inhumanos y degradantes", "autoridad_individual")

		*/

		$("#graficar_derechos_individual").on("submit", function(){
			var i = $("#l3i").val();
			var topico = $("#l4i").val();
			console.log(derechos_individual[i])
			graficar_por_subtema(denuncias, "derechos", true, derechos_individual[i], topico)
			return false;
		})

		$("#graficar_violaciones_derechos_individual").on("submit", function(){
			var i = $("#l5i").val();
			var topico = $("#l6i").val();
			graficar_por_subtema(denuncias, "violaciones_derechos", true, violaciones_derechos_individual[i], topico)
			return false;
		})

		$("#graficar_autoridades_individual").on("submit", function(){
			var i = $("#l7i").val();
			var topico = $("#l8i").val();
			graficar_por_subtema(denuncias, "autoridad", true, autoridades_individual[i], topico)
			return false;
		})

		$("#graficar_autoridad_responsable").on("submit", function(){
			var i = $("#l9").val();
			var topico = $("#l10").val();
			graficar_por_subtema(denuncias, "autoridad_responsable", false, autoridad_responsable[i], topico)
			return false;
		})

		/*
		/**/
		
		$("#periodo").on("submit", function(){
			var start = $("#start").val().split("-");
			var end = $("#end").val().split("-");

			$.ajax({
				type:"GET",
			  url: "http://ddhh.fundarlabs.org.mx/admin/graficas_migrantes",
			  data:{
			  	"start": [start[2], start[1], start[0]].join("-"), 
			  	"end": [end[2], end[1], end[0]].join("-"),
			  	"location": $("#location").val()
			  },
			  async: false
			}).done(function() {});

		})

			$(".menu_item").hover(function(){
				var msg = '';
				switch( $(this).attr("id") ) {
			    case "menu_denunciar":
			    	msg = 'Con esta opción podrá capturar uno o más migrantes, así como los datos del caso en el que estan involucrados.'
		        break;
			    case "menu_crea_denuncia":
			    	msg = 'En esta sección sólo se pueden agregar denuncias relacionadas a migrantes que <u> ya existan en el sistema. </u> <br>Para ingresar un migrante desde cero, use la opción "Registrar Nuevo migrante"'
		        break;
			    case "menu_migrantes":
			    	msg = 'Aquí se pueden ver a todos los migrantes caṕturados, con opciones de filtrado y búsqueda así como de la posibilidad de gráficar el contenido filtrado por algún criterio.'
		        break;
			    case "menu_denuncias":
			    	msg = 'Aquí se pueden ver a todos las denuncias caṕturados, con opciones de filtrado y búsqueda así como de la posibilidad de gráficar el contenido filtrado por algún criterio.'
		        break;
			    case "menu_reportes":
			    	msg = 'Reportes es la opción para ver las gráficas estadísticas resultantes de la captura de migrantes y denuncias.'
		        break;
			    default:
			    	break
				}

				if(msg != ''){
					$("#_tooltip")
					.html(msg)
					.slideDown()
				}

			}, function(){
				$("#_tooltip")
					.html("")
					.fadeOut("slow")
					//.css("display", "none")
			})

	});

</script>

</html>