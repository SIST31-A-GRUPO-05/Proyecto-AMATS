<?php
require_once('conexion.php');

if(isset($_POST['enviar']))
{
	$usuarioadmin = ($_POST['usuarioadmin']);
    $primernombre = trim($_POST['primernombre']);
    $segundonombre = trim($_POST['segundonombre']);
    $apeadmin = trim($_POST['apeadmin']);
    $segundoape = trim($_POST['segundoape']);
    $contrasena = $_POST['contraadmin'];
    $confircontra = $_POST['nuevacontraadmin'];


	if(empty($usuarioadmin))
	{
		$error = "Ingrese su nombre";
		$code = 1;
	}
	else if(!ctype_alpha($usuarioadmin))
	{
		$error = "Ingrese solo letras";
		$code = 1;
	} else if(empty($primernombre))
	{
		$error = "Ingrese su nombre";
		$code = 2;
	}
	else if(!ctype_alpha($primernombre))
	{
		$error = "Ingrese solo letras";
		$code = 2;
	} else if(empty($segundonombre))
	{
		$error = "Ingrese su nombre";
		$code = 3;
	}
	else if(!ctype_alpha($segundonombre))
	{
		$error = "Ingrese solo letras";
		$code = 3;
	}
	else if(empty($apeadmin))
	{
		$error = "¡Escriba su apellido!";
		$code = 4;
	}
	else if(!ctype_alpha($apeadmin))
	{
		$error = "¡Solo letras!";
		$code = 4;
	} else if(empty($segundoape))
	{
		$error = "¡Escriba su apellido!";
		$code = 5;
	}
	else if(!ctype_alpha($segundoape))
	{
		$error = "¡Solo letras!";
		$code = 5;
    } 
    else
	{
		$sql="INSERT INTO logeo(usuario, primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, contrasena, confirmar_contra) VALUES('$usuarioadmin', '$primernombre', '$segundonombre', '$apeadmin', '$segundoape', '$contrasena', '$confircontra')";

		$conn->query($sql);
		?>
		<script>
			alert('Enviado con exito');
			document.location.href='adminagregar.php';
		</script>
		<?php
	}
}
?>