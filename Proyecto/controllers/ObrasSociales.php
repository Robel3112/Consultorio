<?php

// controllers/ObraSociales.php

require '../fw/fw.php';
require '../models/ObrasSociales.php';
require '../views/FormularioAlta.php';


$o = new ObraSocial();
$todas = $o->getTodas();


$v = new FormularioAlta();
$v->ObraSocial = $todas;
$v->render();