<?php
class migracion_Model extends CI_Model  {
	
	function __construct() {
		parent::__construct();
		$this->load->database();
	}
		
	/*Get user by id*/
	public function getUser($id_user) {
		$query = $this->db->get_where('users', array('id_user' => $id_user));
		$row   = $query->row(0);
		
		if(isset($row->id_user)) {
			return $row;
		} else {
			return false;
		}
	}
	
	public function isUser($email = "", $password = "") {
		$query = $this->db->get_where('users', array('email' => $email, 'pwd' => $password));
		$row   = $query->row(0);
		
		if(isset($row->id_user)) {
			return $row;
		} else {
			return false;
		}
	}
	
	/*Export CSV*/
	public function exportCSV() {
		$this->load->dbutil();
		
		$query = $this->db->query("select denuncias.*, migrantes.* from denuncias left join migrantes on id_migrante in (select id_migrante from migrantes2denuncias where denuncias.id_denuncia=migrantes2denuncias.id_denuncia) where id_denuncia in (select id_denuncia from migrantes2denuncias)");
		$data  = $this->dbutil->csv_from_result($query);

		$this->load->helper('download');
		force_download("base_de_datos_denuncias.csv", $data);
		exit;
	}
	
	public function exportEstados() {
		$this->load->dbutil();
		
		$query = $this->db->query("select id_estado, paises.id_pais, estados.nombre as estado, paises.nombre as pais from estados left join paises on estados.id_pais=paises.id_pais");
		$data  = $this->dbutil->csv_from_result($query);

		$this->load->helper('download');
		force_download("base_de_datos_estados.csv", $data);
		exit;
	}
	
	
	public function exportPaises() {
		$this->load->dbutil();
		
		$query = $this->db->query("select * from paises");
		$data  = $this->dbutil->csv_from_result($query);

		$this->load->helper('download');
		force_download("base_de_datos_paises.csv", $data);
		exit;
	}
}
