
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Sistematización de información Migración</title>
	<link type="text/css" rel="stylesheet" href="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/css/jquery_plugins/chosen/chosen.css" />
	<link type="text/css" rel="stylesheet" href="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css" />
	<link type="text/css" rel="stylesheet" href="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/css/jquery_plugins/jquery.ui.datetime.css" />
	<link type="text/css" rel="stylesheet" href="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/css/jquery_plugins/jquery-ui-timepicker-addon.css" />
	<link type="text/css" rel="stylesheet" href="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/themes/datatables/css/datatables.css" />
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery-1.10.2.min.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/jquery.chosen.min.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/config/jquery.chosen.config.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/config/jquery.numeric.config.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/jquery-ui-timepicker-addon.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/ui/i18n/datepicker/jquery.ui.datepicker-es.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/ui/i18n/timepicker/jquery-ui-timepicker-es.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/config/jquery-ui-timepicker-addon.config.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/themes/flexigrid/js/jquery.form.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/themes/datatables/js/datatables-add.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/jquery.noty.js"></script>
	<script src="http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js/jquery_plugins/config/jquery.noty.config.js"></script>
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
		<a onclick="javascript: return confirmacion('http://ddhh.fundarlabs.org.mx/admin/migrantes')" href="javascript:void(0)">
			<strong>Migrantes</strong>		</a> |
		<a onclick="javascript: return confirmacion('http://ddhh.fundarlabs.org.mx/admin/denuncias')" href="javascript:void(0)">
			Denuncias		</a> |

		<a onclick="javascript: return confirmacion('http://ddhh.fundarlabs.org.mx/admin/graficas_migrantes')" href="javascript:void(0)">
			Gráficas		</a> |
		
					<a onclick="javascript: return confirmacion('http://ddhh.fundarlabs.org.mx/admin/logout')" href="javascript:void(0)">Cerrar sesión</a> | 
				
		<span class="link" id="ver-catalogos">Mostrar/Ocultar Catalogos</span>
		
		<span id="catalogos" class="hide">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a onclick="javascript: return confirmacion('http://ddhh.fundarlabs.org.mx/admin/estados')" href="javascript:void(0)">
				Estados/Departamentos			</a> |
			<a onclick="javascript: return confirmacion('http://ddhh.fundarlabs.org.mx/admin/autoridades')" href="javascript:void(0)">
				Autoridades			</a> |
			<a onclick="javascript: return confirmacion('http://ddhh.fundarlabs.org.mx/admin/paises')" href="javascript:void(0)">
				Paises			</a> |
			<a onclick="javascript: return confirmacion('http://ddhh.fundarlabs.org.mx/admin/estados_casos')" href="javascript:void(0)">
				Estado de los casos			</a> |
			<a onclick="javascript: return confirmacion('http://ddhh.fundarlabs.org.mx/admin/transportes')" href="javascript:void(0)">
				Transportes			</a>
		</span>
	</div>
	
	
		
	<div style='height:20px;'></div>  
    <div>
		<script type="text/javascript">
var ajax_relation_url = 'http://ddhh.fundarlabs.org.mx/admin/migrantes/ajax_relation';

</script>
<script type="text/javascript">
var ajax_relation_url = 'http://ddhh.fundarlabs.org.mx/admin/migrantes/ajax_relation';

</script>
<script type="text/javascript">
var ajax_relation_url = 'http://ddhh.fundarlabs.org.mx/admin/migrantes/ajax_relation';

</script>
<script type="text/javascript">
var ajax_relation_url = 'http://ddhh.fundarlabs.org.mx/admin/migrantes/ajax_relation';

</script>
<script type="text/javascript">
var ajax_relation_url = 'http://ddhh.fundarlabs.org.mx/admin/migrantes/ajax_relation';

</script>
<div class='ui-widget-content ui-corner-all datatables'>
	<h3 class="ui-accordion-header ui-helper-reset ui-state-default form-title">
		<div class='floatL form-title-left'>
			<a href="#">Añadir Migrantes</a>
		</div>
		<div class='clear'></div>
	</h3>
