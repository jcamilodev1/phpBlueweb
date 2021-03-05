<?php
require_once '../objects/session.php';




class producto extends sesion {
    
    

    /* $formularioCrearActualizar = [
        'producto_contenedor' => $_SESSION['producto_contenedor'],
        'nombre_producto' => 'Victor',
        'cantidad_del_producto' => '15',
        'precio_del_producto' => '23',
        'descripcion_del_producto' => 'joyita'
    ]; */
    public function formularioCrearActualizar($formularioCrearActualizar){
        $obteniendoContenedor = $this->obtenerInContededor();
        if ($obteniendoContenedor >= 0){
            echo '
                <form action="' . $formularioCrearActualizar['direccionAction'] . '" method="post" >
                    <input type="submit" value="' . $formularioCrearActualizar['nombreDeBoton'] . ' "  class="form-control btn-success"><br/>
                    <p>Producto contenedor</p>
                    <input type="number" name="obtenerInContededor"  required="required" value="' . $formularioCrearActualizar['producto_contenedor']  . '" class="form-control">
                    <p>Nombre de producto</p>
                    <input type="text" name="nombre_producto" required="required" autofocus value="' . $formularioCrearActualizar['nombre_producto'] . '" class="form-control">
                    <p>Cantidad de producto</p>
                    <input type="number" name="cantidad_del_producto" required="required" value="' . $formularioCrearActualizar['cantidad_del_producto'] . '" class="form-control">
                    <p>Precio del producto</p>
                    <input type="number" name="precio_del_producto" value="' . $formularioCrearActualizar['precio_del_producto'] . '" class="form-control">
                    <p>Descripción del producto</p>
                    <textarea id="" cols="30" rows="10" name="descripcion_del_producto"  class="form-control">' . $formularioCrearActualizar['descripcion_del_producto'] . '</textarea>
                </form>
                ';

        }
            /* Esto se ejecuta en crear producto contenido */
            /* Tambien en actualizar producto */
    }


    public function dbFormularioCrear($crearProductoContenidoProceso){

        $obtenerInContededor = $crearProductoContenidoProceso['obtenerInContededor'];
        $nombre_producto = $crearProductoContenidoProceso['nombre_producto'];
        $cantidad_del_producto = $crearProductoContenidoProceso['cantidad_del_producto'];
        $precio_del_producto = $crearProductoContenidoProceso['precio_del_producto'];
        $descripcion_del_producto = $crearProductoContenidoProceso['descripcion_del_producto'];

        $id_productoAumentado = $this->aumentarIdValor('id_producto', 'productos', 'id');

        $consulta = $this->otorgar()->query("INSERT INTO productos(id_producto, id_usuario, id_mazo, nombre_producto, cantidad_del_producto, producto_contenedor, precio_del_producto, descripcion_del_producto) VALUES ('$id_productoAumentado', '$this->id_usuario()', '$this->obtenerMazo()', '$nombre_producto', '$cantidad_del_producto', '$obtenerInContededor', '$precio_del_producto', '$descripcion_del_producto' ) ");
            /* Esto se ejecuta en crear producto contenido */

        var_dump($obtenerInContededor);
        var_dump($nombre_producto);
        var_dump($cantidad_del_producto);
        var_dump($precio_del_producto);
        var_dump($descripcion_del_producto);

        var_dump($_POST['obtenerInContededor']);
        var_dump($_POST['nombre_producto']);
        var_dump($_POST['cantidad_del_producto']);
        var_dump($_POST['precio_del_producto']);
        var_dump($_POST['descripcion_del_producto']);
    }



    /* $actualizando = $conectar->query("UPDATE mazos SET nombre_grupos_de_productos = $nombre_grupos_de_productos, descripcion_grupo_del_producto = $descripcion_grupo_del_producto WHERE id_grupos_de_productos = '$id_grupos_de_productos' "); */


