<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente_partner::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);

$nombre = $_POST['nombreSubCliente'];
$cod_cliente = $_POST['codCliente'];

$subCliente = new Sub_cliente_partner();

$subCliente->setNombre_sub_cliente_partner($nombre);
$subCliente->setCod_cliente_partner($cod_cliente);

ManejoSub_cliente_partner::createSub_cliente_partner($subCliente);
    
echo '<script>
    alert("Se ha registrado el sub cliente partner!"); 
    window.location="../Administrador.php?menu=clientes";
    </script>';
?>