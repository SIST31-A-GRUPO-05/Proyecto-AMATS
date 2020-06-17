<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<head>	
		<link  rel="icon"   href="Img/Icono Hotel.ico" type=""/>
		<link rel="stylesheet" type="text/css" href="estilos.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/js/bootstrap.min.js">

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
	</head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		<div class="container">
			<center>
				<div class="row">
					<div class="col-md-3"></div>

					<div class="col-md-6 cuartos"><br>
						<div class="col-md-2"></div>
						<div class="col-md-8" style="background-color: rgba(0, 0, 0, 0.15);">
							<label> <svg class="bi bi-file-text" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M4 1h8a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V3a2 2 0 012-2zm0 1a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V3a1 1 0 00-1-1H4z" clip-rule="evenodd"/>
						  <path fill-rule="evenodd" d="M4.5 10.5A.5.5 0 015 10h3a.5.5 0 010 1H5a.5.5 0 01-.5-.5zm0-2A.5.5 0 015 8h6a.5.5 0 010 1H5a.5.5 0 01-.5-.5zm0-2A.5.5 0 015 6h6a.5.5 0 010 1H5a.5.5 0 01-.5-.5zm0-2A.5.5 0 015 4h6a.5.5 0 010 1H5a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
						  </svg>&nbsp;PRE-FACTURA</label><br>
						<label>Nombre: </label><br>
						<label>Total de huéspedes: </label><br>
						<label>Habitación: </label><br>
						<label>Total a pagar: $</label>
						</div>
						<div class="col-md-2"></div>
						<hr>
						<label><svg class="bi bi-credit-card" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
						  <path fill-rule="evenodd" d="M14 3H2a1 1 0 00-1 1v8a1 1 0 001 1h12a1 1 0 001-1V4a1 1 0 00-1-1zM2 2a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V4a2 2 0 00-2-2H2z" clip-rule="evenodd"/>
						  <rect width="3" height="3" x="2" y="9" rx="1"/>
						  <path d="M1 5h14v2H1z"/>
						</svg>&nbsp; Tarjeta de crédito</label><br>
						<input type="text" name="tarjeta" class="form-control bordeados" style=" width: 60%; border-color: #009fb3" placeholder="Ingrese su tarjeta de crédito"><br>

						<button type="submit" class="btn btn-info" style="width: 30%;" title="Realizar pago"> Realizar pago</button>
						<a href="reservacionrecep.php" class="btn btn-danger" style="width: 30%;">Cancelar</a><br><br>
					</div>
					<div class="col-md-3"></div>

				</div>					
</body>
</html>