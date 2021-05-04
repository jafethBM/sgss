<?php
session_start();
include_once "encabezado.php"

?>
<?php

include_once "condb.php";


$sentencia = $base_de_datos->query("SELECT * FROM usuario WHERE nombres='" . $_SESSION['nombres'] . "';");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($usuarios as $usr) {
    $_SESSION['noregistro'] = $usr->noregistro;
    $_SESSION['curp'] = $usr->curp;
    $_SESSION['apaterno'] = $usr->apaterno;
    $_SESSION['amaterno'] = $usr->amaterno;
    $_SESSION['nombres'] = $usr->nombres;
    $_SESSION['sexo'] = $usr->sexo;
    $_SESSION['correo'] = $usr->correo;
    $_SESSION['telefono'] = $usr->telefono;
}

$qwerty = $base_de_datos->query("SELECT * FROM escolar WHERE noregistro='" . $usr->noregistro . "';");
$escuela = $qwerty->fetchAll(PDO::FETCH_OBJ);
foreach ($escuela as $esc) {
    $_SESSION['matricula'] = $esc->matricula;
    $_SESSION['carrera'] = $esc->carrera;
    $_SESSION['siss'] = $esc->siss;
    $_SESSION['pinicio'] = $esc->pinicio;
    $_SESSION['pfin'] = $esc->pfin;
    $_SESSION['promedio'] = $esc->promedio;
    $_SESSION['porcentaje'] = $esc->porcentaje;
}
echo "";
echo "";




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Datos Academicos</title>
    <link rel="stylesheet" href="pagina.css">
    <!-- ===ESTILO BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- SCRIPT SHOW HIDE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <h2 style="color: #663300; font-size: 2.25em; text-align: center; background-color: rgba(255, 255, 255, 0.7);">Introduce tus datos academicos</h2>
    <form class="formato" method="POST" enctype="multipart/form-data" action="actu-escolar.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>No. Registro</h5>
                    <p><?php echo $usr->noregistro; ?></p>
                    <h5>CURP</h5>
                    <p><?php echo $usr->curp; ?></p>
                    <h5>Apellido Paterno</h5>
                    <p><?php echo $usr->apaterno;  ?></p>
                    <h5>Apellido Materno</h5>
                    <p><?php echo $usr->amaterno;  ?></p>
                    <h5>Nombre(s)</h5>
                    <p><?php echo $usr->nombres;  ?></p>
                </div>
                <div class="col">
                    <input type="hidden" id="id" name="id" value="<?= $usr->noregistro; ?>">
                    <h5>Carrera</h5>
                    <select class="multiop" name="carrera" id="carrera">
                        <?php
                        if ($esc->carrera == null) {
                            echo "<option value='Ingeniería en Sistemas Computacionales'>Ingeniería en Sistemas Computacionales</option>
                        <option value='Ingeniería Industrial'>Ingeniería Industrial</option>
                        <option value='Ingeniería en Informática'>Ingeniería en Informática</option>
                        <option value='Ingeniería Electromecánica'>Ingeniería Electromecánica</option>
                        <option value='Ingenieria Electrónica'>Ingenieria Electrónica</option>";
                        } else {
                            echo "<option value='" . $esc->carrera . "'>" . $esc->carrera . "</option>";
                        }
                        ?>
                    </select>
                    <h5>SISS</h5>
                    <div style=" text-align: center;">
                        <?php
                        if ($esc->siss == 1) {
                            echo '<label><input type="radio" name="siss" value="1" required checked>SI</label>
                        <label style="margin-left: 0.8em;"><input type="radio" name="siss" value="0">NO</label>';
                        } elseif ($esc->siss == 0) {
                            echo '<label><input type="radio" name="siss" value="1" required>SI</label>
                        <label style="margin-left: 0.8em;"><input type="radio" name="siss" value="0" checked>NO</label>';
                        } else {
                            echo '<label><input type="radio" name="siss" value="1" required>SI</label>
                        <label style="margin-left: 0.8em;"><input type="radio" name="siss" value="0">NO</label>';
                        }
                        ?>
                    </div>
                    <h5>Fecha Inicio de Resindencias</h5>
                    <input class="txt" type="date" name="pinicio" id="pinicio" value="<?php if ($esc->pinicio == "") {
                                                                                            echo 'Introduce tu fecha de inicio';
                                                                                        } else {
                                                                                            echo $esc->pinicio;
                                                                                        }
                                                                                        ?>">
                    <h5>Fecha Termino de Residencias</h5>
                    <input class="txt" type="date" name="pfin" id="pfin" value="<?php if ($esc->pfin == "") {
                                                                                    echo 'Introduce tu fecha de termino';
                                                                                } else {
                                                                                    echo $esc->pfin;
                                                                                }
                                                                                ?>">
                    <h5>Promedio</h5>
                    <input class="txt" type="text" name="promedio" id="promedio" onfocus="this.value=''" value=" <?php if ($esc->promedio == "") {
                                                                                                                    echo 'Introduce tu promedio';
                                                                                                                } else {
                                                                                                                    echo $esc->promedio;
                                                                                                                }
                                                                                                                ?>">
                    <h5>Porcentaje</h5>
                    <input class="txt" type="text" name="porcentaje" id="promedio" onfocus="this.value=''" value=" <?php if ($esc->porcentaje == "") {
                                                                                                                        echo 'Introduce el porcentaje de creditos';
                                                                                                                    } else {
                                                                                                                        echo $esc->porcentaje;
                                                                                                                    }
                                                                                                                    ?>">
                </div>
            </div>
        </div>
        <button class="enviar" style="cursor: pointer;" id="enviar" name="enviar" class="enviar" type="submit">Enviar</button>
    </form>


    <!-- ====JS BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <!-- =====FUNCION PARA HABILITAR O DESHABILITAR APOYO ECONOMICO===== -->
    <script>
        function si() {
            document.getElementById('div1').style.display = 'block';
        }

        function no() {
            document.getElementById('div1').style.display = 'none';
        }
    </script>
</body>

</html>