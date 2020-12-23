<?php

// models/ObrasSociales.php

class ObraSocial extends Model {

	public function getTodas() {
		$this->db->query("SELECT * FROM obras_sociales");
		return $this->db->fetchAll();
	}

}