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
		
		session_start();
	}

	/*Salida de las vistas*/
	public function _example_output($output = null) {
		$this->load->view('admin.php', $output);
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
					header('Location: ' . site_url('admin/denuncias'));
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
			header('Location: ' . site_url('admin/denuncias'));
		} else {
			$vars["error"] = false;
			
			if(isset($_POST["submit"])) {
				$this->load->model('migracion_model');
				$user = $this->migracion_model->isUser(trim(str_replace("'","",$_POST["email"])), md5($_POST["pwd"]));
				
				if($user) {
					$_SESSION['user_id'] = $user->id_user;
					$_SESSION['email']   = $user->email;
					
					header('Location: ' . site_url('admin/denuncias'));
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
		
		/*Tabla y título*/
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
		$crud->columns('numero_queja', 'fecha_creada', 'id_lugar_denuncia', 'id_tipo_queja', 'migrantes');
		$crud->fields(
			'numero_queja', 'fecha_creada', 'id_lugar_denuncia', 'id_tipo_queja', 'migrantes', 'intentos', 
			'motivo_migracion', 'viaja_solo', 'con_quien_viaja', 'deportado', 'momento_deportado', 'separacion_familiar', 'familiar_separado', 'situacion_familiar',
			'acto_siguiente', 'autoridades_viaje', 'dano_autoridad', 'id_autoridad_dano', 'coyote_guia', 'monto_coyote', 'paquete_pago',
			'conocimineto_punto_fronterizo', 'nombre_punto_fronterizo', 'lugar_de_usa', 'fecha_injusticia', 'id_pais_injusticia',
			'id_estado_injusticia', 'municipio_injusticia', 'espacio_fisico_injusticia', 'detonante_injusticia', 'numero_migrantes_injusticia',
			'id_transporte_viaje_injusticia', 'lugar_abordaje_transporte', 'destino_transporte', 'autoridades_responables',
			'numero_oficiales_responsables', 'algun_nombre_responsables', 'carcteristicas_ficias_policia_responsable', 'apodos_responsables', 'color_uniforme_responsables',
			'insignias_responsables', 'id_tipo_transporte_responsables', 'placas_vehiculos_responsables',
			'descripcion_evento', 'monto_extorsion', 'derechos_violados', 'violaciones_derechos', 'id_estado_caso', 'estado_seguimiento', 'notas_seguimiento',
			'nombre_persona_atendio_seguimiento', 'telefono_seguimiento', 'documento1_seguimiento', 'documento2_seguimiento', 'documento3_seguimiento',
			'documento4_seguimiento', 'documento5_seguimiento', 'documento6_seguimiento', 'documento7_seguimiento', 'documento8_seguimiento',
			'documento9_seguimiento', 'documento10_seguimiento'
		);
		
		$crud->required_fields('fecha_creada');

		/*Relaciones con tablas*/
		/*Set displays campos*/
		$this->display_as_denuncias($crud);
		
		$output = $crud->render();
		
		$this->_example_output($output);
	}
	
	/*Nombres en español de los campos*/
	public function display_as_denuncias($crud) {
		/*Lugar denuncia*/
		$crud->display_as('id_lugar_denuncia', 'Lugar de denuncia');
		$crud->set_relation('id_lugar_denuncia', 'lugares_denuncia', 'nombre');
		/*Lugar denuncia*/
		$crud->display_as('id_tipo_queja', 'Tipo de queja');
		$crud->set_relation('id_tipo_queja', 'tipos_quejas', 'nombre');
		
		/*Datos sobre cruce de la frontera*/
		$crud->display_as('intentos', 'Cuántas veces has intentado cruzar la frontera');
		$crud->display_as('motivo_migracion', 'Cuál es el motivo de migración');
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
		
		/*Antecedentes de autoridades*/
		$crud->display_as('autoridades_viaje', 'Durante el viaje con que autoridades te encontraste');
		$crud->display_as('dano_autoridad', 'Alguna de las autoridades te causaron daño');
		$crud->field_type('dano_autoridad', 'dropdown', array(1 => 'Si', 2 => 'No'));
		$crud->display_as('id_autoridad_dano', 'Que autoridad lo hizo');
		$crud->set_relation('id_autoridad_dano', 'autoridades', 'nombre');
		/*Coyote*/
		$crud->display_as('coyote_guia', 'Cuando salióm de sus comunidad había contactado al coyote o guía que lo pasaría');
		$crud->field_type('coyote_guia', 'dropdown', array(1 => 'Si', 2 => 'No'));
		$crud->display_as('monto_coyote', 'Cuanto le cobraría');
		$crud->display_as('paquete_pago', 'Que incluía el pago');
		$crud->display_as('conocimineto_punto_fronterizo', 'Sabías el punto fronterizo por donde el coyote o guía te iba a cruzar a USA');
		$crud->field_type('conocimineto_punto_fronterizo', 'dropdown', array(1 => 'Si', 2 => 'No'));
		$crud->display_as('nombre_punto_fronterizo', 'Nombre del punto fronterizo');
		$crud->display_as('lugar_de_usa', 'A donde lo llevaría');
		
		
		/*Hechos violatorios a derechos humanos*/
		$crud->display_as('fecha_injusticia', 'Cuándo se cometió la injusticia');
		$crud->display_as('id_pais_injusticia', 'País donde se cometió la injusticia');
		$crud->set_relation('id_pais_injusticia', 'paises', 'nombre');
		$crud->display_as('id_estado_injusticia', 'Estado donde se cometió la injusticia');
		$crud->set_relation('id_estado_injusticia', 'estados', 'nombre');
		$crud->display_as('municipio_injusticia', 'Municipio donde se cometió la injusticia');
		$crud->display_as('espacio_fisico_injusticia', 'Espacio físico de la injusticia');
		$crud->display_as('detonante_injusticia', 'Situación que detona la injusticia');
		$crud->display_as('numero_migrantes_injusticia', 'Número de victimas detectadas');
		$crud->display_as('id_transporte_viaje_injusticia', 'En que viajaba');
		$crud->set_relation('id_transporte_viaje_injusticia', 'transportes', 'nombre');
		$crud->display_as('lugar_abordaje_transporte', 'Donde abordo el transporte');
		$crud->display_as('destino_transporte', 'Destino del transporte');
		
		/*Datos de la autoridad responsable*/
		$crud->display_as('autoridades_responables', 'Nombre de las instituciones involucradas');
		$crud->display_as('numero_oficiales_responsables', 'Número de oficiales responsables');
		$crud->display_as('algun_nombre_responsables', 'Nombres de oficiales responsables');
		$crud->display_as('carcteristicas_ficias_policia_responsable', 'Características fìsicas');
		$crud->display_as('apodos_responsables', 'Apodos de oficiales responsables');
		$crud->display_as('color_uniforme_responsables', 'Color de uniforme de oficiales responsables');
		$crud->display_as('insignias_responsables', 'Insignias de uniforme de oficiales responsables');
		$crud->display_as('numero_vehiculos_responsables', 'Número de vehículos');
		$crud->display_as('id_tipo_transporte_responsables', 'Tipo de vehículo');
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
		$crud->display_as('notas_seguimiento', 'Notas sobre el seguimiento');
		$crud->display_as('nombre_persona_atendio_seguimiento', 'Nombre de la personaq que atendio el caso');
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
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('nombre', 'id_pais', 'id_estado', 'municipio', 'edad');
		$crud->required_fields('nombre');
		
		
		/*Relaciones con tablas*/
		/*Pais*/
		$crud->display_as('id_pais', 'País');
		$crud->set_relation('id_pais', 'paises', 'nombre');
		/*Estado*/
		$crud->display_as('id_estado', 'Estado');
		$crud->set_relation('id_estado', 'estados', 'nombre');
		/*Genero*/
		$crud->display_as('id_genero', 'Género');
		$crud->set_relation('id_genero', 'generos', 'nombre');
		/*Estado civil*/
		$crud->display_as('id_estado_civil', 'Estado Civil');
		$crud->set_relation('id_estado_civil', 'estado_civil', 'nombre');
		/*Pueblo indigena*/
		$crud->display_as('pueblo_indigena', 'Pertenece a algún pueblo indígena');
		$crud->field_type('pueblo_indigena', 'dropdown', array(1 => 'Si', 2 => 'No'));
		/*Español*/
		$crud->display_as('espanol', 'Dominio del español');
		$crud->field_type('espanol', 'dropdown', array(1 => 'Si', 2 => 'No'));
		
		$output = $crud->render();
		
		$this->_example_output($output);
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
		$crud->set_subject('Estados');
		
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
		header('Location: ' . site_url('admin/denuncias'));
		
		return false;
	}
}
