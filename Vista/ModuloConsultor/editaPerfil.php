<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoUsuario::setConexionBD($conexion);


$cod_usuario = $_GET['cod_usuario'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);
$nombre = $_POST['nombres'];
$apellido = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$cod_mod_sap = $_POST['mod_sap'];
//$cod_tipo_usuario = $_POST['estado'];
//$cod_estado_usuario = $_POST['estado'];
$contraseña = $_POST['password'];
$pais = $_POST['pais'];
//$usuario_login = $_POST['login'];
$cumpleaños = $_POST['cumpleaños'];
$cuenta_skype = $_POST['cuentaSkype'];
$nombre_contacto_emergencia = $_POST['nombreContacto'];
$numero_contacto_emergencia = $_POST['numeroContacto'];

$usuario->setCod_usuario($usuario->getCod_usuario());
$usuario->setNombre_usuario($nombre);
$usuario->setApellido_usuario($apellido);
$usuario->setTelefono_usuario($telefono);
$usuario->setCorreo_usuario($correo);
$usuario->setDireccion_usuario($direccion);
$usuario->setCod_mod_sap($cod_mod_sap);
$usuario->setCod_tipo_usuario($usuario->getCod_tipo_usuario());
$usuario->setCod_estado_usuario($usuario->getCod_estado_usuario());
$usuario->setContraseña($contraseña);
$usuario->setPais($pais);
$usuario->setUsuario_login($usuario->getUsuario_login());
$usuario->setCumpleaños($cumpleaños);
$usuario->setCuenta_skype($cuenta_skype);
$usuario->setNombre_contacto_emergencia($nombre_contacto_emergencia);
$usuario->setNumero_contacto_emergencia($numero_contacto_emergencia);


ManejoUsuario::modifyUsuario($usuario);

echo '<script>
alert("Tus datos personales se han modificado")
window.location="../Consultor.php?menu=miPerfil";
</script>';
?>