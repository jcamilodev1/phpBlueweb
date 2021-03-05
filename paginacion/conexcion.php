
<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=paginacion', 'root', 'cami123');
    //echo 'conectado';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>

