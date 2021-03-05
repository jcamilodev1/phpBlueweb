<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h3>Registro de usuarios</h3>
  <form action="agregar_usuarios.php" method="POST">
    <input type="text" name="nombre_usuario" placeholder= "ingresa usuario">
    <input type="pass" name="contrasena" placeholder= "ingresa contraseña">
    <input type="pass" name="contrasena2" placeholder= "ingresa contraseña">
    <button type="submit">Guardar</button>
  </form>
  <h3>login</h3>
  <form action="login.php" method="POST">
    <input type="text" name="nombre_usuario" placeholder= "ingresa usuario">
    <input type="pass" name="contrasena" placeholder= "ingresa contraseña">
    <button type="submit">Guardar</button>
  </form>
</body>
</html>