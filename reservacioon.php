<?php
require_once("conexion.php");

if(isset($_GET['btn-signup']))
{
	$nombre = trim($_GET['nombrehuesped']);
	$apellido = trim($_GET['apellidohuesped']);
	$email = trim($_GET['correo']);
	$bebes = $_GET['bebes'];
	$adultos = $_GET['adultos'];
	$ninos = $_GET['ninos'];
	$entrada = $_GET['entrada'];
	$salida = $_GET['salida'];

	if(empty($nombre))
	{
		$error = "enter your name !";
		$code = 1;
	}
	else if(!ctype_alpha($nombre))
	{
		$error = "letters only !";
		$code = 1;
	}
	else if(empty($apellido))
	{
		$error = "enter your apellido !";
		$code = 2;
	}
	else if(!ctype_alpha($apellido))
	{
		$error = "letters only !";
		$code = 2;
	}
	else if(empty($email))
	{
		$error = "enter your email !";
		$code = 3;
	}
	else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email))
	{
		$error = "not valid email !";
		$code = 3;
	}
	else if(@$_GET['acepto'] == false)
	{
		$error = "accept terms and conditions";
		$code = 4;
	}
	else
	{
		$sql="insert into cliente(nom_cliente, ape_cliente, correo_cliente, bebes, adultos, ninos, check_in, check_out) values('$nombre', '$apellido', '$email', '$bebes', '$adultos', '$ninos', '$entrada', '$salida')";

		$conn->query($sql);
		?>
		<script>
			alert('success');
			document.location.href='reservacion.php';
		</script>
		<?php
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		<?php
		if(isset($error))
		{
			?>
			input:focus
			{
				border:solid red 1px;
			}
			<?php
		}
		?>
		label, td
		{
			color: white;
			text-shadow: 2px 2px #505050;
		}

		h2, h4
		{
			color:  #00acc9;
			text-shadow: 2.5px 2.5px #2e2e2e;
		}

		.bordeados
		{
			border-color: #009fb3;
		}

		table
		{
			text-align: center;
		}
	</style>
	<title>Crear reservación</title>
	<link rel="stylesheet" type="text/js" href="validar.js">
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">


	<nav class="barra navbar navbar-default" role="navigation">
		<a href="index.php">HOTEL</a><br>
		<a href="habitacionesestandar.php">HABITACIONES ESTÁNDAR</a>
		<a href="habitacioneslujosas.php">HABITACIONES DE LUJO</a>
		<a href="reservacion.php">CREAR RESERVACIÓN</a>
	</nav>
</head>
<body>

	<form method="get" id="form">
		<div class="container">
			<center>
				<div class="row">
					<div class="col-md-3"></div>

					<div class="col-md-6 cuartos"><br>
						<b><h2>HOTEL LAS VENTURAS</h2></b>
						<hr>
						<b><h4>RESERVACIÓN</h4><br></b>


						<label> <svg class="bi bi-person-fill" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
						</svg> &nbsp;Nombre</label><br>
						<input type="text" name="nombrehuesped" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" placeholder="Escriba su nombre"><br>
						


						<label><svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
						</svg> &nbsp;Apellido</label><br>
						<input type="text" name="apellidohuesped" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" placeholder="Escriba su apellido" ><br>


						<label> <svg class="bi bi-at" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z" clip-rule="evenodd"/>
						</svg> &nbsp;Correo </label><br>
						<input type="email" name="correo" id="email" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" placeholder="Escriba un correo válido" ><br>
						


						<label><svg class="bi bi-calendar-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path d="M0 2a2 2 0 012-2h12a2 2 0 012 2H0z"/>
							<path fill-rule="evenodd" d="M0 3h16v11a2 2 0 01-2 2H2a2 2 0 01-2-2V3zm6.5 4a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm-8 2a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm-8 2a1 1 0 11-2 0 1 1 0 012 0zm2 1a1 1 0 100-2 1 1 0 000 2zm4-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/>
						</svg> &nbsp;Fechas</label>
						<br>

						<table width="100%" align="center">
							<tr>
								<center><td>Entrada &nbsp;<svg class="bi bi-moon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M14.53 10.53a7 7 0 01-9.058-9.058A7.003 7.003 0 008 15a7.002 7.002 0 006.53-4.47z" clip-rule="evenodd"/></svg></td></center>
									<center><td>Salida &nbsp;<svg class="bi bi-moon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M14.53 10.53a7 7 0 01-9.058-9.058A7.003 7.003 0 008 15a7.002 7.002 0 006.53-4.47z" clip-rule="evenodd"/></svg></td></center>
									</tr>

									<tr>
										<td><input type="date" name="entrada" ></td>
										<td><input type="date" name="salida" ></td>
									</tr>
								</table>

								<br>
								<label><svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
								</svg>&nbsp;Cantidades de huéspedes</label><br><br>
								<label> <svg class="bi bi-person-plus-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7.5-3a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V5.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
									<path fill-rule="evenodd" d="M13 7.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd"/>
								</svg>&nbsp; Adultos &nbsp;</label><input type="number" name="adultos" style="width: 7%; " min="0" > &nbsp; &nbsp; &nbsp;&nbsp;

								<label> <svg class="bi bi-person-plus-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7.5-3a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V5.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
									<path fill-rule="evenodd" d="M13 7.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd"/>
								</svg>&nbsp; Niños &nbsp;</label><input type="number" name="ninos" style="width: 7%; " min="0" >&nbsp; &nbsp; &nbsp;&nbsp;

								<label> <svg class="bi bi-person-plus-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7.5-3a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V5.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
									<path fill-rule="evenodd" d="M13 7.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd"/>
								</svg>&nbsp; Bebés &nbsp;</label><input type="number" name="bebes" style="width: 7%; " min="0" ><br><br>

								<input type="checkbox" name="acepto" >&nbsp;<label>Acepto los <a href="index.php" style="text-shadow: none;" title="Ver términos y condiciones del hotel">Términos y Condiciones del Hotel Las Venturas</a></label><br><br>


								<button type="submit" name="btn-signup" class="btn btn-info" style="width: 85%;" title="Verificar"> <svg class="bi bi-check" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L6.5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
								</svg></button><br>
								<table align="center" width="30%" border="0">
									<?php
									if(isset($error))
									{
										?>
										<tr>
											<td id="error"><?php echo $error; ?></td>
										</tr>
										<?php
									}
									?>
								</table>
								<br><br>
							</div>
							<div class="col-md-3"></div>
						</div>
					</center>
				</div>
			</form>

		</body>
		</html>
