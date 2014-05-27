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
		echo "hola mundo!";
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
