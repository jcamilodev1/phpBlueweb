<?php
require_once 'conectando.php';
$variante = $_POST['login_enviando'];
/* $conectando->query("INSERT INTO ajax (log_inicio) VALUES ('$variante')"); */
$conectando->query("UPDATE ajax SET log_inicio = '$variante' WHERE id = 1 LIMIT 1;");
