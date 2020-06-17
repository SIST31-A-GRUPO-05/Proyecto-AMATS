<?php
require_once("conexion.php");

session_start();
  if (!isset($_SESSION['clave'])) {
    header('Location: login.php');
  } elseif ($_SESSION['clave'] == 1) {
    header('Location: recepcionista.php');
  }

if(isset($_GET['logearse']))
{
  $nombreUser = trim($_GET['usuario']);
  $apellidoUser = trim($_GET['apellido']);
  $emailUser = trim($_GET['correo']);
  $DUI = trim($_GET['dui']);
  $NIT = trim($_GET['nit']);
  $pass = trim($_GET['contrasenia']);
  $nivel = $_GET['nivel'];

  if(empty($nombreUser))
  {
    $error = "Ingrese su nombre";
    $code = 1;
  }
  else if(!ctype_alpha($nombreUser))
  {
    $error = "Ingrese solo letras";
    $code = 1;
  }
  else if(empty($apellidoUser))
  {
    $error = "¡Escriba su apellido!";
    $code = 2;
  }
  else if(!ctype_alpha($apellidoUser))
  {
    $error = "¡Solo letras!";
    $code = 2;
  }
  else if(empty($emailUser))
  {
    $error = "¡Coloque su e-mail!";
    $code = 3;
  }
  else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $emailUser))
  {
    $error = "¡E-mail no valido!";
    $code = 3;
  }
  if(empty($nivel))
  {
    $error = "Ingrese su nombre";
    $code = 5;
  }
  //FAlTA DUI & NIT
  else if(empty($pass))
 {
  $error = "¡Coloque una contraseña!";
  $code = 4;
 }
 else if(strlen($pass) < 8 )
 {
  $error = "¡Minimo 8 caracteres!";
  $code = 4;
 }
  else
  {
    $sql="INSERT INTO registro_usuarios(nombre, apellido, correo, nivel, dui, nit, contrasena) VALUES('$nombreUser', '$apellidoUser', '$emailUser', '$nivel', '$DUI', '$NIT', '$pass')";

    $conn->query($sql);
    
    ?>
    <script>
      alert('Usuario creado con exito');
      document.location.href='crearusuario.php';
    </script>
    <?php
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Crear usuario</title>
	<link rel="stylesheet" type="text/css" href="estilosadmin.css">
	<link rel="stylesheet" type="" href="bootstrap-4.3.1-dist/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">

	<nav class="barra navbar navbar-default" role="navigation">
		<a href="administrador.php"><img src="Img/Logo.png" height="40" width="90"></a>
		<a href="registros.php">REGISTROS</a>
		<a href="crearusuario.php">CREAR USUARIO</a>
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
<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<center><h4 id="titulo">CREAR NUEVO RECEPCIONISTA</h4><br>
			<img src="Img/usuario.jpg" height="175" width="175" id="imglogin"><br><br>

      <form method="GET">

			<b><label class="nombre">Nombre</label><br></b>
			<input type="text" name="usuario" class="form-control input-xs bordes" placeholder="Ingrese su nombre"><br>

			<b><label class="nombre">Apellido</label><br></b>
			<input type="text" name="apellido" class="form-control input-xs bordes" placeholder="Ingrese su apellido"><br>

			<b><label class="nombre">Correo</label><br></b>
			<input type="email" name="correo" class="form-control input-xs bordes" placeholder="Ingrese su correo"><br>

      <b><label class="nombre">Nivel</label><br></b>
      <input type="number" name="nivel" class="form-control input-xs bordes" placeholder="Ingrese su nivel" max="3" min="1" step="1"><br>

			<b><label class="nombre">DUI</label><br></b>
			<input type="text" name="dui" class="form-control input-xs bordes" placeholder="Ingrese su DUI"><br>

			<b><label class="nombre">NIT</label><br></b>
			<input type="text" name="nit" class="form-control input-xs bordes" placeholder="Ingrese su NIT"><br>

			<b><label class="contra">Contraseña</label><br></b>
			<input type="password" name="contrasenia" class="form-control input-xs bordes" placeholder="Ingrese su contraseña"><br><br>

			<input type="submit" class="btn botonlogin form-control input-xs"  name="logearse" value="Crear">

      </form>

			</center>
		</div>
		<div class="col-md-4"></div>
	</div>

</body>
</html>