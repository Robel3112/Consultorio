<?php
setlocale(LC_ALL,"es_ES");
// models/Turnos.php

class Turnos extends Model {

	public function validacionid_turno(){
		if(!isset($id_turno)) die ("error1");
		if(!ctype_digit($id_turno)) die ("error2");
		if($id_turno<1) die("error3");
	}

	public function validaciondia(){
		if(!isset($dia)) die ("error4");
		if(strlen($dia)<1) die ("error5");
		if(strlen($dia)>10) die ("error6");
		$dia = $this->db->escape($dia);
		$dia = $this->db->escapeWildcard($dia);
	}

	public function validacionid_paciente(){
		if(!isset($id_paciente)) die ("error7");
		if(!ctype_digit($id_paciente)) die ("error8");
		if($id_paciente<1) die("error9");
	}

	public function validacion_fecha(){
		$anio = substr($fecha, 0, 3);
		if(!ctype_digit($anio)) die ("error10");
		if($anio > date ("Y")) die("error11");
		if($anio < (date ("Y")-1)) die("error12");	
		$mes = substr($fecha, 5, 6);
		if(!ctype_digit($mes)) die ("error13");
		if($mes < 1) die("error14");
		if($mes > 12) die("error15");
		$dia = substr($fecha, 8, 9);
		if(!ctype_digit($dia)) die ("error16");
		if($dia < 1) die("error17");
		if($dia > 31) die("error18");
	}

	public function validacion_horario(){
		$Hora = substr($hora, 0, 1);
		if(!ctype_digit($hora)) die ("error19");
		if($Hora < 1) die("error20");
		if($Hora > 14) die("error21");
		$minutos = substr($Hora, 3, 4);
		if(!ctype_digit($minutos)) die ("error22");
		if($minutos != 0) die("error23");
		if($minutos != 30) die("error24");
		$segundos = substr($Hora, 6, 7);
		if(!ctype_digit($segundos)) die ("error25");
		if($segundos != 0 ) die("error26");
		
	}
	

