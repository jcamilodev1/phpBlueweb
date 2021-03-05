<?php
include_once './conexion.php';
if($_POST){
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $satisfaccion = $_POST['inlineRadioOptions'];
  $puntos = intval($satisfaccion);


$sql_agregar = "INSERT INTO empelados (nombre,apellido,satisfaccion) VALUES (?,?,?) ";
$sentencia_agregar = $mbd -> prepare($sql_agregar);
$sentencia_agregar->execute(array($nombre,$apellido,$puntos));

header('location:index.php');

  echo 'agregado';
}
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/ccaf61cd84.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container">
    <form method="POST">
      <h3>empleados</h3>
      <input type="number" name="id" placeholder="Escribe tu id de empleado" class="form-control" id="">
      <input type="text" name="nombre " placeholder="Escribe su nombre" class="form-control mt-3" id="">
      <input type="text" name="apellido" placeholder="Escribe tu apellido" class="form-control mt-3" id="">
      <label for="">Nivel de Satisfaccion:  </label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
        <label class="form-check-label" for="inlineRadio1">1</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
        <label class="form-check-label" for="inlineRadio2">2</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3" >
        <label class="form-check-label" for="inlineRadio3">3</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="4" >
        <label class="form-check-label" for="inlineRadio3">4</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="5" >
        <label class="form-check-label" for="inlineRadio3">5</label>
      </div>
      <button class="btn btn-info mt-3">Enviar</button>
    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>
