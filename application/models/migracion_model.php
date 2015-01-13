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
		
		$query = $this->db->query("select denuncias.*, migrantes.id_migrante, migrantes.nombre as migrante_nombre, migrantes.id_pais as migrante_id_pais, migrantes.id_estado as migrante_id_estado, migrantes.municipio as migrante_municipio, migrantes.id_genero as migrante_id_genero, migrantes.edad as migrante_edad, migrantes.fecha_nacimiento as migrante_fecha_nacimiento, migrantes.ocupacion as migrante_ocupacion, migrantes.id_estado_civil as migrante_id_estado_civil, migrantes.escolaridad as migrante_escolaridad, migrantes.pueblo_indigena as migrante_pueblo_indigena, migrantes.nombre_pueblo_indigena as migrante_nombre_pueblo_indigena, migrantes.espanol as migrante_espanol, migrantes.id_lugar_denuncia as migrante_id_lugar_denuncia from denuncias left join migrantes on id_migrante in (select id_migrante from migrantes2denuncias where denuncias.id_denuncia=migrantes2denuncias.id_denuncia) where id_denuncia in (select id_denuncia from migrantes2denuncias)");
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

	public function allMigrantes() {
		$sq  = " SELECT paises.nombre AS pais, estados.nombre AS estado, migrantes.municipio, generos.nombre AS genero"; 
		$sq	.= " migrantes.edad, migrantes.ocupacion, estado_civil.nombre AS estado_civil, migrantes.escolaridad,";
		$sq	.= " migrantes.nombre_pueblo_indigena, migrantes.espanol, migrantes.id_lugar_denuncia  ";
		$sq .= " FROM migrantes, lugares_denuncia, paises, estados, generos, estado_civil ";
		$sq .= " WHERE migrantes.id_lugar_denuncia = lugares_denuncia.id_lugar_denuncia";
		$sq .= " AND migrantes.id_pais = paises.id_pais";
		$sq .= " AND migrantes.id_estado = estados.id_estado";
		$sq .= " AND migrantes.id_genero = generos.id_genero";
		$sq .= " AND migrantes.id_estado_civil = estado_civil.id_estado_civil";

		$query = $this->db->query($sq);

        return $query->result();

		//$this->load->helper('download');
		//force_download("base_de_datos_paises.csv", $data);
	}

}
