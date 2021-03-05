<?php

$usuario = 'root';
$pass = 'cami123';
$link ='mysql:host=localhost;dbname=API';
try {
  $mbd = new PDO($link , $usuario, $pass);
  //echo 'conectado <br>';
}
catch (PDOException $e) {
  print "¡Error!: " . $e->getMessage() . "<br/>";
  die();
}