<?php 
include_once '../CrudPhp/conexcion.php';


// CAPTURANDO DATOS POR POST
$usuario_nuevo =  $_POST['nombre_usuario'];
$contraseña =  $_POST['contrasena'];
$contraseña2 =  $_POST['contrasena2'];

//VERIFICAR SI EL USUARIO YA EXISTE
$sql = 'SELECT * FROM usuarios WHERE nombre=?';
$sentencia = $mbd->prepare($sql);
$sentencia->execute(array($usuario_nuevo));
$resultado = $sentencia ->fetch();

if($resultado){
  echo 'Existe este usuario';
  die();
}


// CIFRANDO CONTRESEÑA
$contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
echo '<pre>';
var_dump($contraseña);
var_dump($contraseña2);
echo '<pre>';

// VALIDANDO SI LAS DOS CONTRASEÑAS SON IGUALES
if (password_verify($contraseña2, $contraseña)) {
  echo '¡La contraseña es válida! <br>';

  // SI SON IGUALES AGREGALAS EN LA BASE DE DATOS
    $sql_agregar = 'INSERT INTO usuarios (nombre,contraseña) VALUES (?,?) ';
    $sentencia_agregar = $mbd -> prepare($sql_agregar);
    // VERIFICACION DE QUE SE AGREGO CORRECTAMENMTE ALA BASE DATOS
    if($sentencia_agregar->execute(array($usuario_nuevo,$contraseña))){
      
      echo 'agregado <br>';
    }else{

      echo 'error <br>';

    }
    // CERRAR CONEXION CON BASE DE DATOS
    $sentencia_agregar = null;
    $mbd = null;
    //header('location:index.php');

} else {
        // SI NO SON IGUALES MANDA UN MENSAJE DE ERROR
  echo 'La contraseña no es válida.';
}
?>