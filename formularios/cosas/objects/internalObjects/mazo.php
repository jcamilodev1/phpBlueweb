<?php
require_once '../objects/session.php';




class mazo extends sesion {

    public function nombreGruposDeProductos() {
        $table = $this->otorgar()->query("SELECT id, id_grupos_de_productos, nombre_grupos_de_productos, id_usuario FROM mazos WHERE activo_o_desactivado = '1' AND id_usuario = '$this->id_usuario()' ");
        
        if ($table != '' || $table != NULL){
            while ($presentar = mysqli_fetch_array($table)) {        
                echo '
                
                    <form action="procesoSistemaAdministrativo/mazoDeProductosProceso.php" method="post">
                        <input type="hidden" name="nombre_grupos_de_productos" value="' . $presentar['nombre_grupos_de_productos'] . '">
                        <input type="hidden" name="id_grupos_de_productos" value="' . $presentar['id_grupos_de_productos'] . '">
                        <input type="submit" class="btn-primary form-control" value="' . $presentar['nombre_grupos_de_productos'] . '">
                    </form>
                    <br>
                
                ';
            }
        }
    }
    /* 
    En el boton de mazo, lo que tiene que hacerce es cambiar el id del mazo. 
    Tambien 
    */ 
    public function leerTablaDeNombreGruposDeProductos() {
        $table = $this->otorgar()->query("SELECT id, id_grupos_de_productos, nombre_grupos_de_productos, descripcion_grupo_del_producto, id_usuario FROM mazos WHERE activo_o_desactivado = '1' AND id_usuario = '$this->id_usuario()' ");
        echo '	
        <table border="1">
            <tr>
                <th>Codigo</th>
                <th>Nombre de G. de P. </th>
                <th>Descripción</th>                
            </tr>';
        while ($presentar = mysqli_fetch_assoc($table)) {
            echo 
            "<tr>
                <td>" . $presentar['id_grupos_de_productos'] . "</td>
                <td>" . $presentar['nombre_grupos_de_productos'] . "</td>
                <td>" . $presentar['descripcion_grupo_del_producto'] . "</td>                
            </tr>";    
            }
            echo '</table>'; 
    }
    


    public function crearGrupoDeProducto($nombre_grupos_de_productos, $descripcion_grupo_del_producto){

        $aumentarIdGrupoDeProductos = $this->aumentarIdValor('id_grupos_de_productos', 'mazos', 'id');
        $nombre_grupos_de_productosExistencia = $this->paraValidarLaExistenciaDeUnDato('mazos', 'nombre_grupos_de_productos', $nombre_grupos_de_productos);
        if ($nombre_grupos_de_productosExistencia == true){
            echo '
            <h2>Debes escribir otro nombre, por que el que escribiste ya existe.</h2>';
        } else {
            $table = $this->otorgar()->query("INSERT INTO mazos(id_grupos_de_productos, nombre_grupos_de_productos, descripcion_grupo_del_producto, id_usuario) VALUES ('$aumentarIdGrupoDeProductos', '$nombre_grupos_de_productos', '$descripcion_grupo_del_producto', '$this->id_usuario()') ");
            header ("Location: ../mazoDeProductos.php");
        }        
    }

    public function actualizarNombreGrupoDeProducto($idNGP, $leerActualizar){
        if ($leerActualizar['leerActualizar'] == 'leer'){
            $leerNGP = $this->otorgar()->query("SELECT * FROM mazos WHERE id_grupos_de_productos = '$idNGP' ");
            $leerNGP = mysqli_fetch_assoc($leerNGP );
            return $leerNGP ;
        } elseif ($leerActualizar['leerActualizar'] == 'actualizar'){
            $nombre_grupos_de_productos = $leerActualizar['nombre_grupos_de_productos'];
            $descripcion_grupo_del_producto = $leerActualizar['descripcion_grupo_del_producto'];

            $actualizando = $this->otorgar()->query("UPDATE mazos SET nombre_grupos_de_productos = '$nombre_grupos_de_productos', descripcion_grupo_del_producto = '$descripcion_grupo_del_producto' WHERE id_grupos_de_productos = '$idNGP' ");
            
        } elseif ($leerActualizar['leerActualizar'] == 'eliminar'){

            $actualizando = $this->otorgar()->query("UPDATE mazos SET activo_o_desactivado = '0' WHERE id_grupos_de_productos = '$idNGP' ");
            
        } else {
            echo '<h3>Hay un error en tu codigo</h3>';
        }

    }

