<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoAdministrador::setConexionBD($conexion);
ManejoUsuario::setConexionBD($conexion);
$correo = $_POST["correo"];
$pass = $_POST["contraseña"];
$admin = ManejoAdministrador::verificarCuentaAdministrador($correo, $pass);
$usuario = ManejoUsuario::verificarCuentaUsuario($correo, $pass);


if (is_null($admin)) {
    if (is_null($usuario)) {
            echo '<script>
            alert("NO HA SIDO VERIFICADO POR EL ADMINISTRADOR");
            window.location="./Login/index.php";          
        </script>';
            //header("Location: login.php");
    } else {
        $_SESSION['cod_usuario'] = $usuario->getCod_usuario();
        $_SESSION['nombre_usuario'] = $usuario->getNombre_usuario();
        $_SESSION['apellido_usuario'] = $usuario->getApellido_usuario();
        $_SESSION['telefono_usuario'] = $usuario->getTelefono_usuario();
        $_SESSION['correo_usuario'] = $usuario->getCorreo_usuario();
        $_SESSION['direccion_usuario'] = $usuario->getDireccion_usuario();
        $_SESSION['cod_mod_sap'] = $usuario->getCod_mod_sap();
        $_SESSION['cod_tipo_usuario'] = $usuario->getCod_tipo_usuario();
        $_SESSION['cod_estado_usuario'] = $usuario->getCod_estado_usuario();
        $_SESSION['contraseña'] = $usuario->getContraseña();
        $_SESSION['pais'] = $usuario->getPais();
        $_SESSION['usuario_login'] = $usuario->getUsuario_login();
        $_SESSION['cumpleaños'] = $usuario->getCumpleaños();
        $_SESSION['cuenta_skype'] = $usuario->getCuenta_skype();
        $_SESSION['nombre_contacto_emergencia'] = $usuario->getNombre_contacto_emergencia();
        $_SESSION['numero_contacto_emergencia'] = $usuario->getNumero_contacto_emergencia();
        header("Location: Consultor.php");
    }
} else {
    $_SESSION['cod_administrador'] = $admin->getCod_administrador();
    $_SESSION['nombre_administrador'] = $admin->getNombre_administrador();
    $_SESSION['cod_estado_usuario'] = $admin->getCod_estado_usuario();
    $_SESSION['cod_tipo_usuario'] = $admin->getCod_tipo_usuario();
    $_SESSION['contraseña'] = $admin->getContraseña();
    $_SESSION['usuario_login'] = $admin->getUsuario_login();
    $_SESSION['telefono'] = $admin->getTelefono();
    $_SESSION['correo'] = $admin->getCorreo();
    $_SESSION['pais'] = $admin->getPais();
    $_SESSION['cumpleaños'] = $admin->getCumpleaños();
    $_SESSION['cuenta_skype'] = $admin->getCuenta_skype();
    $_SESSION['nombre_contacto_emergencia'] = $admin->getNombre_contacto_emergencia();
    $_SESSION['numero_contacto_emergencia'] = $admin->getNumero_contacto_emergencia();
    header("Location: Administrador.php");
}
?>