<?php
session_start();
$host_name = 'localhost';
$database = 'sgss';
$user_name = 'root';
$password = '';
$con = mysqli_connect($host_name, $user_name, $password, $database);


$noreg = $_SESSION["noregistro"];
$directorio = "docalumn/" . $noreg;
$nombre = $_FILES['curp']['name'];
$tempnom = $_FILES['curp']['tmp_name'];
$ruta = "docalumn/" . $noreg . "/curp.pdf";
$dest = "docalumn/" . $noreg;

if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);

    if (file_exists($directorio)) {

        if (move_uploaded_file($tempnom, $ruta)) {
            echo '<script language="javascript">alert("Archivo guardado con exito");window.location.href="inicio.php"</script>';
            $query = 'UPDATE pendiente SET curp = 1, carpeta = "' . $dest . '"  WHERE noregistro = "' . $noreg . '" ';
            $resequipous = mysqli_query($con, $query);
            //    echo "Archivo guardado con exito";
            //     header("Location: inicio.php");
        } else {
            echo '<script language="javascript">alert("Archivo no se pudo guardar");window.location.href="inicio.php"</script>';
            //    echo "Archivo no se pudo guardar";
            //     header("Location: inicio.php");
        }
    }
} else {

    if (move_uploaded_file($tempnom, $ruta)) {
        echo '<script language="javascript">alert("Archivo guardado con exito");window.location.href="inicio.php"</script>';
        $query = 'UPDATE pendiente SET curp = 1, carpeta = "' . $dest . '"  WHERE noregistro = "' . $noreg . '" ';
        $resequipous = mysqli_query($con, $query);
    } else {
        echo '<script language="javascript">alert("Archivo no se pudo guardar");window.location.href="inicio.php"</script>';
    }

    var_dump($ruta);
}