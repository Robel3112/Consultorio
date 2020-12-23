<?php

// controllers/turnos.php

session_start();

require '../fw/fw.php';
require '../models/turnos.php';
require '../models/Pacientes.php';
require '../views/nuevoTurno.php'; //nuevoTurno;
require '../views/turnoagregado.php'; //turnoagregado;
require '../views/Horarios.php';  //horariodisp;
require '../views/FormularioAlta.php'; //obrasocial


if(isset($_POST['id_turno'])){
	$t = new Turnos;

	$id_turno=$_POST['id_turno'];

	$auxd['Dia']= $t->devuelvedia($id_turno);
	$auxf['Fecha'] = $t->devuelvefecha($id_turno);
	$auxh['Horario']  = $t->devuelvehorario($id_turno);

	$dia= $auxd['Dia'];
	$fecha= $auxf['Fecha'];
	$hora= $auxh['Horario']; 
 
	$id_paciente = $_SESSION['id_paciente'];
	$turnoagregado = $t->agregarTurnos($id_paciente, $dia, $fecha, $hora); 
	
	$v = new turnoagregado();
	$v->Turno = $turnoagregado;
	$v->render();


	$turnoretirado = $t->retirardisponibilidad($id_turno);

	$auxcant = $t->diasenlabase();
	$auxult['Fecha'] = $t->ultimodiadelabase();
		$date1 = $auxult['Fecha'];
			$date_1 = new DateTime("$date1");
			$date_1->format('Y-m-d');
			$date2 = new DateTime("NOW");
			
		var_dump($auxcant);?></br><?php
		if($auxcant < 84) {
		
			$date2->add(new DateInterval ('P1D'));
			$date2->format('Y-m-d');
				
				$t->agregardiasalabase($date_1, $date2);
			}
			
			if(($auxcant > 168) || ($date_1 < $date2)){

				$date2->format('Y-m-d');
				$t->eliminardiasdelabase($date2, $date_1);
			}
			
		
	
	}else{

	$p = new Pacientes;
	$t = new Turnos;
	$todosturnos = $t->turnosdisponibles();

	$v = new nuevoTurno();
	$v->nuevoTurno = $todosturnos ; //muestra fecha y hora libre
	$v->render();
}
