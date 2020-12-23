<!--html/nuevoTurno.php -->



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="./css/nuevoTurno.css" rel="stylesheet" type="text/css">
	
</head>
<body>
	<div class="contenedor">
		<div class="cabecera">
				<h1>Consultorio de Kinesiolog&iacutea y Fisiolog&iacutea</h1><hr>
		</div>
		
			<div class="form">
				
				<div class="titulo">Elija su horario de atenci&oacuten:<br/><br/>
				</div>
										
					<?php foreach ($this->nuevoTurno as $t ) { ?>
								
						<div class="botones">
							<form action="" method="post">
								<input type="submit" value="<?= $t['Dia'] ?> <?= $t['Fecha'] ?> <?= $t['Horario'] ?>" />
								<input type="hidden" name="id_turno" value="<?= $t['id_turno'] ?>" />
									
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

					

					
		</body>
</html>

	