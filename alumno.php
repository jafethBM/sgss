<?php 
session_start();
include_once "encabezado.php" 

?>
<?php

include_once "condb.php";


$sentencia = $base_de_datos->query("SELECT * FROM usuario WHERE nombres='".$_SESSION["nombres"]."';");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
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

</head>
<body>
    <h2 style="color: #663300; font-size: 2.25em; text-align: center; background-color: rgba(255, 255, 255, 0.7);">Información de: <?php echo $_SESSION["nombres"];  ?></h2>
    <form class="formato" action="login-validar.php" method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>No. Registro</h5>
                    <p><?php echo $_SESSION["noregistro"];?></p>
                    <h5>CURP</h5>
                    <p><?php echo $_SESSION["curp"];?></p>
                    <h5>Apellido Paterno</h5>
                    <p><?php echo $_SESSION["apaterno"];  ?></p>
                    <h5>Apellido Materno</h5>
                    <p><?php echo $_SESSION["amaterno"];  ?></p>
                    <h5>Nombre(s)</h5>
                    <p><?php echo $_SESSION["nombres"];  ?></p>
                </div>
                <div class="col">
                    <h5>Sexo</h5>
                    <div style=" text-align: center;">
                        <label><input type="radio" name="sexo" value="masculino" required>Masculino</label>
                        <label style="margin-left: 0.8em;"><input type="radio" name="sexo" value="femenino">Femenino</label>
                    </div>
                    <h5 style="margin-top: 1em;">Correo</h5>
                    <input class="txt" type="email" placeholder="Ingresa tu correo">
                    <h5 style="margin-top: 1em;">Telefono</h5>
                    <input class="txt" type="text" placeholder="Numero telefónico">
                </div>
            </div>
        </div>
        <button class="enviar" style="cursor: pointer;" id="enviar" name="enviar" class="enviar" type="submit">Enviar</button>
    </form>


    <!-- ====JS BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>