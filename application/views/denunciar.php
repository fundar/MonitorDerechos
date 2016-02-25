<?php 
	function getRealIP() {
	    if (!empty($_SERVER['HTTP_CLIENT_IP']))
	        return $_SERVER['HTTP_CLIENT_IP'];
	       
	    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	        return $_SERVER['HTTP_X_FORWARDED_FOR'];

	   	if(!empty($_SERVER['REMOTE_ADDR']))
	    	return $_SERVER['REMOTE_ADDR'];

	    else return "127.0.0.1";
	}

	function crearFolio($prefix = ""){
		$ip = strtoupper( base_convert(str_replace(".", "", getRealIP() ), 10, 36) );
		$time = explode(" ", str_replace(".","", microtime(false) ));
		$folio = $prefix . "-" . $time[1] . "-" . $ip;
		return $folio;
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Sistematización de información Migración</title>

	<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>/../assets/grocery_crud/css/ui/simple/jquery-ui-1.10.1.custom.min.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>/../assets/grocery_crud/css/jquery_plugins/jquery.ui.datetime.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>/../assets/grocery_crud/css/jquery_plugins/jquery-ui-timepicker-addon.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>/../assets/grocery_crud/css/jquery_plugins/chosen/chosen.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>/../assets/grocery_crud/css/jquery_plugins/file_upload/file-uploader.css">
	<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>/../assets/grocery_crud/css/jquery_plugins/file_upload/jquery.fileupload-ui.css">
	<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>/../assets/grocery_crud/css/jquery_plugins/fancybox/jquery.fancybox.css">
	<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>/../assets/grocery_crud/css/jquery_plugins/file_upload/fileuploader.css">
	<link type="text/css" rel="stylesheet" href="<?php echo site_url();?>/../assets/grocery_crud/themes/datatables/css/datatables.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo site_url();?>/../assets/grocery_crud/texteditor/ckeditor/skins/kama/editor.css?t=C9A85WF">

	<script type="text/javascript">var js_date_format = 'dd/mm/yy';</script>

	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery-1.10.2.min.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/jquery-ui-timepicker-addon.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/ui/i18n/datepicker/jquery.ui.datepicker-es.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/ui/i18n/timepicker/jquery-ui-timepicker-es.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/config/jquery-ui-timepicker-addon.config.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/jquery.chosen.min.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/config/jquery.chosen.config.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/jquery.numeric.min.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/config/jquery.numeric.config.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/texteditor/ckeditor/ckeditor.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/texteditor/ckeditor/adapters/jquery.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/config/jquery.ckeditor.config.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/tmpl.min.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/load-image.min.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/jquery.iframe-transport.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/jquery.fileupload.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/config/jquery.fileupload.config.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/jquery.fancybox-1.3.4.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/jquery.easing-1.3.pack.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/config/jquery.fancybox.config.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/themes/flexigrid/js/jquery.form.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/themes/datatables/js/datatables-add.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/jquery.noty.js"></script>
	<script src="<?php echo site_url();?>/../assets/grocery_crud/js/jquery_plugins/config/jquery.noty.config.js"></script>


	<script type="text/javascript" src="<?php echo site_url();?>/../assets/js/angular.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>/../assets/js/angular-local-storage.js"></script>
	<script type="text/javascript" src="<?php echo site_url();?>/../assets/js/local_storage.js"></script>

	<style type='text/css'>
		body{
			font-family: Arial;
			font-size: 14px;
			//position: relative;
		}
		a {
		    color: blue;
		    text-decoration: none;
		    font-size: 14px;
		}
		a:hover{
			text-decoration: underline;
		}
		strong { 
	    color: #000;
			font-size:20px; 
		}
		.link { cursor:pointer; color:blue; font-size:14px; }
		#catalogos { display:none; padding:0;}

		#addReport-step2{
			display: none;
		}

		.chosen-select{
			width:300px;
		}
		/* Ocultar por defecto el botón de ir al formulario de llenado datos de denuncia*/
		#go-next-button{
			display: none;
		}

		#gray_screen{
			position: absolute;
			min-width: 100%;
			min-height: 100%;
			left:0;
			top:0;
			background: rgba(50,50,50, 0.7);
			z-index: 20;
			display: none;
		}

		.ui-corner-all.ui-button-icon-only.ui-dialog-titlebar-close, 
		.ui-dialog-titlebar.ui-widget-header.ui-corner-all.ui-helper-clearfix{
			display: none;
		}

		.ui-dialog.ui-widget.ui-widget-content.ui-corner-all.ui-front.ui-dialog-buttons.ui-draggable.ui-resizable{
			padding: 20px;
		  border-radius: 10px 10px 10px 10px;
		  -moz-border-radius: 10px 10px 10px 10px;
		  -webkit-border-radius: 10px 10px 10px 10px;
		  border: 0px solid #000000;
		}


		#_tooltip{
			font-weight: bolder;
			color:#fff;
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

		.migrantes_capturados{
			display: none;
		}

		.migrantes_capturados{
			background: rgba(120, 166, 225, 0.7);
			padding: 10px 15px;
			margin:-15px -10px 10px -10px
		}

		.migrantes_capturados h3, .migrantes_capturados ul{
			margin: 0px;
		}

	</style>
</head>
<body>
	<div id="gray_screen"></div>
	
	<div class="migrantes_capturados"> 
		<h3> Migrantes capturados en esta denuncia: </h3>
		<ul></ul>
	</div>

	<div>
		<a class="menu_item" id="menu_denunciar" href="#"> <strong>  Registrar Nuevo migrante </strong> </a> |
		<a class="menu_item" id="menu_crea_denuncia" href="<?php echo site_url('admin/crea/denuncia');?>"> Agregar denuncia a un migrante ya registrado </a> |
		<a class="menu_item" id="menu_migrantes" href="<?php echo site_url();?>/admin/migrantes"> Migrantes </a> |
		<a class="menu_item" id="menu_denuncias" href="<?php echo site_url();?>/admin/denuncias"> Denuncias </a> |
		<a class="menu_item" id="menu_reportes" href="<?php echo site_url();?>/admin/reportes"> Reportes </a> |
		<?php if(isset($_SESSION['user_id'])) ?>
			<a class="menu_item" href="<?php echo site_url();?>/admin/logout">Cerrar sesión</a> | 
		<?php ?>
		
	</div>
	
	
		
	<div id="_tooltip" style='height:20px;'> </div>  

<script type="text/javascript">
	var upload_info_1886533685 = {
		accepted_file_types: /(\.|\/)(gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2)$/i,
		accepted_file_types_ui : ".gif,.jpeg,.jpg,.png,.tiff,.doc,.docx,.txt,.odt,.xls,.xlsx,.pdf,.ppt,.pptx,.pps,.ppsx,.mp3,.m4a,.ogg,.wav,.mp4,.m4v,.mov,.wmv,.flv,.avi,.mpg,.ogv,.3gp,.3g2",
		max_file_size: 52428800,
		max_file_size_ui: "50MB"
	};

	var upload_info_326692416 = {
		accepted_file_types: /(\.|\/)(gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2)$/i,
		accepted_file_types_ui : ".gif,.jpeg,.jpg,.png,.tiff,.doc,.docx,.txt,.odt,.xls,.xlsx,.pdf,.ppt,.pptx,.pps,.ppsx,.mp3,.m4a,.ogg,.wav,.mp4,.m4v,.mov,.wmv,.flv,.avi,.mpg,.ogv,.3gp,.3g2",
		max_file_size: 52428800,
		max_file_size_ui: "50MB"
	};


	var upload_info_50183926 = {
		accepted_file_types: /(\.|\/)(gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2)$/i,
		accepted_file_types_ui : ".gif,.jpeg,.jpg,.png,.tiff,.doc,.docx,.txt,.odt,.xls,.xlsx,.pdf,.ppt,.pptx,.pps,.ppsx,.mp3,.m4a,.ogg,.wav,.mp4,.m4v,.mov,.wmv,.flv,.avi,.mpg,.ogv,.3gp,.3g2",
		max_file_size: 52428800,
		max_file_size_ui: "50MB"
	};

	var upload_info_2062526969 = {
		accepted_file_types: /(\.|\/)(gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2)$/i,
		accepted_file_types_ui : ".gif,.jpeg,.jpg,.png,.tiff,.doc,.docx,.txt,.odt,.xls,.xlsx,.pdf,.ppt,.pptx,.pps,.ppsx,.mp3,.m4a,.ogg,.wav,.mp4,.m4v,.mov,.wmv,.flv,.avi,.mpg,.ogv,.3gp,.3g2",
		max_file_size: 52428800,
		max_file_size_ui: "50MB"
	};

	var upload_info_741464619 = {
		accepted_file_types: /(\.|\/)(gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2)$/i,
		accepted_file_types_ui : ".gif,.jpeg,.jpg,.png,.tiff,.doc,.docx,.txt,.odt,.xls,.xlsx,.pdf,.ppt,.pptx,.pps,.ppsx,.mp3,.m4a,.ogg,.wav,.mp4,.m4v,.mov,.wmv,.flv,.avi,.mpg,.ogv,.3gp,.3g2",
		max_file_size: 52428800,
		max_file_size_ui: "50MB"
	};

	var upload_info_1256211452 = {
		accepted_file_types: /(\.|\/)(gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2)$/i,
		accepted_file_types_ui : ".gif,.jpeg,.jpg,.png,.tiff,.doc,.docx,.txt,.odt,.xls,.xlsx,.pdf,.ppt,.pptx,.pps,.ppsx,.mp3,.m4a,.ogg,.wav,.mp4,.m4v,.mov,.wmv,.flv,.avi,.mpg,.ogv,.3gp,.3g2",
		max_file_size: 52428800,
		max_file_size_ui: "50MB"
	};

	var upload_info_673702828 = {
		accepted_file_types: /(\.|\/)(gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2)$/i,
		accepted_file_types_ui : ".gif,.jpeg,.jpg,.png,.tiff,.doc,.docx,.txt,.odt,.xls,.xlsx,.pdf,.ppt,.pptx,.pps,.ppsx,.mp3,.m4a,.ogg,.wav,.mp4,.m4v,.mov,.wmv,.flv,.avi,.mpg,.ogv,.3gp,.3g2",
		max_file_size: 52428800,
		max_file_size_ui: "50MB"
	};

	var upload_info_680273429 = {
		accepted_file_types: /(\.|\/)(gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2)$/i,
		accepted_file_types_ui : ".gif,.jpeg,.jpg,.png,.tiff,.doc,.docx,.txt,.odt,.xls,.xlsx,.pdf,.ppt,.pptx,.pps,.ppsx,.mp3,.m4a,.ogg,.wav,.mp4,.m4v,.mov,.wmv,.flv,.avi,.mpg,.ogv,.3gp,.3g2",
		max_file_size: 52428800,
		max_file_size_ui: "50MB"
	};

	var upload_info_1049547211 = {
		accepted_file_types: /(\.|\/)(gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2)$/i,
		accepted_file_types_ui : ".gif,.jpeg,.jpg,.png,.tiff,.doc,.docx,.txt,.odt,.xls,.xlsx,.pdf,.ppt,.pptx,.pps,.ppsx,.mp3,.m4a,.ogg,.wav,.mp4,.m4v,.mov,.wmv,.flv,.avi,.mpg,.ogv,.3gp,.3g2",
		max_file_size: 52428800,
		max_file_size_ui: "50MB"
	};

	var upload_info_1029029082 = {
		accepted_file_types: /(\.|\/)(gif|jpeg|jpg|png|tiff|doc|docx|txt|odt|xls|xlsx|pdf|ppt|pptx|pps|ppsx|mp3|m4a|ogg|wav|mp4|m4v|mov|wmv|flv|avi|mpg|ogv|3gp|3g2)$/i,
		accepted_file_types_ui : ".gif,.jpeg,.jpg,.png,.tiff,.doc,.docx,.txt,.odt,.xls,.xlsx,.pdf,.ppt,.pptx,.pps,.ppsx,.mp3,.m4a,.ogg,.wav,.mp4,.m4v,.mov,.wmv,.flv,.avi,.mpg,.ogv,.3gp,.3g2",
		max_file_size: 52428800,
		max_file_size_ui: "50MB"
	};

	var string_upload_file 	= "Subir un archivo";
	var string_delete_file 	= "Eliminando archivo";
	var string_progress 			= "Progreso: ";
	var error_on_uploading 			= "Ha ocurrido un error al intentar subir el archivo.";
	var message_prompt_delete_file 	= "Estas seguro que quieres eliminar este archivo?";

	var error_max_number_of_files 	= "Solo puedes subir un archivo a la vez.";
	var error_accept_file_types 	= "No se permite este tipo de extension.";
	var error_max_file_size 		= "El archivo excede el tamaño 50MB que fue especificado.";
	var error_min_file_size 		= "No puedes subir un arvhivo vacio.";

	var base_url = "<?php echo site_url();?>/";
	var upload_a_file_string = "Subir un archivo";
	
		
</script>
<head>
	<h1> Registrar Nuevo migrante </h1>
	
</head>



