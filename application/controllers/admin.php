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
		
		/*Columnas(Vista), campos y campos obligatorios*/
		//$crud->columns('id_estado', 'id_pais', 'nombre');
		$crud->required_fields('fecha_creada');

		/*Relaciones con tablas*/
		
		$output = $crud->render();
		
		$this->_example_output($output);
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
	
	/*Nombres en español de los campos*/
	public function display_as_i($crud) {
		$crud->display_as('id_initiative', 'ID Iniciativa');
		$crud->display_as('title', 'Título');
		$crud->display_as('short_title', 'Título Corto');
		$crud->display_as('description', 'Descripción');
		$crud->display_as('presented_by', 'Presentada por');
		$crud->display_as('additional_resources', 'Recursos adicionales');
		$crud->display_as('additional_resources_url', 'Url de recursos adicionales');
		$crud->display_as('official_vote_up', 'Votos a favor');
		$crud->display_as('official_vote_down', 'Votos en contrar');
		$crud->display_as('official_vote_abstentions', 'Abstenciones');
		$crud->display_as('voted_at', 'Fecha votada');
		
		return true;
	}
	
	/*metodo index - redirect a denuncias*/
	public function index() {
		header('Location: /admin/denuncias');
		
		return false;
	}
}
