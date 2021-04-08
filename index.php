<?php 
 ini_set("session.use_cookies", 0);
 ini_set("session.use_trans_sid", 1);
 session_start();

 unset($_SESSION["curp"]);
 unset($_SESSION["tipo"]);

 unset($_SESSION['usuario']);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SISTEMA GESTOR DE SERVICIO SOCIAL</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<h1>SISTEMA GESTOR DE SERVICIO SOCIAL</h1>
	<form class="formato" action="login-validar.php" method="post">
		<h2 style="color: #663300; font-size: 2.25em;">Iniciar Sesión</h2>
		<!-- <p>Usuario</p> -->
		<input id="user" name="user" type="text" placeholder="Usuario">
		<!-- <p>Contraseña</p> -->
		<input id="pass" name="pass" type="password" placeholder="Contraseña">
		<br>
		<input style="cursor: pointer;" id="enviar" name="enviar" class="enviar" type="submit" value="Entrar">
	</form>
</body>
</html>