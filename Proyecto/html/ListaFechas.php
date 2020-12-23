<!-- html/ListaFechas.php -->



<!DOCTYPE html>
<html>
<head>
	<title>Lista de fechas</title>
		<link href="./css/ListaFechas.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="contenedor">
		<div class="cabecera">
			<h1>Consultorio de Kinesiolog&iacutea y Fisiolog&iacutea</h1><hr>
		</div>
			<div class="form">
				
					<table>
						<tr><th>D&iacutea</th><th>Fecha</th><th>Hora</th></tr>
						</br>
						<?php foreach ($this->fechas as $f ) { ?>
							<tr><td>&nbsp&nbsp&nbsp&nbsp<?= $f['dia'] ?>&nbsp&nbsp&nbsp&nbsp</td>
								<td>&nbsp&nbsp&nbsp&nbsp<?= $f['fecha'] ?>&nbsp&nbsp&nbsp&nbsp</td>
							    <td>&nbsp&nbsp&nbsp&nbsp<?= $f['hora']?>&nbsp&nbsp&nbsp&nbsp </td>
							</tr>
						<?php } ?>
						

					</table>
			</div>
			<div class="link">
			<a href="./logout.php">Cerrar sesi&oacuten</a></br>
			<a href="./bienvenida">Atr&aacutes</a>
		</div>
	</div>		

</body>
</html>