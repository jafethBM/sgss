<?php
session_start();
include_once "encabezado.php"

?>
<?php

include_once "condb.php";


$sentencia = $base_de_datos->query("SELECT * FROM usuario WHERE nombres='" . $_SESSION["nombres"] . "';");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach ($usuarios as $usr) {
    $SESSION['noregistro'] = $usr->noregistro;
    $SESSION['curp'] = $usr->curp;
    $SESSION['apaterno'] = $usr->apaterno;
    $SESSION['amaterno'] = $usr->amaterno;
    $SESSION['nombres'] = $usr->nombres;
    $SESSION['sexo'] = $usr->sexo;
    $SESSION['correo'] = $usr->correo;
    $SESSION['telefono'] = $usr->telefono;
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
    <title>Sistema Gestor de Serivicio Social</title>
    <link rel="stylesheet" href="pagina.css">
    <!-- ===ESTILO BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- =====LIBRERIA DE AJAX===== -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

</head>

<body>
    <h2 style="color: #663300; font-size: 2.25em; text-align: center; background-color: rgba(255, 255, 255, 0.7);">Información de: <?php echo ucfirst($usr->nombres);  ?></h2>
    <form class="formato" method="POST" enctype="multipart/form-data" action="actu-alumno.php" method="POST">
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
                    <h5>Sexo</h5>
                    <div style=" text-align: center;">
                        <?php
                        if ($usr->sexo == "masculino") {
                            echo '<label><input checked type="radio" name="sexo" value="masculino" required>Masculino</label>
                        <label style="margin-left: 0.8em;"><input type="radio" name="sexo" value="femenino">Femenino</label>';
                        } elseif ($usr->sexo == "femenino") {
                            echo '<label><input type="radio" name="sexo" value="masculino" required>Masculino</label>
                        <label style="margin-left: 0.8em;"><input checked type="radio" name="sexo" value="femenino">Femenino</label>';
                        } else {
                            echo '<label><input type="radio" name="sexo" value="masculino" required>Masculino</label>
                        <label style="margin-left: 0.8em;"><input type="radio" name="sexo" value="femenino">Femenino</label>';
                        }
                        ?>
                    </div>
                    <h5 style="margin-top: 1em;">Correo</h5>
                    <input class="txt" type="email" id="email" name="email" onfocus="this.value=''" value=" <?php if ($usr->correo == "") {
                                                                                                                echo 'Ingresatu correo';
                                                                                                            } else {
                                                                                                                echo $usr->correo;
                                                                                                            }
                                                                                                            ?>">
                    <h5 style="margin-top: 1em;">Telefono</h5>
                    <input class="txt" type="text" id="telefono" name="telefono" onfocus="this.value=''" value=" <?php if ($usr->telefono == "") {
                                                                                                                        echo 'Numero telefónico';
                                                                                                                    } else {
                                                                                                                        echo $usr->telefono;
                                                                                                                    }
                                                                                                                    ?>">
                    <input type="hidden" id="id" name="id" value="<?= $usr->noregistro; ?>">
                </div>
            </div>
        </div>
        <button class="enviar" style="cursor: pointer;" id="enviar" name="enviar" type="submit">Enviar</button>
    </form>


    <!-- ====JS BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

    <!-- =====FUNCIONES DE ENVIO DE DATOS===== -->
</body>

</html>