    public function dbFormularioActualizar($actualizarProductoProceso){

        $obtenerInContededor = $actualizarProductoProceso['obtenerInContededor'];
        $nombre_producto = $actualizarProductoProceso['nombre_producto'];
        $cantidad_del_producto = $actualizarProductoProceso['cantidad_del_producto'];
        $precio_del_producto = $actualizarProductoProceso['precio_del_producto'];
        $descripcion_del_producto = $actualizarProductoProceso['descripcion_del_producto'];
        $eliminar = $actualizarProductoProceso['eliminar'];

        if ($eliminar == 'eliminar'){
            $consulta = $this->otorgar()->query("UPDATE productos SET activo_o_desactivado = 0 WHERE id_producto = '$this->obtenerInContededor()' ");
        } else {
            $consulta = $this->otorgar()->query("UPDATE productos SET nombre_producto = '$nombre_producto', cantidad_del_producto = '$cantidad_del_producto', producto_contenedor = '$obtenerInContededor', precio_del_producto = '$precio_del_producto', descripcion_del_producto = '$descripcion_del_producto' WHERE id_producto = '$this->obtenerInContededor()' ");
                /* Esto se ejecuta en crear producto contenido */

        }
 

        var_dump($obtenerInContededor);
        var_dump($nombre_producto);
        var_dump($cantidad_del_producto);
        var_dump($precio_del_producto);
        var_dump($descripcion_del_producto);

        var_dump($_POST['obtenerInContededor']);
        var_dump($_POST['nombre_producto']);
        var_dump($_POST['cantidad_del_producto']);
        var_dump($_POST['precio_del_producto']);
        var_dump($_POST['descripcion_del_producto']);
    }

    public function formularioEliminar(){
        echo '
        <br/>
        <br/>
        <form action="intermedio/actualizarProductoProceso.php" method="post" >
            <input type="submit" value="Borrar producto" class="btn-outline-warning form-control"><br/>
            <input type="hidden" name="eliminar" value="eliminar" >
        </form>
        ';
    }





    protected function recorrerTablaProductos($table){
        echo '	
        <table border="1">
            <tr>
                <th>Código de producto</th>
                <th>Nombre de producto</th>
                <th>Producto contenedor</th>
                <th>Cantidad del producto</th>
                <th>Precio del producto</th>
                <th>Descripción del producto</th>
            </tr>';		
    
        while ($presentar = mysqli_fetch_array($table)) {
            echo "<tr>
                <td>" . $presentar['id_producto'] . "</td>
                <td>" . $presentar['nombre_producto'] . "</td>
                <td>" . $presentar['producto_contenedor'] . "</td>
                <td>" . $presentar['cantidad_del_producto'] . "</td>
                <td>" . $presentar['precio_del_producto'] . "</td>
                <td>" . $presentar['descripcion_del_producto'] . "</td>
            </tr>";
    
        }
        echo '</table>'; 
    }
    
    public function tablaLeerGrupoDeProductos(){
        $consulta = $this->otorgar()->query("SELECT * FROM productos WHERE id_usuario = '$this->id_usuario()' AND id_mazo = '$this->obtenerMazo()' AND activo_o_desactivado = '1' ");
        $this->recorrerTablaProductos($consulta);
    
    }

    /* la parte inicial de nombreDeSubProductos.php es el producto contenedor */
    public function tuplaNombreDeProductos(){
        $consulta = $this->otorgar()->query("SELECT * FROM productos WHERE id_usuario = '$this->id_usuario()' AND id_producto = '$this->obtenerInContededor()' AND id_mazo = '$this->obtenerMazo()' AND activo_o_desactivado = '1' ");
        $this->recorrerTablaProductos($consulta);   
    }

    /* Esta es la parte segunda la cual tiene a los productos contenidos*/
    public function tablaNombreDeSubProductos(){
        $consulta = $this->otorgar()->query("SELECT * FROM productos WHERE id_usuario = '$this->id_usuario()' AND producto_contenedor = '$this->obtenerInContededor()' AND id_mazo = '$this->obtenerMazo()' AND activo_o_desactivado = '1' ");
        $this->recorrerTablaProductos($consulta);   
    }

    public function botonParaVerProductosContenidos($datosPorParametro){
        $irAlPadre = NULL;
        if ($this->datosDeProductos() != false){
            $irAlPadre = $this->datosDeProductos()['producto_contenedor'];
        }
        /* var_dump($irAlPadre); */
        if ($datosPorParametro['irAlPadre'] == true){
            if ($irAlPadre == NULL || $irAlPadre == 0 || $irAlPadre == '0'){
                echo '
                <br/>
                <form action="leerReinicio.php" method="post">
                    <input type="hidden" required="required" name="verProductoEspecificoPorId" value=" ' . $irAlPadre . ' ">
                    <input type="submit" value="Ir al inicio" class="btn btn-outline-secondary">
                </form>
                <br/>
                ';
            } else {
                echo '
                <br/>
                <form action="' . $datosPorParametro['direccionDePagina'] . '" method="post">
                    <input type="hidden" required="required" name="verProductoEspecificoPorId" value="' . $irAlPadre . '">
                    <input type="submit" value="Ir al padre" class="btn btn-outline-secondary">
                </form>
                <br/>
                ';            
            }
        } 

        /* var_dump($this->obtenerInContededor()); */
        echo '
         <form action="' . $datosPorParametro['crearProductoContenido'] . '" method="post">
            <input type="submit" value="Crear producto contenido" class="btn btn-success">
        </form>
        <form action="' . $datosPorParametro['direccionDePagina'] . '" method="post">
            <p>' .  $datosPorParametro['tituloDeBoton'] . '</p>
            <input type="number" required="required" autofocus name="verProductoEspecificoPorId" >
            <input type="submit" value="Ver producto contenido" class="btn btn-primary">
        </form><br/>

        ';
    }

