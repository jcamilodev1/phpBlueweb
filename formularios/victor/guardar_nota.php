<?php 
include "conexion.php";
$nota = $_POST['nota_principal'];
$conexion -> query ("INSERT INTO notas2 (nota) VALUES('$nota')");

?>
