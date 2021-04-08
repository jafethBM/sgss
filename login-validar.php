<?php 
session_start();
include_once "condb.php";
$username = $_POST['user'];
$passdw = $_POST['pass'];
$md5pass = md5($passdw);

$qwerty = $base_de_datos->query("SELECT  *  FROM usuario WHERE curp='$username' AND contrasena='$md5pass';");

$usuarios = $qwerty->fetchAll(PDO::FETCH_OBJ);
$contar = $qwerty->rowCount();

foreach ($usuarios as $usuario) {
	$_SESSION["noregistro"]=$usuario->noregistro;
	$_SESSION["curp"]=$usuario->curp;
	$_SESSION["apaterno"]=$usuario->apaterno;
	$_SESSION["amaterno"]=$usuario->amaterno;
	$_SESSION["nombres"]=$usuario->nombres;
	$_SESSION["correo"]=$usuario->correo;
	$_SESSION["telefono"]=$usuario->telefono;
	$_SESSION["tipo"]=$usuario->tipo;

}
if (ini_get('variable_global')) {
	foreach ($_SESSION as $key => $value) {
		if (isset($GLOBALS[$key])) {
			unset($GLOBALS[$key]);
		}
	}
}
// SI ARROJA UN RESULTADO EN LA CONSULTA
if ($contar == 1) {
	// SI EL RESULTADO ES UN ADMINISTRADOR
	if ($_SESSION["tipo"] == 'admin') {
	header("Location: superIndex.php");
	echo "<script> 
                <!--
                window.location.href('superIndex.php'); 
                //-->
                </script>";
	}
	// SI EL RESULTADO ES UN ALUMNO
	else{
	header("Location: inicio.php");
	echo "<script> 
                <!--
                window.location.href('superIndex.php'); 
                //-->
                </script>";	
	}
}
else{
	// ALERTA SI NO ESTA EN LA BASE DE DATOS
	echo '<script language="javascript">alert("USUARIO O CONTRASEÑA INCORRECTA");window.location.href="index.php"</script>';
	// header("Location: index.php");
}

?>