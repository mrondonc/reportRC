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
$administrador = ManejoAdministrador::verificarCuentaAdministrador($correo, $pass);
//$administrador = ManejoAdministrador::verificarCuentaAdministradorUser($correo);
//$usuario = ManejoUsuario::verificarCuentaUsuarioUser($correo);
$usuario = ManejoUsuario::verificarCuentaUsuario($correo, $pass);
//$user = ManejoUsuario::consultarUsuario($usuario->getCod_usuario());
        
        if (is_null($administrador)){
            if (is_null($usuario)) {
        //if (($administrador->getContraseña() != $pass) ){
          //  if (($usuario->getContraseña() != $pass) ) {
                echo '<script>
                alert("SU CONTRASEÑA O USUARIO ES INVALIDO");
                window.location="./Login/index.php";          
                </script>'; 
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
            $_SESSION['cod_administrador'] = $administrador->getCod_administrador();
            $_SESSION['nombre_administrador'] = $administrador->getNombre_administrador();
            $_SESSION['cod_estado_usuario'] = $administrador->getCod_estado_usuario();
            $_SESSION['cod_tipo_usuario'] = $administrador->getCod_tipo_usuario();
            $_SESSION['contraseña'] = $administrador->getContraseña();
            $_SESSION['usuario_login'] = $administrador->getUsuario_login();
            $_SESSION['telefono'] = $administrador->getTelefono();
            $_SESSION['correo'] = $administrador->getCorreo();
            $_SESSION['pais'] = $administrador->getPais();
            $_SESSION['cumpleaños'] = $administrador->getCumpleaños();
            $_SESSION['cuenta_skype'] = $administrador->getCuenta_skype();
            $_SESSION['nombre_contacto_emergencia'] = $administrador->getNombre_contacto_emergencia();
            $_SESSION['numero_contacto_emergencia'] = $administrador->getNumero_contacto_emergencia();
            header("Location: Administrador.php");
        }

?>