    public function crear(){
        echo '
            <div class="container">
            <div class="row justify-content-center">				
                <div class="col-4">
                </div>
            </div>
            </div>
            <?php 
            $menu1->esteMenu();
            ?>
            <h1>Crear producto</h1>
            <br>
            <form action="">
                <p>Producto contenedor</p>
                <input type="number">
                <p>Nombre de producto</p>
                <input type="text">
                <p>Cantidad de producto</p>
                <input type="text">
                <p>Precio del producto</p>
                <input type="text">
                <p>Descripción del producto</p>
                <textarea name="" id="" cols="30" rows="10"></textarea>
                <br><br>
                <input type="submit" value="Crear producto">
            </form>
        
        ';
    }


    public function actualizar(){
        echo '
        <div class="container">
            <div class="row justify-content-center">				
                <div class="col-12 col-lg-8">

                <?php 
                $menu1->esteMenu();
                ?>

                <h1>Actualizar producto</h1>
                <br>
            <!--<form action="intermedio/actualizarProducto.php">
                    <p>Producto contenedor</p>
                    <input type="text">
                    <p>Nombre de producto</p>
                    <input type="text">
                    <p>Cantidad de producto</p>
                    <input type="text">
                    <p>Precio del producto</p>
                    <input type="text">
                    <p>Descripción del producto</p>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <br><br>
                    <input type="submit" value="Actualizar producto">
                    <input type="submit" value="Borrar producto">
                </form> -->';
                
                if ($leerTablaElementos->datosDeProductos() != false){
                    /* datosDeProductos() está en SesionUsuario.php */
                    $formularioCrearActualizar = [
                        'direccionAction' => 'intermedio/actualizarProductoProceso.php',
                        'producto_contenedor' => $leerTablaElementos->datosDeProductos()['producto_contenedor'],
                        'nombre_producto' => $leerTablaElementos->datosDeProductos()['nombre_producto'],
                        'cantidad_del_producto' => $leerTablaElementos->datosDeProductos()['cantidad_del_producto'],
                        'precio_del_producto' => $leerTablaElementos->datosDeProductos()['precio_del_producto'],
                        'descripcion_del_producto' => $leerTablaElementos->datosDeProductos()['descripcion_del_producto'],
                        'nombreDeBoton' => 'Actualizar producto'
                    ];
                    $leerTablaElementos->formularioCrearActualizar($formularioCrearActualizar);

                    /* Esto está en productos y formulario */
                } else {
                    echo '
                    <h2>No hay un producto que actualizar</h2>
                    <a href="nombreDeSubProductos.php">Regresar</a>
                    ';
                }
                echo '<br/><br/><br/>';
                $leerTablaElementos->formularioEliminar();
                /* Está en productosYFormulario.php */
                echo '
                ?>
                </div>
            </div>
        </div>
        ';
    }


    public function crearProductoContenido(){
        echo '
            <div class="container">
                <div class="row justify-content-center">				
                    <div class="col-12 col-lg-8">
                        <?php 
                        $menu1->esteMenu();
                        ?>
                        <h1>Crear producto</h1>
                        <br>';
                        
                            $formularioCrearActualizar = [
                                'direccionAction' => 'intermedio/crearProductoContenidoProceso.php',
                                'producto_contenedor' => $producto_contenedor,
                                'nombre_producto' => '',
                                'cantidad_del_producto' => '1',
                                'precio_del_producto' => '',
                                'descripcion_del_producto' => '',
                                'nombreDeBoton' => 'Crear producto'
                            ];
                            $leerTablaElementos->formularioCrearActualizar($formularioCrearActualizar);
                            /* La función está en productosYFormulario.php */
                            echo '                       

                        ?>
                    </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
        
        ';
    }


