<?php 
include "conexion.php";
$mostrar = $conexion -> query ("SELECT * FROM notas2");
while($r_mostrar = $mostrar -> fetch_assoc()){
    
    echo '<div class="notario">'.$r_mostrar['nota'].'</div><br>';
}
?>