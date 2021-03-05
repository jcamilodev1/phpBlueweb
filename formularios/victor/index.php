<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
<style>
.notario{
    width: 200px;
    border: 1px solid grey;
    padding: 20px;
    border-radius: 5px;
}
</style>
    <form action="javascript:void(0)">
    <input type="text" id="nota_principal">
    <input type="submit"  onclick="agregar_nota()" style="display: none">
    </form>
    <div id="nota_nueva" style="display: inline-flex;">
        <?php include "mostrar_nota.php"; ?>
    </div>

    <script>    
        const agregar_nota = () =>{
            var nota_principalVariable = $('#nota_principal').val();
            
            $.ajax({
                url: "guardar_nota.php",
                type: "POST",
                data: {nota_principal:nota_principalVariable},
                success: function(){
                    $('#nota_principal').val("");
                    $("#nota_nueva").load("mostrar_nota.php");

                }
            })
        }

        const api = () =>{
            var nombre = "<?php echo $?>";
            url: "localhost/victor/api.php"+nombre;
            json_decode($result);
            
        }
    </script>
</body>
</html>