<?php

// controllers/fechasdisponibles.php
session_start();

require '../fw/fw.php';
require '../models/Pacientes.php';
require '../models/turnos.php';
require '../views/ListaFechas.php';


$t = new turnos();
$id_paciente = $_SESSION['id_paciente'];
$tpaciente = $t->turnospaciente($id_paciente);

$v = new ListaFechas();
$v->fechas = $tpaciente;
$v->render();