    public function crarProductoContenidoReinicio(){
        require_once '../objetos/instanciasObjetosPrimeros.php';
        $_SESSION['container'] = $leerTablaElementos->obtenerInContededor();
        echo 'hola hola';
        var_dump('Hey');
        var_dump($leerTablaElementos->obtenerInContededor());


        header ("Location: crearProductoContenido.php");                    
    }


    public function leer(){
        
        require_once '../objetos/instanciasObjetosPrimeros.php';


        $_SESSION['container'] = 0;
        $_SESSION['leerONombreDeSubProductos'] = '../leer.php';

        echo '
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
                <link rel="stylesheet" type="text/css" href="../style/style.css">

                <title>Document</title>
            </head>
            <body>
            <div class="container">
            <div class="row align-items-start">
                <div class="col-12">
                    <?php 
                    $menu1->esteMenu();
                    ?>

                    <h1>Grupo de productos de <?php echo $leerTablaElementos->nombre(); ?></h1>
                    <h2><?php echo $nombre_grupos_de_productos; ?></h2>';
                    
                    $datosPorParametro = [
                        'tituloDeBoton' => 'Ver producto especifico por ID',
                        'direccionDePagina' => 'procesoTablasProductos/procesoLeer.php',
                        'crearProductoContenido' => 'crearProductoContenido.php',
                        'irAlPadre' => false
                    ];
                    $leerTablaElementos->botonParaVerProductosContenidos($datosPorParametro); 
                    /* Está en leerObjeto,
                    Se encarga de ver los productos hijos de un producto padre. Cuenta con 2 botones. El boton para crear el producto contenido y el boton para ver el producto contenido. Cuando se crea un producto se pone como id de producto contenedor el producto donde se está, hay una variable global trackeando en que producto contenedor estamos, esta variable global está en instancias objetos como producto contenedor.
                    Leer solo los productos de este usuario y de este mazo.
                    */
                    echo '
                    <br>    
                    <h3>Productos contenidos Iniciales</h3>
                    <!-- Se tiene que hacer una consulta a la base de tados seleccionando a todos los productos que tienen como producto contenedor al producto que he elegido como ID -->
                    <?php $leerTablaElementos->tablaNombreDeSubProductos();
                        /* leerObjeto.php */
                    ?>
                    <br>
                    <h3>Todos los productos</h3>
                    <?php 
                        $leerTablaElementos->tablaLeerGrupoDeProductos();
                        /* Está en leerObjeto */
                    ?>
                </div>
            </div>
            </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

            </body>
            </html>
        ';
    }


    public function leerReinicio(){
        require_once '../objetos/instanciasObjetosPrimeros.php';


        $_SESSION['container'] = 0;
        $_SESSION['leerONombreDeSubProductos'] = '../leer.php';

        header ("Location: leer.php");

        /* Esto es por que cuando se envía a la pagina de php, no recarga de inmediato. */
       
    }


    public function nombreDeSubProductos(){
        echo '
            <!-- 
            Se hace una lectura del producto con el id elegido y se muestra.
            Luego se muestra en una tabla todos los productos que tienen como producto contenedor el id elegido
            si se elige crear un producto contenido se usa como producto contenedor el id que está en la variable global.
            El id en la variable global se usa para poner como contenedor de los elementos
        
            -->';
            
            require_once '../objetos/instanciasObjetosPrimeros.php';
            $_SESSION['leerONombreDeSubProductos'] = '../nombreDeSubProductos.php';
            
            
            
            
            echo '
            <!-- 
                    Se pueden crear subproducto desde este lugar e inmediatamente se ponen el id de este producto como producto contenedor mediante hidden, y no se puede modificar el nombre de subproducto.
            -->
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
                <link rel="stylesheet" type="text/css" href="../style/style.css">
            
                <title>Productos</title>
            </head>
            <body>
            <div class="container">
            <div class="row align-items-start">
                <div class="col-12">
                <?php 
                $menu1->esteMenu();
                ?>
                <h1>Nombre de producto</h1>
                <br>
                <form action="actualizar.php">
                    <input type="hidden">
                    <input type="submit" value="Actualizar producto" class="btn btn-outline-info">
                </form>
                <!-- <br> -->
                <p>Caracteristicas del subproducto</p>
                <!-- Se tiene que hacer una consulta del producto que se eligió con una consulta por usuario y por id de producto. O en todo caso se puede hacer la consulta solo por el ID del producto nada mas. Posiblemente se tiene que crear una variable global que haga seguimiento del ID del producto al que se está haciendo seguimiento. Así entonces, cuando se elige por la pagina de subproducto un nuevo subproducto pues se manda por post a una pagina de proceso el id que se quiere consultar, ese id de producto es leido por la pagina de procesamiento y es asignada a una variable global la cual se guarda en la variable global la cual en el archivo instancias se se modifica un objeto por medio de un costructor. Ahora lo que se trata es de la coneción a la base de datos por medio de un objeto, en el archivo leer se hace una conexciòn y es puse quiere usar la misma funcion para todos los elementos, entonces pues se debe dividir la funcion, en una funcion protegida, que solo consulta y escribe y en una funcion que elige cual va a ser la consulta que se va hacer, si es de toda la base de datos o de solamente  -->
                ';
                    $leerTablaElementos->tuplaNombreDeProductos();
                    /* leerObjeto.php */
                    $datosPorParametro = [
                        'tituloDeBoton' => 'Ver producto especifico por ID',
                        'direccionDePagina' => 'procesoTablasProductos/procesoLeer.php',
                        'crearProductoContenido' => 'crearProductoContenidoReinicio.php',
                        'irAlPadre' => true
                        
                    ];
                echo '
                <?php $leerTablaElementos->botonParaVerProductosContenidos($datosPorParametro); 
                    /* Está en leerObjeto.php */
                ?>
            
                <br/>
                <h3>Productos contenidos</h3>
                <!-- Se tiene que hacer una consulta a la base de tados seleccionando a todos los productos que tienen como producto contenedor al producto que he elegido como ID -->
                <?php $leerTablaElementos->tablaNombreDeSubProductos();
                    /* leerObjeto.php */
                ?>
            
                </div>
            </div>
            </div>
            <br>
            <br>
            <br>
            <br>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            
            </body>
            </html>
        ';
    }


