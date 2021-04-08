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
    <title>Datos de la empresa</title>
    <link rel="stylesheet" href="pagina.css">
    <!-- ===ESTILO BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- SCRIPT SHOW HIDE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
     <h2 style="color: #663300; font-size: 2.25em; text-align: center; background-color: rgba(255, 255, 255, 0.7);">Introduce los datos de la empresa en donde realizarás tu residencia profesional</h2>
    <form class="formato" action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5>Nombre de la empresa</h5>
                    <input class="txt" type="text" name="empresa" id="empresa" placeholder="Empresa">
                    <h5>Direccion</h5>
                    <input class="txt" type="text" name="direccion" id="direccion" placeholder="Direccion">
                    <h5>Municipio</h5>
                    <input class="txt" class="controles3" type="text" name="municipio" id="municipio" placeholder="Municipio">
                    <h5>Sector</h5>
                    <select style="margin-bottom: 0.5em;" name="sector" id="">
                        <option value="Publico">Publico</option>
                        <option value="Privado">Privado</option>
                        <option value="Social">Social</option>
                    </select>
                    <h5>Asesor Externo</h5>
                    <input class="txt" type="text" name="asesor_externo" id="asesorExt" placeholder="Asesor externo">
                    <h5>Puesto</h5>
                    <input class="txt" type="text" name="puesto" id="puesto" placeholder="Puesto">
                </div>
                <div class="col">
                    <h5>Nombre del Progama</h5>
                    <select style="margin-bottom: 0.5em;" name="noprograma" id="">
                        <option value="Salud">Salud</option>
                        <option value="Educacion, arte, cultura y deporte">educacion, arte, cultura y deporte</option>
                        <option value="Alimentacion y nutricion">Alimentacion y nutricion</option>
                        <option value="Vivienda">Vivienda</option>
                        <option value="Empleo y capacitacion para el trabajo">Empleo y capacitacion para el trabajo</option>
                        <option value="Apoyo a proyectos productivos">Apoyo a proyectos productivos</option>
                        <option value="Grupos vulnerables con capacidades diferentes y 3ra edad">Grupos vulnerables con capacidades diferentes y 3ra edad</option>
                        <option value="Gobierno, justicia y seguridad publica">Gobierno, justicia y seguridad publica</option>
                        <option value="Pueblos indigenas">Pueblos indigenas</option>
                        <option value="Derechos humanos">Derechos humanos</option>
                        <option value="Politica y planeacion economica y social">Politica y planeacion economica y social</option>
                        <option value="Infraestructura hidraulica y de saneamiento">Infraestructura hidraulica y de saneamiento</option>
                        <option value="Comercio, abasto y almacenamiento de productos basicos">Comercio, abasto y almacenamiento de productos basicos</option>
                        <option value="Asistencia y seguridad social">Asistencia y seguridad social</option>
                        <option value="Medio hambiente">Medio hambiente</option>
                        <option value="Desarrollo urbano">Desarrollo urbano</option>
                        <option value="Desarrollo tecnologico">Desarrollo tecnologico</option>
                    </select>
                    <!-- MOSTRAR APOYO ECONOMICO -->
                    <h5>Apoyo Economico</h5>
                    <div style=" text-align: center;">
                        <label><input onclick="si();" type="radio" name="apyec" value="1">SI</label>
                        <label style="margin-left: 0.8em;"><input onclick="no();" checked="checked" type="radio" name="apyec" value="0">No</label>
                    </div>
                    <div id="div1" style="display: none;">
                        <h5>Monto</h5>
                        <input class="txt" type="text" name="monto" id="monto" placeholder="Cantidad monetaria">
                        <h5>Estimulo</h5> 
                        <input class="txt" type="text" name="estimulo" id="estimulo" placeholder="Semanal, quincenal o mensual">
                    </div>
                    <h5>Horario</h5>
                    <input class="txt" type="text" name="horario" id="horario" placeholder="Ejem. Lun a Vie de 8:00am a 1:00pm">
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