<!--html/nuevoTurno.php -->



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="./css/CancelarTurno.css" rel="stylesheet" type="text/css">
	
</head>
<body>
	<div class="contenedor">
		<div class="cabecera">
				<h1>Consultorio de Kinesiolog&iacutea y Fisiolog&iacutea</h1><hr>
		</div>
		
			<div class="form">
				
				<div class="titulo">Elija el horario que desea cancelar:<br/><br/>
				</div>
										
					<?php foreach ($this->turnos as $t ) { ?>
								
						<div class="botones">
							<form action="" method="post">
							
								<label name="id_fecha" value="<?= $t['id_fecha'] ?>"><?= $t['dia']?> <?= $t['fecha']?> <?= $t['hora'] ?>  </label>
								
								<input type="submit" value="Cancelar" />
								<input type="hidden" name="id_fecha" value="<?= $t['id_fecha'] ?>" />
										
							</form>
						</div>
					<?php } ?>

							<br/><br/>

			</div>
			<div class="link">
				<a href="./logout.php">Cerrar sesi&oacuten</a></br>	
				<a href="./bienvenida">Atr&aacutes</a>	
			</div>
	</div>
