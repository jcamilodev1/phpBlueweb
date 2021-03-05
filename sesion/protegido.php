<?php
session_start();

if (isset($_SESSION['admin'])){
  echo 'bienvenido';
  //header('location:../CrudPhp/index.php');
  echo '<br> <a href="./cerrar.php">Cerrar Sesion</a>';
}else {
  header('location:index.php');
  
}