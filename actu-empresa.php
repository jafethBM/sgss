<?php
session_start();
include_once "condb.php";
// $host_name = 'localhost';
// $database = 'sgss';
// $user_name = 'root';
// $password = '';
// $con = mysqli_connect($host_name, $user_name, $password, $database);
$id = $_POST["id"];
$empresa = $_POST["empresa"];
$direccion = $_POST["direccion"];
$municipio = $_POST["municipio"];
$sector = $_POST["sector"];
$asesorext = $_POST["asesorext"];
$puesto = $_POST["puesto"];
$noprograma = $_POST["noprograma"];
$apyec = $_POST ["apyec"];
$monto = $_POST["monto"];
$estimulo = $_POST["estimulo"];
$horario = $_POST["horario"];

$actualizar = $base_de_datos->prepare("UPDATE empresa SET empresa = ?, direccion = ?, municipio = ?, sector = ?, asesorext = ?, horario =?, puesto = ?, nomprograma = ?, apoyoecon = ?, monto = ?, estimulo = ? WHERE noregistro = ?;");
$resultado = $actualizar->execute([$empresa, $direccion, $municipio, $sector, $asesorext, $horario, $puesto, $noprograma, $apyec, $monto, $estimulo, $id]);
if ($resultado) {
    echo '<script language="javascript">alert("Datos actualizados");window.location.href="empresa.php"</script>';
    // header("Location: alumno.php");
} else echo "No se pudo actualizar los datos. Intentelo de nuevo";
