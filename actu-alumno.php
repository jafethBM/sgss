<?php
session_start();
include_once "condb.php";
// $host_name = 'localhost';
// $database = 'sgss';
// $user_name = 'root';
// $password = '';
// $con = mysqli_connect($host_name, $user_name, $password, $database);
$id = $_POST["id"];
$sexo = $_POST["sexo"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];

$actualizar = $base_de_datos->prepare("UPDATE usuario SET sexo = ?, correo = ?, telefono = ?, fecharegistro = CURDATE() WHERE noregistro = ?;");
$resultado = $actualizar->execute([$sexo, $email, $telefono, $id]);
if ($resultado) {
    echo '<script language="javascript">alert("Datos actualizados");window.location.href="alumno.php"</script>'; 
    // header("Location: alumno.php");
} else echo "No se pudo actualizar los datos. Intentelo de nuevo";
?>