    public function procesoLeer(){
        
            session_start();
            $_SESSION['container'] = $_POST['verProductoEspecificoPorId'];
            header ("Location: ../nombreDeSubProductos.php");
        
    }


    public function actualizarProductoProceso(){
        require_once '../../objetos/instanciasObjetosPrimeros.php';

        $crearProductoContenidoProceso['obtenerInContededor'] = $_POST['obtenerInContededor'];
        $crearProductoContenidoProceso['nombre_producto'] = $_POST['nombre_producto'];
        $crearProductoContenidoProceso['cantidad_del_producto'] = $_POST['cantidad_del_producto'];
        $crearProductoContenidoProceso['precio_del_producto'] = $_POST['precio_del_producto'];
        $crearProductoContenidoProceso['descripcion_del_producto'] = $_POST['descripcion_del_producto'];
        $crearProductoContenidoProceso['eliminar'] = $_POST['eliminar'];


        var_dump($_POST['obtenerInContededor']);
        var_dump($_POST['nombre_producto']);
        var_dump($_POST['cantidad_del_producto']);
        var_dump($_POST['precio_del_producto']);
        var_dump($_POST['descripcion_del_producto']);


        $leerTablaElementos->dbFormularioActualizar($crearProductoContenidoProceso);
        /* 
        Está en productosYFormulario
        */
        $enlaceParaRegresar = $_SESSION['leerONombreDeSubProductos'];
            

        header ("Location: $enlaceParaRegresar");

        /* Se reciben los datos por post de la pagina nombre de subproducto. Se recibe el id.
        se hace una consulta a la base de datos y se actualiza el dato que es recibido
        se termina la ejecución y se envia a la pagina de subproducto.
        No se modifica el id del producto */

        
    }


    public function crearProductoContenidoProceso(){
        require_once '../../objetos/instanciasObjetosPrimeros.php';

        $crearProductoContenidoProceso['obtenerInContededor'] = $_POST['obtenerInContededor'];
        $crearProductoContenidoProceso['nombre_producto'] = $_POST['nombre_producto'];
        $crearProductoContenidoProceso['cantidad_del_producto'] = $_POST['cantidad_del_producto'];
        $crearProductoContenidoProceso['precio_del_producto'] = $_POST['precio_del_producto'];
        $crearProductoContenidoProceso['descripcion_del_producto'] = $_POST['descripcion_del_producto'];


        var_dump($_POST['obtenerInContededor']);
        var_dump($_POST['nombre_producto']);
        var_dump($_POST['cantidad_del_producto']);
        var_dump($_POST['precio_del_producto']);
        var_dump($_POST['descripcion_del_producto']);


        $leerTablaElementos->dbFormularioCrear($crearProductoContenidoProceso);
        /* 
        Está en productosYFormulario
        */
        $enlaceParaRegresar = $_SESSION['leerONombreDeSubProductos'];
        header ("Location: $enlaceParaRegresar");
    }











}    





