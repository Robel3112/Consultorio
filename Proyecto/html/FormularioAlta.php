<!-- html/FormularioAlta.php -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="./css/FormularioAlta.css" rel="stylesheet" type="text/css">
	
</head>
<body>
	<div class="contenedor">
		<div class="cabecera">
			<h1>Consultorio de Kinesiolog&iacutea y Fisiolog&iacutea</h1><hr>
		</div>
					<div class="form">
						<br/>
						<p>Por favor ingrese sus datos:</p>
						<br/>
						<form action="" method="POST">
							<label>Nombre:</label>
							<input type="text" name="nombre">&nbsp&nbsp&nbsp&nbsp&nbsp

							<label>Apellido:</label>
							<input type="text" name="apellido"><br/><br/>

							<label>DNI:</label>
							<input type="text" name="dni">&nbsp&nbsp&nbsp&nbsp&nbsp

							<label>Obra Social:</label>
								<select name="os" id="ObraSocial">
									<?php foreach($this->ObraSocial as $o)  { ?>
									<option value="<?=$o['id_obra_social']?>">
										<?=$o['obra_social']?>
									</option>
								<?php }?>
								</select><br/><br/>

							<label>Correo electr&oacutenico:</label>
							<input type="text" name="mail"><br/><br/>

							<label>Elija una contraseña por favor:</label>
							<input type="password" name="password">

							<br/><br/><br/>
							<input type="submit"  value="Enviar" name="">
						</form>
					</div>
				<div class="link">
				<a href="./inicio-paciente">Atr&aacutes</a>
				</div>
	</div>
	
</body>
</html>

