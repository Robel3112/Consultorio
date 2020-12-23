<?php

// controllers/fechasdisponibles.php
session_start();

require '../fw/fw.php';
require '../models/Pacientes.php';
require '../models/turnos.php';
require '../views/CancelarTurno.php';
require '../views/turnocanceladook.php';



$t = new turnos();

	$id_paciente = $_SESSION['id_paciente'];
	$turnopaciente = $t->turnospaciente($id_paciente);
	
	

	if(count($_POST) > 0){
		$id_fecha = $_POST['id_fecha'];

		$auxdia['dia']=$t->DevuelveDia1($id_fecha);
		$auxfecha['fecha']=$t->DevuelveFecha1($id_fecha);
		$auxhora['hora']=$t->DevuelveHorario1($id_fecha);
		$Dia=$auxdia['dia'];
		$Fecha=$auxfecha['fecha'];
		$Horario=$auxhora['hora'];

		$t->restablecerturno($Dia, $Fecha, $Horario);


		$t->cancelarturno($id_fecha);

		$v = new TurnoCanceladook();
		$v->render();
		
	}else{
		$v = new CancelarTurno();
		$v->turnos = $turnopaciente;
		$v->render();
}
	