<div class="container" ng-app="ReporteApp">
	<form action="<?php echo site_url();?>/admin/migrantes/insert" method="post" id="addReport-step1" autocomplete="on" 
		  enctype="multipart/form-data" accept-charset="utf-8" ng-controller="MigranteCtrl">		
		
		<div class='ui-widget-content ui-corner-all datatables' id="migrantes-accordion">
			<h3 class="ui-accordion-header ui-helper-reset ui-state-default form-title">
				<div class='floatL form-title-left'>
					<a href="#"> Paso 1: Datos de los migrantes involucrados </a>
				</div>
				<div class='clear'></div>
			</h3>

			<div class='form-content form-div'>
					<div class='form-field-box odd' id="nombre_field_box">
						<div class='form-display-as-box' id="nombre_display_as_box">
							Nombre<span class='required'>*</span> :
						</div>
						<div class='form-input-box' id="nombre_input_box">
							<input id='field-nombre' name='nombre' ng-model="nombre_migrante" type='text' value="" maxlength='255'  />			
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="id_pais_field_box">
						<div class='form-display-as-box' id="id_pais_display_as_box">
							País<span class='required'>*</span> :
						</div>
						<div class='form-input-box' id="id_pais_input_box">
							<select id='field-id_pais' name='id_pais' ng-model="id_pais_migrante" class='chosen-select' data-placeholder='Seleccionar País' style='width:300px'>
								<option value='Dato no disponible'></option>
								<?php foreach ($paises->result_array() as $row) echo "<option value='" . $row['id_pais'] . "'>" . $row['nombre'] . "</option>"; ?>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box odd' id="id_estado_field_box">
						<div class='form-display-as-box' id="id_estado_display_as_box">
							Estado/Departamento :
						</div>
						<div class='form-input-box' id="id_estado_input_box">
							<select id='field-id_estado' name='id_estado' ng-model="id_estado_migrante" class='chosen-select' data-placeholder='Seleccionar Estado/Departamento' style='width:300px'>
								<option value='Dato no disponible'></option>
								<?php foreach ($estados->result_array() as $row) echo "<option value='" . $row['id_estado'] . "'>" . $row['nombre'] . "</option>"; ?>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box even' id="municipio_field_box">
						<div class='form-display-as-box' id="municipio_display_as_box">
							Municipio :
						</div>
						<div class='form-input-box' id="municipio_input_box">
							<input id='field-municipio' name='municipio' ng-model="municipio_migrante" type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box odd' id="id_genero_field_box">
						<div class='form-display-as-box' id="id_genero_display_as_box">
							Género<span class='required'>*</span> :
						</div>
						<div class='form-input-box' id="id_genero_input_box">
							<select id='field-id_genero'  name='id_genero' ng-model="id_genero_migrante" class='chosen-select' data-placeholder='Seleccionar Género' style='width:300px'>
								<option value='Dato no disponible'></option>
								<option value='1'  >Masculino</option>
								<option value='2'  >Femenino</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box even' id="edad_field_box">
						<div class='form-display-as-box' id="edad_display_as_box">
							Edad<span class='required'>*</span> :
						</div>
						<div class='form-input-box' id="edad_input_box">
							<input id='field-edad' name='edad' type='text' ng-model="edad_migrante" value='' min=1 class='numeric' maxlength='11' />				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box odd' id="fecha_nacimiento_field_box">
						<div class='form-display-as-box' id="fecha_nacimiento_display_as_box">
							Fecha nacimiento :
						</div>
						<div class='form-input-box' id="fecha_nacimiento_input_box">
							<input id='field-fecha_nacimiento' name='fecha_nacimiento' ng-model="fecha_nac_migrante" type='text' value='' maxlength='19' class='datetime-input' placeholder="dd/mm/aaaa hh:mm"/>
							<a class='datetime-input-clear' tabindex='-1'>Resetear</a> 			
						</div>
						<div class='clear'></div>
					</div>
			
					<div class='form-field-box even' id="ocupacion_field_box">
						<div class='form-display-as-box' id="ocupacion_display_as_box">
							Ocupacion :
						</div>
						<div class='form-input-box' id="ocupacion_input_box">
							<input id='field-ocupacion' name='ocupacion' ng-model="ocupacion_migrante" type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
						<div class='form-display-as-box' id="ocupacion_display_as_box"> </div>
						<div class='form-input-box' id="ocupacion_homologada_input_box">
							<select id='field-ocupacion_homologada' name='ocupacion_homologada'  ng-model="ocupacion_homologada_migrante" class='chosen-select' data-placeholder='¿En que categoría ubica esta ocupación?'>
								<option value=''  ></option>
								<option value='Al hogar'  >Al hogar</option>
								<option value='Albañil'  >Albañil</option>
								<option value='Campesino'  >Campesino</option>
								<option value='Comerciante'  >Comerciante</option>
								<option value='Empleado'  >Empleado</option>
								<option value='Empleado de gobierno'  >Empleado de gobierno</option>
								<option value='Jornalero'  >Jornalero</option>
								<option value='Obrero'  >Obrero</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box odd' id="id_estado_civil_field_box">
						<div class='form-display-as-box' id="id_estado_civil_display_as_box">
							Estado Civil :
						</div>
						<div class='form-input-box' id="id_estado_civil_input_box">
							<select id='field-id_estado_civil'  name='id_estado_civil' ng-model="id_estado_civil_migrante" class='chosen-select' data-placeholder='Seleccionar Estado Civil' style='width:300px'>
								<option value='Dato no disponible'></option>
								<option value='1'  >Soltera(o)</option>
								<option value='2'  >Casada(o)</option>
								<option value='3'  >Viuda(o)</option>
								<option value='4'  >Unión libre</option>
								<option value='5'  >Divorciada(o)</option>
								<option value='6'  >Otro</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box even' id="escolaridad_field_box">
						<div class='form-display-as-box' id="escolaridad_display_as_box">
							Escolaridad :
						</div>
						<div class='form-input-box' id="escolaridad_input_box">
							<select id='field-escolaridad' name='escolaridad' ng-model="escolaridad_migrante" class='chosen-select' data-placeholder='Seleccionar Escolaridad'>
								<option value='Dato no disponible'></option>
								<option value='Primaria'>Primaria</option>
								<option value='Secundaria'>Secundaria</option>
								<option value='Preparatoria'>Preparatoria</option>
								<option value='Licenciatura'>Licenciatura</option>
								<option value='Primaria inconclusa'>Primaria inconclusa</option>
								<option value='Secundaria inconclusa'>Secundaria inconclusa</option>
								<option value='Preparatoria inconclusa'>Preparatoria inconclusa</option>
								<option value='Licenciatura inconclusa'>Licenciatura inconclusa</option>
								<option value='Sin instrucción'>Sin instrucción</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box odd' id="pueblo_indigena_field_box">
						<div class='form-display-as-box' id="pueblo_indigena_display_as_box">
							Pertenece a algún pueblo indígena :
						</div>
						<div class='form-input-box' id="pueblo_indigena_input_box">
							<select id='field-pueblo_indigena' name='pueblo_indigena' ng-model="pueblo_indigena_migrante" class='chosen-select' data-placeholder='Seleccionar Pertenece a algún pueblo indígena'>
								<option value=''  ></option>
							<option value='Dato no disponible'  ></option>
								<option value='1'  >Si</option>
								<option value='2'  >No</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="nombre_pueblo_indigena_field_box">
						<div class='form-display-as-box' id="nombre_pueblo_indigena_display_as_box">
							Nombre pueblo indigena :
						</div>
						<div class='form-input-box' id="nombre_input_box">
							<input id='field-nombre_pueblo_indigena' name='nombre_pueblo_indigena' ng-model="nombre_pueblo_indigena_migrante" type='text' value="" maxlength='15' />				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box odd' id="espanol_field_box">
						<div class='form-display-as-box' id="espanol_display_as_box">
							Dominio del español :
						</div>
						<div class='form-input-box' id="espanol_input_box">
							<select id='field-espanol' name='espanol'  ng-model="espanol_migrante" class='chosen-select' data-placeholder='Seleccionar Dominio del español'>
								<option value=''  ></option>
							<option value='Dato no disponible'  ></option>
								<option value='0'  >No Aplica</option>
								<option value='1'  >Si</option>
								<option value='2'  >No</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box even' id="id_lugar_denuncia_field_box">
						<div class='form-display-as-box' id="id_lugar_denuncia_display_as_box">
							Lugar de la organización :
						</div>
						<div class='form-input-box' id="id_lugar_denuncia_input_box">
							<select id='field-id_lugar_denuncia'  name='id_lugar_denuncia' ng-model="id_lugar_denuncia_migrante" class='chosen-select' data-placeholder='Seleccionar Lugar de la organización'>
								<option value='Dato no disponible'></option>
								<option value='1'  >Nogales, Sonora</option>
								<option value='2'  >Agua Prieta, Sonora</option>
								<option value='3'  >Altar, Sonora</option>
							</select>				
						</div>
						<div class='clear'></div>
						<div class='line-1px'></div>
						<div id='report-error' class='report-div error'></div>
						<div id='report-success' class='report-div success'></div>
					</div>

					<div class='buttons-box'>

						<div class='form-button-box'>
							<input type='button' value='Cancelar' class='ui-input-button cancel-and-go-back-button' />
						</div>

						<div class='form-button-box'>
							<input type='submit' value='Guardar migrante' ng-click="clear_migrante()" class='ui-input-button' id="save-and-go-next-button"/>
						</div>

						<div class='form-button-box'>
							<input type='button' value='Ir a Agregar Denuncia >>' class='ui-input-button' id='go-next-button' />
						</div>

						<div class='form-button-box loading-box'>
							<div class='small-loading' id='FormLoading'>Cargando, guardando los datos...</div>
						</div>

						<div class='clear'></div>
					</div>
		</div>

		</div>
	</form>

	<form action="<?php echo site_url();?>/admin/denuncias/insert" method="post" id="addReport-step2" autocomplete="on" 
		  enctype="multipart/form-data" accept-charset="utf-8" ng-controller="DenunciaCtrl">		

			<div class='ui-widget-content ui-corner-all datatables' id="denuncias-accordion">
				<h3 class="ui-accordion-header ui-helper-reset ui-state-default form-title">
					<div class='floatL form-title-left'>
						<a href="#">Añadir Denuncias</a>
					</div>
					<div class='clear'></div>
				</h3>
				
				<div class='form-content form-div'>
					<div class='form-field-box odd' id="nombre_persona_atendio_seguimiento_field_box">
						<div class='form-display-as-box' id="nombre_persona_atendio_seguimiento_display_as_box">
							Nombre de la persona que atendio el caso<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="nombre_persona_atendio_seguimiento_input_box">
							<input id='field-nombre_persona_atendio_seguimiento' name='nombre_persona_atendio_seguimiento' ng-model='nombre_persona_atendio_seguimiento' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="fecha_creada_field_box">
						<div class='form-display-as-box' id="fecha_creada_display_as_box">
							Fecha que se recibió la queja<span class='required'>*</span>  :
						</div>
						<div class='form-input-box' id="fecha_creada_input_box">
							<input id='field-fecha_creada' name='fecha_creada' ng-model='fecha_creada' type='text' value='' maxlength='19' class='datetime-input' placeholder="dd/mm/aaaa hh:mm"/>
							<a class='datetime-input-clear' tabindex='-1'>Resetear</a>	
						</div>
						<div class='clear'></div>
					</div>
									
					<!--div class='form-field-box odd' id="id_lugar_denuncia_field_box">
						<div class='form-display-as-box' id="id_lugar_denuncia_display_as_box">
							Lugar de denuncia :
						</div>
						<div class='form-input-box' id="id_lugar_denuncia_input_box">
							<select id='field-id_lugar_denuncia_'  name='id_lugar_denuncia' ng-model='id_lugar_denuncia_' class='chosen-select' data-placeholder='Seleccionar Lugar de denuncia' style="width:300px;">
								<option value='Dato no disponible'></option>
								<option value='1'  >Nogales, Sonora</option>
								<option value='2'  >Agua Prieta, Sonora</option>
								<option value='3'  >Altar, Sonora</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div-->

					<div class='form-field-box odd' id="id_tipo_queja_field_box">
						<div class='form-display-as-box' id="id_tipo_queja_display_as_box">
							Tipo de queja :
						</div>
						<div class='form-input-box' id="id_tipo_queja_input_box">
							<select id='field-id_tipo_queja'  name='id_tipo_queja' ng-model='id_tipo_queja' class='chosen-select' data-placeholder='Seleccionar Tipo de queja' >
								<option value='Dato no disponible'> </option>
								<option value='1'>Individual</option>
								<option value='2'>Grupal</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
				
					<div class='form-field-box odd' id="migrantes_field_box">
						<div class='form-display-as-box' id="migrantes_display_as_box">
							Migrantes <span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="migrantes_input_box">
							<select id='field-migrantes' name='migrantes[]'  ng-model='migrantes' multiple='multiple' size='8' 
									class='chosen-multiple-select' data-placeholder='Seleccionar Migrantes' style='width:510px;' >
								<!--option value='Dato no disponible'></option><option value='1'>Abel Chavez Villa</option><option value='72'>Adali Alvarez Flores</option><option value='212'>Adrián García de la Rosa</option><option value='154'>Alejandro Adrián Díaz Quiroz</option><option value='133'>Alex David</option><option value='130'>ALM</option><option value='41'>Álvaro Julián Ochoa Vera</option><option value='129'>Anderson</option><option value='144'>Anderson 2</option><option value='62'>Andrés Romero Alas </option><option value='63'>Andrés Ruiz Mendoza</option><option value='76'>Ángel Rubén Rodríguez González</option><option value='44'>Aniceto Damián</option><option value='196'>Anónimo</option><option value='209'>Anónimo</option><option value='68'>Anonio Canalaes Cabrera</option><option value='22'>Anselmo Calyn Apen</option><option value='43'>Antonio Esteban Sánchez</option><option value='9'>Apolinar Pacheco Reyes</option><option value='135'>Apoloni</option><option value='38'>Armando Hernandez</option><option value='136'>Bairo</option><option value='138'>Bairo Jesús Guevara</option><option value='73'>Cándido Flores  Lorenzo</option><option value='88'>Carlos Antonio Rosales Rosales</option><option value='56'>Carlos Emilio Flores Marte </option><option value='55'>Carlos Humberto Posadas</option><option value='53'>Carlos Márquez</option><option value='198'>Carlos Martínez</option><option value='110'>Carlos Martinez Gonzalez</option><option value='107'>Carlos Morales</option><option value='12'>Carlos Salgado Valdez </option><option value='117'>Cecilia Mones</option><option value='123'>Celvin Antonio</option><option value='124'>Cipriano Rodríguez González</option><option value='37'>Claudia Perez</option><option value='47'>Cristián Goel Meléndez Rivas</option><option value='119'>Damián Pacheco</option><option value='29'>Darwin Canales López</option><option value='193'>David Barrera Álvarez</option><option value='74'>Delvin Arain Hernandez Redondo </option><option value='145'>Denis Roberto Vázquez</option><option value='34'>Elder Díaz</option><option value='184'>Elias Madris Silva</option><option value='35'>Elvin Emilio Vázquez</option><option value='146'>Emilio Vázquez</option><option value='194'>Eric García Aguilar</option><option value='208'>Erik Fernando Salas</option><option value='66'>Erminio Cartagena Hernandez</option><option value='16'>Ever Casco </option><option value='173'>Exel Arnulfo Teque Pivaral</option><option value='126'>Fausto Vidal L.</option><option value='211'>Félix Fernández</option><option value='167'>Florentino Oliva Santiago</option><option value='58'>Fraklin Alexander </option><option value='195'>Francisco Alfredo Hernández Chávez</option><option value='116'>Francisco Javier Martínez</option><option value='147'>Francisco Javier Martínez</option><option value='31'>Franco Eduardo López Domínguez</option><option value='30'>Franklin Ezequiel Alvarado</option><option value='165'>Gabriela Ortega Téllez</option><option value='155'>Gandhi Raúl Cano Cano</option><option value='170'>Gerardo Guzmán Burgos</option><option value='201'>Gladis Cruz</option><option value='52'>Gregorio Gómez Hernández</option><option value='8'>Guillermo</option><option value='42'>Guillermo Gómez Vásques</option><option value='33'>Gustavo Adolfo Molina</option><option value='164'>Horacio Mendoza Torres</option><option value='186'>Ignacio Hernández Hernández</option><option value='169'>iveth diaz hernandez</option><option value='200'>Javier Torres</option><option value='137'>Jesús Ernesto</option><option value='168'>Jesús Gutiérrez Martínez</option><option value='187'>Jibran Felix Pazos</option><option value='25'>Joel Barragán Mendoza</option><option value='148'>Johan Manzanares</option><option value='1'>Jonatan Morales</option><option value='174'>Jorge Antonio</option><option value='175'>Jorge Cadena</option><option value='141'>Jorge Rolando Vargas Cantarero</option><option value='134'>Jorge Vargas</option><option value='181'>José Guadalupe Jiménez Juárez</option><option value='28'>José Guadalupe Ramírez López</option><option value='84'>Jose Hernan Cardenas Rios</option><option value='4'>José Hernández Velázquez</option><option value='60'>José Luis </option><option value='75'>Jose Luis Flores Flores</option><option value='26'>José Luís Herrera Herrera</option><option value='207'>José Ramón Pérez Gómez</option><option value='14'>José Vega </option><option value='120'>José Vega</option><option value='159'>Josue Raul Hernandez Morales</option><option value='188'>Jovany Carrera Hernández</option><option value='23'>Juan Armando Mendez Gonzalez</option><option value='2'>Juan Manuel González Sánchez</option><option value='114'>Juan Manuel Luevano Dávila</option><option value='103'>Juan Manuel Orozco Romero </option><option value='108'>Juan Pablo Castellano Marin</option><option value='24'>Juan Ramírez Martínez</option><option value='82'>Juvencio Hernandez Lopez </option><option value='7'>Kader Orellana Flores</option><option value='40'>Kevin  Argueta </option><option value='13'>Kevin Usiel Pèrez Rodríguez</option><option value='61'>Leonardo García Paz</option><option value='39'>Leoncio Martínez</option><option value='59'>Lilia</option><option value='192'>Luciana Calvo </option><option value='140'>Lucio Castillo</option><option value='158'>Luis Alonso Quintanilla</option><option value='128'>Luis Daniel</option><option value='199'>Ma. Magdalena Díaz Verdugo</option><option value='49'>Manuel de Jesús Hernández</option><option value='204'>Manuel Gubera</option><option value='203'>Manuel Zuniga Mendoza</option><option value='51'>Marco Antonio Morales Río </option><option value='106'>Marcos Rodríguez Oliva</option><option value='157'>Maria Melina </option><option value='160'>María Melina Beltran Victoriano</option><option value='132'>Maricela Silverio Mendoza</option><option value='131'>Marina Arcos</option><option value='180'>Mario Moreno</option><option value='213'>Marvin Antonio Cárdenas Candia</option><option value='46'>Melesio Morán Peña</option><option value='87'>Melvin Geovany Elvir Vega</option><option value='121'>Melvin Waldemar Meza del Cid</option><option value='185'>Miguel</option><option value='11'>Miguel ángel </option><option value='197'>Miguel Angel Diaz Lira</option><option value='21'>Moisés Rivera Rodríguez</option><option value='101'>Moises Rivera Rodriguez</option><option value='191'>Nancy Carolina Galindo Martínez</option><option value='118'>Natividad de Jesús</option><option value='206'>Nelson Ecarro</option><option value='100'>Nelson Enrique Martínez Peralta</option><option value='83'>Nery Ramirez Cardona</option><option value='70'>Nestor Velazquez Ramirez</option><option value='156'>Nicolas Morales Ambrosio</option><option value='142'>Noe Cante Saint</option><option value='27'>Noé Cante Sanit</option><option value='122'>Oscar Armando Benítez</option><option value='152'>Oscar Gael Coronel Morales</option><option value='163'>Oswaldo Ríos Martínez</option><option value='149'>Ovidio Marín </option><option value='85'>Pascual Tomas Arredondo</option><option value='86'>Pascual Tomas Hernandez</option><option value='202'>Pedro Ruiz Rivera</option><option value='109'>Perfecto Cristobal Perez Gonzalez</option><option value='17'>Rafael Mada Lastra </option><option value='115'>Ramón Ramírez Romero</option><option value='45'>Renato Ramírez</option><option value='179'>René Javier Cruz</option><option value='171'>Reyna José Miguel</option><option value='3'>Ricardo Martínez</option><option value='162'>Rigoberto Palafox</option><option value='176'>Roberto Quintero Chávez</option><option value='210'>Rolando Frías</option><option value='151'>Rosa Maria Velez Amaro</option><option value='69'>Rubén Quiñonez Villarreal</option><option value='172'>Sergio Lucio</option><option value='178'>Sergio Manuel Ramirez Gutierrez</option><option value='150'>Simón Costrero Barrán</option><option value='161'>Tomás Eugenio Torres Hernández</option><option value='20'>Toribio Jesús López</option><option value='18'>Toribio Velázquez Santos </option><option value='205'>Víctor</option><option value='112'>Wilbert</option><option value='127'>Wilbert Madrid</option><option value='19'>Wilmer Alexis Montoya </option><option value='32'>Yeims James</option><option value='15'>Zaul Rivas </option-->
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<!--div class='form-field-box odd' id="paquete_pago_field_box">
						<div class='form-display-as-box' id="paquete_pago_display_as_box">
							Que incluía el pago :
						</div>
						<div class='form-input-box' id="paquete_pago_input_box">
							<select id='field-paquete_pago' name='paquete_pago[]' ng-model='paquete_pago' multiple='multiple' size='8' 
									class='chosen-multiple-select' data-placeholder='Seleccionar que incluía el pago' style='width:510px;' >
								<option value='Dato no disponible'></option>
								<option value='1'>Hospedaje</option>
								<option value='2'>Transporte</option>
								<option value='3'>Alimentación</option>
								<option value='4'>Pago de cuotas a la mafia</option>
								<option value='5'>No especificó</option>
								<option value='6'>Sólo cruce</option>
								<option value='7'>Cruce</option>
							</select>				
						</div>
					</div-->

					<!--div class='form-field-box even' id="intentos_field_box">
						<div class='form-display-as-box' id="intentos_display_as_box">
							Cuántas veces has intentado cruzar la frontera :
						</div>
						<div class='form-input-box' id="intentos_input_box">
							<input id='field-intentos' name='intentos' ng-model='intentos' type='text' value='' class='numeric' maxlength='11' />				
						</div>
						<div class='clear'></div>
					</div-->
				
					<div class='form-field-box odd' id="motivo_migracion_field_box">
						<div class='form-display-as-box' id="motivo_migracion_display_as_box">
							Cuál es el motivo de migración :
						</div>
						<div class='form-input-box' id="motivo_migracion_input_box">
							<select id='field-motivo_migracion' name='motivo_migracion' ng-model='motivo_migracion' class='chosen-select' data-placeholder='Seleccionar Cuál es el motivo de migración' style='width:300px'>
								<option value=''  ></option>
								<option value='Dato no disponible'></option>
								<option value='Razones económicas'>Razones económicas</option>
								<option value='Violencia/Seguridad'>Violencia/Seguridad</option>
								<option value='Reunificación familiar'>Reunificación familiar</option>
								<option value='Dato no disponible'  ></option>
								<option value='Otro'>Otro</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
				
					<div class='form-field-box even' id="coyote_guia_field_box">
						<div class='form-display-as-box' id="coyote_guia_display_as_box">
							Contrato coyote o guía para cruzar :
						</div>
						<div class='form-input-box' id="coyote_guia_input_box">
							<select id='field-coyote_guia' name='coyote_guia' ng-model='coyote_guia' class='chosen-select' data-placeholder='Seleccionar Contrato al coyote o guía que lo pasaría'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option>
								<option value='1'  >Si</option>
								<option value='2'  >No</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="lugar_contrato_coyote_field_box">
						<div class='form-display-as-box' id="lugar_contrato_coyote_display_as_box">
							Donde lo contrato :
						</div>
						<div class='form-input-box' id="lugar_contrato_coyote_input_box">
							<select id='field-lugar_contrato_coyote' name='lugar_contrato_coyote' ng-model='lugar_contrato_coyote' class='chosen-select' data-placeholder='Seleccionar Donde lo contrato'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option>
								<option value='Cuando salió de su comunidad'> Cuando salió de su comunidad</option>
								<option value='En  la frontera'  >En  la frontera</option>
								<option value='En el trayecto'  >En el trayecto</option>
								<option value='Otro'  >Otro</option>
								<option value='No Aplica'  >No Aplica</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="monto_coyote_field_box">
						<div class='form-display-as-box' id="monto_coyote_display_as_box">
							Cuanto le cobraría :
						</div>
						<div class='form-input-box' id="monto_coyote_input_box">
							<input id='field-monto_coyote' name='monto_coyote' ng-model='monto_coyote' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="paquete_pago_field_box">
						<div class='form-display-as-box' id="paquete_pago_display_as_box">
							Que incluía el pago :
						</div>
						<div class='form-input-box' id="paquete_pago_input_box">
							<select id='field-paquete_pago' name='paquete_pago[]' ng-model='paquete_pago' multiple='multiple' size='8' 
											class='chosen-multiple-select' data-placeholder='Seleccionar Que incluía el pago' style='width:510px;' >
								<option value='Dato no disponible'></option>
								<option value='1'>Hospedaje</option>
								<option value='2'>Transporte</option>
								<option value='3'>Alimentación</option>
								<option value='4'>Pago de cuotas a la mafia</option>
								<option value='5'>No especificó</option>
								<option value='6'>Sólo cruce</option>
								<option value='7'>Cruce</option>
								<option value='No Aplica'>No Aplica</option>
							</select>				
						</div>
					</div>

					<!--div class='form-field-box even' id="nombre_punto_fronterizo_field_box">
						<div class='form-display-as-box' id="nombre_punto_fronterizo_display_as_box">
							Porque punto fronterizo cruzaste o vas a cruzar a USA :
						</div>
						<div class='form-input-box' id="nombre_punto_fronterizo_input_box">
							<select id='field-nombre_punto_fronterizo' name='nombre_punto_fronterizo' ng-model='nombre_punto_fronterizo' class='chosen-select' data-placeholder='Seleccionar el punto fronterizo'>
								<option value=''></option>
								<option value='Dato no disponible'></option>
								<option value='Sásabe'>Sásabe</option>
								<option value='Caborca'>Caborca</option>
								<option value='Naco'>Naco</option>
								<option value='Agua Prieta'>Agua Prieta</option>
								<option value='Nogales'>Nogales</option>
								<option value='Douglas'>Douglas</option>
								<option value='Algodones'>Algodones</option>
								<option value='Cananea'>Cananea</option>
								<option value='Mascareña'>Mascareña</option>
								<option value='Sonoyta '>Sonoyta </option>
								<option value='Tecate'>Tecate</option>
								<option value='Laredo'>Laredo</option>
								<option value='Mexicali'>Mexicali</option>
								<option value='Reynosa'>Reynosa</option>
								<option value='Piedras Negras'>Piedras Negras</option>
								<option value='Santa Cruz'>Santa Cruz</option>
								<option value='Tecate'>Tecate</option>
								<option value='Tijuana'>Tijuana</option>
							</select>					
						</div>
						<div class='clear'></div>
					</div-->

					<!--div class='form-field-box odd' id="lugar_de_usa_field_box">
						<div class='form-display-as-box' id="lugar_de_usa_display_as_box">
							A que lugar de USA vas :
						</div>
						<div class='form-input-box' id="lugar_de_usa_input_box">
							<input id='field-lugar_de_usa' name='lugar_de_usa' ng-model='lugar_de_usa' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div-->
					
					<div class='form-field-box even' id="viaja_solo_field_box">
						<div class='form-display-as-box' id="viaja_solo_display_as_box">
							Viaja solo<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="viaja_solo_input_box">
							<select id='field-viaja_solo' name='viaja_solo' ng-model='viaja_solo' class='chosen-select' data-placeholder='Seleccionar Viaja solo'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option><option value='1'  >Si</option><option value='2'  >No</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="con_quien_viaja_field_box">
						<div class='form-display-as-box' id="con_quien_viaja_display_as_box">
							Con quien viaja :
						</div>
						<div class='form-input-box' id="con_quien_viaja_input_box">
							<input id='field-con_quien_viaja' name='con_quien_viaja' ng-model='con_quien_viaja' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>

					
					<div class='form-field-box even' id="deportado_field_box">
						<div class='form-display-as-box' id="deportado_display_as_box">
							¿Cuál es su situación? <span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="deportado_input_box">
							<select id='field-deportado' name='deportado' ng-model='deportado' class='chosen-select' data-placeholder='Seleccionar Deportado'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option>
								<option value='1'  >Deportado</option>
								<option value='2'  >En tránsito a EUA</option>
								<option value='3'  >Migrante interno/jornalero</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="momento_deportado_field_box">
						<div class='form-display-as-box' id="momento_deportado_display_as_box">
							Donde fue deportado :
						</div>
						<div class='form-input-box' id="momento_deportado_input_box">
							<select id='field-momento_deportado' name='momento_deportado' ng-model='momento_deportado' class='chosen-select' data-placeholder='Seleccionar el lugar donde fue deportado'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option>
								<option value='Al cruzar la frontera'  >Al cruzar la frontera</option>
								<option value='Vivías en USA'  >Vivías en USA</option>
								<option value='Otro'  >Otro</option>
								<option value='No Aplica'  >No Aplica</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="separacion_familiar_field_box">
						<div class='form-display-as-box' id="separacion_familiar_display_as_box">
							Te separaron de algún familiar durante la deportación  :
						</div>
						<div class='form-input-box' id="separacion_familiar_input_box">
							<select id='field-separacion_familiar' name='separacion_familiar' ng-model='separacion_familiar' class='chosen-select' data-placeholder='Seleccionar Te separaron de algún familiar'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option>
								<option value='1'  >Si</option>
								<option value='2'  >No</option>
								<option value='No Aplica'  >No Aplica</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="familiar_separado_field_box">
						<div class='form-display-as-box' id="familiar_separado_display_as_box">
							Que familiar :
						</div>
						<div class='form-input-box' id="familiar_separado_input_box">
							<input id='field-familiar_separado' name='familiar_separado' ng-model='familiar_separado' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="situacion_familiar_field_box">
						<div class='form-display-as-box' id="situacion_familiar_display_as_box">
							Sabes que paso con tu familiar :
						</div>
						<div class='form-input-box' id="situacion_familiar_input_box">
							<select id='field-situacion_familiar' name='situacion_familiar' ng-model='situacion_familiar' class='chosen-select' data-placeholder='Selecciona la situación del familiar'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option>
								<option value='Deportado'>Deportado</option>
								<option value='Repatriado'>Repatriado</option>
								<option value='Detenido'>Detenido</option>
								<option value='Está en Estados Unidos'>Está en Estados Unidos</option>
								<option value='Otro'>Otro</option>
							</select>	
						</div>
						<div class='clear'></div>
					</div>

					<!--div class='form-field-box odd' id="acto_siguiente_field_box">
						<div class='form-display-as-box' id="acto_siguiente_display_as_box">
							Qué piensa hacer ahora :
						</div>
						<div class='form-input-box' id="acto_siguiente_input_box">
							<input id='field-acto_siguiente' name='acto_siguiente' ng-model='acto_siguiente' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div-->

					<div class='form-field-box odd' id="acto_siguiente_homologada_field_box">
						<div class='form-display-as-box' id="acto_siguiente_homologada_display_as_box">
							Qué piensa hacer ahora (categoria)<span class='required'>*</span>:
						</div>
						<div class="form-input-box odd" id="acto_siguiente_homologada_input_box">
							<select id="field-acto_siguiente_homologada" name="acto_siguiente_homologada" ng-model='acto_siguiente_homologada' class="chosen-select " data-placeholder="Seleccionar Qué piensa hacer ahora (categoría)" style="width:510px;">
								<option value=""></option>
								<option value="Cruzar otra vez">Cruzar otra vez</option>
								<option value="Regresar a mi comunidad de origen">Regresar a mi comunidad de origen</option>
								<option value="Regularizarse">Regularizarse</option>
								<option value="Buscar trabajo en México">Buscar trabajo en México</option>
								<option value="Otro">Otro</option>
								<option value="No sabe">No sabe</option>
								<option value="No aplica">No aplica</option>
							</select>
						</div>
					</div>

					<div class='form-field-box even' id="autoridades_viaje_field_box">
						<div class='form-display-as-box' id="autoridades_viaje_display_as_box">
							Durante el viaje con que actores te encontraste :
						</div>
						<div class='form-input-box' id="autoridades_viaje_input_box">
							<select id='field-autoridades_viaje' name='autoridades_viaje[]' ng-model='autoridades_viaje' multiple='multiple' size='8' class='chosen-multiple-select' data-placeholder='Seleccionar Durante el viaje con que actores te encontraste' style='width:510px;' >
								<option value='Dato no disponible'></option>
								<?php foreach ($autoridades->result_array() as $row) echo "<option value='" . $row['id_autoridad'] . "'>" . $row['nombre'] . "</option>"; ?>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="dano_autoridad_field_box">
						<div class='form-display-as-box' id="dano_autoridad_display_as_box">
							Alguno de los actores te causaron daño :
						</div>
						<div class='form-input-box' id="dano_autoridad_input_box">
							<select id='field-dano_autoridad' name='dano_autoridad' ng-model='dano_autoridad' class='chosen-select' data-placeholder='Seleccionar Alguna de las autores te causaron daño'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option><option value='1'  >Si</option><option value='2'  >No</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
			
					<div class='form-field-box odd' id="id_autoridad_dano_field_box">
						<div class='form-display-as-box' id="id_autoridad_dano_display_as_box">
							Quien es el responsable<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="id_autoridad	_dano_input_box">
							<select id='field-id_autoridad_dano'  name='id_autoridad_dano' ng-model='id_autoridad_dano' class='chosen-select' data-placeholder='Seleccionar Que actor lo hizo (principal responsable)' style='width:300px'>
								<option value='Dato no disponible'></option>
								<?php foreach ($autoridades->result_array() as $row) echo "<option value='" . $row['id_autoridad'] . "'>" . $row['nombre'] . "</option>"; ?>
								
							</select>				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box even' id="fecha_injusticia_field_box">
						<div class='form-display-as-box' id="fecha_injusticia_display_as_box">
							Cuándo se cometió la injusticia<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="fecha_injusticia_input_box">
							<input id='field-fecha_injusticia' name='fecha_injusticia' ng-model='fecha_injusticia' type='text' value='' maxlength='19' class='datetime-input' placeholder="dd/mm/aaaa hh:mm" />
							<a class='datetime-input-clear' tabindex='-1'>Resetear</a>	
						</div>
						<div class='clear'></div>
					</div>
				
					
					<div class='form-field-box even' id="id_pais_injusticia_field_box">
						<div class='form-display-as-box' id="id_pais_injusticia_display_as_box">
							País donde se cometió la injusticia :
						</div>
						<div class='form-input-box' id="id_pais_injusticia_input_box">
							<select id='field-id_pais_injusticia'  name='id_pais_injusticia' ng-model='id_pais_injusticia' class='chosen-select' data-placeholder='Seleccionar País donde se cometió la injusticia' style='width:300px'>
								<option value='Dato no disponible'></option>
								<?php foreach ($paises->result_array() as $row) echo "<option value='" . $row['id_pais'] . "'>" . $row['nombre'] . "</option>"; ?>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
				
					<div class='form-field-box odd' id="id_estado_injusticia_field_box">
						<div class='form-display-as-box' id="id_estado_injusticia_display_as_box">
							Estado donde se cometió la injusticia :
						</div>
						<div class='form-input-box' id="id_estado_injusticia_input_box">
							<select id='field-id_estado_injusticia'  name='id_estado_injusticia' ng-model='id_estado_injusticia' class='chosen-select' data-placeholder='Seleccionar Estado donde se cometió la injusticia' style='width:300px'>
								<option value='Dato no disponible'></option>
								<option value='1'  >Aguascalientes</option>
								<option value='2'  >Baja California</option>
								<option value='3'  >Baja California Sur</option>
								<option value='4'  >Campeche</option>
								<option value='5'  >Coahuila</option>
								<option value='6'  >Colima</option>
								<option value='7'  >Chiapas</option>
								<option value='8'  >Chihuahua</option>
								<option value='9'  >Distrito Federal</option>
								<option value='10'  >Durango</option>
								<option value='11'  >Guanajuato</option>
								<option value='12'  >Guerrero</option>
								<option value='13'  >Hidalgo</option>
								<option value='14'  >Jalisco</option>
								<option value='15'  >Edo. De México</option>
								<option value='16'  >Michoacán</option>
								<option value='17'  >Morelos</option>
								<option value='18'  >Nayarit</option>
								<option value='19'  >Nuevo León</option>
								<option value='20'  >Oaxaca</option>
								<option value='21'  >Puebla</option>
								<option value='22'  >Querétaro</option>
								<option value='23'  >Quintana Roo</option>
								<option value='24'  >San Luis Potosí</option>
								<option value='25'  >Sinaloa</option>
								<option value='26'  >Sonora</option>
								<option value='27'  >Tabasco</option>
								<option value='28'  >Tamaulipas</option>
								<option value='29'  >Tlaxcala</option>
								<option value='30'  >Veracruz</option>
								<option value='31'  >Yucatán</option>
								<option value='32'  >Zacatecas</option>
								<option value='33'  >Comayahua</option>
								<option value='34'  >Tegusigalpa</option>
								<option value='35'  >Huehuetenango</option>
								<option value='36'  >Choluteca</option>
								<option value='37'  >Arizona</option>
								<option value='38'  >Escuintla</option>
								<option value='39'  >Cortés</option>
								<option value='40'  >Francisco Morazán</option>
								<option value='41'  >Matagalpa</option>
								<option value='42'  >Suchitepéquez</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="municipio_injusticia_field_box">
						<div class='form-display-as-box' id="municipio_injusticia_display_as_box">
							Municipio donde se cometió la injusticia :
						</div>
						<div class='form-input-box' id="municipio_injusticia_input_box">
							<input id='field-municipio_injusticia' name='municipio_injusticia' ng-model='municipio_injusticia' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="espacio_fisico_injusticia_field_box">
						<!--div class='form-display-as-box' id="espacio_fisico_injusticia_display_as_box">
							Espacio físico de la injusticia :
						</div>
						<div class='form-input-box' id="espacio_fisico_injusticia_input_box">
								<input id='field-espacio_fisico_injusticia' name='espacio_fisico_injusticia' ng-model='espacio_fisico_injusticia' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div-->
						<div class='form-display-as-box' id="espacio_fisico_injusticia_homologada_display_as_box">
							Espacio físico de la injusticia (Categoría)<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="espacio_fisico_injusticia_homologada_input_box">
							<select id='field-espacio_fisico_injusticia_homologada' name='espacio_fisico_injusticia_homologada' ng-model='espacio_fisico_injusticia_homologada' class='chosen-select' data-placeholder='Seleccionar Espacio físico de la injusticia (Categoría)'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option>
								<option value='Carretera' > Carretera </option>
								<option value='Vías/abordo del tren' > Vías/abordo del tren </option>
								<option value='Cerca/en terminal de tren' > Cerca/en terminal de tren </option>
								<option value='Cerca/en terminal de autobús' > Cerca/en terminal de autobús </option>
								<option value='Cerca/en oficinas de gobierno' > Cerca/en oficinas de gobierno </option>
								<option value='Vía pública' > Vía pública </option>
								<option value='Otro' > Otro </option>
							</select>			
						</div>
						<div class='clear'></div>

					</div>
				

					<div class='form-field-box odd' id="id_transporte_viaje_injusticia_field_box">
						<div class='form-display-as-box' id="id_transporte_viaje_injusticia_display_as_box">
							En que viajaba<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="id_transporte_viaje_injusticia_input_box">
							<select id='field-id_transporte_viaje_injusticia'  name='id_transporte_viaje_injusticia' ng-model='id_transporte_viaje_injusticia' class='chosen-select' data-placeholder='Seleccionar En que viajaba' style='width:300px'>
								<option value='Dato no disponible'></option>
								<?php foreach ($transportes->result_array() as $row) echo "<option value='" . $row['id_transporte'] . "'>" . $row['nombre'] . "</option>"; ?>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="detonante_injusticia_field_box">
						<!--div class='form-display-as-box' id="detonante_injusticia_display_as_box">
							Situación que detona la injusticia
						</div>
						<div class='form-input-box' id="detonante_injusticia_input_box">
							<input id='field-detonante_injusticia' name='detonante_injusticia' ng-model='detonante_injusticia' type='text' value="" maxlength='255' />				
						</div-->
						<div class='clear'></div>
						<div class='form-display-as-box' id="detonante_injusticia_homologada_display_as_box">
							Situación que detona la injusticia (Categoría)<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="detonante_injusticia_homologada_input_box">
							<select id='field-detonante_injusticia_homologada' name='detonante_injusticia_homologada' ng-model='detonante_injusticia_homologada' class='chosen-select' data-placeholder='Seleccionar Situación que detona la injusticia (Categoría)'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option>
								<option value='2'  >Detectaron su aspecto de migrante</option>
								<option value='3'  >Falta administrativa</option>
								<option value='4'  >Falta de documentos</option>
								<option value='5'  >Intentar viajar</option>
								<option value='8'  >Revisión</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>


					<div class='form-field-box even' id="numero_migrantes_injusticia_field_box">
						<div class='form-display-as-box' id="numero_migrantes_injusticia_display_as_box">
							Número de migrantes que habia con usted cuando se cometió el abuso :
						</div>
						<div class='form-input-box' id="numero_migrantes_injusticia_input_box">
							<input id='field-numero_migrantes_injusticia' name='numero_migrantes_injusticia' ng-model='numero_migrantes_injusticia' type='text' value='' class='numeric' maxlength='11' />				
						</div>
						<div class='clear'></div>
					</div>

					<!--div class='form-field-box odd' id="lugar_abordaje_transporte_field_box">
						<div class='form-display-as-box' id="lugar_abordaje_transporte_display_as_box">
							Donde abordo el transporte :
						</div>
						<div class='form-input-box' id="lugar_abordaje_transporte_input_box">
							<input id='field-lugar_abordaje_transporte' name='lugar_abordaje_transporte' ng-model='lugar_abordaje_transporte' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div-->

					<!--div class='form-field-box even' id="destino_transporte_field_box">
						<div class='form-display-as-box' id="destino_transporte_display_as_box">
							Destino del transporte :
						</div>
						<div class='form-input-box' id="destino_transporte_input_box">
							<input id='field-destino_transporte' name='destino_transporte'  ng-model='destino_transporte' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div-->

					<!--div class='form-field-box odd' id="autoridades_responables_field_box">
						<div class='form-display-as-box' id="autoridades_responables_display_as_box">
							Nombre de las autoridades involucradas<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="autoridades_responables_input_box">
							<select id='field-autoridades_responables' name='autoridades_responables[]' ng-model='autoridades_responables' multiple='multiple' size='8' class='chosen-multiple-select' data-placeholder='Seleccionar Nombre de las instituciones involucradas' style='width:510px;' >
								<option value=""></option>
								<?php foreach ($autoridades->result_array() as $row) echo "<option value='" . $row['id_autoridad'] . "'>" . $row['nombre'] . "</option>"; ?>
							</select>				
						</div>
						<div class='clear'></div>
					</div-->
					
					<div class='form-field-box even' id="numero_oficiales_responsables_field_box">
						<div class='form-display-as-box' id="numero_oficiales_responsables_display_as_box">
							Número de oficiales responsables :
						</div>
						<div class='form-input-box' id="numero_oficiales_responsables_input_box">
							<input id='field-numero_oficiales_responsables' name='numero_oficiales_responsables' ng-model='numero_oficiales_responsables' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="algun_nombre_responsables_field_box">
						<div class='form-display-as-box' id="algun_nombre_responsables_display_as_box">
							Anote todos los datos que recuerde de los oficiales involucrados (nombres, apodos, características físicas, etc.) :
						</div>
						<div class='form-input-box' id="algun_nombre_responsables_input_box">
							<textarea id='field-algun_nombre_responsables' name='algun_nombre_responsables' ng-model='algun_nombre_responsables'  class='texteditor' ></textarea>				
						</div>
						<div class='clear'></div>
					</div>

					<!--div class='form-field-box odd' id="algun_nombre_responsables_field_box">
						<div class='form-display-as-box' id="algun_nombre_responsables_display_as_box">
							Escucho o sabe algún nombre de  los oficiales involucrados :
						</div>
						<div class='form-input-box' id="algun_nombre_responsables_input_box">
							<input id='field-algun_nombre_responsables' name='algun_nombre_responsables' ng-model='algun_nombre_responsables' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>
				
					<div class='form-field-box even' id="carcteristicas_ficias_policia_responsable_field_box">
						<div class='form-display-as-box' id="carcteristicas_ficias_policia_responsable_display_as_box">
							Características fìsicas oficial 1 :
						</div>
						<div class='form-input-box' id="carcteristicas_ficias_policia_responsable_input_box">
							<input id='field-carcteristicas_ficias_policia_responsable' name='carcteristicas_ficias_policia_responsable' ng-model='carcteristicas_ficias_policia_responsable' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="carcteristicas_ficias_policia_responsable2_field_box">
						<div class='form-display-as-box' id="carcteristicas_ficias_policia_responsable2_display_as_box">
							Características fìsicas oficial 2 :
						</div>
						<div class='form-input-box' id="carcteristicas_ficias_policia_responsable2_input_box">
							<input id='field-carcteristicas_ficias_policia_responsable2' name='carcteristicas_ficias_policia_responsable2' ng-model='carcteristicas_ficias_policia_responsable2' type='text' value="" maxlength='15' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="carcteristicas_ficias_policia_responsable3_field_box">
						<div class='form-display-as-box' id="carcteristicas_ficias_policia_responsable3_display_as_box">
							Características fìsicas oficial 3 :
						</div>
						<div class='form-input-box' id="carcteristicas_ficias_policia_responsable3_input_box">
							<input id='field-carcteristicas_ficias_policia_responsable3' name='carcteristicas_ficias_policia_responsable3' ng-model='carcteristicas_ficias_policia_responsable3' type='text' value="" maxlength='15' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="apodos_responsables_field_box">
						<div class='form-display-as-box' id="apodos_responsables_display_as_box">
							Escucho o sabe algún apodo de  los oficiales involucrados :
						</div>
						<div class='form-input-box' id="apodos_responsables_input_box">
							<input id='field-apodos_responsables' name='apodos_responsables' ng-model='apodos_responsables' type='text' value="" maxlength='255' />				</div>
						<div class='clear'></div>
					</div-->

					<div class='form-field-box even' id="uniformado_responsables_field_box">
						<div class='form-display-as-box' id="uniformado_responsables_display_as_box">
							Los responsables estaban uniformados :
						</div>
						<div class='form-input-box' id="uniformado_responsables_input_box">
							<select id='field-uniformado_responsables' name='uniformado_responsables' ng-model='uniformado_responsables' class='chosen-select' data-placeholder='Seleccionar Los responsables estaban uniformados'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option><option value='Si'  >Si</option><option value='No'  >No</option><option value='No vio'  >No vio</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="color_uniforme_responsables_field_box">
						<div class='form-display-as-box' id="color_uniforme_responsables_display_as_box">
							Color de uniforme de oficiales responsables :
						</div>
						<div class='form-input-box' id="color_uniforme_responsables_input_box">
							<input id='field-color_uniforme_responsables' name='color_uniforme_responsables' ng-model='color_uniforme_responsables' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="insignias_responsables_field_box">
						<div class='form-display-as-box' id="insignias_responsables_display_as_box">
							Insignias de uniforme de oficiales responsables :
						</div>
						<div class='form-input-box' id="insignias_responsables_input_box">
							<input id='field-insignias_responsables' name='insignias_responsables' ng-model='insignias_responsables' type='text' value="" maxlength='255' />				
						</div>					
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box odd' id="responsables_abordo_vehiculos_responsables_field_box">
						<div class='form-display-as-box' id="responsables_abordo_vehiculos_responsables_display_as_box">
							Iban a bordo de Vehículos :
						</div>
						<div class='form-input-box' id="responsables_abordo_vehiculos_responsables_input_box">
							<select id='field-responsables_abordo_vehiculos_responsables' name='responsables_abordo_vehiculos_responsables' ng-model='responsables_abordo_vehiculos_responsables' class='chosen-select' data-placeholder='Seleccionar Iban a bordo de Vehículos'>
								<option value=''  ></option>
								<option value='Dato no disponible'  ></option>
								<option value='Si'  >Si</option>
								<option value='No'  >No</option>
								<option value='No vio'  >No vio</option>
							</select>				
							</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="id_tipo_transporte_responsables_field_box">
						<div class='form-display-as-box' id="id_tipo_transporte_responsables_display_as_box">
							Tipo de vehículo :
						</div>
						<div class='form-input-box' id="id_tipo_transporte_responsables_input_box">
							<select id='field-id_tipo_transporte_responsables'  name='id_tipo_transporte_responsables' ng-model='id_tipo_transporte_responsables' class='chosen-select' data-placeholder='Seleccionar Tipo de vehículo' style='width:300px'>
								<option value='Dato no disponible'></option>
								<?php foreach ($transportes->result_array() as $row) echo "<option value='" . $row['id_transporte'] . "'>" . $row['nombre'] . "</option>"; ?>
								<option value='No aplica'>No Aplica</option>
								
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="numero_vehiculos_responsables_field_box">
						<div class='form-display-as-box' id="numero_vehiculos_responsables_display_as_box">
							Número de vehículos :
						</div>
						<div class='form-input-box' id="numero_vehiculos_responsables_input_box">
							<input id='field-numero_vehiculos_responsables' name='numero_vehiculos_responsables' ng-model='numero_vehiculos_responsables' type='text' value='' class='numeric' maxlength='11' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="placas_vehiculos_responsables_field_box">
						<div class='form-display-as-box' id="placas_vehiculos_responsables_display_as_box">
							Placas :
						</div>
						<div class='form-input-box' id="placas_vehiculos_responsables_input_box">
							<input id='field-placas_vehiculos_responsables' name='placas_vehiculos_responsables' ng-model='placas_vehiculos_responsables' type='text' value="" maxlength='45' />				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="descripcion_evento_field_box">
						<div class='form-display-as-box' id="descripcion_evento_display_as_box">
							Descipción del evento<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="descripcion_evento_input_box">
							<textarea id='field-descripcion_evento' name='descripcion_evento' ng-model='descripcion_evento' class='texteditor' ></textarea>				
						</div>
						<div class='clear'></div>
					</div>
			
					<div class='form-field-box even' id="monto_extorsion_field_box">
						<div class='form-display-as-box' id="monto_extorsion_display_as_box">
							En caso de robo/extorsión mencione el monto:
						</div>
						<div class='form-input-box' id="monto_extorsion_input_box">
							<input id='field-monto_extorsion' name='monto_extorsion' ng-model='monto_extorsion' type='text' value="" maxlength='255' />				</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="derechos_violados_field_box">
						<div class='form-display-as-box' id="derechos_violados_display_as_box">
							Derechos violados<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="derechos_violados_input_box">
							<select id='field-derechos_violados' name='derechos_violados[]' ng-model='derechos_violados' multiple='multiple' size='8' class='chosen-multiple-select' data-placeholder='Seleccionar Derechos violados' style='width:510px;' >
								<option value='Dato no disponible'></option>
								<option value='1'>A la Libertad Personal</option>
								<option value='2'>A la Integridad Personal</option>
								<option value='3'>Al debido Proceso Legal</option>
								<option value='4'>Al Patrimonio</option>
								<option value='5'>Al Trabajo</option>
								<option value='6'>A la Vida</option>
							</select>				</div>
							<div class='clear'></div>
					</div>

					<div class='form-field-box even' id="violaciones_derechos_field_box">
						<div class='form-display-as-box' id="violaciones_derechos_display_as_box">
							Violaciones derechos<span class='required'>*</span>:
						</div>
						<div class='form-input-box' id="violaciones_derechos_input_box">
							<select id='field-violaciones_derechos' name='violaciones_derechos[]' ng-model='violaciones_derechos' multiple='multiple' size='8' class='chosen-multiple-select' data-placeholder='Seleccionar Violaciones derechos' style='width:510px;' >
								<option value='Dato no disponible'></option>
								<option value='1'>Detención ilegal y/o arbitraria</option>
								<option value='2'>Omisión de poner inmediatamente a disposición de la autoridad competente a la persona</option>
								<option value='Dato no disponible'></option>
								<option value='Dato no disponible'></option>
								<option value='5'>Restricción al libre tránsito</option>
								<option value='6'>Falta de una defensa adecuada</option>
								<option value='7'>Falta de protección consular</option>
								<option value='8'>Falta de seguimiento a casos de abusos</option>
								<option value='9'>Tortura</option>
								<option value='10'>Tratos crueles Inhumanos y degradantes</option>
								<option value='11'>Amenazas</option>
								<option value='12'>Desaparición forzada</option>
								<option value='13'>Incomunicación</option>
								<option value='14'>Secuestro</option>
								<option value='15'>Trata de personas</option>
								<option value='16'>Multa indebida</option>
								<option value='17'>Multa excesiva</option>
								<option value='18'>Robo</option>
								<option value='19'>Daños</option>
								<option value='20'>Extorsión</option>
								<option value='21'>Despido injustificado</option>
								<option value='22'>Riesgo de trabajo</option>
								<option value='23'>Falta de herramientas técnicas</option>
								<option value='24'>Falta de equipamiento</option>
								<option value='25'>Salario digno, justo y equitativo</option>
								<option value='26'>Ejecución extrajudicial</option>
								<option value='27'>Falta de investigación a casos de abuso</option>
								<option value='28'>Trato discriminatorio</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="id_estado_caso_field_box">
						<div class='form-display-as-box' id="id_estado_caso_display_as_box">
							Estado actual del caso :
						</div>
						<div class='form-input-box' id="id_estado_caso_input_box">
							<select id='field-id_estado_caso'  name='id_estado_caso' ng-model='id_estado_caso' class='chosen-select' data-placeholder='Seleccionar Estado actual del caso' style='width:300px'>
								<option value='Dato no disponible'></option>
								<?php foreach ($estados_casos->result_array() as $row) echo "<option value='" . $row['id_estado_caso'] . "'>" . $row['nombre'] . "</option>"; ?>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="motivo_cerrado_field_box">
						<div class='form-display-as-box' id="motivo_cerrado_display_as_box">
							Motivo por el que se cerro el caso:
						</div>
						<div class='form-input-box' id="motivo_cerrado_input_box">
							<select id='field-motivo_cerrado'  name='motivo_cerrado' ng-model='motivo_cerrado' class='chosen-select' data-placeholder='Seleccionar motivo por el que se cerro el caso' style='width:300px'>
								<option value=''  ></option>
								<option value='Dato no disponible'></option>
								<option value='Por temor a represalias'  >Por temor a represalias</option>
								<option value='Por estar en tránsito'  >Por estar en tránsito</option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>

				
					<div class='form-field-box even' id="estado_seguimiento_field_box">
						<div class='form-display-as-box' id="estado_seguimiento_display_as_box">
							Acciones realizadas por la organización: 
						</div>
						<div class='form-input-box' id="estado_seguimiento_input_box">
							<select id='field-estado_seguimiento' name='estado_seguimiento' ng-model='estado_seguimiento' class='chosen-select' data-placeholder='Seleccionar Seguimiento'>
								<option value=''  ></option>
								<option value='Asesoría'> Asesoría </option>
								<option value='Dato no disponible'> Dato no disponible </option>
								<option value='Defensa – Denuncia PGJE'> Defensa – Denuncia PGJE </option>
								<option value='Defensa – Denuncia PGR'> Defensa – Denuncia PGR </option>
								<option value='Defensa – Queja CEDH'> Defensa – Queja CEDH </option>
								<option value='Defensa – Queja CNDH'> Defensa – Queja CNDH </option>
								<option value='Defensa – Juicio de Amparo'> Defensa – Juicio de Amparo </option>
								<option value='Defensa – Asilo en EUA'> Defensa – Asilo en EUA </option>
								<option value='Defensa – Asilo en México'> Defensa – Asilo en México </option>
								<option value='Defensa – Visa humanitaria'> Defensa – Visa humanitaria </option>
								<option value='Defensa – Otro trámite de regularización'> Defensa – Otro trámite de regularización </option>
								<option value='Integral – Medios'> Integral – Medios </option>
								<option value='Integral – Organismos Internacionales'> Integral – Organismos Internacionales </option>
							</select>				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box odd' id="notas_seguimiento_field_box">
						<div class='form-display-as-box' id="notas_seguimiento_display_as_box">
							Notas sobre el seguimiento :
						</div>
						<div class='form-input-box' id="notas_seguimiento_input_box">
							<input id='field-notas_seguimiento' name='notas_seguimiento' ng-model='notas_seguimiento' type='text' value="" maxlength='255' />				
						</div>
						<div class='clear'></div>
					</div>
				
					<div class='form-field-box even' id="telefono_seguimiento_field_box">
						<div class='form-display-as-box' id="telefono_seguimiento_display_as_box">
							Teléfono de contacto para seguimiento :
						</div>
						<div class='form-input-box' id="telefono_seguimiento_input_box">
							<input id='field-telefono_seguimiento' name='telefono_seguimiento' ng-model='telefono_seguimiento' type='text' value="" maxlength='45' />				</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="documento1_seguimiento_field_box">
						<div class='form-display-as-box' id="documento1_seguimiento_display_as_box">
							Documento adicional 1 :
						</div>
						<div class='form-input-box' id="documento1_seguimiento_input_box">
							<span class="fileinput-button qq-upload-button" id="upload-button-1886533685" style="">
								<span>Subir un archivo</span>
								<input type="file" name="s008231d3" class="gc-file-upload" rel="<?php echo site_url();?>/admin/denuncias/upload_file/documento1_seguimiento" id="1886533685">
								<input class="hidden-upload-input" type="hidden" name="documento1_seguimiento" value="" rel="s008231d3" />
							</span>
							<div id='uploader_1886533685' rel='1886533685' class='grocery-crud-uploader' style=''></div>
							<div id='success_1886533685' class='upload-success-url' style='display:none; padding-top:7px;'>
								<a href='<?php echo site_url();?>/../assets/uploads/files/' id='file_1886533685' class='open-file' target='_blank'></a> 
								<a href='javascript:void(0)' id='delete_1886533685' class='delete-anchor'>eliminar</a> 
							</div>
							<div style='clear:both'></div>
							<div id='loading-1886533685' style='display:none'>
								<span id='upload-state-message-1886533685'></span> 
								<span class='qq-upload-spinner'></span> 
								<span id='progress-1886533685'></span>
							</div>
							<div style='display:none'>
								<a href='<?php echo site_url();?>/admin/denuncias/upload_file/documento1_seguimiento' id='url_1886533685'></a>
							</div>
							<div style='display:none'>
								<a href='<?php echo site_url();?>/admin/denuncias/delete_file/documento1_seguimiento' id='delete_url_1886533685' rel='' ></a>
							</div>				
						</div>
						<div class='clear'></div>
					</div>
					
					<div class='form-field-box even' id="documento2_seguimiento_field_box">
						<div class='form-display-as-box' id="documento2_seguimiento_display_as_box">
							Documento adicional 2 :
						</div>
						<div class='form-input-box' id="documento2_seguimiento_input_box">
							<span class="fileinput-button qq-upload-button" id="upload-button-326692416" style="">
								<span>Subir un archivo</span>
								<input type="file" name="s9af4a019" class="gc-file-upload" rel="<?php echo site_url();?>/admin/denuncias/upload_file/documento2_seguimiento" id="326692416">
								<input class="hidden-upload-input" type="hidden" name="documento2_seguimiento" value="" rel="s9af4a019" />
							</span>
							<div id='uploader_326692416' rel='326692416' class='grocery-crud-uploader' style=''></div>
							<div id='success_326692416' class='upload-success-url' style='display:none; padding-top:7px;'>
								<a href='<?php echo site_url();?>/../assets/uploads/files/' id='file_326692416' class='open-file' target='_blank'></a> 
								<a href='javascript:void(0)' id='delete_326692416' class='delete-anchor'>eliminar</a> 
							</div>
							<div style='clear:both'></div>
							<div id='loading-326692416' style='display:none'>
								<span id='upload-state-message-326692416'></span> 
								<span class='qq-upload-spinner'></span> 
								<span id='progress-326692416'></span>
							</div>
							<div style='display:none'>
								<a href='<?php echo site_url();?>/admin/denuncias/upload_file/documento2_seguimiento' id='url_326692416'></a>
							</div>
							<div style='display:none'>
								<a href='<?php echo site_url();?>/admin/denuncias/delete_file/documento2_seguimiento' id='delete_url_326692416' rel='' ></a>
							</div>				
						</div>
						<div class='clear'></div>
					</div>

					<div class='form-field-box odd' id="documento3_seguimiento_field_box">
						<div class='form-display-as-box' id="documento3_seguimiento_display_as_box">
							Documento adicional 3 :
						</div>
						<div class='form-input-box' id="documento3_seguimiento_input_box">
							<span class="fileinput-button qq-upload-button" id="upload-button-50183926" style="">
								<span>Subir un archivo</span>
								<input type="file" name="s7e129420" class="gc-file-upload" rel="<?php echo site_url();?>/admin/denuncias/upload_file/documento3_seguimiento" id="50183926">
								<input class="hidden-upload-input" type="hidden" name="documento3_seguimiento" value="" rel="s7e129420" />
							</span>
							<div id='uploader_50183926' rel='50183926' class='grocery-crud-uploader' style=''></div>
							<div id='success_50183926' class='upload-success-url' style='display:none; padding-top:7px;'>
								<a href='<?php echo site_url();?>/../assets/uploads/files/' id='file_50183926' class='open-file' target='_blank'></a> 
								<a href='javascript:void(0)' id='delete_50183926' class='delete-anchor'>eliminar</a> 
							</div>
							<div style='clear:both'></div>
							<div id='loading-50183926' style='display:none'>
								<span id='upload-state-message-50183926'></span> 	
								<span class='qq-upload-spinner'></span> 
								<span id='progress-50183926'></span>
							</div>
							<div style='display:none'>
								<a href='<?php echo site_url();?>/admin/denuncias/upload_file/documento3_seguimiento' id='url_50183926'></a>
							</div>
							<div style='display:none'>
								<a href='<?php echo site_url();?>/admin/denuncias/delete_file/documento3_seguimiento' id='delete_url_50183926' rel='' ></a>
							</div>				
						</div>
						<div class='clear'></div>
					</div>
				
					<div class='form-field-box even' id="documento4_seguimiento_field_box">
						<div class='form-display-as-box' id="documento4_seguimiento_display_as_box">
							Documento adicional 4 :
						</div>
						<div class='form-input-box' id="documento4_seguimiento_input_box">
							<span class="fileinput-button qq-upload-button" id="upload-button-2062526969" style="">
								<span>Subir un archivo</span>
								<input type="file" name="sa92f009b" class="gc-file-upload" rel="<?php echo site_url();?>/admin/denuncias/upload_file/documento4_seguimiento" id="2062526969">
								<input class="hidden-upload-input" type="hidden" name="documento4_seguimiento" value="" rel="sa92f009b" />
							</span>
							<div id='uploader_2062526969' rel='2062526969' class='grocery-crud-uploader' style=''></div>
							<div id='success_2062526969' class='upload-success-url' style='display:none; padding-top:7px;'>
								<a href='<?php echo site_url();?>/../assets/uploads/files/' id='file_2062526969' class='open-file' target='_blank'></a> 
								<a href='javascript:void(0)' id='delete_2062526969' class='delete-anchor'>eliminar</a> </div>
								<div style='clear:both'></div>
								<div id='loading-2062526969' style='display:none'>
									<span id='upload-state-message-2062526969'></span> 
									<span class='qq-upload-spinner'></span> 
									<span id='progress-2062526969'></span>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/upload_file/documento4_seguimiento' id='url_2062526969'></a>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/delete_file/documento4_seguimiento' id='delete_url_2062526969' rel='' ></a>
								</div>				
							</div>
							<div class='clear'></div>
						</div>

						<div class='form-field-box odd' id="documento5_seguimiento_field_box">
							<div class='form-display-as-box' id="documento5_seguimiento_display_as_box">
								Documento adicional 5 :
							</div>
							<div class='form-input-box' id="documento5_seguimiento_input_box">
								<span class="fileinput-button qq-upload-button" id="upload-button-741464619" style="">
									<span>Subir un archivo</span>
									<input type="file" name="s7dd3ed65" class="gc-file-upload" rel="<?php echo site_url();?>/admin/denuncias/upload_file/documento5_seguimiento" id="741464619">
									<input class="hidden-upload-input" type="hidden" name="documento5_seguimiento" value="" rel="s7dd3ed65" />
								</span>
								<div id='uploader_741464619' rel='741464619' class='grocery-crud-uploader' style=''></div>
								<div id='success_741464619' class='upload-success-url' style='display:none; padding-top:7px;'>
									<a href='<?php echo site_url();?>/../assets/uploads/files/' id='file_741464619' class='open-file' target='_blank'></a> 
									<a href='javascript:void(0)' id='delete_741464619' class='delete-anchor'>eliminar</a> 
								</div>
								<div style='clear:both'></div>
								<div id='loading-741464619' style='display:none'>
									<span id='upload-state-message-741464619'></span> 
									<span class='qq-upload-spinner'></span> 
									<span id='progress-741464619'></span>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/upload_file/documento5_seguimiento' id='url_741464619'></a>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/delete_file/documento5_seguimiento' id='delete_url_741464619' rel='' ></a>
								</div>				
							</div>
							<div class='clear'></div>
						</div>
									
						<div class='form-field-box even' id="documento6_seguimiento_field_box">
							<div class='form-display-as-box' id="documento6_seguimiento_display_as_box">
								Multimedia adicional 1 :
							</div>
							<div class='form-input-box' id="documento6_seguimiento_input_box">
								<span class="fileinput-button qq-upload-button" id="upload-button-1256211452" style="">
									<span>Subir un archivo</span>
									<input type="file" name="s85e26f21" class="gc-file-upload" rel="<?php echo site_url();?>/admin/denuncias/upload_file/documento6_seguimiento" id="1256211452">
									<input class="hidden-upload-input" type="hidden" name="documento6_seguimiento" value="" rel="s85e26f21" />
								</span>
								<div id='uploader_1256211452' rel='1256211452' class='grocery-crud-uploader' style=''></div>
								<div id='success_1256211452' class='upload-success-url' style='display:none; padding-top:7px;'>
									<a href='<?php echo site_url();?>/../assets/uploads/files/' id='file_1256211452' class='open-file' target='_blank'></a> 
									<a href='javascript:void(0)' id='delete_1256211452' class='delete-anchor'>eliminar</a> 
								</div>
								<div style='clear:both'></div>
								<div id='loading-1256211452' style='display:none'>
									<span id='upload-state-message-1256211452'></span> 
									<span class='qq-upload-spinner'></span> 
									<span id='progress-1256211452'></span>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/upload_file/documento6_seguimiento' id='url_1256211452'></a>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/delete_file/documento6_seguimiento' id='delete_url_1256211452' rel='' ></a>
								</div>				
							</div>
							<div class='clear'></div>
						</div>

						<div class='form-field-box odd' id="documento7_seguimiento_field_box">
							<div class='form-display-as-box' id="documento7_seguimiento_display_as_box">
								Multimedia adicional 2 :
							</div>
							<div class='form-input-box' id="documento7_seguimiento_input_box">
								<span class="fileinput-button qq-upload-button" id="upload-button-673702828" style="">
									<span>Subir un archivo</span>
									<input type="file" name="s178548d2" class="gc-file-upload" rel="<?php echo site_url();?>/admin/denuncias/upload_file/documento7_seguimiento" id="673702828">
									<input class="hidden-upload-input" type="hidden" name="documento7_seguimiento" value="" rel="s178548d2" />
								</span>
								<div id='uploader_673702828' rel='673702828' class='grocery-crud-uploader' style=''></div>
									<div id='success_673702828' class='upload-success-url' style='display:none; padding-top:7px;'>
										<a href='<?php echo site_url();?>/../assets/uploads/files/' id='file_673702828' class='open-file' target='_blank'></a> 
										<a href='javascript:void(0)' id='delete_673702828' class='delete-anchor'>eliminar</a> 
									</div>
									<div style='clear:both'></div>
									<div id='loading-673702828' style='display:none'>
										<span id='upload-state-message-673702828'></span>
										<span class='qq-upload-spinner'></span> 
										<span id='progress-673702828'></span>
									</div>
									<div style='display:none'>
										<a href='<?php echo site_url();?>/admin/denuncias/upload_file/documento7_seguimiento' id='url_673702828'></a>
									</div>
									<div style='display:none'>
										<a href='<?php echo site_url();?>/admin/denuncias/delete_file/documento7_seguimiento' id='delete_url_673702828' rel='' ></a>
									</div>				
								</div>
							<div class='clear'></div>
						</div>
						
						<div class='form-field-box even' id="documento8_seguimiento_field_box">
							<div class='form-display-as-box' id="documento8_seguimiento_display_as_box">
								Multimedia adicional 3 :
							</div>
							<div class='form-input-box' id="documento8_seguimiento_input_box">
								<span class="fileinput-button qq-upload-button" id="upload-button-680273429" style="">
									<span>Subir un archivo</span>
										<input type="file" name="s856dc304" class="gc-file-upload" rel="<?php echo site_url();?>/admin/denuncias/upload_file/documento8_seguimiento" id="680273429">
										<input class="hidden-upload-input" type="hidden" name="documento8_seguimiento" value="" rel="s856dc304" />
									</span><div id='uploader_680273429' rel='680273429' class='grocery-crud-uploader' style=''></div>
									<div id='success_680273429' class='upload-success-url' style='display:none; padding-top:7px;'>
										<a href='<?php echo site_url();?>/../assets/uploads/files/' id='file_680273429' class='open-file' target='_blank'></a> 
										<a href='javascript:void(0)' id='delete_680273429' class='delete-anchor'>eliminar</a> 
									</div>
									<div style='clear:both'></div>
									<div id='loading-680273429' style='display:none'>
										<span id='upload-state-message-680273429'></span> 
										<span class='qq-upload-spinner'></span> 
										<span id='progress-680273429'></span>
									</div><div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/upload_file/documento8_seguimiento' id='url_680273429'></a>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/delete_file/documento8_seguimiento' id='delete_url_680273429' rel='' ></a>
								</div>				
							</div>
							<div class='clear'></div>
						</div>
									
						<div class='form-field-box odd' id="documento9_seguimiento_field_box">
							<div class='form-display-as-box' id="documento9_seguimiento_display_as_box">
								Multimedia adicional 4 :
							</div>
							<div class='form-input-box' id="documento9_seguimiento_input_box">
								<span class="fileinput-button qq-upload-button" id="upload-button-1049547211" style="">
									<span>Subir un archivo</span>
									<input type="file" name="s3eed3d9c" class="gc-file-upload" rel="<?php echo site_url();?>/admin/denuncias/upload_file/documento9_seguimiento" id="1049547211">
									<input class="hidden-upload-input" type="hidden" name="documento9_seguimiento" value="" rel="s3eed3d9c" />
								</span>
								<div id='uploader_1049547211' rel='1049547211' class='grocery-crud-uploader' style=''></div>
								<div id='success_1049547211' class='upload-success-url' style='display:none; padding-top:7px;'>
									<a href='<?php echo site_url();?>/../assets/uploads/files/' id='file_1049547211' class='open-file' target='_blank'></a> 
									<a href='javascript:void(0)' id='delete_1049547211' class='delete-anchor'>eliminar</a> 
								</div>
								<div style='clear:both'></div>
								<div id='loading-1049547211' style='display:none'>
									<span id='upload-state-message-1049547211'></span> 
									<span class='qq-upload-spinner'></span> 
									<span id='progress-1049547211'></span>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/upload_file/documento9_seguimiento' id='url_1049547211'></a>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/delete_file/documento9_seguimiento' id='delete_url_1049547211' rel='' ></a>
								</div>				
							</div>
							<div class='clear'></div>
						</div>
									
						<div class='form-field-box even' id="documento10_seguimiento_field_box">
							<div class='form-display-as-box' id="documento10_seguimiento_display_as_box">
								Multimedia adicional 5 :
							</div>
							<div class='form-input-box' id="documento10_seguimiento_input_box">
								<span class="fileinput-button qq-upload-button" id="upload-button-1029029082" style="">
									<span>Subir un archivo</span>
									<input type="file" name="s0bdcb1ad" class="gc-file-upload" rel="<?php echo site_url();?>/admin/denuncias/upload_file/documento10_seguimiento" id="1029029082">
									<input class="hidden-upload-input" type="hidden" name="documento10_seguimiento" value="" rel="s0bdcb1ad" />
								</span>
								<div id='uploader_1029029082' rel='1029029082' class='grocery-crud-uploader' style=''></div>
								<div id='success_1029029082' class='upload-success-url' style='display:none; padding-top:7px;'>
									<a href='<?php echo site_url();?>/../assets/uploads/files/' id='file_1029029082' class='open-file' target='_blank'></a> 
									<a href='javascript:void(0)' id='delete_1029029082' class='delete-anchor'>eliminar</a> 
								</div>
								<div style='clear:both'></div>
								<div id='loading-1029029082' style='display:none'>
									<span id='upload-state-message-1029029082'></span> 
									<span class='qq-upload-spinner'></span> 
									<span id='progress-1029029082'></span>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/upload_file/documento10_seguimiento' id='url_1029029082'></a>
								</div>
								<div style='display:none'>
									<a href='<?php echo site_url();?>/admin/denuncias/delete_file/documento10_seguimiento' id='delete_url_1029029082' rel='' ></a>
								</div>				
							</div>
							<div class='clear'></div>
						</div>
						<div class='line-1px'></div>
						<!-- Start of hidden inputs -->
						<input id="field-folio" type="hidden" name="folio" value="">			
						<div id='report-error' class='report-div error'></div>
						<div id='report-success' class='report-div success'></div>
						<!-- End of hidden inputs -->
					</div>

					<div class='buttons-box'>
						<div class='form-button-box'>
							<input type='button' value='Cancelar' class='ui-input-button cancel-and-go-back-button'/>
						</div>

						<div class='form-button-box'>
							<input type='button' value='<< Regresar a Agregar Migrante' class='ui-input-button' id="go-back-button"/>
						</div>

						<div class='form-button-box'>
							<input type='submit' value='Guardar' class='ui-input-button' id="save-all" ng-click=""/>
						</div>

						<div class='form-button-box loading-box'>
							<div class='small-loading' id='FormLoading'>Cargando, guardando los datos...</div>
						</div>

						<div class='clear'></div>
					</div>
				</div>
			</div>
	</form>