<div class='form-content form-div'>
	<form action="http://ddhh.fundarlabs.org.mx/admin/migrantes/insert" method="post" id="crudForm" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8">		<div>
						<div class='form-field-box odd' id="nombre_field_box">
				<div class='form-display-as-box' id="nombre_display_as_box">
					Nombre<span class='required'>*</span>  :
				</div>
				<div class='form-input-box' id="nombre_input_box">
					<input id='field-nombre' name='nombre' type='text' value="" maxlength='255' />				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box even' id="id_pais_field_box">
				<div class='form-display-as-box' id="id_pais_display_as_box">
					País :
				</div>
				<div class='form-input-box' id="id_pais_input_box">
					<select id='field-id_pais'  name='id_pais' class='chosen-select' data-placeholder='Seleccionar País' style='width:300px'><option value=''></option><option value='6'  >Belice</option><option value='5'  >El Salvador</option><option value='2'  >Estados Unidos</option><option value='4'  >Guatemala</option><option value='3'  >Honduras</option><option value='1'  >México</option><option value='7'  >Nicaragua</option></select>				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box odd' id="id_estado_field_box">
				<div class='form-display-as-box' id="id_estado_display_as_box">
					Estado/Departamento :
				</div>
				<div class='form-input-box' id="id_estado_input_box">
					<select id='field-id_estado'  name='id_estado' class='chosen-select' data-placeholder='Seleccionar Estado/Departamento' style='width:300px'><option value=''></option><option value='1'  >Aguascalientes</option><option value='37'  >Arizona</option><option value='2'  >Baja California</option><option value='3'  >Baja California Sur</option><option value='4'  >Campeche</option><option value='7'  >Chiapas</option><option value='8'  >Chihuahua</option><option value='36'  >Choluteca</option><option value='5'  >Coahuila</option><option value='6'  >Colima</option><option value='33'  >Comayahua</option><option value='39'  >Cortés</option><option value='9'  >Distrito Federal</option><option value='10'  >Durango</option><option value='15'  >Edo. De México</option><option value='38'  >Escuintla</option><option value='40'  >Francisco Morazán</option><option value='11'  >Guanajuato</option><option value='12'  >Guerrero</option><option value='13'  >Hidalgo</option><option value='35'  >Huehuetenango</option><option value='14'  >Jalisco</option><option value='41'  >Matagalpa</option><option value='16'  >Michoacán</option><option value='17'  >Morelos</option><option value='18'  >Nayarit</option><option value='19'  >Nuevo León</option><option value='20'  >Oaxaca</option><option value='21'  >Puebla</option><option value='22'  >Querétaro</option><option value='23'  >Quintana Roo</option><option value='24'  >San Luis Potosí</option><option value='25'  >Sinaloa</option><option value='26'  >Sonora</option><option value='42'  >Suchitepéquez</option><option value='27'  >Tabasco</option><option value='28'  >Tamaulipas</option><option value='34'  >Tegusigalpa</option><option value='29'  >Tlaxcala</option><option value='30'  >Veracruz</option><option value='31'  >Yucatán</option><option value='32'  >Zacatecas</option></select>				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box even' id="municipio_field_box">
				<div class='form-display-as-box' id="municipio_display_as_box">
					Municipio :
				</div>
				<div class='form-input-box' id="municipio_input_box">
					<input id='field-municipio' name='municipio' type='text' value="" maxlength='255' />				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box odd' id="id_genero_field_box">
				<div class='form-display-as-box' id="id_genero_display_as_box">
					Género :
				</div>
				<div class='form-input-box' id="id_genero_input_box">
					<select id='field-id_genero'  name='id_genero' class='chosen-select' data-placeholder='Seleccionar Género' style='width:300px'><option value=''></option><option value='2'  >Femenino</option><option value='1'  >Masculino</option></select>				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box even' id="edad_field_box">
				<div class='form-display-as-box' id="edad_display_as_box">
					Edad :
				</div>
				<div class='form-input-box' id="edad_input_box">
					<input id='field-edad' name='edad' type='text' value='' class='numeric' maxlength='11' />				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box odd' id="fecha_nacimiento_field_box">
				<div class='form-display-as-box' id="fecha_nacimiento_display_as_box">
					Fecha nacimiento :
				</div>
				<div class='form-input-box' id="fecha_nacimiento_input_box">
					<input id='field-fecha_nacimiento' name='fecha_nacimiento' type='text' value='' maxlength='19' class='datetime-input' />
		<a class='datetime-input-clear' tabindex='-1'>Resetear</a>
		(dd/mm/yyyy) hh:mm:ss				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box even' id="ocupacion_field_box">
				<div class='form-display-as-box' id="ocupacion_display_as_box">
					Ocupacion :
				</div>
				<div class='form-input-box' id="ocupacion_input_box">
					<input id='field-ocupacion' name='ocupacion' type='text' value="" maxlength='255' />				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box odd' id="ocupacion_homologada_field_box">
				<div class='form-display-as-box' id="ocupacion_homologada_display_as_box">
					Ocupacion (categoría) :
				</div>
				<div class='form-input-box' id="ocupacion_homologada_input_box">
					<select id='field-ocupacion_homologada' name='ocupacion_homologada' class='chosen-select' data-placeholder='Seleccionar Ocupacion (categoría)'><option value=''  ></option><option value='1'  >Al hogar</option><option value='2'  >Albañil</option><option value='3'  >Campesino</option><option value='4'  >Comerciante</option><option value='5'  >Empleado</option><option value='6'  >Empleado de gobierno</option><option value='7'  >Jornalero</option><option value='8'  >Peón</option></select>				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box even' id="id_estado_civil_field_box">
				<div class='form-display-as-box' id="id_estado_civil_display_as_box">
					Estado Civil :
				</div>
				<div class='form-input-box' id="id_estado_civil_input_box">
					<select id='field-id_estado_civil'  name='id_estado_civil' class='chosen-select' data-placeholder='Seleccionar Estado Civil' style='width:300px'><option value=''></option><option value='2'  >Casada(o)</option><option value='5'  >Divorciada(o)</option><option value='6'  >Otro</option><option value='1'  >Soltera(o)</option><option value='4'  >Unión libre</option><option value='3'  >Viuda(o)</option></select>				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box odd' id="escolaridad_field_box">
				<div class='form-display-as-box' id="escolaridad_display_as_box">
					Escolaridad :
				</div>
				<div class='form-input-box' id="escolaridad_input_box">
					<select id='field-escolaridad' name='escolaridad' class='chosen-select' data-placeholder='Seleccionar Escolaridad'><option value=''  ></option><option value='Sin instrucción'  >Sin instrucción</option><option value='Primaria'  >Primaria</option><option value='Primaria inconclusa'  >Primaria inconclusa</option><option value='Secundaria'  >Secundaria</option><option value='Secundaria inconclusa'  >Secundaria inconclusa</option><option value='Preparatoria'  >Preparatoria</option><option value='Preparatoria inconclusa'  >Preparatoria inconclusa</option><option value='Licenciatura'  >Licenciatura</option><option value='Licenciatura inconlusa'  >Licenciatura inconlusa</option><option value='Maestria'  >Maestria</option><option value='Doctorado'  >Doctorado</option></select>				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box even' id="pueblo_indigena_field_box">
				<div class='form-display-as-box' id="pueblo_indigena_display_as_box">
					Pertenece a algún pueblo indígena :
				</div>
				<div class='form-input-box' id="pueblo_indigena_input_box">
					<select id='field-pueblo_indigena' name='pueblo_indigena' class='chosen-select' data-placeholder='Seleccionar Pertenece a algún pueblo indígena'><option value=''  ></option><option value='1'  >Si</option><option value='2'  >No</option></select>				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box odd' id="nombre_pueblo_indigena_field_box">
				<div class='form-display-as-box' id="nombre_pueblo_indigena_display_as_box">
					Nombre pueblo indigena :
				</div>
				<div class='form-input-box' id="nombre_pueblo_indigena_input_box">
					<input id='field-nombre_pueblo_indigena' name='nombre_pueblo_indigena' type='text' value="" maxlength='15' />				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box even' id="espanol_field_box">
				<div class='form-display-as-box' id="espanol_display_as_box">
					Dominio del español :
				</div>
				<div class='form-input-box' id="espanol_input_box">
					<select id='field-espanol' name='espanol' class='chosen-select' data-placeholder='Seleccionar Dominio del español'><option value=''  ></option><option value='1'  >Si</option><option value='2'  >No</option></select>				</div>
				<div class='clear'></div>
			</div>
						<div class='form-field-box odd' id="id_lugar_denuncia_field_box">
				<div class='form-display-as-box' id="id_lugar_denuncia_display_as_box">
					Lugar de la organización :
				</div>
				<div class='form-input-box' id="id_lugar_denuncia_input_box">
					<select id='field-id_lugar_denuncia'  name='id_lugar_denuncia' class='chosen-select' data-placeholder='Seleccionar Lugar de la organización' style='width:300px'><option value=''></option><option value='2'  >Agua Prieta, Sonora</option><option value='3'  >Altar, Sonora</option><option value='1'  >Nogales, Sonora</option></select>				</div>
				<div class='clear'></div>
			</div>
						<!-- Start of hidden inputs -->
							<!-- End of hidden inputs -->
						<div class='line-1px'></div>
			<div id='report-error' class='report-div error'></div>
			<div id='report-success' class='report-div success'></div>
		</div>
		<div class='buttons-box'>
			<div class='form-button-box'>
				<input id="form-button-save" type='submit' value='Guardar' class='ui-input-button'/>
			</div>
			<div class='form-button-box'>
				<input type='button' value='Guardar y volver a la lista' class='ui-input-button' id="save-and-go-back-button"/>
			</div>
			<div class='form-button-box'>
				<input type='button' value='Cancelar' class='ui-input-button' id="cancel-button" />
			</div>
			<div class='form-button-box loading-box'>
				<div class='small-loading' id='FormLoading'>Cargando, guardando los datos...</div>
			</div>
			<div class='clear'></div>
		</div>
	</form></div>
</div>
<script>
	var validation_url = 'http://ddhh.fundarlabs.org.mx/admin/migrantes/insert_validation';
	var list_url = 'http://ddhh.fundarlabs.org.mx/admin/migrantes';

	var message_alert_add_form = "Los datos que intentas añadir no se han guardado.\nEstas seguro que quieres volver a la lista?";
	var message_insert_error = "Ocurrio un error al añadir.";
</script><script type="text/javascript">
var js_date_format = 'dd/mm/yy';
</script>
<script type="text/javascript">
	var default_javascript_path = 'http://ddhh.fundarlabs.org.mx/assets/grocery_crud/js';
	var default_css_path = 'http://ddhh.fundarlabs.org.mx/assets/grocery_crud/css';
	var default_texteditor_path = 'http://ddhh.fundarlabs.org.mx/assets/grocery_crud/texteditor';
	var default_theme_path = 'http://ddhh.fundarlabs.org.mx/assets/grocery_crud/themes';
	var base_url = 'http://ddhh.fundarlabs.org.mx/';

</script>
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
						
					});
    </script>
</body>
</html>
