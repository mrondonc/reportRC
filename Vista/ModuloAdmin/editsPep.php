<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoPep_cliente::setConexionBD($conexion);

$cod_pep = $_GET['cod_pep_cliente'];
$pep_cliente = ManejoPep_cliente::consultarPep_cliente($cod_pep);
$nombre = $_POST['nombrePep'];

$pep_cliente->setCod_pep_cliente($cod_pep);
$pep_cliente->setCod_cliente_partner(6);
$pep_cliente->setReferencia_pep_cliente($nombre);

ManejoPep_cliente::modifyPep_cliente($pep_cliente);

echo '<script>
alert("Los datos del PEP se han modificado")
window.location="../Administrador.php?menu=subClientes&cod_cliente_partner=6";
</script>';
?>