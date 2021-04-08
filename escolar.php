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
    <title>Datos Academicos</title>
    <link rel="stylesheet" href="pagina.css">
    <!-- ===ESTILO BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- SCRIPT SHOW HIDE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
     <h2 style="color: #663300; font-size: 2.25em; text-align: center; background-color: rgba(255, 255, 255, 0.7);">Introduce tus datos academicos</h2>
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
                    <h5>Carrera</h5>
                    <select name="carrera" id="carrera">
                        <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                        <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                        <option value="Ingeniería en Informática">Ingeniería en Informática</option>
                        <option value="Ingeniería Electromecánica">Ingeniería Electromecánica</option>
                        <option value="Ingenieria Electrónica">Ingenieria Electrónica</option>
                    </select>
                    <h5>SISS</h5>
                    <div style=" text-align: center;">
                        <label><input type="radio" name="siss" value="1" required>SI</label>
                        <label style="margin-left: 0.8em;"><input type="radio" name="siss" value="0">NO</label>
                    </div>
                    <h5>Fecha Inicio de Resindencias</h5>
                    <input class="txt" type="date" name="inicio" id="pinicio">
                    <h5>Fecha Termino de Residencias</h5>
                    <input class="txt" type="date" name="fin" id="pfin">
                    <h5>Promedio</h5>
                    <input class="txt" type="text" name="promedio" id="promedio" placeholder="Promedio">
                    <h5>Porcentaje</h5>
                    <input class="txt" type="text" name="porcentaje" id="promedio" placeholder="porcentaje">
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
          document.getElementById('div1').style.display='block';
      }
      function no(){
       document.getElementById('div1').style.display='none'; 
      }
    </script>
</body>
</html>