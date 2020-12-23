<?php

//controllers/bienvenidos.php

session_start();

require '../fw/fw.php';
require '../models/Pacientes.php';
require '../views/Pacientes.php';
require '../views/ExistePaciente.php';
require '../views/FormularioAlta.php';
require '../views/nuevoTurno.php';
require '../models/turnos.php';
require '../views/turnoagregado.php';
require '../views/Horarios.php';
require '../views/Pacientes2.php';

$p = new Pacientes();

$_SESSION['nombre'];

			 	$v = new ExistePaciente();
			 	//$v->nombrePaciente = $aux['nombre'];
			 	$v->render();