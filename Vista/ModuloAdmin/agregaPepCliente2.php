<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoPep_cliente::setConexionBD($conexion);

$pep_cliente = new Pep_cliente();

$referencia_pep_cliente = $_POST['pepNuevo'];
$cod_cliente_partner = 6;


$pep_cliente->setReferencia_pep_cliente($referencia_pep_cliente);
$pep_cliente->setCod_cliente_partner($cod_cliente_partner);
$pep_cliente->setCod_estado_actual(1);

ManejoPep_cliente::createPep_cliente($pep_cliente);

echo '<script>
alert("Se ha registrado el PEP Exitosamente")
window.location="../Administrador.php?menu=subClientes&cod_cliente_partner=6";
</script>';

?>