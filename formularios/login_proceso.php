<?php
$correo = $_POST['correo'];
$password = $_POST['password'];

include "enchufar.php";

$leer_base_de_datos = $enchufar->query("SELECT * FROM usuarios WHERE correo = '$correo' AND password = '$password' ");

if ($resultados_db = mysqli_num_rows($leer_base_de_datos)>=1){
	while ($recorriendo = mysqli_fetch_assoc($leer_base_de_datos)) {

		$cargo = $recorriendo['cargo'];

		if ($cargo == "vendedor"){
			header("Location: v/vendedor.php");
		} elseif ($cargo == "administrador") {
			header("Location: a/vender_administrador.php");
		} elseif ($cargo == "master") {
			session_start();
			$_SESSION['usu_master'] = $correo;
			header("Location: m/master.php");
		} else {
			echo "No tienes un cargo, comunicate con tu administrador.";
		}
	}
} else {
	echo '
	<h1>El usuario o la contraseña con incorrectos</h1>
	<form method="post" action="login.php"> <input type="submit" name="" value="Regresar"> </form>
	';
}

/* $revisar_dato = mysqli_fetch_assoc($leer_base_de_datos);

var_dump($revisar_dato); */


?>