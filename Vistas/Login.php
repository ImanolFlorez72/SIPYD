<?php
require_once("../Modelo/Cuenta.php");
$cod = "";
$usuario = "";
$contrasena = "";
$tipocuenta = "";
if (isset($_REQUEST['Ingresar'])) {
	$usuario = $_REQUEST['usuario'];
	$contrasena = $_REQUEST['contrasena'];
	if ((!empty($usuario)) && (!empty($contrasena))) {
		$cuenta = new Cuenta();
		$result = $cuenta->Login($usuario, $contrasena);
		if ($result[0]) {
			if ($result[1] == 1) {
				echo "<script type='text/javascript'>
                            window.location.href='Vistas/Modificar.php';
                              </script>";
			} elseif ($result[1] == 2) {
				echo "<script type='text/javascript'>
                            window.location.href='indexA.php';
                              </script>";
			} else {
				echo "<script type='text/javascript'>
                            window.location.href='indexF.php';
                              </script>";
			}
		} else {
			echo "<script languaje='javascript'>alert('Usuario o Contraseña Incorrectas') </script>";
		}
	}
}
?>



<!DOCTYPE html>
<html>

<head>
	<title>Inicio Sesion</title>
	<link rel="stylesheet" type="text/css" href="../Css/iniciar1.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<meta charset="utf-8">
</head>

<body>
	<form action="" method="POST">
		<div class="form">
			<h1 style="text-align: center;">LOGIN</h1>
			<div class="grupo">
				<input type="text" name="usuario" id="name" required="" value="<?php echo $usuario; ?>"><span class="barra"></span>
				<label>Usuario</label>
			</div>

			<div class="grupo">
				<input type="text" name="contrasena" id="name" required="" value="<?php echo $contrasena; ?>"><span class="barra"></span>
				<label>Contraseña</label>
			</div>
			<button type="submit" name="Ingresar" value="Ingresar"> Ingresar</button>
		</div>
	</form>
</body>
</html>