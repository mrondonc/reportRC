<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';


$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);


$cod_usuario  =  $_GET['cod_usuario'];
$action = $_GET["action"];

$usuario = ManejoUsuario::consultarUsuario($cod_usuario);

if ($action=="delete"){    
    $usuario->setCod_estado_usuario(3); //QUEDA INACTIVO
    ManejoUsuario::modifyUsuarioEstado($usuario);
    
    echo '<script>
    alert("Se ha cambiado el estado a INACTIVO")
    window.location="../Administrador.php?menu=consultores";
    </script>';
}

?>