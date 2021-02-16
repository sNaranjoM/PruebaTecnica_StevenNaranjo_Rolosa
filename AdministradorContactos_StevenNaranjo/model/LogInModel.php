<?php

class LogInModel {

    protected $db;

    public function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

// constructor

    public function consultaUsuarios($nick, $contrasena) {
        //call sp_consultaValidacion_usuario("admi" , "admi");
        $consulta = $this->db->prepare("call consultaUsuarios('" . $nick . "','" . $contrasena . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

// registrar

    public function ingresarUsuario($nick, $contra) {

        //call sp_registrar_usuario("nombre" , "contra", 22, true ,"sjnm3008@gmail.com" ,true);
        $consulta = $this->db->prepare("call sp_registrar_usuario('" . $nick . "','" . $contra ."')");
        $consulta->execute();
        $consulta->closeCursor();
    }

// registrar
    
    
    public function extraeDatosContacto($nick) {
        //call sp_consultaValidacion_usuario("admi" , "admi");
        $consulta = $this->db->prepare("call sp_Infor_contacto('" . $nick . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    

    public function ingresarArticulo($nombre, $precio, $descripcion, $urlImg) {

        //call sp_registrar_articulo("Cloro" , 2, "Esto es una descripcion del cloro", "url imagen");
        $consulta = $this->db->prepare("call sp_registrar_articulo('" . $nombre . "'," . $precio . ",'" . $descripcion . "','" . $urlImg . "')");
        $consulta->execute();
        $consulta->closeCursor();
    }

// ingresarArticulo

    public function validaArticulo($nombre) {

        //call sp_consultaValidacion_articulo("Alcochol en gel");
        $consulta = $this->db->prepare("call sp_consultaValidacion_articulo('" . $nombre . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

// validaArticulo

    
    public function listar() {
        
        $consulta = $this->db->prepare('call sp_lista_usuario');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
        
    }// listar
    
    public function actualizarUsuario($nick, $nombre,$correo,$telefono,$edad,$provincia,$genero ) {

        $consulta = $this->db->prepare("call sp_actualizar_Usuario('".$nick."','".$nombre."','".$correo."','".$telefono."',".$edad.",'".$provincia."','".$genero."')");
        $consulta->execute();
        $consulta->closeCursor();
 
    }// listar
    
    public function eliminarContacto($nick ) {

        $consulta = $this->db->prepare("call sp_eliminar_Usuario('".$nick."')");
        $consulta->execute();
        $consulta->closeCursor();
 
    }// listar


}//EliminarModel


?>

