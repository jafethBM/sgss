<?php 
session_start();
include_once "condb.php";
$username = $_POST['user'];
$passdw = $_POST['pass'];
$md5pass = md5($passdw);

$qwerty = $base_de_datos->query("SELECT  *  FROM usuario WHERE curp='$username' AND contrasena='$md5pass';");

$usuarios = $qwerty->fetchAll(PDO::FETCH_OBJ);

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
$qwerty2 = $base_de_datos->query("SELECT * FROM escolar WHERE noregistro ='".$_SESSION["noregistro"]."'");
$escuela = $qwerty2->fetchAll(PDO::FETCH_OBJ);
foreach ($escuela as $esc) {
	$_SESSION["noregistro"]=$esc->noregistro;
	$_SESSION["matricula"]=$esc->matricula;
	$_SESSION["carrera"]=$esc->carrera;
	$_SESSION["sis"]=$esc->sis;
	$_SESSION["pinicio"]=$esc->pinicio;
	$_SESSION["pfin"]=$esc->pfin;
	$_SESSION["promedio"]=$esc->promedio;
	$_SESSION["porcentaje"]=$esc->porcentaje;
}
if (ini_get('variable_global')) {
	foreach ($_SESSION as $key => $value) {
		if (isset($GLOBALS[$key])) {
			unset($GLOBALS[$key]);
		}
	}
}

?>