</div>

<script>
	var default_theme_path = '<?php echo site_url();?>/../assets/grocery_crud/themes';
	var base_url = '<?php echo site_url();?>/';

	
	$(document).ready( function () {
		var s1 = angular.element("#addReport-step1").scope() // formulario migrante
 		var s2 = angular.element("#addReport-step2").scope() // formulario denuncia

		//console.log(s1.get_migrantes_data() != null )
		// Mostrar el botón 'datos de denuncia' si se ha ingresado por lo menos un migrante
 		if( s1.get_migrantes_data() != null ) {
 			$("#go-next-button").css("display", "block")
 			var migrantes = s1.get_migrantes_data().split(",")
 			for(var i in migrantes) 
 				$(".migrantes_capturados ul").append("<li>" + migrantes[i].split(":")[1] + "</li>")

 			//$(".migrantes_capturados").css("display", "block")
 			$(".migrantes_capturados").slideDown("fast")
 		}


		// obtener datos de un formulario como json
		$.fn.serializeObject = function() {
		   var o = {};
		   var a = this.serializeArray();
		   $.each(a, function() {
		       if (o[this.name]) {
		           if (!o[this.name].push) {
		               o[this.name] = [o[this.name]];
		           }
		           o[this.name].push(this.value || '');
		       } else {
		           o[this.name] = this.value || '';
		       }
		   });
		   return o;
		};

		// convertir un decimal a otra base
		function toRadix(N,radix) {
		 var HexN="", Q=Math.floor(Math.abs(N)), R;
		 while (true) {
		  R=Q%radix;
		  HexN = "0123456789abcdefghijklmnopqrstuvwxyz".charAt(R)
		       + HexN;
		  Q=(Q-R)/radix; 
		  if (Q==0) break;
		 }
		 return ((N<0) ? "-"+HexN : HexN);
		}

		$("#addReport-step1").on("submit", function(e){
			e.preventDefault();

			$("#FormLoading").css("display", "block")
			$("#gray_screen").css("display", "block")

			var that = $(this)
			  , scope = angular.element(that).scope()
			  , data = that.serialize()
			  , url = that.attr("action");

			$.get('http://jsonip.com', function (res) {
		  		var folio;
		  	 	if(res && res.ip ){
			  	 	ip = parseInt( (res.ip).replace(/\./g, "") );
			  	 	folio = 'MIG-' + Math.floor(Date.now() / 1000) + '-' +  toRadix(ip, 36).toUpperCase() 
		  	 	}else{
			  		folio = "<?php echo crearFolio('MIG'); ?>"
		  	 	}

		  	 	that.append("<input type='hidden' id='folio' name='folio' value='" + folio +"' >")

		  	 	// fallara si no esta logueado
		  	 	try {
			  		_send_data()	
		  	 	} catch(e) {
				    window.location.reload();
				}
    		});

			  //scope.clear_all();  /*
			var _send_data = function(){
		  	$.post(url, data, function(res){
		  			
					//proceso para guardar 
					var res = JSON.parse(res)
		  		if(res.status){
						$(this).children(".small-loading").css("display","block");
						$(this).children(".small-loading").css("display","none");
						var msg = ' <p> El registro del migrante fue correctamente agregado. \
									    ¿Quiéres agregar otro migrante o los datos de la denuncia ?</p>';

				  	var dialog = $(msg).dialog({
	        		buttons: {
			            "Agregar otro migrante": function() {
			            	that[0].reset() // limpia input text
			            	scope.clear_migrante(); // limpia el localstorage de migrante
			            	that.children('select').each(function(){
			            		$(this).val('').trigger('chosen:updated')
			            	});
			        		 	window.location.reload();
			            },
			            "Capturar datos de la denuncia ":  function() {
			            	that.toggle( "slide", function(){
			            		that[0].reset()
			            		$("#addReport-step2").toggle( "slide" )
			            	})
		  							$("#gray_screen").css("display", "none")
			            	dialog.dialog('close');

			            }
			          }
		      	});
		      	scope.add_migrante(res.data)
				  	console.log(res.data)
	      	}else{
		  			alert("No se pudo insertar el Registro del Migrante, verifique los campos")
		  			$("#gray_screen").css("display", "none")
		  		}

		  		$("#FormLoading").css("display", "none")
				})
			}

		})

		
		$("#addReport-step2").on("submit", function(e){
			e.preventDefault();
			var that = $(this)
			  , scope = angular.element(that).scope()
			  //, data = $(this).serializeObject()
  			
			//console.log(data)
			that.children(".small-loading").css("display","block");
		  	$.get('http://jsonip.com', function (res) {
		  		var folio;
		  	 	if(res && res.ip ){
			  	 	ip = parseInt( (res.ip).replace(/\./g, "") );
			  	 	folio = 'DEN-' + Math.floor(Date.now() / 1000) + '-' +  toRadix(ip, 36).toUpperCase() 
		  	 	}else{
			  		folio = "<?php echo crearFolio('DEN'); ?>"
		  	 	}

		  	 	that.append("<input type='hidden' id='folio' name='folio' value='" + folio +"' >")

		  	 	// fallara si no esta logueado
		  	 	try {
			  		send_data(that)	
		  	 	} catch(e) {
				    window.location.reload();
				}
    		});

			var send_data = function(el){
  				/**/
  				var formData = new FormData(el[0])
  				  , url = el.attr("action");

				jQuery.ajax({
				    url: url,
				    data: formData,
				    cache: false,
				    contentType: false,
				    processData: false,
				    type: 'POST',
				    success: function(res, error){
				        //proceso para guardar 
						var res = JSON.parse(res)
						var that = $("#addReport-step2")
						if(res.status){
							var f1 = $("#addReport-step1") // formulario migrante
				          	var f2 = $("#addReport-step2") // formulario denuncia

				          	f1[0].reset(); // resetea los forms
				          	f2[0].reset();
				          	insertMigrantes2denuncia(res.data.id)
				          	angular.element(f1).scope().clear_all(); // limpia el localstorage de migrante
				          	angular.element(f2).scope().clear_all();
							that.children(".small-loading").css("display","none");
							alert("Se inserto correctamente la denuncia, con el folio: " + res.data.folio)
							window.location.reload();
				    	}else{
				    		console.log(res)
				  			alert("No se pudo insertar la Denuncia, verifique los campos")
				  		}
				    }
				});

			}

			var insertMigrantes2denuncia = function(id_denuncia){
				var url = "<?php echo site_url();?>/index.php/admin/insertMigrantes2denuncia";
				var migrantes = angular.element( $("#addReport-step1") ).scope().get_migrantes_data().split(",")
				var ids = []

				for(var i in migrantes) ids.push( migrantes[i].split(":")[0] )

				$.post(url, { id_denuncia: id_denuncia, ids_migrantes: ids }, function(res, error){
					console.log(res)
				})
			}
		})

		$("#go-next-button").on("click", function(e){
			e.preventDefault()
			$("#addReport-step1").toggle( "slide", function(){
        		$("#addReport-step2").toggle( "slide" )
        	})
		})

		$("#go-back-button").on("click", function(e){
			e.preventDefault();
			$("#addReport-step2").toggle( "slide", function(){
	    		$("#addReport-step1").toggle( "slide" )
	    	})
		})

		$(".cancel-and-go-back-button").on("click", function(e){
			e.preventDefault();
			var msg = '<p> Si cancela, se eliminarán todos los datos. ¿Quiéres Cancelar? </p>';
			var dialog = $(msg).dialog({
	        buttons: {
	          "Si": function() {
	          	var f1 = $("#addReport-step1") // formulario migrante
	          	var f2 = $("#addReport-step2") // formulario denuncia

	          	/* Elimina migrantes si ya han sido creados en esta denuncia */
	          	try {
		          	var migrantes = angular.element(f1).scope().get_migrantes_data().split(",")
		          	  , ids = []
		          	  , url = "<?php echo site_url();?>/index.php/admin/deleteMigrantes";
		          	
		          	for(var i in migrantes) ids.push( migrantes[i].split(":")[0] )
		      		$.post(url, { ids : ids}, function(res, error){ console.log(res) })

				}catch(err) { }

		          	
	          	f1[0].reset(); // resetea los forms
	          	f2[0].reset();
	          	angular.element(f1).scope().clear_all(); // limpia el localstorage de migrante
	          	angular.element(f2).scope().clear_all(); // limpia el localstorage de denuncia

	          	$('select').each(function(){ // resetea los selects
	          		$(this).val('').trigger('chosen:updated')
	          	});
	      		 	
				window.location.reload();
	          },
	          "No":  function() {
	          	dialog.dialog('close');
	          }
	        }
	      });
		})

			
		$("#ver-catalogos").click( function () {
			$("#catalogos").toggle();
		});
		
		var fields_hs = function(id, n, fields){
			if( $("li#field_" + id + "_chzn_o_" + n ).hasClass("result-selected" ) ){
				for(i in fields) $("#" + fields[i] + "_field_box").show() 
			}else {
				for(i in fields) $("#" + fields[i] + "_field_box").hide();
				var f1 = $("#addReport-step1")
				var f2 = $("#addReport-step2")
				angular.element(f1).scope().clear_theses(fields)
				angular.element(f2).scope().clear_theses(fields)
			}
		}

		var hs_fields = function(el, on_id, off_id, input_fields, select_fields, multi_select, clean){
			if( $("li#field_" + el + "_chzn_o_" + on_id ).hasClass("result-selected" ) ){
				for(var key in input_fields ) {
					if(clean) $("#field-" + key ).val('')
					$("#" + key + "_field_box").show() 
				}
				
				for(var key in select_fields) {
					//if(clean) $("#field-" + key ).val('').trigger("liszt:updated")
					$("#" + key + "_field_box").show() 

					$("#" + key + "_field_box .chzn-results li").each(function( index ) {
						if( $(this).text() === "No Aplica" ) {
							$(this).css("display", "none")
							return false
						}

					})
				}

				for(var key in multi_select) {
					if(clean) $("#field-" + key ).val('').trigger("liszt:updated")
					$("#" + key + "_field_box").show() 
				}
			}else if( $("li#field_" + el + "_chzn_o_" + off_id ).hasClass("result-selected" ) ){
				var f1 = $("#addReport-step1")
				var f2 = $("#addReport-step2")

				for(var key in input_fields ) {
					$("#field-" + key ).val(input_fields[key]);
					$("#" + key + "_field_box").hide();
				}

				for(var key in select_fields) {
					var d = select_fields[key].split("-");
					/* d[0] -> id en el select del texto a mostrar */
					/* d[1] -> texto a mostrar cuando se oculten los campos */
					/* d[2..] -> campos hijos a ocultar */

					$("#field_" + key + "_chzn .chzn-single span").addClass("chzn-default chzn-single-with-drop")
					$("#field_" + key + "_chzn .chzn-single span").text( d[1] )
					$("#field_" + key + "_chzn .chzn-single").append('<abbr class="search-choice-close"></abbr>')
					
					$("#field_" + key + "_chzn .chzn-results li").removeClass("result-selected")
					$("#field_" + key + "_chzn .chzn-results li:eq(" + d[0] + ")").addClass("result-selected")

					$("#" + key + "_field_box").hide() 
					for(var i = 2 in d) $("#" + d[i] + "_field_box").hide() 
				}

				for(var key in multi_select ) {
					$("#" + key + "_field_box").hide();

					var na_el  = '<li class="search-choice" id="field_paquete_pago_chzn_c_8">'
						na_el += '  <span>No Aplica</span>' 
						na_el += '  <a href="javascript:void(0)" class="search-choice-close" rel="8"></a>'
						na_el += '</li>'
						
					$("#field_" + "paquete_pago" + "_chzn ul.chzn-choices li.search-choice").remove()
					$("#field_" + "paquete_pago" + "_chzn ul.chzn-choices").prepend(na_el)

					$("#field_" + "paquete_pago" + "_chzn .chzn-drop ul li.result-selected")
						.removeClass("result-selected")
						.addClass("active-result")

					$("#field_" + "paquete_pago" + "_chzn .chzn-drop ul li#field_" + "paquete_pago" + "_chzn_o_" + "8")
						.removeClass("active-result")
						.addClass("result-selected")
				}

				angular.element(f1).scope().clear_theses(input_fields)
				angular.element(f1).scope().clear_theses(select_fields)
				angular.element(f1).scope().clear_theses(multi_select)


				angular.element(f2).scope().clear_theses(input_fields)
				angular.element(f2).scope().clear_theses(select_fields)
				angular.element(f2).scope().clear_theses(multi_select)
			}
		}

		/*Guia-Coyote*/
		
		$("#lugar_contrato_coyote_field_box").css("margin-left", "50px");
		$("#monto_coyote_field_box").css("margin-left", "50px");
		$("#paquete_pago_field_box").css("margin-left", "50px");

		$("#lugar_contrato_coyote_field_box").hide();
		$("#monto_coyote_field_box").hide();
		$("#paquete_pago_field_box").hide();
		
		$("#field-coyote_guia").change( function () { 
			hs_fields(  "coyote_guia", 2, 3, 
						{"monto_coyote": "No Aplica" }, 
						{"lugar_contrato_coyote": "3-No Aplica"},
						{"paquete_pago": "8-No Aplica"},
						true
					)
		});
			hs_fields(  "coyote_guia", 2, 3, 
						{"monto_coyote": "No Aplica" }, 
						{"lugar_contrato_coyote": "3-No Aplica"},
						{"paquete_pago": "8-No Aplica"},
						false
					)

		/*Viajaba solo*/
		$("#con_quien_viaja_field_box").css("margin-left", "50px");
		$("#situacion_familiar_field_box").css("margin-left", "70px");

		$("#con_quien_viaja_field_box").hide();
		$("#situacion_familiar_field_box").hide();

		$("#field-viaja_solo").change( function () { 
			hs_fields(  "viaja_solo", 3, 2, {"con_quien_viaja": "No Aplica" }, {},{}, true )
		});
		
		hs_fields(  "viaja_solo", 3, 2, {"con_quien_viaja": "No Aplica"}, {},{}, false )

		
		/*Momento de deportado*/
		$("#momento_deportado_field_box").css("margin-left", "50px");
		$("#separacion_familiar_field_box").css("margin-left", "50px");
		//$("#acto_siguiente_field_box").css("margin-left", "50px");
		$("#acto_siguiente_homologada_field_box").css("margin-left", "50px");

		$("#momento_deportado_field_box").hide();
		$("#separacion_familiar_field_box").hide();
		//$("#acto_siguiente_field_box").hide();
		$("#acto_siguiente_homologada_field_box").hide();

		$("#field-deportado").change( function () { 
			hs_fields(  "deportado", 2, 3,  
				{"acto_siguiente": "No Aplica" }, 
				{"momento_deportado": "4-No Aplica", "separacion_familiar": "3-No Aplica-familiar_separado", "acto_siguiente_homologada": "No Aplica-No Aplica"}, {}, true);
		});
		
		hs_fields(  "deportado", 2, 3,
				{ }, 
				{"momento_deportado": "4-No Aplica", "separacion_familiar": "3-No Aplica-familiar_separado","acto_siguiente_homologada": "No Aplica-No Aplica"}, {}, true);

		/*Familiar separacion*/
		$("#familiar_separado_field_box").css("margin-left", "70px");
		$("#familiar_separado_field_box").hide();

		$("#field-separacion_familiar").change( function () { 
			hs_fields(  "separacion_familiar", 2, 3, {"familiar_separado": "No Aplica", "situacion_familiar": "No Aplica"}, {}, {}, true)
		});
		
		hs_fields(  "separacion_familiar", 2, 3, {"familiar_separado": "No Aplica", "situacion_familiar": "No Aplica"}, {}, {}, false)
				
		
		/*Color uniforme responsables*/
		$("#color_uniforme_responsables_field_box").css("margin-left", "50px");
		$("#insignias_responsables_field_box").css("margin-left", "50px");

		$("#color_uniforme_responsables_field_box").hide();
		$("#insignias_responsables_field_box").hide();
		

		$("#field-uniformado_responsables").change( function () { 
			hs_fields(  "uniformado_responsables", 2, 3,
						{"color_uniforme_responsables": "No Aplica", "insignias_responsables": "No Aplica"}, {}, {}, true)
		});
		
		hs_fields(  "uniformado_responsables", 2, 3,
						{"color_uniforme_responsables": "No Aplica", "insignias_responsables": "No Aplica"}, {}, {}, false)


		/*Color uniforme responsables*/
		$("#id_tipo_transporte_responsables_field_box").css("margin-left", "50px");
		$("#numero_vehiculos_responsables_field_box").css("margin-left", "50px");
		$("#placas_vehiculos_responsables_field_box").css("margin-left", "50px");

		$("#id_tipo_transporte_responsables_field_box").hide();
		$("#numero_vehiculos_responsables_field_box").hide();
		$("#placas_vehiculos_responsables_field_box").hide();
		
		/* "field-id_tipo_transporte_responsables" */
		var pos;
		$("#field-id_tipo_transporte_responsables option").each(function(i){
			if( $(this).val() == "No Aplica"){ pos = i; return false; }
		})

		$("#field-responsables_abordo_vehiculos_responsables").change( function () { 
			hs_fields(  "responsables_abordo_vehiculos_responsables", 2, 3,
						{"numero_vehiculos_responsables": "No Aplica", "placas_vehiculos_responsables": "No Aplica"}, 
						{"id_tipo_transporte_responsables": pos + "-No Aplica"}, {}, true)
		});
		
		hs_fields(  "responsables_abordo_vehiculos_responsables", 2, 3,
						{"numero_vehiculos_responsables": "No Aplica", "placas_vehiculos_responsables": "No Aplica"}, 
						{"id_tipo_transporte_responsables": pos + "-No Aplica"}, {}, false)


		/*Migrante - Pueblo indigena*/

		$("#nombre_pueblo_indigena_field_box").css("margin-left", "50px");
		$("#nombre_pueblo_indigena_field_box").hide();
		$("#espanol_field_box").css("margin-left", "50px");
		$("#espanol_field_box").hide();

		$("#field-pueblo_indigena").change( function () { 					
			hs_fields( "pueblo_indigena", 2, 3,
					   {"nombre_pueblo_indigena": "No Aplica"}, 
					   {"espanol": "2-No Aplica"}, {}, true )			 
		});
		
		hs_fields(  "pueblo_indigena", 2, 3, 
					{"nombre_pueblo_indigena": "No Aplica"}, 
					{"espanol": "2-No Aplica"}, {}, false )		

		$("#motivo_cerrado_field_box").css("margin-left", "50px");

		$("#field-id_estado_caso").change( function () { 
			hs_fields(  "id_estado_caso", 2, 1,
						{ }, 
						{"motivo_cerrado": "0-No Aplica"}, {}, true)
		})

		hs_fields(  "id_estado_caso", 2, 1,
						{ }, 
						{"motivo_cerrado": "0-No Aplica"}, {}, false)	 

		$(".search-choice-close").on("click", function(e){
			e.preventDefault()
			var select = $(this).parents(".chzn-container-multi").siblings("select")
			$(this).parent().remove()
			select.change()
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
</body>
</html>
