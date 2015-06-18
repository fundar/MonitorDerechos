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
		$sq  = " SELECT paises.nombre AS pais_origen, estados.nombre AS estado_origen, migrantes.municipio AS municipio_origen,"; 
		$sq	.= "   generos.nombre AS genero, migrantes.edad, migrantes.ocupacion_homologada AS ocupacion, estado_civil.nombre AS estado_civil,";
		$sq	.= "   migrantes.escolaridad, migrantes.nombre_pueblo_indigena, migrantes.espanol,";
		$sq	.= "   lugares_denuncia.nombre AS lugar_denuncia";
		$sq .= " FROM migrantes, lugares_denuncia, paises, estados, generos, estado_civil ";
		$sq .= " WHERE migrantes.id_lugar_denuncia = lugares_denuncia.id_lugar_denuncia";
		$sq .= "   AND migrantes.id_pais = paises.id_pais";
		$sq .= "   AND migrantes.id_estado = estados.id_estado";
		$sq .= "   AND migrantes.id_genero = generos.id_genero";
		$sq .= "   AND migrantes.id_estado_civil = estado_civil.id_estado_civil";

		$query = $this->db->query($sq);

        return $query->result();
	}
	
	public function allDenuncias($start, $end) {
  	$sq  = "	SELECT intentos, motivo_migracion, coyote_guia, lugar_de_usa, viaja_solo, deportado ";
		$sq .= " , espacio_fisico_injusticia_homologada AS espacio_fisico_injusticia, numero_migrantes_injusticia ";
		$sq .= " , detonante_injusticia_homologada as detonante_injusticia,algun_nombre_responsables, uniformado_responsables ";
		$sq .= " , responsables_abordo_vehiculos_responsables AS responsables_abordo_vehiculos ";
		$sq .= " , derechos.todos AS derechos, violaciones.todas as violaciones_derechos ";
		$sq .= " , autoridades.nombre AS autoridad, migrantes.pais AS pais_origen, migrantes.estado AS estado_origen ";
		$sq .= " , migrantes.escolaridad, migrantes.edad, migrantes.ocupacion_homologada AS ocupacion, migrantes.nombre_pueblo_indigena, migrantes.espanol ";
		$sq .= " , migrantes.lugar_denuncia AS lugar_denuncia, migrantes.genero AS genero, migrantes.estado_civil AS estado_civil ";
		$sq .= " , tipos_quejas.nombre AS queja, estados.nombre AS estado_injusticia  ";
		$sq .= " FROM denuncias ";
		$sq .= " LEFT JOIN (  ";
		$sq .= " 	 SELECT id_denuncia, GROUP_CONCAT(d.nombre SEPARATOR ' - ') AS todos  ";
		$sq .= "   FROM derechos_violados2denuncias d2d ";
		$sq .= "   LEFT JOIN derechos d ON d2d.id_derecho = d.id_derecho  ";
		$sq .= "   GROUP BY id_denuncia ";
		$sq .= " ) AS derechos ON denuncias.id_denuncia = derechos.id_denuncia  ";
		$sq .= " LEFT JOIN ( SELECT id_denuncia, GROUP_CONCAT(v.nombre SEPARATOR ' - ') AS todas  ";
		$sq .= "   FROM violacion_derechos2denuncias v2d ";
		$sq .= "   LEFT JOIN violacion_derechos v ON v2d.id_violacion = v.id_violacion  ";
		$sq .= "   GROUP BY id_denuncia ";
		$sq .= " ) AS violaciones ON denuncias.id_denuncia = violaciones.id_denuncia ";
		$sq .= " LEFT JOIN (  ";
		$sq .= " 	SELECT id_denuncia, p.nombre pais, e.nombre estado, l.nombre lugar_denuncia, g.nombre genero, ec.nombre estado_civil, escolaridad, edad ";
		$sq .= " 	, ocupacion_homologada, nombre_pueblo_indigena, espanol ";
		$sq .= " 	FROM migrantes2denuncias m2d ";
		$sq .= " 	LEFT JOIN migrantes m ON m2d.id_migrante = m.id_migrante  ";
		$sq .= " 	LEFT JOIN paises p ON m.id_pais = p.id_pais  ";
		$sq .= " 	LEFT JOIN estados e ON m.id_estado = e.id_pais  ";
		$sq .= " 	LEFT JOIN lugares_denuncia l ON m.id_lugar_denuncia = l.id_lugar_denuncia  ";
		$sq .= " 	LEFT JOIN generos g ON m.id_genero = g.id_genero  ";
		$sq .= " 	LEFT JOIN estado_civil ec ON m.id_estado_civil = ec.id_estado_civil  ";
		$sq .= " 	GROUP BY id_denuncia ";
		$sq .= " ) AS migrantes ON denuncias.id_denuncia = migrantes.id_denuncia ";
		$sq .= " LEFT JOIN ( ";
		$sq .= " 	SELECT id_denuncia, a.nombre ";
		$sq .= " 	FROM autoridades_responables2denuncias a2d ";
		$sq .= " 	LEFT JOIN autoridades a ON a2d.id_autoridad =  a.id_autoridad  ";
		$sq .= " 	GROUP BY id_denuncia ";
		$sq .= " 	) AS autoridades ON denuncias.id_denuncia = autoridades.id_denuncia ";
		$sq .= " LEFT JOIN tipos_quejas ON denuncias.id_tipo_queja = tipos_quejas.id_tipo_queja ";
		$sq .= " LEFT JOIN estados ON denuncias.id_estado_injusticia = estados.id_estado  ";
		$sq .= " WHERE fecha_injusticia BETWEEN '" . $start . "' AND '" . $end . "'";
		$query = $this->db->query($sq);
    return $query->result();
	}

	public function deleteMigrante($id = -1){
		return $this->db->delete( 'migrantes', array('id_migrante' => $id) ); 
	}

	public function getMigrante($folio = -1){
		$query = $this->db->get_where('migrantes', array('folio' => $folio), 1);
		foreach ($query->result() as $row) return array($row->id_migrante, $row->nombre) ;
	}

	public function getMigrantes(){
		$query = $this->db->get('migrantes');
		return $query->result_array();
	}

	public function insertMigrante2denuncia($id_migrante, $id_denuncia){
		$data = array( 'id_migrante' => $id_migrante, 'id_denuncia' => $id_denuncia );

		$this->db->trans_start();
	   	$this->db->insert('migrantes2denuncias', $data);
	   	$insert_id = $this->db->insert_id();
	   	$this->db->trans_complete();
   		return $insert_id;
	}

	public function getEstados() {
		$data = $this->db->query("SELECT nombre, id_estado FROM estados");
		return $data;
	}
	
	
	public function getPaises() {
		$data = $this->db->query("SELECT nombre, id_pais FROM paises");
		return $data;
	}

	public function getAutoridades() {
		$data = $this->db->query("SELECT nombre, id_autoridad FROM autoridades");
		return $data;
	}

	public function getTransportes() {
		$data = $this->db->query("SELECT nombre, id_transporte FROM transportes");
		return $data;
	}

	public function getEstadosCasos() {
		$data = $this->db->query("SELECT nombre, id_estado_caso FROM etados_casos");
		return $data;
	}

}

// SELECT pais.nombre AS pais 
// FROM pais, migrantes2denuncias, migrantes
// Where migrantes2denuncias.id_denuncia = denuncias.id_denuncia
// and migrantes.id_migrante = migrantes2denuncias.id_migrante
// and paises.id_pais = migrantes.id_pais
//