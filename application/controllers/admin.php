<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		
		//Helpers
		$this->load->helper('url');
		$this->load->helper('date');

		$this->load->library('grocery_CRUD');
		
		ini_set("session.cookie_lifetime", "14400");
		ini_set("session.gc_maxlifetime",  "14400");
		session_start();
	}

	/*Salida de las vistas*/
	public function _example_output($output = null) {
		$this->load->view('admin.php', $output);
	}
	
	/*Export csv*/
	public function export_estados() {
		$user = $this->isUser();
		
		$this->load->model('migracion_model');
		$csv_file  = $this->migracion_model->exportEstados();
		
		die("archivo descargado");
	}
	
	/*Export csv*/
	public function export_paises() {
		$user = $this->isUser();
		
		$this->load->model('migracion_model');
		$csv_file  = $this->migracion_model->exportPaises();
		
		die("archivo descargado");
	}
	
	/*Export csv*/
	public function export() {
		$user = $this->isUser();
		
		$this->load->model('migracion_model');
		$csv_file  = $this->migracion_model->exportCSV();
		
		die("archivo descargado");
	}
	
	/*Users metodo para verificar si es usuario*/
	private function isUser($redirect = true, $admin = false) {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			
			$this->load->model('migracion_model');
			$user = $this->migracion_model->getUser($_SESSION['user_id']);
			
			if($user) {
				
				return $user;
				
				if($redirect) {
					header('Location: ' . site_url('admin/migrantes'));
				}
				
				return $user;
			} else {
				if($redirect) {
					header('Location: ' . site_url('admin/login'));
				}
				
				return false;
			}
		} else {
			if($redirect) {
				header('Location: ' . site_url('admin/login'));
			}
			
			return false;
		}
	}
	
	/*Metodo para hacer login*/
	public function login() {
		if($this->isUser(false)) {
			header('Location: ' . site_url('admin/migrantes'));
		} else {
			$vars["error"] = false;
			
			if(isset($_POST["submit"])) {
				$this->load->model('migracion_model');
				$user = $this->migracion_model->isUser(trim(str_replace("'","",$_POST["email"])), md5($_POST["pwd"]));
				
				if($user) {
					$_SESSION['user_id'] = $user->id_user;
					$_SESSION['email']   = $user->email;
					
					header('Location: ' . site_url('admin/migrantes'));
				}
				
				$vars["error"] = "datos incorrectos";
			}
			
			$this->load->view('login.php', $vars);
		}
	}
	
	/*Metodo para cerrar session*/
	public function logout() {
		session_unset(); 
		session_destroy();
		
		header('Location: ' . site_url('admin/login'));
	}
	
	
	/*Metodo de denuncias*/
	public function denuncias() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla, Título y Orden*/
		$crud->set_theme('datatables');
		$crud->set_table('denuncias');
		$crud->set_subject('Denuncias');
		
		/*Relaciones n_n*/
		/*Migrantes*/
		$crud->set_relation_n_n('migrantes', 'migrantes2denuncias', 'migrantes', 'id_denuncia', 'id_migrante', 'nombre');
		/*Autoridades*/
		$crud->set_relation_n_n('autoridades_viaje', 'autoridades2denuncias', 'autoridades', 'id_denuncia', 'id_autoridad', 'nombre');
		/*Paquete pago coyote*/
		$crud->set_relation_n_n('paquete_pago', 'paquetes2denuncias', 'paquete_pago', 'id_denuncia', 'id_paquete', 'nombre');
		/*Autoridades responsables*/
		$crud->set_relation_n_n('autoridades_responables', 'autoridades_responables2denuncias', 'autoridades', 'id_denuncia', 'id_autoridad', 'nombre');
		/*Derechos violados*/
		$crud->set_relation_n_n('derechos_violados', 'derechos_violados2denuncias', 'derechos', 'id_denuncia', 'id_derecho', 'nombre');
		/*Violaciones a derechos*/
		$crud->set_relation_n_n('violaciones_derechos', 'violacion_derechos2denuncias', 'violacion_derechos', 'id_denuncia', 'id_violacion', 'nombre');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_denuncia', 'fecha_creada', 'id_lugar_denuncia', 'id_tipo_queja', 'migrantes');
		$crud->fields(
			'nombre_persona_atendio_seguimiento', 'fecha_creada', 'id_lugar_denuncia', 'id_tipo_queja', 'migrantes', 'intentos', 'motivo_migracion', 
			'coyote_guia', 'lugar_contrato_coyote', 'monto_coyote', 'paquete_pago', 'nombre_punto_fronterizo', 'lugar_de_usa', 'viaja_solo', 
			'con_quien_viaja', 'deportado', 'momento_deportado', 'separacion_familiar', 'familiar_separado', 'situacion_familiar','acto_siguiente', 
			'acto_siguiente_homologada','autoridades_viaje', 'dano_autoridad', 'fecha_injusticia', 'id_autoridad_dano', 'id_pais_injusticia', 'id_estado_injusticia', 
			'municipio_injusticia', 'espacio_fisico_injusticia', 'espacio_fisico_injusticia_homologada', 'id_transporte_viaje_injusticia', 
			'detonante_injusticia', 'detonante_injusticia_homologada','numero_migrantes_injusticia', 'lugar_abordaje_transporte', 'destino_transporte', 
			'autoridades_responables', 'numero_oficiales_responsables', 'algun_nombre_responsables', 'carcteristicas_ficias_policia_responsable', 
			'carcteristicas_ficias_policia_responsable2', 'carcteristicas_ficias_policia_responsable3', 'apodos_responsables', 'uniformado_responsables', 
			'color_uniforme_responsables', 'insignias_responsables', 'responsables_abordo_vehiculos_responsables', 'id_tipo_transporte_responsables', 
			'numero_vehiculos_responsables', 'placas_vehiculos_responsables', 'descripcion_evento', 'monto_extorsion', 'derechos_violados', 
			'violaciones_derechos', 'id_estado_caso', 'estado_seguimiento', 'notas_seguimiento', 'telefono_seguimiento', 'documento1_seguimiento', 
			'documento2_seguimiento', 'documento3_seguimiento', 'documento4_seguimiento', 'documento5_seguimiento', 'documento6_seguimiento', 
			'documento7_seguimiento', 'documento8_seguimiento','documento9_seguimiento', 'documento10_seguimiento'
		);
		
		$crud->required_fields('fecha_creada');

		/*Relaciones con tablas*/
		/*Set displays campos*/
		$this->display_as_denuncias($crud);
		
		$crud->order_by('fecha_creada','desc');
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Nombres en español de los campos*/
	public function display_as_denuncias($crud) {
		/*Lugar denuncia*/
		$crud->display_as('fecha_creada', 'Fecha que se recibió la queja');
		$crud->display_as('id_denuncia', 'Número de queja');
		
		$crud->display_as('id_lugar_denuncia', 'Lugar de denuncia');
		$crud->set_relation('id_lugar_denuncia', 'lugares_denuncia', 'nombre');
		/*Lugar denuncia*/
		$crud->display_as('id_tipo_queja', 'Tipo de queja');
		$crud->set_relation('id_tipo_queja', 'tipos_quejas', 'nombre');
		
		/*Datos sobre cruce de la frontera*/
		$crud->display_as('intentos', 'Cuántas veces has intentado cruzar la frontera');
		
		/*Falta de trabajo, Violencia/Seguridad, Reunificación familiar, Otro*/
		$crud->display_as('motivo_migracion', 'Cuál es el motivo de migración');
		$crud->field_type('motivo_migracion', 'dropdown', array('Falta de trabajo' => 'Falta de trabajo', 'Violencia/Seguridad' => 'Violencia/Seguridad', 'Reunificación familiar' => 'Reunificación familiar', 'Otro' => 'Otro'));
		
		$crud->field_type('viaja_solo', 'dropdown', array(1 => 'Si', 2 => 'No'));
		$crud->display_as('con_quien_viaja', 'Con quien viaja');
		/*Lugar deportado*/
		$crud->field_type('deportado', 'dropdown', array(1 => 'Si', 2 => 'No'));
		$crud->display_as('momento_deportado', 'Donde fue deportado');
		$crud->field_type('momento_deportado', 'dropdown', array('Al cruzar la frontera' => 'Al cruzar la frontera', 'Vivías en USA' => 'Vivías en USA', 'Otro' => 'Otro'));
		/*Separacion familiar*/
		$crud->display_as('separacion_familiar', 'Te separaron de algún familiar');
		$crud->field_type('separacion_familiar', 'dropdown', array(1 => 'Si', 2 => 'No'));
		$crud->display_as('familiar_separado', 'Que familiar');
		$crud->display_as('situacion_familiar', 'Sabes que paso con tu familiar');
		$crud->display_as('acto_siguiente', 'Qué piensa hacer ahora');

		$crud->display_as('acto_siguiente_homologada', 'Qué piensa hacer ahora (categoría)');
		$crud->field_type('acto_siguiente_homologada', 'dropdown', array(
			'Intentar cruzar otra vez' => 'Intentar cruzar otra vez',
			'Regresar a mi comunidad de origen' => 'Regresar a mi comunidad de origen',
			'Esperar en la frontera' => 'Esperar en la frontera',
			'No sabe' => 'No sabe'
		));
		//intentar cruzar otra vez, regresar a mi comunidad de origen, esperar en la forntera, no sabe

		/*Coyote*/
		$crud->display_as('coyote_guia', 'Contrato al coyote o guía que lo pasaría');
		$crud->field_type('coyote_guia', 'dropdown', array(1 => 'Si', 2 => 'No'));
		
		$crud->display_as('lugar_contrato_coyote', 'Donnde lo contrato');
		$crud->field_type('lugar_contrato_coyote', 'dropdown', array('Cuando salió de su comunidad' => 'Cuando salió de su comunidad', 'En  la frontera' => 'En  la frontera', 'Otro' => 'Otro'));
		
		$crud->display_as('monto_coyote', 'Cuanto le cobraría');
		$crud->display_as('paquete_pago', 'Que incluía el pago');
		
		$crud->display_as('conocimineto_punto_fronterizo', 'Porque punto fronterizo cruzaste o vas a cruzar a USA');
		$crud->field_type('conocimineto_punto_fronterizo', 'dropdown', array(1 => 'Si', 2 => 'No'));
		
		$crud->display_as('nombre_punto_fronterizo', 'Porque punto fronterizo cruzaste o vas a cruzar a USA');
		$crud->display_as('lugar_de_usa', 'A que lugar de USA vas');
		
		/*Antecedentes de autoridades*/
		$crud->display_as('autoridades_viaje', 'Durante el viaje con que autoridades te encontraste');
		$crud->display_as('dano_autoridad', 'Alguna de las autoridades te causaron daño');
		$crud->field_type('dano_autoridad', 'dropdown', array(1 => 'Si', 2 => 'No'));
		$crud->display_as('id_autoridad_dano', 'Que autoridad lo hizo');
		$crud->set_relation('id_autoridad_dano', 'autoridades', 'nombre');
		
		/*Hechos violatorios a derechos humanos*/
		$crud->display_as('id_pais_injusticia', 'País donde se cometió la injusticia');
		$crud->set_relation('id_pais_injusticia', 'paises', 'nombre');
		$crud->display_as('id_estado_injusticia', 'Estado donde se cometió la injusticia');
		$crud->set_relation('id_estado_injusticia', 'estados', 'nombre');
		$crud->display_as('municipio_injusticia', 'Municipio donde se cometió la injusticia');

		$crud->display_as('espacio_fisico_injusticia', 'Espacio físico de la injusticia');
		$crud->display_as('espacio_fisico_injusticia_homologada', 'Espacio físico de la injusticia (Categoría)');
		$crud->field_type('espacio_fisico_injusticia_homologada', 
			'dropdown', array(
				1 => 'A bordo del propio transporte', 
				2 => 'Afuera de la terminal de transporte',
				3 => 'Cerca de oficina de gobierno',
				4 => 'Domicilio',
				5 => 'Oficinas de gobierno',
				6 => 'Retén',
				7 => 'Vía pública',
				8 => 'Otro'
			)
		);

		$crud->display_as('detonante_injusticia', 'Situación que detona la injusticia');
		$crud->display_as('detonante_injusticia_homologada', 'Situación que detona la injusticia (Categoría)');
		$crud->field_type('detonante_injusticia_homologada', 
			'dropdown', array(
				1 => 'Atención a migrantes', 
				2 => 'Detectaron su aspecto de migrante',
				3 => 'Falta administrativa',
				4 => 'Falta de documentos',
				5 => 'Intentar viajar',
				8 => 'Revisión'
			)
		);

		$crud->display_as('numero_migrantes_injusticia', 'Número de migrantes que habia con usted cuando se cometio el abuso');
		$crud->display_as('fecha_injusticia', 'Cuándo se cometió la injusticia');
		$crud->display_as('id_transporte_viaje_injusticia', 'En que viajaba');
		$crud->set_relation('id_transporte_viaje_injusticia', 'transportes', 'nombre');
		$crud->display_as('lugar_abordaje_transporte', 'Donde abordo el transporte');
		$crud->display_as('destino_transporte', 'Destino del transporte');
		
		/*Datos de la autoridad responsable*/
		$crud->display_as('autoridades_responables', 'Nombre de las instituciones involucradas');
		$crud->display_as('numero_oficiales_responsables', 'Número de oficiales responsables');
		$crud->display_as('algun_nombre_responsables', 'Escucho o sabe algún nombre de  los oficiales involucrados');
		$crud->display_as('carcteristicas_ficias_policia_responsable', 'Características fìsicas oficial 1');
		$crud->display_as('carcteristicas_ficias_policia_responsable2', 'Características fìsicas oficial 2');
		$crud->display_as('carcteristicas_ficias_policia_responsable3', 'Características fìsicas oficial 3');
		$crud->display_as('apodos_responsables', 'Escucho o sabe algún apodo de  los oficiales involucrados');
		
		$crud->display_as('uniformado_responsables', 'Los responsables estaban uniformados');
		$crud->field_type('uniformado_responsables', 'dropdown', array('Si' => 'Si', 'No' => 'No', 'No vio' => 'No vio'));
		
		$crud->display_as('color_uniforme_responsables', 'Color de uniforme de oficiales responsables');
		$crud->display_as('insignias_responsables', 'Insignias de uniforme de oficiales responsables');
		
		$crud->display_as('responsables_abordo_vehiculos_responsables', 'Iban a bordo de Vehículos');
		$crud->field_type('responsables_abordo_vehiculos_responsables', 'dropdown', array('Si' => 'Si', 'No' => 'No', 'No vi' => 'No vi'));
		
		$crud->display_as('id_tipo_transporte_responsables', 'Tipo de vehículo');
		$crud->display_as('numero_vehiculos_responsables', 'Número de vehículos');
		$crud->set_relation('id_tipo_transporte_responsables', 'transportes', 'nombre');
		$crud->display_as('placas_vehiculos_responsables', 'Placas');
		
		/*descipción del evento*/
		$crud->display_as('descripcion_evento', 'Descipción del evento');
		
		/*Monto de la extorsion*/
		$crud->display_as('monto_extorsion', 'En caso de extorsión mencione el monto');
		
		/*Derechos violados*/
		
		/*Estado actual del caso*/
		$crud->display_as('id_estado_caso', 'Estado actual del caso');
		$crud->set_relation('id_estado_caso', 'etados_casos', 'nombre');
		
		$crud->display_as('estado_seguimiento', 'Seguimiento');
		$crud->field_type('estado_seguimiento', 'dropdown', array('Defensa' => 'Defensa', 'Canalización a una instancia' => 'Canalización a una instancia'));
		
		$crud->display_as('notas_seguimiento', 'Notas sobre el seguimiento');
		$crud->display_as('nombre_persona_atendio_seguimiento', 'Nombre de la persona que atendio el caso');
		$crud->display_as('telefono_seguimiento', 'Teléfono de contacto para seguimiento');
		$crud->display_as('documento1_seguimiento', 'Documento adicional 1');
		$crud->display_as('documento2_seguimiento', 'Documento adicional 2');
		$crud->display_as('documento3_seguimiento', 'Documento adicional 3');
		$crud->display_as('documento4_seguimiento', 'Documento adicional 4');
		$crud->display_as('documento5_seguimiento', 'Documento adicional 5');
		
		$crud->display_as('documento6_seguimiento', 'Multimedia adicional 1');
		$crud->display_as('documento7_seguimiento', 'Multimedia adicional 2');
		$crud->display_as('documento8_seguimiento', 'Multimedia adicional 3');
		$crud->display_as('documento9_seguimiento', 'Multimedia adicional 4');
		$crud->display_as('documento10_seguimiento', 'Multimedia adicional 5');
		
		$crud->set_field_upload('documento1_seguimiento', 'assets/uploads/files');
		$crud->set_field_upload('documento2_seguimiento', 'assets/uploads/files');
		$crud->set_field_upload('documento3_seguimiento', 'assets/uploads/files');
		$crud->set_field_upload('documento4_seguimiento', 'assets/uploads/files');
		$crud->set_field_upload('documento5_seguimiento', 'assets/uploads/files');
		$crud->set_field_upload('documento6_seguimiento', 'assets/uploads/files');
		$crud->set_field_upload('documento7_seguimiento', 'assets/uploads/files');
		$crud->set_field_upload('documento8_seguimiento', 'assets/uploads/files');
		$crud->set_field_upload('documento9_seguimiento', 'assets/uploads/files');
		$crud->set_field_upload('documento10_seguimiento', 'assets/uploads/files');
		return true;
	}
	
	/*Metodo de migrantes*/
	public function migrantes() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('migrantes');
		

		$crud->set_subject('Migrantes');
		
		
		/*Relaciones con tablas*/
		$crud->display_as('id_lugar_denuncia', 'Lugar de la organización');
		$crud->display_as('id_pais', 'País');
		$crud->display_as('id_estado', 'Estado/Departamento');
		$crud->display_as('id_genero', 'Género');
		$crud->display_as('ocupacion_homologada', 'Ocupacion (categoría)');
		$crud->display_as('id_estado_civil', 'Estado Civil');
		$crud->display_as('escolaridad', 'Escolaridad');
		$crud->display_as('pueblo_indigena', 'Pertenece a algún pueblo indígena');
		$crud->display_as('espanol', 'Dominio del español');

		$query  = " SELECT migrantes.id_migrante, migrantes.nombre, migrantes.municipio, migrantes.edad, migrantes.escolaridad, 
						   migrantes.pueblo_indigena, migrantes.espanol, lugares_denuncia.nombre AS lugar_denuncia, paises.nombre AS pais, 
						   estados.nombre AS estado, generos.nombre AS genero, estado_civil.nombre AS estado_civil, migrantes2denuncias.id_denuncia";
		$query .= " FROM migrantes, lugares_denuncia, paises, estados, generos, estado_civil, migrantes2denuncias";
		$query .= " WHERE migrante.id_lugar_denuncia = lugares_denuncia.id_lugar_denuncia";
		$query .= " AND migrantes.id_pais = paises.id_pais";
		$query .= " AND migrantes.id_estado = estados.id_estado";
		$query .= " AND migrantes.id_genero = generos.id_genero";
		$query .= " AND migrantes.id_estado_civil = generos.id_estado_civil";
		$query .= " AND migrantes.id_migrante = migrantes2denuncias.id_migrante";

		//$crud->basic_model->set_query_str($query);
   
		
		$crud->set_relation('id_lugar_denuncia', 'lugares_denuncia', 'nombre');
		$crud->set_relation('id_pais', 'paises', 'nombre');
		$crud->set_relation('id_estado', 'estados', 'nombre');
		$crud->set_relation('id_genero', 'generos', 'nombre');
		$crud->set_relation('id_estado_civil', 'estado_civil', 'nombre');
			
		$crud->field_type('escolaridad', 'dropdown', array(
			'Sin instrucción' => 'Sin instrucción',
			'Primaria' => 'Primaria',
			'Primaria inconclusa' => 'Primaria inconclusa',
			'Secundaria' => 'Secundaria',
			'Secundaria inconclusa' => 'Secundaria inconclusa',
			'Preparatoria' => 'Preparatoria',
			'Preparatoria inconclusa' => 'Preparatoria inconclusa',
			'Licenciatura' => 'Licenciatura',
			'Licenciatura inconlusa' => 'Licenciatura inconlusa',
			'Maestria' => 'Maestria',
			'Doctorado' => 'Doctorado'
		));

		$crud->field_type('ocupacion_homologada', 
			'dropdown', array(
				1 => 'Al hogar', 
				2 => 'Albañil',
				3 => 'Campesino',
				4 => 'Comerciante',
				5 => 'Empleado',
				6 => 'Empleado de gobierno',
				7 => 'Jornalero',
				8 => 'Peón'
			)
		);
		
		$crud->field_type('pueblo_indigena', 'dropdown', array(1 => 'Si', 2 => 'No'));
		$crud->field_type('espanol', 'dropdown', array(1 => 'Si', 2 => 'No'));
		
		$crud->columns('id_migrante', 'id_lugar_denuncia', 'nombre', 'id_pais', 'id_estado', 'municipio', 'edad'/*, 'denuncia'*/);
		
		$crud->required_fields('nombre');

		$crud->unset_export();

		$output = $crud->render();
		
		$this->_example_output($output);
	}

	public function link_denuncia($primary_key , $row) { 
		if ( $row->denuncia != "") {
			return site_url('admin/denuncias') . '/read/' . $row->denuncia;
		}
		return "#";
	}

	
	/*Autoridades*/
	public function autoridades() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('autoridades');
		$crud->set_subject('Autoridades');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_autoridad', 'nombre');
		$crud->required_fields('nombre');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Derechos*/
	public function derechos() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('derechos');
		$crud->set_subject('Derechos');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_derecho', 'nombre');
		$crud->required_fields('nombre');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Violaciones a los Derechos*/
	public function violaciones_derechos() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('violacion_derechos');
		$crud->set_subject('Violaciónes a derechos');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_violacion', 'id_derecho', 'nombre');
		$crud->required_fields('id_derecho', 'nombre');
		
		/*Relaciones con tablas*/
		/*Derechos*/
		$crud->display_as('nombre', 'Violación a derecho');
		$crud->display_as('id_derecho', 'Derecho');
		$crud->set_relation('id_derecho', 'derechos', 'nombre');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Paises*/
	public function paises() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('paises');
		$crud->set_subject('Paises');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_pais', 'nombre');
		$crud->required_fields('nombre');

		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Estados*/
	public function estados() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('estados');
		$crud->set_subject('Estados/Departamentos');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_estado', 'id_pais', 'nombre');
		$crud->required_fields('id_pais', 'nombre');

		/*Relaciones con tablas*/
		/*Estados*/
		$crud->display_as('id_pais', 'Pais');
		$crud->set_relation('id_pais', 'paises', 'nombre');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Estado de los casos/denuncias*/
	public function estados_casos() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('etados_casos');
		$crud->set_subject('Estado de los casos/denuncias');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_estado_caso', 'nombre');
		$crud->required_fields('nombre');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Lugares de las denuncias*/
	public function lugares_denuncia() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('lugares_denuncia');
		$crud->set_subject('Lugares de las denuncias');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_lugar_denuncia', 'nombre');
		$crud->required_fields('nombre');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Que incluia el pago*/
	public function paquete_pago() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('paquete_pago');
		$crud->set_subject('Que incluia el pago');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_paquete', 'nombre');
		$crud->required_fields('nombre');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Tipo de quejas*/
	public function tipos_quejas() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('tipos_quejas');
		$crud->set_subject('Tipo de quejas');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_tipo_queja', 'nombre');
		$crud->required_fields('nombre');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Transportes*/
	public function transportes() {
		$user = $this->isUser();
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('transportes');
		$crud->set_subject('Transportes');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_transporte', 'nombre');
		$crud->required_fields('nombre');
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*obtener nombre unico de un campo*/
	function unique_field_name($field_name) {
		return 's'.substr(md5($field_name),0,8); //This s is because is better for a string to begin with a letter and not with a number
    }
	
	/*metodo index - redirect a denuncias*/
	public function index() {
		header('Location: ' . site_url('admin/migrantes'));
		
		return false;
	}

	public function graficas_migrantes(){
		$this->load->model('migracion_model');

		$start = $this->input->get("start")? $this->input->get("start") : "2014-01-01";
		$end = $this->input->get("end")? $this->input->get("end") : "2014-12-31";
        
        $data['start'] = $start;
        $data['end'] = $end;

        $data['denuncias'] = $this->migracion_model->allDenuncias($start, $end);
		$this->load->view('graficas_migrantes.php', $data);
	}
}
