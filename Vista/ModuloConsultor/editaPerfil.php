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
$usuario_login = $_POST['login'];

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
$usuario->setUsuario_login($usuario_login);


ManejoUsuario::modifyUsuario($usuario);

echo '<script>
alert("Tus datos personales se han modificado")
window.location="../Consultor.php?menu=miPerfil";
</script>';
?>