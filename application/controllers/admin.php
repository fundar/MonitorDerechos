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
	}

	/*Salida de las vistas*/
	public function _example_output($output = null) {
		$this->load->view('admin.php', $output);
	}
	
	/*Metodo de denuncias*/
	public function denuncias() {
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
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_denuncia', 'numero_queja', 'fecha_creada', 'id_lugar_denuncia', 'id_tipo_queja');
		$crud->fields(
			'numero_queja', 'fecha_creada', 'id_lugar_denuncia', 'id_tipo_queja', 'migrantes', 'intentos', 
			'motivo_migracion', 'viaja_solo', 'deportado', 'momento_deportado', 'separacion_familiar', 'familiar_separado',
			'acto_siguiente', 'autoridades_viaje', 'dano_autoridad', 'id_autoridad_dano', 'coyote_guia', 'monto_coyote', 'paquete_pago',
			'conocimineto_punto_fronterizo', 'nombre_punto_fronterizo', 'lugar_de_usa'
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
		/*Lugar deportado*/
		$crud->field_type('deportado', 'dropdown', array(1 => 'Si', 2 => 'No'));
		$crud->display_as('momento_deportado', 'Donde fue deportado');
		$crud->field_type('momento_deportado', 'dropdown', array(1 => 'Al cruzar', 2 => 'vivías en USA', 3 => 'Otro'));
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
		
		
		/*
		$crud->display_as('description', 'Descripción');
		$crud->display_as('presented_by', 'Presentada por');
		$crud->display_as('additional_resources', 'Recursos adicionales');
		$crud->display_as('additional_resources_url', 'Url de recursos adicionales');
		$crud->display_as('official_vote_up', 'Votos a favor');
		$crud->display_as('official_vote_down', 'Votos en contrar');
		$crud->display_as('official_vote_abstentions', 'Abstenciones');
		$crud->display_as('voted_at', 'Fecha votada');
		*/
		
		return true;
	}
	
	/*Metodo de migrantes*/
	public function migrantes() {
		$crud = new grocery_CRUD();
		
		/*Tabla y título*/
		$crud->set_theme('datatables');
		$crud->set_table('migrantes');
		$crud->set_subject('Migrantes');
		
		/*Columnas(Vista), campos y campos obligatorios*/
		$crud->columns('id_migrante', 'nombre', 'id_pais', 'id_estado', 'municipio', 'edad');
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
		header('Location: /admin/denuncias');
		
		return false;
	}
}
