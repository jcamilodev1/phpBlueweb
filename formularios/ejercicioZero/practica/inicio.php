<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="proceso.php" method="post">
        <select name="estudio" multiple="multiple" id="">
            <option value="primaria">Primaria</option>
            <option value="secundaria">Secundaria</option>
            <option value="bachillerato">Bachillerato</option>
        </select>
        <br>
        <label for="op1">
            <input type="checkbox" id="op1" name="materia" value="Sociales">Sociales
        </label>
    </form>
</body>
</html>