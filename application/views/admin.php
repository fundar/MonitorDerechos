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
</head>
<body>
	<div>
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
	</div>
	
	
		
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
    <script type="text/javascript">
		function confirmacion(url) {
			if(confirm('¿Esta segura/o que desea salir (verifique que ha guardado la información)?')) {
				document.location = url;
			} else {
				return false;
			}
		}
		
		$(document).ready( function () {
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
