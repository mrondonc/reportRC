<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoSub_cliente_partner::setConexionBD($conexion);

$sub_cliente_partner = new Sub_cliente_partner();

$nombre_sub_cliente_partner = $_POST['nombreCliente'];
$cod_cliente_partner = 1;


$sub_cliente_partner->setNombre_sub_cliente_partner($nombre_sub_cliente_partner);
$sub_cliente_partner->setCod_cliente_partner($cod_cliente_partner);

ManejoSub_cliente_partner::createSub_cliente_partner($sub_cliente_partner);

echo '<script>
alert("Se ha registrado el cliente Exitosamente")
window.location="../Consultor.php?menu=reporteHoras";
</script>';

?>