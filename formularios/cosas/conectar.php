<?php

$db_host = "localhost";
$db_usuario = "root";
$db_pasword = "";
$db_nombre = "cosas_tabla";
        
/* $db_host = "localhost:3306";
$db_usuario = "tiend283_tiend283_cosas_tabla";
$db_pasword = "tiend283_cosas_tabla";
$db_nombre = "tiend283_cosas_tabla"; */


$conectar = new mysqli($db_host, $db_usuario, $db_pasword, $db_nombre);
$conectar->query("SET NAMES 'utf8'");
?>