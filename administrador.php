<?php 
session_start();
  if (!isset($_SESSION['clave'])) {
    header('Location: login.php');
  } elseif ($_SESSION['clave'] == 1) {
    header('Location: recepcionista.php');
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrador</title>

	<link rel="stylesheet" type="text/css" href="estilosadmin.css">
	<link rel="stylesheet" type="" href="bootstrap-4.3.1-dist/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">

	<nav class="barra navbar navbar-default" role="navigation">
		<a href="administrador.php"><img src="Img/Logo.png" height="40" width="90"></a>
		<a href="registros.php">REGISTROS</a>
		<a href="crearusuario.php">CREAR USUARIO</a>
    <a href="cerrar_session.php">CERRAR SESION</a>
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
<br><br>
	<center><img src="Img/Admin.png" height="60%" width="80%"></center>


</body>
</html>
