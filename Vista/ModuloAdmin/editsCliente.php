<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoCliente_partner::setConexionBD($conexion);

$cod_cliente_partner = $_GET['cod_cliente_partner'];
$cliente = ManejoCliente_partner::consultarCliente_partner($cod_cliente_partner);
$nombre = $_POST['nombreCliente'];

$cliente->setCod_cliente_partner($cod_cliente_partner);
$cliente->setNombre_cliente_partner($nombre);

ManejoCliente_partner::modifyCliente_partner($cliente);

echo '<script>
alert("Los datos del cliente se han modificado")
window.location="../Administrador.php?menu=clientes";
</script>';
?>