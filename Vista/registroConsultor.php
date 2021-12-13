<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);


if (isset($_POST['addRegistroUsuario']) == true) {

	$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $correo = isset($_POST['correo']) ? $_POST['correo'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $mod_sap = isset($_POST['mod_sap']) ? $_POST['mod_sap'] : null;
    $pais = isset($_POST['pais']) ? $_POST['pais'] : null;
	$usuario_login = isset($_POST['usuario_login']) ? $_POST['usuario_login'] : null;	
	$contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : null;
	$confirmaContraseña = isset($_POST['confirmaContraseña']) ? $_POST['confirmaContraseña'] : null;
    if($contraseña == $confirmaContraseña){
        $usuario = new Usuario();
	
        //$usuario->setCod_usuario(0);
        $usuario->setNombre_usuario($nombre);
        $usuario->setApellido_usuario($apellido);
        $usuario->setTelefono_usuario($telefono);
        $usuario->setCorreo_usuario($correo);
        $usuario->setDireccion_usuario($direccion);
        $usuario->setCod_mod_sap($mod_sap);
        $usuario->setCod_tipo_usuario(1);
        $usuario->setCod_estado_usuario(4);
        $usuario->setContraseña($contraseña);
        $usuario->setPais($pais);
        $usuario->setUsuario_login($usuario_login);

        ManejoUsuario::createUsuario($usuario);
    }else{
        echo '<script>
        alert("Contraseña invalida o no coinciden! ");
        window.location="registrarUsuario.php";   
        
        </script>';

    }
}
echo '<script>
    alert("Su cuenta ha sido creada!");
    window.location="login.php";        
    
    </script>';
