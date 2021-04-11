<?php
	session_start();

	session_destroy();

	header("location: ../Vistas/Login.php");
	exit();
?>