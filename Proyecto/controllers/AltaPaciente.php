<?php

//controllers/altapaciente.php

require '../fw/fw.php';
require '../models/Pacientes.php';
require '../models/ObrasSociales.php';
require '../views/ExistePaciente.php';
require '../views/FormularioAlta.php';
require '../views/nuevoTurno.php';
require '../models/turnos.php';
require '../views/turnoagregado.php';
require '../views/Horarios.php';
require '../views/Pacientes2.php';

		
$p = new Pacientes(); 

 if(count($_POST) > 0){
	$v = new pacienteNuevo2();
		//$v->Pacientes = $p->existePaciente($dni);
	$v->render();

 
	if(count($_POST) > 0) {
		
		if(!isset($_POST['nombre'])) die ("error1");
		if(strlen($_POST['nombre'])<1) die ("error2");
		if(strlen($_POST['nombre'])>20) die ("error3");
		$_POST['nombre'] = mysqli_escape_string($cn, $_POST['nombre']);
		$_POST['nombre'] = str_replace('%', '\%', $_POST['nombre']);
		$_POST['nombre'] = str_replace('_', '\_', $_POST['nombre']);
		

		if(!isset($_POST['apellido'])) die ("error1");
		if(strlen($_POST['apellido'])<1) die ("error5");
		if(strlen($_POST['apellido'])>20) die ("error6");
		$_POST['apellido'] = mysqli_escape_string($cn, $_POST['apellido']);
		$_POST['apellido'] = str_replace('%', '\%', $_POST['apellido']);
		$_POST['apellido'] = str_replace('_', '\_', $_POST['apellido']);

		
	
		if(!isset($_POST['dni'])) die ("error7");
		if(!ctype_digit($_POST['dni'])) die ("error8");
		if($_POST['dni']<1) die("error9");
		if($_POST['dni']>8) die("error99");

		if(!isset($_POST['os'])) die ("error10");
		if(!ctype_digit($_POST['dni'])) die ("error8");
		if($_POST['os']<1) die("error9");
		if($_POST['os']>10) die("error99");
	
	
		if(!isset($_POST['mail'])) die ("error13");
	
		if(!isset($_POST['password'])) die ("error16");
		if(!ctype_digit($_POST['password'])) die ("error17");
		if($_POST['password']<1) die("error18");
		if($_POST['password']>999999) die("error18");

		
							$nombre = $_POST['nombre']; 
							$apellido = $_POST['apellido'];
							$dni = $_POST['dni'];
							$obra_social = $_POST['os']; 
							$mail = $_POST['mail'];
							$password = $_POST['password'];

		$p->crearPaciente($nombre, $apellido, $dni, $obra_social, $mail, $password );
	}								
}else{
	$o = new ObraSocial();
		$v = new FormularioAlta();
		$v->ObraSocial = $o->getTodas();
		$v->render();
}
	
		




