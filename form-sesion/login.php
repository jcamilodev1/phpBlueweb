<?php
session_start();

include_once '../CrudPhp/conexcion.php';

$usuario_login = $_POST["nombre_usuario"];
$contraseña = $_POST["contrasena"];

echo '<pre>';
var_dump($usuario_login);
var_dump($contraseña);
echo '<pre>';

$sql = 'SELECT * FROM usuarios WHERE nombre=?';
$sentencia = $mbd->prepare($sql);
$sentencia->execute(array($usuario_login));
$resultado = $sentencia ->fetch();

var_dump($resultado);

var_dump($resultado['contraseña']);


if(!$resultado){
  echo 'No existe usuario';
  die();
}
echo 'Usuario verificado <br>';
if (password_verify($contraseña,$resultado['contraseña'])){
  $_SESSION['admin'] = $usuario_login;
  header('Location: restringido.php');
}else{
  echo 'contraseñas no son iguales';
  die();
}
