<?php 
  include_once './conexcion.php';

  //LLAMAR A LOS ARTICULOS
  $sql = 'SELECT * FROM articulos';
  $sentencia = $pdo-> prepare($sql);
  $sentencia->execute();

  $resultados = $sentencia->fetchAll();
  //var_dump($resultador)

  $articulos_x_por_pagina = 3;
  $contar_articulos = $sentencia->rowCount(); //contando filas
  $paginas =  ceil($contar_articulos / $articulos_x_por_pagina);
  //echo $paginas;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container my-5">
      <h1>Paginacion</h1>
      <?php 
        if(!$_GET){
          header('Location: index.php?pagina=1');
        }
        if($_GET['pagina'] > $paginas || $_GET['pagina'] <= 0 ){
          header('Location: index.php?pagina=1');
        }
        $iniciar = ($_GET['pagina'] -1) * $articulos_x_por_pagina;

        $sql_articulos = 'SELECT * FROM articulos LIMIT :name, :value ';
        $sentencia_articulos = $pdo->prepare($sql_articulos);
        $sentencia_articulos->bindParam(':name', $iniciar, PDO::PARAM_INT);
        $sentencia_articulos->bindParam(':value', $articulos_x_por_pagina, PDO::PARAM_INT);
        $sentencia_articulos ->execute();
        $resultado_articulos = $sentencia_articulos->fetchAll();
      ?>
      <?php foreach($resultado_articulos as $resultado): ?>
      <div class="alert alert-primary mt-5" role="alert">
        <?php echo $resultado['titulo'] ?>
      </div>
      <?php endforeach ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item
          <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>
          "><a class="page-link" 
          href="index.php?pagina=<?php echo  $_GET['pagina']-1;?>">
          Previous</a>
          </li>
          <?php for($i=1; $i <= $paginas; $i++):  ?>
          <li class="page-item 
          <?php echo $_GET['pagina']== $i? 'active' : ''  ?>">
            <a class="page-link" href="index.php?pagina=<?php echo $i?>">
            <?php echo $i?>
          </a>
        </li>
          <?php endfor ?>
          <li class="page-item 
          <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>
          "><a class="page-link" href="index.php?pagina=<?php echo  $_GET['pagina']+1;?>">Next</a></li>
        </ul>
      </nav>
    </div>
  </body>
</html>