    public function tablaMazo(){
        echo '
        <div class="container">
            <div class="row justify-content-center">				
                <div class="col-12 col-lg-8">
                    <?php 
                    $menu1->unicoMenu();
                    /* Está en menu.php */
                    ?>
                    <h1>Tabla de nombres de grupo de productos</h1>
                    <form method="post" action="cambiarNombreDeGrupoDeProductos.php">
                        <p>Elige el nombre del grupo de producto que deceas cambiar</p>
                        <input type="number" name="idDeNombreDeGrupoDeProducto" required="required" autofocus class="form-control">
                        <br><br>
                        <input type="submit" value="Cambiar nombre de grupo de productos" class="form-control btn-primary">
                    </form><br>
                    <?php
                        $mazoElementos->leerTablaDeNombreGruposDeProductos();
                        /* Este función del objeto está en mazo objeto */
                    ?>
        
                </div>
            </div>
        </div>
        <br>
        <br>
        ';
    }

    public function mazos(){
        echo '
            <div class="container">
                <div class="row justify-content-center">				
                    <div class="col-12 col-lg-8">

                        <h1>Bienvenido ' . $leerTablaElementos->nombre() . '</h1>
                        <!-- Está en SesionUsuario.php -->
                        <h2>Mis productos</h2>
                        <!-- Grupo de nombres de grupos de productos -->
                        <br>' .
        
                            
                                $mazoElementos->nombreGruposDeProductos() 
                                /* Lugar donde está la función = mazoObjeto 
                                Trae a los mazos para poderce mostrar y hacer clic en ellos, estos mazos tienen por dentro los productos contenidos
                                Al hacer clic en el me envía a mazo productos proceso, el cual a su vez me envía a leer
                                Este al hacer clic, esto debe poderse poner en el estado de la app, en que mazo estoy para poder luego al crear productos contenidos, se pongan por defecto el id del mazo al que pertenece.
                                */
                            . '
        
        
                        <!-- Pie de pagina -->
                        <br><br><br><br><br>
                        <form action="crearGrupoDeProductos.php">
                            <input type="hidden">
                            <input type="submit" class="form-control btn-outline-success" value="Crear grupos de productos">
                        </form>
                        <br>
                        <form action="tablaNombreDeGrupoProductos.php">
                            <input type="hidden">
                            <input type="submit" class="form-control btn-outline-secondary" value="Cambiar nombre de un grupo de productos">
                        </form>
                    </div>
                </div>
            </div>
            
        ';
    }

    public function crearMazos(){
        echo '
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <?php 
                    $menu1->unicoMenu();
                    ?>
                    <h1>Crear grupo de productos</h1>
                    <form action="procesoSistemaAdministrativo/crearGrupoDeProductosProceso.php" method="post">
                        <p>Pon aquí el nombre del grupo de productos que quieres crear</p>
                        <input type="text" name="nombreDelGrupoDeProductos" autofocus required="required" value="" class="form-control">
                        <p>Descripción del grupo de productos</p>
                        <textarea name="descripcionDelGrupoDeProductos" id="" cols="30" rows="10" value="Esta es la descripción" required="required" class="form-control"></textarea>
                        <br><br>
                        <input type="submit" value="Crear grupo de productos" class="form-control btn-success">
                    </form>
                </div>
            </div>
        </div>
        
        ';
    }

    public function actualizarMazo(){
        $idDeNombreDeGrupoDeProducto = $_POST['idDeNombreDeGrupoDeProducto'];
        $existeIdDeNombreDeGrupoDeProducto = $mazoElementos->paraValidarLaExistenciaDeUnDato('mazos', 'id_grupos_de_productos', $idDeNombreDeGrupoDeProducto);
        if ($existeIdDeNombreDeGrupoDeProducto == false){
            echo '<h1>El grupo de productos no existe<h1/><br>
            <a href="tablaNombreDeGrupoProductos.php">Elegir otro grupo de productos</a>
            ';
            die();
        }
        $leerActualizar = [
            "leerActualizar" => "leer"/*leer actualizar eliminar*/,
            "nombre_grupos_de_productos" => "",
            "descripcion_grupo_del_producto" => "",
            "activo_o_desactivado" => "",
        ];

        $leyendoNGDP = $mazoElementos->actualizarNombreGrupoDeProducto($idDeNombreDeGrupoDeProducto, $leerActualizar);
        /* Está en mazo objeto */
        echo '
        
        <div class="container">
            <div class="row justify-content-center">				
                <div class="col-12 col-lg-8">
            <?php 
            $menu1->unicoMenu();
            ?>
            <h1>Cambiar nombre de grupo de productos</h1>
            <form action="procesoSistemaAdministrativo/cambiarNombreDeGrupoDeProductosProceso.php" method="post">
                <!-- Hidden -->
                <input type="hidden" value="actualizar" name="leerActualizar">
                <input type="hidden" name="id_grupos_de_productos" value="' . $idDeNombreDeGrupoDeProducto . '" >  
                
                <!-- Nombre y descripción -->
                <br>
                <input type="submit" value="Cambiar nombre" class="form-control btn-success" >
                <br>
                <p>Nombre del grupo de productos</p>
                <input type="text" name="nombre_grupos_de_productos" class="form-control" autofocus value="' . $leyendoNGDP['nombre_grupos_de_productos'] . '" > 
                <p>Descripción del grupo de productos</p>
                <textarea name="descripcion_grupo_del_producto" id="" cols="30" rows="10" class="form-control"> ' . $leyendoNGDP['descripcion_grupo_del_producto'] . ' </textarea>
                
            </form>
                <br>

            <form action="procesoSistemaAdministrativo/cambiarNombreDeGrupoDeProductosProceso.php" method="post">
                <!-- Hidden -->
                <input type="hidden" value="eliminar" name="leerActualizar">
                <input type="hidden" name="id_grupos_de_productos" value="' . $idDeNombreDeGrupoDeProducto . '" >  
                <input type="hidden" name="nombre_grupos_de_productos" value="" >
                <input type="hidden" value="" name="descripcion_grupo_del_producto">
                <br>
                <br>
                <br>
                <input type="submit" value="Eliminar este nombre de grupo de productos" class="form-control btn-outline-warning">
            </form>

                </div>
            </div>
        </div>
        ';
        
    }

