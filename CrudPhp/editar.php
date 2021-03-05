<?php

  // echo 'editar.php?id=1&color=success&descripcion=este es un color verde';
  // echo'<br>';


  $id = $_GET['id'];
  $color = $_GET['color'];
  $descripcion = $_GET['descripcion'];

  echo $id;
  echo'<br>';
  echo $color;
  echo'<br>';  
  echo $descripcion;
  echo'<br>';

  include_once './conexcion.php';

  $sql_editar = 'UPDATE colores SET color=?,descripcion=? WHERE id=?';
  $sentencia_editar = $mbd-> prepare($sql_editar);
  $sentencia_editar->execute(array($color,$descripcion,$id));

  $sentencia_editar=null;
  $mbd = null;
  header('location:index.php');
