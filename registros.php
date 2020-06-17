<?php require_once('conexion.php'); 
session_start();
  if (!isset($_SESSION['clave'])) {
    header('Location: login.php');
  } elseif ($_SESSION['clave'] == 1) {
    header('Location: recepcionista.php');
  }

  if (isset($_GET['eliminar'])) {
  $eliminar = $_GET['eliminar'];
  
  $sql = "DELETE FROM cliente WHERE id_cliente=$eliminar";
  $conn->query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registros</title>
	<link rel="stylesheet" type="text/css" href="estilosadmin.css">
	<link rel="stylesheet" type="" href="bootstrap-4.3.1-dist/js/bootstrap.min.js">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">

	<nav class="barra navbar navbar-default" role="navigation">
		<a href="administrador.php"><img src="Img/Logo.png" height="40" width="90"></a>
		<a href="registros.php">REGISTROS</a>
		<a href="crearusuario.php">CREAR USUARIO</a>
    <a href="cuentas.php">CUENTAS DE USUARIO</a>
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
  <div class="col-md-2"></div>
  <div class="col-md-8" style="border-color: red;">
    <div style="padding:12px; background-color: rgba(0,139,44,0.6); line-height:1.4; color: white; text-align: center; margin-top: 20px;">
    <h2>GANANCIA ACTUAL DEL DÍA: $</h2>
    </div>
  </div>
  <div class="col-md-2"></div>
</div>

	<br><center><h4 style="color: white; text-shadow: 2px 2px #505050;">REGISTROS DE PERSONAS CON RESERVACIONES DEL DÍA DE HOY</h4></center><br>
<table class="table table-hover" style="color: white; text-shadow: 2px 2px black; text-align: center;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">HABITACIÓN</th>
      <th scope="col">FECHA DE ENTRADA</th>
      <th scope="col">FECHA DE SALIDA</th>
      <th scope="col">ELIMINAR REGISTRO</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php 
      $sql="SELECT cliente.id_cliente, cliente.ape_cliente, cliente.nom_cliente, habitacion.habitacion, cliente.check_in, cliente.check_out FROM cliente INNER JOIN habitacion ON cliente.id_cliente=habitacion.id_tabla";

      $rs=$conn->query($sql);
      while ($fila=$rs->fetch_assoc()) {
       ?>
       <tr>
       <td><?php echo $fila["id_cliente"]; ?></td>
       <td><?php echo $fila["nom_cliente"].' '.$fila["ape_cliente"]; ?></td>
       <td><?php echo $fila["habitacion"]; ?></td>
       <td><?php echo $fila["check_in"]; ?></td>
       <td><?php echo $fila["check_out"]; ?></td>
       <td><form method="GET"><input type="hidden" name="eliminar" value=<?php echo $fila["id_cliente"]; ?>><input type="submit" value="Eliminar" class="btn btn-danger"></form></td>
       </tr>
       <?php 
     }
     ?>
    </tr>
  </tbody>
</table>

</body>
</html>