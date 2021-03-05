

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
    <form action="javascript:void(0)">
        <input type="number" id="iniciando" value="1">
        <input type="submit" onclick="cambiarLogin()">
    </form>
    <div id="mostrando">
    </div>
    <script>
        const cambiarLogin = () =>{
            var cambiandoLogin = $('#iniciando').val();
            $.ajax({
                url: "recivir.php",
                type: "POST",
                data: {login_enviando:cambiandoLogin},
                success: function(){
                    $('#mostrando').load("loginProceso.php")
                }
            })

        }
    </script>
</body>
</html>