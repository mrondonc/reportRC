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

$cod_sub_cliente = $_GET['cod_sub_cliente_partner'];
$sub_cliente = ManejoSub_cliente_partner::consultarSub_cliente_partner($cod_sub_cliente);
$nombre = $_POST['nombreSubCliente'];
$cod_cliente = $_POST['codCliente'];

$sub_cliente->setCod_sub_cliente_partner($cod_sub_cliente);
$sub_cliente->setNombre_sub_cliente_partner($nombre);
$sub_cliente->setCod_cliente_partner($cod_cliente);

ManejoSub_cliente_partner::modifySub_cliente_partner($sub_cliente);
    
echo '<script>
    alert("Se ha modificado el sub cliente partner!"); 
    window.location="../Administrador.php?menu=clientes";
    </script>';
?>