<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);

$nombre = $_POST['nombres'];
$apellido = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$mod_sap = $_POST['mod_sap'];
$pais = $_POST['pais'];
$usuario_login = $_POST['login'];
$contraseña = $_POST['password'];
$cumpleaños = $_POST['cumpleaños'];
//$cuenta_skype = $_POST['cuentaSkype'];
//$nombre_contacto = $_POST['nombreContacto'];
//$telefono_contacto = $_POST['numeroContacto'];


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
$usuario->setCumpleaños($cumpleaños);
//$usuario->setCuenta_skype(null);
//$usuario->setNombre_contacto_emergencia(null);
//$usuario->setNumero_contacto_emergencia(null);

ManejoUsuario::createUsuarioXAdmin($usuario);
    
echo '<script>
    alert("Se ha registrado el consultor!"); 
    window.location="../Administrador.php?menu=consultores";
    </script>';
?>