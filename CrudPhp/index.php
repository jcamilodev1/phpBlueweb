<?php
include_once './conexcion.php';
// Leer
$sql_leer = 'SELECT * FROM colores ';

$sql_traer = $mbd ->prepare($sql_leer);
$sql_traer -> execute();

$resultado = $sql_traer ->fetchAll();
//var_dump($resultado)

// Agregar
if($_POST){
  $color = $_POST['color'];
  $descripcion = $_POST['descripcion'];

  if($color != "" && $descripcion != "" ){
    $sql_agregar = 'INSERT INTO colores (color,descripcion) VALUES (?,?) ';
    $sentencia_agregar = $mbd -> prepare($sql_agregar);
    $sentencia_agregar->execute(array($color,$descripcion));

    // creamosconexcion
    $sentencia_agregar = null;
    $mbd = null;
    header('location:index.php');
  }
  //echo 'agregado'
}
if($_GET){
  $id = $_GET['id'];
  $sql_unico = 'SELECT * FROM colores WHERE id=?';
  $sql_traer_unico = $mbd ->prepare($sql_unico);
  $sql_traer_unico -> execute(array($id));
  $resultado_unico = $sql_traer_unico ->fetch();
  //var_dump($resultado_unico);
}

?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/ccaf61cd84.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <?php foreach($resultado as $dato): ?>
        <div class="alert alert-<?php echo$dato[color] ?> text-uppercase" role="alert">
          <?php echo $dato[color] ?>
          -
          <?php echo $dato[descripcion] ?>
          <a href="eliminar.php?id=<?php  echo$dato[id]  ?>" class="float-end ms-3">
          <i class="fas fa-trash"></i>
          </a>
          <a href="index.php?id=<?php  echo$dato[id]  ?>" class="float-end">
          <i class="fas fa-pen"></i>
          </a>
        </div>
        <?php endforeach ?>
      </div>
      <div class="col-md-6">
      <?php if(!$_GET): ?>
        <form method="POST">
        <h3>Agregar Elementos</h3>
          <input type="text" name="color" class="form-control" id="">
          <input type="text" name="descripcion" class="form-control mt-3" id="">
          <button class="btn btn-info mt-3">Agregar</button>
        </form>
        <?php endif ?>
        <?php if($_GET): ?>
        <form method="GET" action="editar.php">
        <h3>Editar Elementos</h3>
          <input type="text" name="color" class="form-control" 
            value="<?php echo $resultado_unico[color] ?>">
          <input type="text" name="descripcion" class="form-control mt-3" 
            value="<?php echo $resultado_unico[descripcion] ?>">
          <input type="hidden" name="id" class="form-control mt-3" 
            value="<?php echo $resultado_unico[id] ?>">
          <button class="btn btn-info mt-3">Editar</button>
        </form>
        <?php endif ?>
      </div>
  </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  </body>
</html>

<?php 
    $sql_leer = null;
    $mbd = null;
    
    ?>