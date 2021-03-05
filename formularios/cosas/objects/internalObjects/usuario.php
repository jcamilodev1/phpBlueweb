<?php
require_once '../objects/session.php';


class usuario extends sesion {

    private function headerFunction(){
        echo '
            <!DOCTYPE html>
            <html>
            <head>
                <title>Usuario no encontrado</title>
                <meta charset="utf-8">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
                <link rel="stylesheet" type="text/css" href="../style/style.css">
                <!-- <style type="text/css">
                    body {
                        background: #dc3545;
                    }
                </style> -->	
            </head>
            <body>      
        
        ';

    }

    private function footer(){
        echo '
        <!--  -->
		    <!-- 
			justify-content-md-center
			align-items-center 
                -->
        <!--  -->

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        </body>
        </html>
        ';
    }

    private function loginBody(){
        echo '
            <br><br>
            <div class="container">
            <div class="row justify-content-center">				
                <div class="col-12 col-lg-8">
                <h1>List</h1>
                <p>Listas dentro de listas</p>
                <h3>Inicia Sesión</h3>
                
                    <!-- <div>
                        <ul>
                            <li><a href="m/master.php">Master</a></li>
                            <li><a href="v/vendedor.php">Vendedor</a></li>
                            <li><a href="a/vender_administrador.php">Administrador</a></li>
                        </ul>
                    </div> -->
                    <form method="post" action="procesoSistemaLogin/loginProceso.php">
                    <!-- <form method="post" action="../sistemaAdministrativo/mazoDeProductos.php"> -->
                    <div class="mb-3">
                        <label for="" class="form-label">Correo</label>
                        <input type="email" required="required" name="correo" autofocus value="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Pasword</label>
                        <input type="password" required="required" name="password_usuarios" value="" class="form-control">
                    </div>
                        <br><br>
                        <input type="submit" name="" class="form-control btn-primary" value="Iniciar sesión">
                    </form>
                    <br><br>
                    <a href="crearCuenta.php">Crear cuenta</a>
        
                </div>
            </div>
            </div>
        
        ';

    }
    
    public function login(){
        $this->header();
        $this->loginBody();
        $this->footer();
    }

    public function cerrarSesion(){
        session_start();
        session_destroy();
        header ("Location: sistemaLogin/login.php");
    }

    public function loginProceso(){
        $correo = $_POST['correo'];
        $password_usuarios = $_POST['password_usuarios'];

        include "../../conectar.php";

        $leer_base_de_datos = $conectar->query("SELECT * FROM usuarios WHERE correo = '$correo' AND password_usuarios = '$password_usuarios' ");


        if ($resultados_db = mysqli_num_rows($leer_base_de_datos)>=1){
                $recorriendo = mysqli_fetch_assoc($leer_base_de_datos);
                session_start();
                $_SESSION['id_usuario'] = $recorriendo['id_usuario'];
                $_SESSION['usuarioCuenta'] = $correo;
                $_SESSION['nombre_grupos_de_productos'] = null;
                $_SESSION['container'] = 0;
                $_SESSION['id_grupos_de_productos'] = null;
                $_SESSION['mazo'] = null;
                $_SESSION['leerONombreDeSubProductos'] = null;
                header ("Location: ../../sistemaAdministrativo/mazoDeProductos.php");
        } else {
            echo '
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Usuario no encontrado</title>
                    <meta charset="utf-8">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
                    <link rel="stylesheet" type="text/css" href="../style/style.css">
                    <style type="text/css">
                        body {
                            background: #ffc107;
                        }
                    </style>	
                </head>
                <body>
                    <br><br>
                    <br><br>
                <div class="container">
                    <div class="row justify-content-center">				
                        <div class="col-6">
                            <h1>El usuario o la contraseña con incorrectos</h1>
                            <br><br>
                            <form method="post" action="../../index.php"> 
                            <input type="submit" name="" class="form-control btn-primary" value="Regresar"> </form>
                    
                        </div>
                    </div>
                </div>
                
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
                </body>
                </html>

            ';
        }
        var_dump($_SESSION['container']);
        /* $revisar_dato = mysqli_fetch_assoc($leer_base_de_datos);

        var_dump($revisar_dato); */

    }

    public function procesoCrearCuenta(){
        echo '
        
        <div class="container">
            <div class="row justify-content-center align-items-center">				
                <div class="col-6">'; 
                    
                    $nombre = $_POST['nombre'];
                    $correo = $_POST['correo'];
                    $password_usuarios = $_POST['password_usuarios'];

                    include "../../conectar.php";

                    $leer_base_de_datos = $conectar->query("SELECT * FROM usuarios WHERE correo = '$correo' ");
                    if (mysqli_num_rows($leer_base_de_datos)>=1){
                        echo '
                        <h1>El correo ya está registrado</h1>
                        <br/>
                        <h4>Debes usar otro correo</h4>
                        <br/>
                        <a href="../crearCuenta.php">Regresar</a>
                        ';
                    } else {
                        $aumentarId = $conectar->query("SELECT id_usuario FROM usuarios ORDER BY id DESC LIMIT 1");
                        $aumentarId = mysqli_fetch_array($aumentarId)['id_usuario'];
                        $id_usuario = $aumentarId + 1;
                        $conectar->query("INSERT INTO usuarios(id_usuario, nombre, correo, password_usuarios) VALUES ('$id_usuario', '$nombre', '$correo', '$password_usuarios')");
                        header ("Location: ../cuentaCreada.php");
                    } 
                    /* $revisar_dato = mysqli_fetch_assoc($leer_base_de_datos);
                    var_dump($revisar_dato); */
                    echo '

                </div>
            </div>
        </div>
        ';
    }

    public function cuentaCreada(){
        echo '
        <div class="container">
            <div class="row justify-content-center align-items-center">				
                <div class="col-6">
                    <h1>Felicitaciones, acabas de crear tu cuenta</h1>
                    <p>Ahora debes iniciar sesión</p>
                    <a href="login.php">Iniciar sesión</a>

                </div>
            </div>
        </div>
        ';
    }


    public function crearCuenta(){
        echo '
        <div class="container">
            <div class="row justify-content-center">				
                <div class="col-6">
                    <br/>
                    <h1>List</h1>
                    <h2>Crear cuenta</h2>
                    <!-- <div>
                        <ul>
                            <li><a href="m/master.php">Master</a></li>
                            <li><a href="v/vendedor.php">Vendedor</a></li>
                            <li><a href="a/vender_administrador.php">Administrador</a></li>
                        </ul>
                    </div> -->
                    <form method="post" action="procesoSistemaLogin/procesoCrearCuenta.php">
                        <p>Nombre</p>
                        <input type="text" required="required" name="nombre" value="" class="form-control">
                        <p>Correo</p>
                        <input type="email" required="required" name="correo" value="" class="form-control">
                        <p>Pasword</p>
                        <input type="password" required="required" name="password_usuarios" value="" class="form-control">
                        <br><br>
                        <input type="submit" name="" value="Crear cuenta" class="form-control btn-primary">
                    </form>
                    <br>
                    <br>
                    <a href="login.php">Iniciar sesión</a>
                </div>
            </div>
        </div>

        
        ';
    }

}