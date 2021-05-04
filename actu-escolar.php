<?php
session_start();
include_once "condb.php";
// $host_name = 'localhost';
// $database = 'sgss';
// $user_name = 'root';
// $password = '';
// $con = mysqli_connect($host_name, $user_name, $password, $database);
$id = $_POST["id"];
$carrera = $_POST["carrera"];
$siss = $_POST["siss"];
$pinicio = $_POST["pinicio"];
$pfin = $_POST["pfin"];
$promedio = $_POST["promedio"];
$porcentaje = $_POST["porcentaje"];

$actualizar = $base_de_datos->prepare("UPDATE escolar SET carrera = ?, siss = ?, pinicio = ?, pfin = ?, promedio = ?, porcentaje = ? WHERE noregistro = ?;");
$resultado = $actualizar->execute([$carrera, $siss, $pinicio, $pfin, $promedio, $porcentaje, $id]);
if ($resultado) {
    echo '<script language="javascript">alert("Datos actualizados");window.location.href="escolar.php"</script>'; 
    // header("Location: alumno.php");
} else echo "No se pudo actualizar los datos. Intentelo de nuevo";
