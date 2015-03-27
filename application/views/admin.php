<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Sistematización de información Migración</title>
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
	

<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<script type="text/javascript" src="../../assets/js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="../../assets/js/highcharts/modules/exporting.js"></script>
<script type="text/javascript" src="../../assets/js/chart_methods.js"></script>

<style type='text/css'>
	body {
		font-family: Arial;
		font-size: 14px;
	}

	a {
	    color: blue;
	    text-decoration: none;
	    font-size: 14px;
	}
	
	a:hover {
		text-decoration: underline;
	}
	strong { font-size:16px; }
	.link { cursor:pointer; color:blue; font-size:14px; }
	#catalogos { display:none; padding:0;}

/*
	.c_filtros{
		min-width: 1200px;
		width: 1200px;
	}

	input.filtro{
		float:left;
		text-align: left;
		margin:5px 20px 0 0 !important; 
		width: 320px;
	}
	*/
	#graficar{
		margin-top: 20px;
		float: right;
	}

	#grafica{
		display: none;
		min-width: 98%;
		min-height: 800px;
		border: 6px solid #ddd;
		float: left;
		margin: 20px auto;
	}
</style>
</head>
<body>
	<div>
		<a href="<?php echo site_url('admin/migrantes')?>" >
			<?php if($this->uri->segment(2) == "migrantes") { ?><strong>Migrantes</strong><?php } else { ?>Migrantes<?php } ?>
		</a> |
		<a href="<?php echo site_url('admin/denuncias')?>" >
			<?php if($this->uri->segment(2) == "denuncias") { ?><strong>Denuncias</strong><?php } else { ?>Denuncias<?php } ?>
		</a> |

		<a href="<?php echo site_url('admin/graficas_migrantes')?>" >
			<?php if($this->uri->segment(2) == "graficas_migrantes") { ?><strong>Gráficas</strong><?php } else { ?>Gráficas<?php } ?>
		</a> |

		<a href="<?php echo site_url('admin/reporte')?>" >
			<?php if($this->uri->segment(2) == "reporte") { ?><strong>Reporte</strong><?php } else { ?>Reporte<?php } ?>
		</a> |
		
		<?php if(isset($_SESSION['user_id'])) { ?>
			<a href="<?php echo site_url('admin/logout')?>" >Cerrar sesión</a> | 
		<?php } ?>
		
		<span class="link" id="ver-catalogos">Mostrar/Ocultar Catalogos</span>
		
		<span id="catalogos" class="hide">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="<?php echo site_url('admin/estados')?>" >
				<?php if($this->uri->segment(2) == "estados") { ?><strong>Estados/Departamentos</strong><?php } else { ?>Estados/Departamentos<?php } ?>
			</a> |
			<a href="<?php echo site_url('admin/autoridades')?>" >
				<?php if($this->uri->segment(2) == "autoridades") { ?><strong>Autoridades</strong><?php } else { ?>Autoridades<?php } ?>
			</a> |
			<a href="<?php echo site_url('admin/paises')?>" >
				<?php if($this->uri->segment(2) == "paises") { ?><strong>Paises</strong><?php } else { ?>Paises<?php } ?>
			</a> |
			<a href="<?php echo site_url('admin/estados_casos')?>" >
				<?php if($this->uri->segment(2) == "estados_casos") { ?><strong>Estado de los casos</strong><?php } else { ?>Estado de los casos<?php } ?>
			</a> |
			<a href="<?php echo site_url('admin/transportes')?>" >
				<?php if($this->uri->segment(2) == "transportes") { ?><strong>Transportes</strong><?php } else { ?>Transportes<?php } ?>
			</a>
		</span>
	</div>
	
	<div id="clear" style="float:right"> <a id="clear_memo" href="#"> Limpiar filtros </a> </div>
	
		
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>

    <form id="graficar">
    	<label for="l"> Selecciona el criterio para gráficar</label>
    	<select id="l" name="l" ></select>
    	<input type="submit" value="Graficar">
    </form>

    <div id="grafica"> </div>
    <script type="text/javascript">
		$(document).ready( function () {

			/* Quitar la opción de agregar en el listado*/
			$(".datatables-add-button").remove()

			$("#clear_memo").on("click", function(e){
				e.preventDefault()
				/* Limpiar los datos de la tabla y los filtros */
				for(key in localStorage){
				  if( key.match(/fd_/g) !== null || key.match(/DataTables_/g) !== null ) 
				    localStorage.removeItem(key);
				}
				window.location.reload();
			})
		
		


			/* Agregar tooltip a los filtros*/
			$("tfoot th").each(function(index){
			  var filtro = $(this).children("input")
			  filtro.attr("title", filtro.attr("placeholder") )
			})
			/**/

			crear_select(topicos, "l")

			$("#graficar").on("submit", function(e){
				e.preventDefault()
				$("#grafica").css("display","block")

				// obtener el valor y luego el tópico del select
				var l = topicos[ $("#l").val() ] ; 
    			
    			graficar( l, histograma[l], l )

    			/* Desplazar a la gráfica*/
    			$('html, body').animate({
			        scrollTop: $("#grafica").offset().top
			    }, 2000);
			})

			$("#ver-catalogos").click( function () {
				$("#catalogos").toggle();
			});
			
			$("#report-error").remove()

			$("form#crudForm").on("submit", function(e){
				e.preventDefault();
				var that = $(this)
				  , data = that.serialize()
				  , url = that.attr("action");

			  	$.post(url, data, function(res){
					//proceso para guardar 
					var res = JSON.parse(res)
			  		if(res.status){
						$(this).children(".small-loading").css("display","block");
						$(this).children(".small-loading").css("display","none");
						var msg = ' <p> El registro del migrante fue correctamente agregado. \
								    ¿Quiéres agregar otro migrante?</p>';

					  	var dialog = $(msg).dialog({
			        		buttons: {
					            "Agregar otro migrante": function() { window.location.reload(); },
					            "Regresar a la página principal ":  function() { window.location.replace('/');  }
					        }
				      	});

			      	}else{
			  			alert("No se pudo insertar el registro, verifique los campos")
			  		}

				})
			})
 			
			<?php if($this->uri->segment(3) != "read") { ?>
				/*Guia-Coyote*/
				$("#lugar_contrato_coyote_field_box").css("margin-left", "50px");
				$("#monto_coyote_field_box").css("margin-left", "50px");
				$("#paquete_pago_field_box").css("margin-left", "50px");
				$("#lugar_contrato_coyote_field_box").hide();
				$("#monto_coyote_field_box").hide();
				$("#paquete_pago_field_box").hide();
				
				$("#field-coyote_guia").change( function () {
					if($("#field-coyote_guia").val() == 1) {
						$("#lugar_contrato_coyote_field_box").show();
						$("#monto_coyote_field_box").show();
						$("#paquete_pago_field_box").show();
					} else {
						$("#lugar_contrato_coyote_field_box").hide();
						$("#monto_coyote_field_box").hide();
						$("#paquete_pago_field_box").hide();
					}
				});
				
				/*Viajaba solo*/
				$("#con_quien_viaja_field_box").css("margin-left", "50px");
				$("#con_quien_viaja_field_box").hide();
		
				$("#field-viaja_solo").change( function () {
					if($("#field-viaja_solo").val() == 2) {
						$("#con_quien_viaja_field_box").show();
						$("#con_quien_viaja_field_box").show();
					} else {
						$("#con_quien_viaja_field_box").hide();
						$("#con_quien_viaja_field_box").hide();
					}
				});
				
				
				/*Color uniformome responsables*/
				$("#color_uniforme_responsables_field_box").css("margin-left", "50px");
				$("#insignias_responsables_field_box").css("margin-left", "50px");
				$("#color_uniforme_responsables_field_box").hide();
				$("#insignias_responsables_field_box").hide();
		
				$("#field-uniformado_responsables").change( function () {
					if($("#field-uniformado_responsables").val() == 'Si') {
						$("#color_uniforme_responsables_field_box").show();
						$("#insignias_responsables_field_box").show();
					} else {
						$("#color_uniforme_responsables_field_box").hide();
						$("#insignias_responsables_field_box").hide();
					}
				});
				
				
				/*Momento de deportado*/
				$("#momento_deportado_field_box").css("margin-left", "50px");
				$("#momento_deportado_field_box").hide();
		
				$("#field-deportado").change( function () {
					if($("#field-deportado").val() == 1) {
						$("#momento_deportado_field_box").show();
						$("#momento_deportado_field_box").show();
					} else {
						$("#momento_deportado_field_box").hide();
						$("#momento_deportado_field_box").hide();
					}
				});
				
				/*Familiar separacion*/
				$("#familiar_separado_field_box").css("margin-left", "50px");
				$("#familiar_separado_field_box").hide();
				$("#situacion_familiar_field_box").css("margin-left", "50px");
				$("#situacion_familiar_field_box").hide();
		
				$("#field-separacion_familiar").change( function () {
					if($("#field-separacion_familiar").val() == 1) {
						$("#familiar_separado_field_box").show();
						$("#familiar_separado_field_box").show();
						
						$("#situacion_familiar_field_box").show();
						$("#situacion_familiar_field_box").show();
					} else {
						$("#situacion_familiar_field_box").hide();
						$("#situacion_familiar_field_box").hide();
						
						$("#familiar_separado_field_box").hide();
						$("#familiar_separado_field_box").hide();
					}
				});
				
				/*Migrante - Pueblo indigena*/
				$("#nombre_pueblo_indigena_field_box").css("margin-left", "50px");
				$("#nombre_pueblo_indigena_field_box").hide();
				$("#espanol_field_box").css("margin-left", "50px");
				$("#espanol_field_box").hide();
		
				$("#field-pueblo_indigena").change( function () {
					if($("#field-pueblo_indigena").val() == 1) {
						$("#nombre_pueblo_indigena_field_box").show();
						$("#nombre_pueblo_indigena_field_box").show();
						
						$("#espanol_field_box").show();
						$("#espanol_field_box").show();
					} else {
						$("#nombre_pueblo_indigena_field_box").hide();
						$("#nombre_pueblo_indigena_field_box").hide();
						
						$("#espanol_field_box").hide();
						$("#espanol_field_box").hide();
					}
				});
			<?php } ?>
			
			<?php if($this->uri->segment(3) == "read") { ?>
				/*Mostrando 1 y 2 - Denuncias*/
				$(".readonly_label").css("margin-left", "30px");
			
				if($("#field-separacion_familiar").text() == "1") {
					$("#field-separacion_familiar").text("Si");
				} else {
					$("#field-separacion_familiar").text("No");
				}
				
				if($("#field-deportado").text() == "1") {
					$("#field-deportado").text("Si");
				} else {
					$("#field-deportado").text("No");
				}
				
				if($("#field-viaja_solo").text() == "1") {
					$("#field-viaja_solo").text("Si");
				} else {
					$("#field-viaja_solo").text("No");
				}
				
				if($("#field-coyote_guia").text() == "1") {
					$("#field-coyote_guia").text("Si");
				} else {
					$("#field-coyote_guia").text("No");
				}

				if($("#field-dano_autoridad").text() == "1") {
					$("#field-dano_autoridad").text("Si");
				} else {
					$("#field-dano_autoridad").text("No");
				}
				
				/*Migrantes*/
				if($("#field-pueblo_indigena").text() == "1") {
					$("#field-pueblo_indigena").text("Si");
				} else if($("#field-pueblo_indigena").text() == "2") {
					$("#field-pueblo_indigena").text("No");
				}
				
				if($("#field-espanol").text() == "1") {
					$("#field-espanol").text("Si");
				} else if($("#field-espanol").text() == "2") {
					$("#field-espanol").text("No");
				}
			<?php } ?>
		});
    </script>
</body>
</html>
