<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Document</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
 <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
<p class="auto-style3">
    <input name="pago1" type="radio" value="Ventanilla"/>
        &nbsp;
        <span class="auto-style4"> 
            Recoger en Ventanilla
        </span>
</p>
<p class="auto-style3">
    <input checked="checked" name="pago1" type="radio" value="Deposito"/>
    <span class="auto-style4"> 
        Deposito Bancario
    </span>
</p>
<div id="div1" style="display:;">
    <p class="auto-style3">
        <span class="auto-style4">
            CLAVE Bancaria:
        </span>
    </p>
    <p class="auto-style1">
        <input type="number" name="RECEIVER_BANK_ACCOUNT_NUMBER" id="RECEIVER_BANK_ACCOUNT_NUMBER" required class="auto-style5"/>
    </p>
    <p class="auto-style3">
        <span class="auto-style4">
            Confirma CLAVE Bancaria:
        </span>
    </p>
    <p class="auto-style1">
        <input type="number" name="RECEIVER_ACCOUNT_NUMBER_CONFIRMATION" id="RECEIVER_ACCOUNT_NUMBER_CONFIRMATION" required class="auto-style5"/> 
    </p>
</div>
        
<div id="div2" style="display:none;">
    <center>
      <span>Has seleccionado ventanilla</span>
    </center>
</div>
<script>
	$(document).ready(function() {
    $("input[type=radio]").click(function(event){
        var valor = $(event.target).val();
        if(valor =="Deposito"){
            $("#div1").show();
            $("#div2").hide();
        } else if (valor == "Ventanilla") {
            $("#div1").hide();
            $("#div2").show();
        } else { 
            // Otra cosa
        }
    });
});
</script>
</body>
</html>