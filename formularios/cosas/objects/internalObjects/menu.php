<?php
require_once '../objects/session.php';




class menu {
    protected $misProductos = '../mazoDeProductos.php';
    protected $direccionDeMazo = '../sistemaTablasProductos/leerReinicio.php.php';
    protected $nombreDeMazo = '../sistemaTablasProductos/leerReinicio.php.php';
    protected $crearProductos = '../sistemaTablasProductos/crear.php';
    protected $cerrarSesion = '../cerrarSesion.php';

    public function __construct($misProductos, $direccionDeMazo, $nombreDeMazo, $crearProductos, $cerrarSesion) {
        $this->misProductos = $misProductos;
        $this->direccionDeMazo = $direccionDeMazo;
        $this->nombreDeMazo = $nombreDeMazo;
        $this->crearProductos = $crearProductos;
        $this->cerrarSesion = $cerrarSesion;
    }
    public function esteMenu(){
        echo '
        <br/>
        <header>
        <a href="' . $this->misProductos . '">Mis productos</a>
        <a href="' . $this->direccionDeMazo . '">Mazo: ' . $this->nombreDeMazo . '</a>
        <a href="' . $this->cerrarSesion . '">Cerrar sesión</a>
        </header>';
        /* <a href="' . $this->crearProductos . '">Crear productos</a> */
    }
    public function unicoMenu(){
        echo '
        <br/>
            <header>
            <a href="' . $this->cerrarSesion . '">Cerrar sesión</a>
            </header>
        <br/>
        ';
    }
};
?>