    public function procesoActualizar(){        
        require_once '../../objetos/instanciasObjetosPrimeros.php';
        require_once '../../conectar.php';
        $id_grupos_de_productos = $_POST['id_grupos_de_productos'];
        $leerActualizar['leerActualizar'] = $_POST['leerActualizar'];
        $leerActualizar['nombre_grupos_de_productos'] = $_POST['nombre_grupos_de_productos'];
        $leerActualizar['descripcion_grupo_del_producto'] = $_POST['descripcion_grupo_del_producto'];



        $nombre_grupos_de_productos = $leerActualizar['nombre_grupos_de_productos'];
        $descripcion_grupo_del_producto = $leerActualizar['descripcion_grupo_del_producto'];

        $actualizando = $conectar->query("UPDATE mazos SET nombre_grupos_de_productos = $nombre_grupos_de_productos, descripcion_grupo_del_producto = $descripcion_grupo_del_producto WHERE id_grupos_de_productos = '$id_grupos_de_productos' ");

        /* $leyendoNGDP = $mazoElementos->actualizarNombreGrupoDeProducto($id_grupos_de_productos, $leerActualizar); */
        /* $leerActualizar = [
            "leerActualizar" => "leer" //leer actualizar eliminar// ,
            "nombre_grupos_de_productos" => "",
            "descripcion_grupo_del_producto" => "",
            "activo_o_desactivado" => "",
        ]; */


        require_once '../../objetos/instanciasObjetosPrimeros.php';
        require_once '../../conectar.php';
        $id_grupos_de_productos = $_POST['id_grupos_de_productos'];
        $leerActualizar['leerActualizar'] = $_POST['leerActualizar'];
        $leerActualizar['nombre_grupos_de_productos'] = $_POST['nombre_grupos_de_productos'];
        $leerActualizar['descripcion_grupo_del_producto'] = $_POST['descripcion_grupo_del_producto'];


        /* 
        $nombre_grupos_de_productos = $leerActualizar['nombre_grupos_de_productos'];
        $descripcion_grupo_del_producto = $leerActualizar['descripcion_grupo_del_producto'];

        $actualizando = $conectar->query("UPDATE mazos SET nombre_grupos_de_productos = '$nombre_grupos_de_productos', descripcion_grupo_del_producto = '$descripcion_grupo_del_producto' WHERE id_grupos_de_productos = '$id_grupos_de_productos' ");

        */
        $leyendoNGDP = $mazoElementos->actualizarNombreGrupoDeProducto($id_grupos_de_productos, $leerActualizar);
        /* $leerActualizar = [
            "leerActualizar" => "leer" //leer actualizar eliminar// ,
            "nombre_grupos_de_productos" => "",
            "descripcion_grupo_del_producto" => "",
            "activo_o_desactivado" => "",
        ]; */

        header ("Location: ../mazoDeProductos.php");
    }

    public function crearMazoProceso(){
        $nombreDelGrupoDeProductos = $_POST['nombreDelGrupoDeProductos'];
        $descripcionDelGrupoDeProductos = $_POST['descripcionDelGrupoDeProductos'];

        $mazoElementos->crearGrupoDeProducto($nombreDelGrupoDeProductos, $descripcionDelGrupoDeProductos);

    }

    public function mazoProceso(){
        session_start();
        $_SESSION['nombre_grupos_de_productos'] = $_POST['nombre_grupos_de_productos'];
        $_SESSION['mazo'] = $_POST['id_grupos_de_productos'];


        header ("Location: ../../sistemaTablasProductos/leer.php");
    }





}




