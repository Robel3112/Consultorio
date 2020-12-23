<!-- html.ExistePaciente.php -->


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="./css/ExistePaciente.css" rel="stylesheet" type="text/css">
	
</head>
<body>
	<div class="contenedor">
		<div class="cabecera">
			<h1>Consultorio de Kinesiolog&iacutea y Fisiolog&iacutea</h1><hr>
		</div>
			<div class="form">
				<p>Bienvenid@ <?=$_SESSION['nombre']?> </p>
			
					<form action="" method="POST">
				<div class="button">
					<a href="./turnos-solicitados">Mis Turnos</a></br></br>
					<a href="./turnos-disponibles">Pedir Turno</a></br></br>
					<a href="./cancelar-turno">Cancelar Turno</a></br></br>

				</div>
					</form>
		
			</div>
			<div class="link">
		<a href="./logout.php">Cerrar sesi&oacuten</a>
		</div>
	</div>	
	

</body>
</html>