<?php
class pizza {
    protected $ingredienteComun = [ 'mozzarella', 'tomate'];
    protected $ingredienteVegetariano = [ 'Pimiento', 'tofu'];
    protected $ingredienteNoVegetariano = ['Peperoni', 'Jamón', 'Salmón'];
    
    public function __construct($obtenerDatosUsuario, $obtenerInContededorC){
        $arregloDeConsultaDB = $this->consultaUsuarios($obtenerDatosUsuario);
        $this->id_usuario = $arregloDeConsultaDB['id_usuario'];
        $this->nombre = $arregloDeConsultaDB['nombre'];
        $this->correo = $arregloDeConsultaDB['correo'];
        $this->password_usuarios = $arregloDeConsultaDB['password_usuarios'];
        $this->obtenerInContededor = $obtenerInContededorC;
    }
}


$valor = $_POST['valor'];
echo $valor;