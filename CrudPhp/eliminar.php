<?php
  include_once './conexcion.php';
  $id = $_GET['id'];
  echo $id;
  $sql_eliminar = 'DELETE FROM colores WHERE id=?';
  $sentencia_eliminar = $mbd-> prepare($sql_eliminar);
  $sentencia_eliminar->execute(array($id));

  header('location:index.php');
  $sentencia_eliminar=null;
  $mbd = null;
  
