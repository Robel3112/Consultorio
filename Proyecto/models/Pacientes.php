<?php

// models/Pacientes.php

class Pacientes extends Model {

public function validacionpsw(){
	if(!isset($password)) die ("error1");
	if(strlen($password)<1) die ("error2");
	if(strlen($password)>6) die ("error3");
	if(!ctype_digit($password)) die ("error4");
	if($password<1) die("error5");
}

public function validaciondni(){
	if(!isset($dni)) die ("error6");
	if(strlen($dni)<1) die ("error7");
	if(strlen($dni)>8) die ("error8");
	if(!ctype_digit($dni)) die ("error9");
	if($dni <1) die("error10");
}

public function validacionnombre(){
	if(!isset($nombre)) die ("error11");
	if(strlen($nombre)<1) die ("error12");
	if(strlen($nombre)>20) die ("error13");
	$nombre = $this->db->escape($nombre);
	$nombre = $this->db->escapeWildcard($nombre);
}


public function validacionapellido(){
	if(!isset($apellido)) die ("error11");
	if(strlen($apellido)<1) die ("error12");
	if(strlen($apellido)>20) die ("error13");
	$apellido = $this->db->escape($apellido);
	$apellido = $this->db->escapeWildcard($apellido);
}

public function validacionos(){
	if(!isset($obra_social)) die ("error11");
	if(strlen($obra_social)<1) die ("error12");
	if(strlen($obra_social)>20) die ("error13");
	$obra_social = $this->db->escape($obra_social);
	$obra_social = $this->db->escapeWildcard($obra_social);
}

public function validacion_mail(){
	if(!isset($mail)) die ("error14");
	if(strlen($mail)<1) die ("error15");
	if(strlen($maill)>20) die ("error16");
	$mail = $this->db->escape($mail);
	$mail = $this->db->escapeWildcard($mail);
}


	public function getTodosPacientes() {
		$this->db->query("SELECT * FROM pacientes");
		return $this->db->fetchAll();
	}
	public function contraseña($password){
		$this->db->query("SELECT password FROM pacientes
							WHERE password = $password LIMIT 1");
		$auxpass = $this->db->fetch();
		return $auxpass['password'];
		
	}

	public function validarusuario($dni, $password){
		$this->db->query("SELECT * 
							FROM Pacientes
							WHERE dni = $dni and password = $password
							LIMIT 1");
		if($this->db->numRows() != 1) return false;
		$auxid = $this->db->fetch();
		return $auxid['id_paciente'];
	}

	public function getNombrePaciente($dni){
		$this->db->query("SELECT nombre FROM pacientes
								WHERE dni = $dni LIMIT 1");
		$aux = $this->db->fetch();
		return $aux['nombre'];
	}

	public function existePaciente($dni) {
		if(!ctype_digit($dni)) return false;
		$this->db->query("SELECT dni FROM pacientes
							WHERE dni = $dni LIMIT 1 ");
		if($this->db->numRows() != 1) return false;
		$auxdni = $this->db->fetch();
		return $auxdni['dni'];
	}
	
	public function crearPaciente( $nombre, $apellido, $dni, $obra_social, $mail, $password ){
									
		$this->db->query("INSERT INTO pacientes 
					( nombre, apellido, dni, id_obra_social, mail, password)
						VALUES 
						 ('$nombre', '$apellido', $dni, $obra_social, '$mail', '$password') ");
	}
	
}