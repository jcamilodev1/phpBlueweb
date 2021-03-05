<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

if($_GET['moneda'] == 'euro' || $_GET['moneda'] == 'dolar'){
  include_once './conexcion.php';
  $sql = 'SELECT * FROM ' .$_GET['moneda'];
  $sentencia = $mbd-> prepare($sql); 
  $sentencia-> execute();
  $datos = $sentencia-> fetchAll();
}else{
  echo 'solicitud no encontrada';
}

echo json_encode($datos);