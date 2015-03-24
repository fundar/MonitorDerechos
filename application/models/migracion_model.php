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
	
	public function allDenuncias($start = "2014-01-01", $end = "2014-12-31") {
		$sq  = " SELECT intentos, motivo_migracion, coyote_guia, lugar_de_usa, viaja_solo, deportado "; 
		$sq	.= " , espacio_fisico_injusticia_homologada AS espacio_fisico_injusticia, numero_migrantes_injusticia";
		$sq	.= " , detonante_injusticia_homologada as detonante_injusticia,algun_nombre_responsables, uniformado_responsables";
		$sq	.= " , responsables_abordo_vehiculos_responsables AS responsables_abordo_vehiculos";
		$sq	.= " , derechos.todos AS derechos, violaciones.todas as violaciones_derechos";
		$sq	.= " , autoridades.nombre AS autoridad, paises.nombre AS pais_origen";
		$sq	.= " , migrantes.escolaridad, migrantes.edad, migrantes.ocupacion_homologada AS ocupacion, migrantes.nombre_pueblo_indigena, migrantes.espanol";
		$sq	.= " , lugares_denuncia.nombre AS lugar_denuncia, generos.nombre AS genero, estado_civil.nombre AS estado_civil";
		$sq	.= " , tipos_quejas.nombre AS queja, estados.nombre AS estado_injusticia";

		$sq .= " FROM denuncias";
		/* Todos los Derechos involucrados por Denuncia  */
		$sq .= "   	JOIN ( SELECT denuncias.id_denuncia, GROUP_CONCAT(derechos.nombre SEPARATOR ' - ') AS todos ";
		$sq .= "   	  FROM derechos_violados2denuncias, derechos, denuncias";
		$sq .= "      WHERE derechos_violados2denuncias.id_denuncia = denuncias.id_denuncia ";
		$sq .= "   	  AND derechos.id_derecho = derechos_violados2denuncias.id_derecho";
		$sq .= "   	  GROUP BY denuncias.id_denuncia";
	  	$sq .= "   	) AS derechos";
   		$sq .= "	ON derechos.id_denuncia = denuncias.id_denuncia";
		/* Todas los Violaciones a los Derechos por Denuncia  */
   		$sq .= "   	JOIN ( SELECT denuncias.id_denuncia, GROUP_CONCAT(violacion_derechos.nombre SEPARATOR ' - ') AS todas ";
		$sq .= "   	  FROM violacion_derechos2denuncias, violacion_derechos, denuncias";
		$sq .= "      WHERE violacion_derechos2denuncias.id_denuncia = denuncias.id_denuncia ";
		$sq .= "   	  AND violacion_derechos.id_violacion = violacion_derechos2denuncias.id_violacion";
		$sq .= "   	  GROUP BY denuncias.id_denuncia";
	  	$sq .= "   	) AS violaciones";
   		$sq .= "	ON violaciones.id_denuncia = denuncias.id_denuncia";

   		$sq .= "    JOIN autoridades_responables2denuncias ON autoridades_responables2denuncias.id_denuncia = denuncias.id_denuncia";
   		$sq .= "    JOIN autoridades ON autoridades.id_autoridad = autoridades_responables2denuncias.id_autoridad";
   		$sq .= "    JOIN migrantes2denuncias ON migrantes2denuncias.id_denuncia = denuncias.id_denuncia";
   		$sq .= "    JOIN migrantes ON migrantes2denuncias.id_migrante = migrantes.id_migrante";
		$sq .= "    JOIN lugares_denuncia ON migrantes.id_lugar_denuncia = lugares_denuncia.id_lugar_denuncia";
		$sq .= "    JOIN paises ON migrantes.id_pais = paises.id_pais";
		$sq .= "    JOIN generos ON migrantes.id_genero = generos.id_genero";
		$sq .= "    JOIN estado_civil ON migrantes.id_estado_civil = estado_civil.id_estado_civil";
   		$sq .= "    JOIN tipos_quejas ON tipos_quejas.id_tipo_queja = denuncias.id_tipo_queja";
   		$sq .= "    JOIN estados ON estados.id_estado = denuncias.id_estado_injusticia";

		$sq .= " WHERE fecha_injusticia BETWEEN '" . $start . "' AND '" . $end . "'";

		$query = $this->db->query($sq);

        return $query->result();
	}

	public function deleteMigrante($id = -1){
		return $this->db->delete( 'migrantes', array('id_migrante' => $id) ); 
	}

	public function getMigrante($id = -1){
		$query = $this->db->get_where('migrantes', array('nombre' => $id), 1);
		foreach ($query->result() as $row) return $row->id_migrante;
	}

	public function insertMigrante2denuncia($id_migrante, $id_denuncia){
		$data = array( 'id_migrante' => $id_migrante, 'id_denuncia' => $id_denuncia );

		$this->db->trans_start();
	   	$this->db->insert('migrantes2denuncias', $data);
	   	$insert_id = $this->db->insert_id();
	   	$this->db->trans_complete();
   		return $insert_id;
	}



}

// SELECT pais.nombre AS pais 
// FROM pais, migrantes2denuncias, migrantes
// Where migrantes2denuncias.id_denuncia = denuncias.id_denuncia
// and migrantes.id_migrante = migrantes2denuncias.id_migrante
// and paises.id_pais = migrantes.id_pais
//