	public function buscarTurno($fecha) {  
		$this->db->query("SELECT fecha FROM fechas
							WHERE $fecha LIMIT 1"); 
		$this->db->fetch();
	}

	public function turnosdisponibles(){
		$this->db->query("SELECT * FROM turnos1
							ORDER BY Fecha and Horario
							LIMIT 30");
		return $this->db->fetchAll();
	}

	public function retirardisponibilidad($id_turno){
		$this->db->query ("DELETE FROM turnos1
							WHERE turnos1.id_turno= $id_turno LIMIT 1");

	}
	public function idpaciente($dni){
		$this->db->query("SELECT id_paciente FROM pacientes
							WHERE dni = $dni LIMIT 1");
	}

	public function agregarTurnos($id_paciente, $dia, $fecha, $hora) {
		$this->db->query("INSERT INTO fechas
							(id_paciente, dia, fecha, hora)
							VALUES
							('$id_paciente', '$dia', '$fecha', '$hora') ");
	}

	public function devuelvedia($id_turno){
		$this->db->query("SELECT * FROM turnos1
							WHERE id_turno=$id_turno");
		$auxd = $this->db->fetch();
		return $auxd['Dia']; 
	}  

	public function devuelvefecha($id_turno){
		$this->db->query("SELECT * FROM turnos1
							WHERE id_turno=$id_turno");
		$auxf = $this->db->fetch();
		return $auxf['Fecha'];
	}

	public function devuelvehorario($id_turno){
		$this->db->query("SELECT * FROM turnos1
							WHERE id_turno=$id_turno");
		$auxh = $this->db->fetch();
		return $auxh['Horario'];
	}  

	public function turnospaciente($id_paciente){
		$this->db->query("SELECT * FROM fechas
							WHERE id_paciente=$id_paciente
							ORDER BY Fecha");
		return $this->db->fetchAll();
	}

	public function getTodos() {
		$this->db->query("SELECT * FROM fechas
						LEFT JOIN pacientes ON 
							pacientes.id_paciente=fechas.id_paciente");
		return $this->db->fetchAll();
	}

	public function cancelarturno($id_fecha){
		$this->db->query("DELETE FROM fechas 
							WHERE fechas.id_fecha=$id_fecha");
	}

	public function restablecerturno($Dia, $Fecha, $Horario){
		$this->db->query("INSERT INTO turnos1
							(Dia, Fecha, Horario)
							VALUES
							('$Dia', '$Fecha', '$Horario')");
	}

	public function DevuelveDia1($id_fecha){
		$this->db->query("SELECT * FROM fechas
							WHERE id_fecha=$id_fecha");
		$auxdia = $this->db->fetch();
		return $auxdia['dia']; 
	}  

	public function DevuelveFecha1($id_fecha){
		$this->db->query("SELECT * FROM fechas
							WHERE id_fecha=$id_fecha");
		$auxfecha = $this->db->fetch();
		return $auxfecha['fecha'];
	}

	public function DevuelveHorario1($id_fecha){
		$this->db->query("SELECT * FROM fechas
							WHERE id_fecha=$id_fecha");
		$auxhora = $this->db->fetch();
		return $auxhora['hora'];
	}

	public function ultimodiadelabase(){
		$this->db->query("SELECT * FROM turnos1
							ORDER BY 'Fecha'  ASC
								LIMIT 1");
		$auxult = $this->db->fetch();
		return $auxult['Fecha'];
	}

	public function diasenlabase(){
		$this->db->query("SELECT * FROM turnos1 
							WHERE Fecha");
		$auxcant = $this->db->numRows();
		return $auxcant;
	}


	public function agregardiasalabase($date_1, $date2){
		
		$date1=date_format($date_1, "Y-m-d");
		$date_2=date_format($date2, "Y-m-d");
		$timeInicio=strtotime($date1);
		$timeFin=strtotime($date_2);
		$dia = 86400;

		while($timeInicio <= $timeFin){
			
			$fechaHoy = date ("Y-m-d", $timeInicio);
			$ldiadelasemana = date("l", $timeInicio);

			if($ldiadelasemana == "Monday") $diadelasemana = "Lunes";
			if($ldiadelasemana == "Tuesday")  continue1;
			if($ldiadelasemana == "Wednesday")$diadelasemana = "Miércoles";
			if($ldiadelasemana == "Thursday")continue1;
			if($ldiadelasemana == "Friday")	$diadelasemana = "Viernes";
			if($ldiadelasemana == "Saturday")continue1;
			if($ldiadelasemana == "Sunday") continue1;
				
			
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '09:00');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '09:30');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '10:00');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '10:30');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '11:00');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '11:30');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '12:00');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '12:30');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '13:00');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '13:30');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '14:00');");
				$this->db->query("INSERT INTO turnos1
								 (id_turno, Dia, Fecha, Horario)
								  VALUES (NULL, '$diadelasemana', '$fechaHoy', '14:30');");
						
							
				$timeInicio += $dia;
			}
		
		}

	public function eliminardiasdelabase($date2, $date_1){
		$inicio = date_format($date_1, "Y-m-d");
		$date_2=date_format($date2, "Y-m-d");
		$timeInicio=strtotime($date1);
		$timeFin=strtotime($date_2);
		$dia = 86400;

	while($timeInicio <= $timeFin) {
		//var_dump($date2);
		//var_dump($date_1);
	 	
			$inicio =  date ("Y-m-d", $timeInicio);
			//$inicio->format('Y-m-d');
			//echo $inicio;

			$this->db->query("DELETE FROM turnos1
								WHERE Fecha = '$inicio' 
								ORDER BY Fecha");

			
			$timeInicio += $dia;
			//date_format($date2,'Y-m-d');
			//$date2 = date_create('$date2');
		}
	}
}

