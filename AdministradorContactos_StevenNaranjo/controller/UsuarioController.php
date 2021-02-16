<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioController {

//    private $view;

    public function __construct() {
        $this->view = new View();
    }

    public function mostrar() {

        $this->view->show("registrarMM.php", null);
    }

    public function login() {

//        echo "nombre" . $_POST['nombre'];
//        echo "contrasena" . $_POST['contrasena']; 

        require 'model/LogInModel.php';
        $ejecuacion = new LogInModel();
        $data['listado'] = $ejecuacion->consultaUsuarios($_POST['nombre'], $_POST['contrasena']);
//        $data['listado'] = $ejecuacion->consultaUsuarios("steven", "qwe"); //para pruebas


        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $key = $value;
            } //  foreach
        }//if

        if (count($data['listado']) > 0) {
            //echo "Si existe usuarios con esos valores";
            echo "1";
        } else {
            echo "0";
        }
//
    }

    public function redirecionLogin() {

        require 'model/LogInModel.php';
        $ejecuacion = new LogInModel();
        $data['listado'] = $ejecuacion->listar();
        $_SESSION['Contacto'] = null;
        $this->view->show("administrarContactosView.php", $data);
    }

    public function validaUsuario($nick, $contra, $ejecuacion) {

        //require 'model/LogInModel.php';
        //$ejecuacion=new LogInModel();   
        $data['listado'] = $ejecuacion->consultaUsuarios($nick, $contra);

        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $key = $value;
            } //  foreach
        }//if

        if (count($data['listado']) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function registrar() {

        require 'model/LogInModel.php';
        $ejecuacion = new LogInModel();

        if (!$this->validaUsuario($_POST['nombre'], $_POST['contrasena'], $ejecuacion)) {

            $ejecuacion->ingresarUsuario($_POST['nombre'], $_POST['contrasena']);

            if ($this->validaUsuario($_POST['nombre'], $_POST['contrasena'], $ejecuacion)) {
                echo "1";
            } else {
                echo "0";
            }//else
        } else {
            echo "0";
        }//else
    }
    
    
    public function registrarForm() {

        require 'model/LogInModel.php';
        $ejecuacion = new LogInModel();

        if (!$this->validaUsuario($_POST['nombreForm'], $_POST['contrasenaForm'], $ejecuacion)) {

            $ejecuacion->ingresarUsuario($_POST['nombreForm'], $_POST['contrasenaForm']);
        } 
        
        $_SESSION['Contacto'] = null;
        $data['listado'] = $ejecuacion->listar();
        $this->view->show("administrarContactosView.php", $data);
    }

    public function listarUsuarios() {

        require 'model/LogInModel.php';
        $ejecuacion = new LogInModel();
        $data['listado'] = $ejecuacion->listar();
        $this->view->show("listar.php", $data);
    }

//listarUsuarios

    public function extraerInformacionContacto() {

        //echo $_POST['iptContacto'];
        require 'model/LogInModel.php';
        require 'Entity/Contacto.php';


        $ejecuacion = new LogInModel();


        $listaInfoContacto[] = new ArrayObject();
        $listaInfoContacto = $ejecuacion->extraeDatosContacto($_POST['iptContacto']);
        $_SESSION['Contacto'] = $listaInfoContacto;


        $listaAux = $_SESSION['Contacto'];
        $producto = new Contacto();

        foreach ($listaAux as $item) {

            $producto->id = $item[0];
            $producto->Nick = $item[1];
            $producto->Contrasena = $item[2];
            $producto->nombre = $item[3];
            $producto->correo = $item[4];
            $producto->telefono = $item[5];
            $producto->edad = $item[6];
            $producto->provincia = $item[7];
            $producto->genero = $item[8];
        }

        $_SESSION['Contacto'] = $producto;

        $listaAux = $_SESSION['Contacto'];
//        echo $listaAux->id;
//        echo $listaAux->Nick;
//        echo $listaAux->Contrasena;
//        echo $listaAux->nombre;
//        echo $listaAux->correo;
//        echo $listaAux->telefono;
//        echo $listaAux->edad;




        $data['listado'] = $ejecuacion->listar();
        $this->view->show("administrarContactosView.php", $data);
    }

//listarUsuarios

    public function actualizarContacto() {

//        echo "Hola Mundo" ; 
//        echo "nombre" . $_POST['nombre'] . "<br>";

        require 'model/LogInModel.php';
        $ejecuacion = new LogInModel();
        $ejecuacion->actualizarUsuario($_POST['nick'], $_POST['nombre'],$_POST['correo'],$_POST['telefono'], $_POST['edad'],$_POST['provincia'],$_POST['genero']);

    }
    
    public function eliminarContacto() {


        require 'model/LogInModel.php';
        $ejecuacion = new LogInModel();
        $ejecuacion->eliminarContacto($_POST['nick']);

    }

//validaUsuario

    public function registrarAdmin() {

        require 'model/LogInModel.php';
        $ejecuacion = new LogInModel();

        if (!$this->validaUsuario($_POST['nick'], $_POST['contrasena'], $ejecuacion)) {

            $ejecuacion->ingresarAdmi($_POST['nick'], $_POST['contrasena'], $_POST['edad'], $_POST['email']);

            if ($this->validaUsuario($_POST['nick'], $_POST['contrasena'], $ejecuacion)) {
                echo "Procedimiento exitoso";
            } else {
                echo "No se pudo ingresar el usuario.";
            }//else
        } else {
            echo "Ese nick de usuario ya esta registrado, debe modificar el nombre.";
        }//else
    }

//registrarUsusario

    public function registrarArticulo() {

        require 'model/LogInModel.php';
        $ejecuacion = new LogInModel();

        if (!$this->validaArticulo($ejecuacion, $_POST['nombre'])) {

            $ejecuacion->ingresarArticulo($_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['urlImg']);

            if ($this->validaArticulo($ejecuacion, $_POST['nombre'])) {
                echo "El articulo se creo en exito!";
            } else {
                echo "No se pudo ingresar el articulo, verifique que los datos de imput.";
            }//else
        } else {

            echo "Ese nombre de articulo ya esta registrado, debe modificarlo.";
        }
    }

//registrarArticulo

    public function validaArticulo($ejecuacion, $nombre) {

        $data['listado'] = $ejecuacion->validaArticulo($nombre);

        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $key = $value;
            } //  foreach
        }//if

        if (count($data['listado']) > 0) {
            return true;
        } else {
            return false;
        }
    }

//validaArticulo

    public function actualizarUsuarios() {

//        echo "nombre   " . $_POST['codigo'];
//        echo "nombre   " . $_POST['nombre'];
//        echo "nombre   " . $_POST['contrasena'];
//        echo "nombre   " . $_POST['edad'];
//        echo "nombre   " . $_POST['correo'];

        require 'model/LogInModel.php';
        $ejecuacion = new LogInModel();
        $ejecuacion->actualizarUsuario($_POST['codigo'], $_POST['nombre'], $_POST['contrasena'], $_POST['edad'], $_POST['correo']);
//        $this->view->show("listar.php", $data);   
        $this->listarUsuarios2($ejecuacion);
    }

//listarUsuarios

    public function listarUsuarios2($ejecuacion) {


        $data['listado'] = $ejecuacion->listar();
        $this->view->show("listar.php", $data);
    }

//listarUsuarios
}

//fin clase
// fin clase
//        echo "nick" . $_POST['nick'];
//        echo "<br>";
//        echo "contrasena" . $_POST['contrasena']; 
//        echo "<br>";
//        echo "edad" . $_POST['edad'];
//        echo "<br>";
//        echo "email" . $_POST['email']; 
?>



