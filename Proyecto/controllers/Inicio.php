<?php

//controllers/Inicio.php

session_start();

require '../fw/fw.php';
require '../models/Pacientes.php';
require '../models/ObrasSociales.php';
require '../views/Pacientes.php';
require '../views/ExistePaciente.php';
require '../views/FormularioAlta.php';
require '../views/nuevoTurno.php';
require '../models/turnos.php';
require '../views/turnoagregado.php';
require '../views/Horarios.php'; //horariodisp/Horarios
require '../views/Pacientes2.php'; //Pacientes/PacienteNuevo2
require '../views/menu.php';

$p = new Pacientes();

	if(count($_POST) > 0){
		$dni= $_POST['dni'];
		$password= $_POST['password'];
		
		$auxid = $p->validarusuario($dni, $password);
			if($auxid){
				$id_paciente=$auxid['id_paciente'];

					 	$_SESSION['logueado']=true;
					 	$_SESSION['id_paciente'] = $id_paciente;

						$aux['nombre'] = $p->getNombrePaciente($dni);
						$_SESSION['nombre'] = $aux['nombre'];


		$v = new menu();
		//$v->Pacientes = $p->existePaciente($dni);
		$v->render();
			 	
			}

	}else{
		$p = new Pacientes();

		$v = new pacienteNuevo2();
		//$v->Pacientes = $p->existePaciente($dni);
		$v->render();
	}
		

