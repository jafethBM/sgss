<?php
session_start();
include_once "encabezado.php"

?>
<?php

include_once "condb.php";


$sentencia = $base_de_datos->query("SELECT * FROM usuario WHERE nombres='" . $_SESSION["nombres"] . "';");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($productos as $produc) {
    $_SESSION['noregistro'] = $produc->noregistro;
}
$escuela = $base_de_datos->query("SELECT * FROM pendiente WHERE noregistro='" . $produc->noregistro . "';");
$escolar = $escuela->fetchAll(PDO::FETCH_OBJ);
foreach ($escolar as $escu) {
    $_SESSION['noregistro'] = $escu->noregistro;
    $_SESSION['historial'] = $escu->historial;
    $_SESSION['curp'] = $escu->curp;
    $_SESSION['actnacim'] = $escu->actnacim;
    $_SESSION['cargacadem'] = $escu->cargacadem;
    $_SESSION['conscredit'] = $escu->conscredit;
    $_SESSION['solservsoci'] = $escu->solservsoci;
    $_SESSION['imss'] = $escu->imss;
    $_SESSION['carpeta'] = $escu->carpeta;
}
echo "<br>";
echo "<br>";




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema Gestor de Serivicio Social</title>
    <link rel="stylesheet" href="pagina.css">
    <!-- ===ESTILO BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <h1 style="color: #663300; font-size: 2.25em; text-align: center; background-color: rgba(255, 255, 255, 0.7); margin-top: -1.34em;">Bienvenido (a): <?php echo ucfirst($_SESSION["nombres"]);  ?></h1>
    <h2 class="subtopic"">Documentos que son necesarios para continuar con tu proceso de residencias profesionales <hr>
    <span class=" importante">Recuerda que debes subir los documentos en formato PDF</span></h2>

    <form class=" formato" method="POST" enctype="multipart/form-data" action="histAca.php">
        <div>
            <h5>Historial academico</h5>
            <div style="text-align: center;">
                <h6 class="estatus">Estatus:</h6>
                <input class="archivo" type="text" value="<?php
                                                            if ($escu->historial == 1) {
                                                                echo "Archivo Subido";
                                                            } else {
                                                                echo "Sin Subir";
                                                            }
                                                            ?>" disabled>

                <input type="file" accept="application/pdf" accept="application/pdf" name="hiac" id="hiac">
                <br>

                <div class="cell">
                </div>
                <button class="enviar2" type="submit" style="float: right;">Cargar</button>

            </div>
        </div>
    </form>
    <form class="formato" method="POST" enctype="multipart/form-data" action="curp.php" style="margin-top: 0.5em;">
        <div>
            <h5>Curp</h5>
            <div style="text-align: center;">
                <h6 class="estatus">Estatus:</h6>
                <input class="archivo" type="text" value="<?php
                                                            if ($escu->curp == 1) {
                                                                echo "Archivo Subido";
                                                            } else {
                                                                echo "Sin Subir";
                                                            }
                                                            ?>" disabled>
                <input type="file" accept="application/pdf" name="curp" id="curp">
                <button class="enviar2" type="submit" style="float: right;">Cargar</button>
            </div>
        </div>
    </form>
    <form class="formato" method="POST" enctype="multipart/form-data" action="acnam.php" style="margin-top: 0.5em;">
        <div>
            <h5>Acta de Nacimiento</h5>
            <div style="text-align: center;">
                <h6 class="estatus">Estatus:</h6>
                <input class="archivo" type="text" value="<?php
                                                            if ($escu->actnacim == 1) {
                                                                echo "Archivo Subido";
                                                            } else {
                                                                echo "Sin Subir";
                                                            }
                                                            ?>" disabled> disabled>
                <input type="file" accept="application/pdf" name="acnam" id="acnam">
                <button class="enviar2" type="submit" style="float: right;">Cargar</button>
            </div>
        </div>
    </form>
    <form class="formato" method="POST" enctype="multipart/form-data" action="carac.php" style="margin-top: 0.5em;">
        <div>
            <h5>Carca Academica</h5>
            <div style="text-align: center;">
                <h6 class="estatus">Estatus:</h6>
                <input class="archivo" type="text" value="<?php
                                                            if ($escu->cargacadem == 1) {
                                                                echo "Archivo Subido";
                                                            } else {
                                                                echo "Sin Subir";
                                                            }
                                                            ?>" disabled>
                <input type="file" accept="application/pdf" name="carac" id="carac">
                <button class="enviar2" type="submit" style="float: right;">Cargar</button>
            </div>
        </div>
    </form>
    <form class="formato" method="POST" enctype="multipart/form-data" action="concre.php" style="margin-top: 0.5em;">
        <div>
            <h5>Constancia de Creditos</h5>
            <div style="text-align: center;">
                <h6 class="estatus">Estatus:</h6>
                <input class="archivo" type="text" value="<?php
                                                            if ($escu->conscredit == 1) {
                                                                echo "Archivo Subido";
                                                            } else {
                                                                echo "Sin Subir";
                                                            }
                                                            ?>" disabled>
                <input type="file" accept="application/pdf" name="concre" id="concre">
                <button class="enviar2" type="submit" style="float: right;">Cargar</button>
            </div>
        </div>
    </form>
    <form class="formato" method="POST" enctype="multipart/form-data" action="sss.php" style="margin-top: 0.5em;">
        <div>
            <h5>Solicitud de Servicio Social</h5>
            <div style="text-align: center;">
                <h6 class="estatus">Estatus:</h6>
                <input class="archivo" type="text" value="<?php
                                                            if ($escu->solservsoci == 1) {
                                                                echo "Archivo Subido";
                                                            } else {
                                                                echo "Sin Subir";
                                                            }
                                                            ?>" disabled>
                <input type="file" accept="application/pdf" name="sss" id="sss">
                <button class="enviar2" type="submit" style="float: right;">Cargar</button>
            </div>
        </div>
    </form>
    <form class="formato" method="POST" enctype="multipart/form-data" action="imss.php" style="margin-top: 0.5em;">
        <div>
            <h5>Numero de Seguro Social (IMSS)</h5>
            <div style="text-align: center;">
                <h6 class="estatus">Estatus:</h6>
                <input class="archivo" type="text" value="<?php
                                                            if ($escu->imss == 1) {
                                                                echo "Archivo Subido";
                                                            } else {
                                                                echo "Sin Subir";
                                                            }
                                                            ?>" disabled>
                <input type="file" accept="application/pdf" name="imss" id="imss">
                <button class="enviar2" type="submit" style="float: right;">Cargar</button>
            </div>
        </div>
    </form>
    <!-- ====JS BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script languague="javascript">
        function mostrar() {
            div = document.getElementById('hiacpdf');
            div.style.display = '';
        }

        function cerrar() {
            div = document.getElementById('hiacpdf');
            div.style.display = 'none';
        }
    </script>
</body>

</html>