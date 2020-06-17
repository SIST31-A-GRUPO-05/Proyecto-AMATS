<?php 
session_start();
if (isset($_SESSION['clave']) && $_SESSION['clave'] == 1) {
	header('Location: recepcionista.php');
} elseif (isset($_SESSION['clave']) && $_SESSION['clave'] == 2) {
	header('Location: administrador.php');
}
require_once('conexion.php');

if (isset($_GET['logearse'])) {
	if (!empty($_GET['usuario']) && !empty($_GET['contrasenia'])) {
		$username = $_GET['usuario'];
		$password = $_GET['contrasenia'];

		$sql=("SELECT * FROM registro_usuarios WHERE nombre='".$username."' AND contrasena='".$password."'");

		$rs=$conn->query($sql);

		while($fila=$rs->fetch_assoc()){
			$dbusername = $fila['nombre'];
			$dbpassword = $fila['contrasena'];
			$dbnivel = $fila['nivel'];
		}

		if ($username == @$dbusername && $password == $dbpassword) {
			if ($dbnivel == 1) {
				$_SESSION['clave'] = $dbnivel;
				?>
				<script>
					alert('Bienvenido');
					document.location.href='recepcionista.php';
				</script>
				<?php
			} elseif ($dbnivel == 2) {
				$_SESSION['clave'] = $dbnivel;
				?>
				<script>
					alert('Bienvenido');
					document.location.href='administrador.php';
				</script>
				<?php
			}
		}else {
			$message = 'Nombre de usuario o contrasena invalida';
		}
	}else {
		$message = 'Todos los campos son requeridos';
	}
}
?>

<?php if (!empty($message)) {
	echo '<center><font color=gray>'.$message.'</center>';
} ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<meta charset="utf-8">
	<title>Iniciar sesión</title>
</head>
<body>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<center><h4 id="titulo">RESERVACIONES DEL HOTEL</h4><br>
				<img src="Img/usuario.jpg" height="175" width="175" id="imglogin"><br><br>

				<form method="GET">

					<b><label class="nombre">Usuario</label><br></b>
					<input type="text" name="usuario" class="form-control input-xs bordes" placeholder="Ingrese su nombre de usuario"><br>

					<b><label class="contra">Contraseña</label><br></b>
					<input type="password" name="contrasenia" class="form-control input-xs bordes" placeholder="Ingrese su contraseña"><br><br>

					<input type="submit" class="btn botonlogin form-control input-xs"  name="logearse" value="Ingresar">
				</form>
			</center>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>