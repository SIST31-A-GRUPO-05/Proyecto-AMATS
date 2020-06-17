<?php
require_once("conexion.php");

session_start();
  if (!isset($_SESSION['clave'])) {
    header('Location: login.php');
  } elseif ($_SESSION['clave'] == 2) {
    header('Location: administrador.php');
  }

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
	$habitacion = $_GET['habitaciones'];

	if(empty($nombre))
	{
		$error = "Ingrese su nombre";
		$code = 1;
	}
	else if(!ctype_alpha($nombre))
	{
		$error = "Ingrese solo letras";
		$code = 1;
	}
	else if(empty($apellido))
	{
		$error = "¡Escriba su apellido!";
		$code = 2;
	}
	else if(!ctype_alpha($apellido))
	{
		$error = "¡Solo letras!";
		$code = 2;
	}
	else if(empty($email))
	{
		$error = "¡Coloque su e-mail!";
		$code = 3;
	}
	else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email))
	{
		$error = "¡E-mail no valido!";
		$code = 3;
	}
	else if(@$_GET['acepto'] == false)
	{
		$error = "Debe aceptar terminos y condiciones";
		$code = 4;
	}
	else
	{
		$sql="INSERT INTO cliente(nom_cliente, ape_cliente, correo_cliente, bebes, adultos, ninos, check_in, check_out) VALUES('$nombre', '$apellido', '$email', '$bebes', '$adultos', '$ninos', '$entrada', '$salida')";

		$conn->query($sql);

		if ($conn) {
			$sql2="INSERT INTO habitacion(habitacion) VALUES('$habitacion')";

			$conn->query($sql2);	
		}
		
		?>
		<script>
			alert('Enviado con exito');
			document.location.href='verificacionrecep.php';
		</script>
		<?php
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link  rel="icon"   href="Img/Icono Hotel.ico" type=""/>
	<style type="text/css">
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
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">

 <title>Registros</title>
  <link rel="stylesheet" type="text/css" href="estilosadmin.css">
  <link rel="stylesheet" type="" href="bootstrap-4.3.1-dist/js/bootstrap.min.js">
  <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">

  <nav class="barra navbar navbar-default" role="navigation">
    <a href="administrador.php"><img src="Img/Logo.png" height="40" width="90"></a>
    <a href="registrosrecep.php">REGISTROS</a>
    <a href="reservacionrecep.php">CREAR RESERVACIÓN</a>
    <img src="Img/Logo.png" height="40" width="40" style="border-radius: 150px" data-toggle="modal" data-target="#myModal" title="Cuenta">
  </nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header cabeza-modal" style="background-color: #00aebb; color: white;">
          <h4 class="modal-title">CUENTA</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
              <center>

                <img src="Img/Logo.png" height="100" width="100" style="border-radius: 150px"><br><br>
                <label>Nombre</label>
              <input type="text" name="nombreadmin" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" ><br>

              <label>Apellido</label>
              <input type="text" name="apeadmin" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" ><br>

              <label>Contraseña actual</label>
              <input type="password" name="contraadmin" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" ><br>

              <label>Contraseña nueva</label>
              <input type="password" name="nuevacontraadmin" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" ><br>

              <label>Confirmar contraseña</label>
              <input type="password" name="confirmacioncontra" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" ><br>
              </center>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <center><button type="submit" class="btn btn-info" data-dismiss="modal">Guardar cambios</button></center>
          <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

	<form method="get">
		<div class="container">
			<center>
				<div class="row">

					<div class="col-md-3"></div>

					<div class="col-md-6 cuartos"><br><br><br>
						<img src="Img/HLV.png" height="120" width="400"
						style="margin-top: -50px;">

						<b><h4>RESERVACIÓN</h4><br></b>

						
						<label> <svg class="bi bi-person-fill" width="1.2em" height="1.2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
							</svg> &nbsp;Nombre</label><br>						
						<input type="text" name="nombrehuesped" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" placeholder="Escriba su nombre" value="<?php if(isset($nombre)){echo $nombre;} ?>" <?php if(isset($code) && $code == 1){ echo "autofocus"; }?>><br>
						
						

						<label><svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  	<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
							</svg> &nbsp;Apellido</label><br>
						<input type="text" name="apellidohuesped" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" placeholder="Escriba su apellido" value="<?php if(isset($apellido)){echo $apellido;} ?>" <?php if(isset($code) && $code == 2){ echo "autofocus"; }?>><br>

						<label> <svg class="bi bi-at" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z" clip-rule="evenodd"/>
							</svg> &nbsp;Correo </label><br>
						<input type="email" name="correo" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" placeholder="Escriba un correo válido para contactarle" value="<?php if(isset($email)){echo $email;} ?>" <?php if(isset($code) && $code == 3){ echo "autofocus"; } ?>><br>

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
  								<td><input type="date" name="entrada" required="on" min="<?php echo date("Y-m-d"); ?>" value=<?php echo date("Y-m-d"); ?>></td>
  								<td><input type="date" name="salida" required="on" min="<?php echo date("Y-m-d"); ?>" value=<?php echo date("Y-m-d"); ?>></td>
  							</tr>
  						</table>
						
						<br>
  						<label><svg class="bi bi-people-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  						<path fill-rule="evenodd" d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 100-6 3 3 0 000 6zm-5.784 6A2.238 2.238 0 015 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 005 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
						</svg>&nbsp;Huéspedes</label><br>

  						<label> <svg class="bi bi-person-plus-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7.5-3a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V5.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
						  <path fill-rule="evenodd" d="M13 7.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd"/>
						</svg>&nbsp; Adultos &nbsp;</label><input type="number" name="adultos" step="1" style="width: 7%; " min="0" max="10" required="on"> &nbsp; &nbsp; &nbsp;&nbsp;

						<label> <svg class="bi bi-person-plus-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7.5-3a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V5.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
						  <path fill-rule="evenodd" d="M13 7.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd"/>
						</svg>&nbsp; Niños &nbsp;</label><input type="number" name="ninos" step="1" style="width: 7%; " min="0" max="10" required="on">&nbsp; &nbsp; &nbsp;&nbsp;
						
						<label> <svg class="bi bi-person-plus-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7.5-3a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V5.5a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
						  <path fill-rule="evenodd" d="M13 7.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z" clip-rule="evenodd"/>
						</svg>&nbsp; Bebés &nbsp;</label><input type="number" name="bebes" step="1" style="width: 7%;" min="0" max="10" required="on"><br><br>

						<label>Habitación que desea:</label>

						<select name="habitaciones" id="Habitaciones" required="on">
							<optgroup label="Habitaciones Estándar">
								<option value="Habitación Estándar 1">Habitación estándar 1</option>
								<option value="Habitación Estándar 2">Habitación estándar 2</option>
								<option value="Habitación Estándar 3">Habitación estándar 3</option>
								<option value="Habitación Estándar 4">Habitación estándar 4</option>
								<option value="Habitación Estándar 5">Habitación estándar 5</option>
								<option value="Habitación Estándar 6">Habitación estándar 6</option>
							</optgroup>
							
							<optgroup label="Habitaciones Lujosas">
								<option value="Habitación Lujosa 1">Habitación lujosa 1</option>
								<option value="Habitación Lujosa 2">Habitación lujosa 2</option>
								<option value="Habitación Lujosa 3">Habitación lujosa 3</option>
								<option value="Habitación Lujosa 4">Habitación lujosa 4</option>
								<option value="Habitación Lujosa 5">Habitación lujosa 5</option>
								<option value="Habitación Lujosa 6">Habitación lujosa 6</option>
							</optgroup>
						</select><br><br>


						<input type="checkbox" name="acepto" checked="on" <?php if(isset($code) && $code == 4){ echo "autofocus"; } ?>>&nbsp;<label>Acepta los <a href="index.php" style="text-shadow: none;" title="Ver términos y condiciones del hotel">Términos y Condiciones del Hotel Las Venturas</a></label><br><br>


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