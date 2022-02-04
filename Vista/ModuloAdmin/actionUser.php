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
}if ($action=="desactivar"){  
    $usuario->setCod_estado_usuario(4); //QUEDA EN ESPERA
    ManejoUsuario::modifyUsuarioEstado($usuario);

    echo '<script>
    alert("Se ha cambiado el estado a EN ESPERA")
    window.location="../Administrador.php?menu=consultores";
    </script>';
}if ($action=="activar"){  
    $usuario->setCod_estado_usuario(2); //QUEDA ACTIVO
    ManejoUsuario::modifyUsuarioEstado($usuario);

    echo '<script>
    alert("Se ha cambiado el estado a ACTIVO")
    window.location="../Administrador.php?menu=consultores";
    </script>';
}


?>