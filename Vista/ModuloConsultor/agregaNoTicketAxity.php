<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/No_ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoNo_ticket.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoNo_ticket::setConexionBD($conexion);

$no_ticket = new No_ticket();

$referencia_no_ticket = $_POST['no_ticketNuevo'];
$cod_cliente_partner = 1;


$no_ticket->setReferencia_no_ticket($referencia_no_ticket);
$no_ticket->setCod_cliente_partner($cod_cliente_partner);

ManejoNo_ticket::createNo_ticket($no_ticket);

echo '<script>
alert("Se ha registrado el número de ticket Exitosamente")
window.location="../Consultor.php?menu=reporteHoras";
</script>';

?>