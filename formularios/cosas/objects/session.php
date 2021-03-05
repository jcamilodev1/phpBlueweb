<?php

class sesion {
    protected function otorgar(){
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
        return $conectar;
    }

    protected $obtenerInContededor, $obtenerMazo;/* Variable usada en la clase leerObjeto */

    public function __construct($obtenerInContededor, $obtenerMazo){
        $this->obtenerInContededor = $obtenerInContededor;
        $this->obtenerMazo = $obtenerMazo;
    }
    public function obtenerInContededor(){
        return $this->obtenerInContededor;
    }
    public function obtenerMazo(){
        return $this->obtenerMazo;
    }

    protected function usuario($idUsuario){
        $consultaIdUsuario = $this->otorgar()->query("SELECT * FROM usuarios WHERE id_usuario = '$idUsuario' AND 'activo_o_desactivado' = 1 ");
        $consultaIdUsuario = mysqli_fetch_assoc($consultaIdUsuario);
        $usuario['id_usuario'] = $consultaIdUsuario['id_usuario'];          
        $usuario['nombre'] = $consultaIdUsuario['nombre'];              
        $usuario['correo'] = $consultaIdUsuario['correo'];              
        $usuario['password_usuarios'] = $consultaIdUsuario['password_usuarios'];   
        return $usuario;
    }
   
    protected function consultaProductos($id_producto){
        $imprimir['query'] = $this->otorgar()->query("SELECT * FROM productos WHERE id_producto = '$id_producto' AND id_usuario = '$this->id_usuario()' AND id_mazo = '$this->obtenerMazo()' AND activo_o_desactivado = '1' ");
        $imprimir['assoc'] = mysqli_fetch_assoc($imprimir['query']);
        return $imprimir;
    }
    


    public function datosDeProductos(){
        $datosDeProductosConsultaDB = $this->consultaProductos($this->obtenerInContededor())['assoc'];
        $obteniendoElQuery = $this->consultaProductos($this->obtenerInContededor())['query'];
        $resultados_db = mysqli_num_rows($obteniendoElQuery);
        if ($resultados_db >= 1){
            $datosDeProductos['id'] = $datosDeProductosConsultaDB['id'];
            $datosDeProductos['id_producto'] = $datosDeProductosConsultaDB['id_producto'];
            $datosDeProductos['id_usuario'] = $datosDeProductosConsultaDB['id_usuario'];
            $datosDeProductos['id_mazo'] = $datosDeProductosConsultaDB['id_mazo'];
            $datosDeProductos['nombre_producto'] = $datosDeProductosConsultaDB['nombre_producto'];
            $datosDeProductos['cantidad_del_producto'] = $datosDeProductosConsultaDB['cantidad_del_producto'];
            $datosDeProductos['producto_contenedor'] = $datosDeProductosConsultaDB['producto_contenedor'];
            $datosDeProductos['precio_del_producto'] = $datosDeProductosConsultaDB['precio_del_producto'];
            $datosDeProductos['descripcion_del_producto'] = $datosDeProductosConsultaDB['descripcion_del_producto'];
            $datosDeProductos['activo_o_desactivado'] = $datosDeProductosConsultaDB['activo_o_desactivado'];

        } else {
            $datosDeProductos = false;
        }

        /* var_dump($datosDeProductosConsultaDB);
        var_dump($resultados_db); */
        return $datosDeProductos;
    }
    /* ("SELECT * FROM productos WHERE id_usuario = '$this->id_usuario()' AND producto_contenedor = '$this->obtenerInContededor()' AND id_mazo = '$this->obtenerMazo()' "); */


    public function paraValidarLaExistenciaDeUnDato($nombreDeLaTabla, $nombreDeColumna, $valorAValidarExistencia){
        /* Se hace una consulta a la base de datos. Se requiere el nombre de la tabla y el nombre a validar, tambien la columna. En total 3 datos.
        - Nombre de tabla
        - Nombre de columna
        - Valor a validar       
        */
        $leer_base_de_datos = $this->otorgar()->query("SELECT $nombreDeColumna FROM $nombreDeLaTabla WHERE $nombreDeColumna = '$valorAValidarExistencia' AND activo_o_desactivado = '1' ");

        if ($resultados_db = mysqli_num_rows($leer_base_de_datos)>=1){
            $existencia = true;
        } else {
            $existencia = false;
        }
        return $existencia;
    }

    public function aumentarIdValor($columnaAAumentar, $tabla, $valorAOrdenar){
            $aumentar_id = $this->otorgar()->query("SELECT $columnaAAumentar FROM $tabla ORDER BY $valorAOrdenar DESC LIMIT 1");
        if ($aumentar_id2 = mysqli_num_rows($aumentar_id)>=1) {
            $obtener_id = mysqli_fetch_assoc($aumentar_id)[$columnaAAumentar];
            $id_grupoDeProductos = $obtener_id + 1;	
        } else {
            $id_grupoDeProductos = 1;
        };
    return $id_grupoDeProductos;
    }



}
