<?php
$usuario = 'root';
$contrasena = 'cami123';
$link ='mysql:host=localhost;dbname=empleados';
try {
  $mbd = new PDO($link , $usuario, $contrasena);
  echo 'conectado <br>';
}
catch (PDOException $e) {
  print "¡Error!: " . $e->getMessage() . "<br/>";
  die();
}