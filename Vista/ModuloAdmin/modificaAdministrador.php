<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoAdministrador::setConexionBD($conexion);

$cod_administrador = $_GET['cod_administrador'];
$admin = ManejoAdministrador::consultarAdministrador($cod_administrador);

$nombre = $_POST['nombres'];
$contraseña = $_POST['password'];
$usuario_login = $_POST['login'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$pais = $_POST['pais'];
$cumpleaños = $_POST['cumpleaños'];
$cuenta_skype = $_POST['cuentaSkype'];
$nombre_contacto_emergencia = $_POST['nombreContacto'];
$numero_contacto_emergencia = $_POST['numeroContacto'];

$admin->setCod_administrador($cod_administrador);
$admin->setNombre_administrador($nombre);
$admin->setCod_estado_usuario($admin->getCod_estado_usuario());
$admin->setCod_tipo_usuario($admin->getCod_tipo_usuario());
$admin->setContraseña($contraseña);
$admin->setUsuario_login($usuario_login);
$admin->setTelefono($telefono);
$admin->setCorreo($correo);
$admin->setDireccion($direccion);
$admin->setPais($pais);
$admin->setCumpleaños($cumpleaños);
$admin->setCuenta_skype($cuenta_skype);
$admin->setNombre_contacto_emergencia($nombre_contacto_emergencia);
$admin->setNumero_contacto_emergencia($numero_contacto_emergencia);

ManejoAdministrador::modifyAdministrador($admin);

echo '<script>
alert("Los datos personales se han modificado")
window.location="../Administrador.php?menu=perfilAdministrador&cod_administrador='.$cod_administrador.'";
</script>';
?>