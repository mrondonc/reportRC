<?php
session_start();

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/No_ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoNo_ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoReporte::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);
ManejoNo_ticket::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);

// Set the new timezone
date_default_timezone_set('America/Bogota');

//------CREAR REGISTRO EN LA TABLA REPORTE------
$reporte = new Reporte();
//$cod_reporte = [0];
$fecha_de_reporte = $_POST['fechaReporte'];

$cod_usuario = $_SESSION['cod_usuario'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);

$cod_cliente_partner = $_POST['cliente_partner'];
$descripcion_actividad = $_POST['descripcionActividades'];
$horas_trabajadas = $_POST['horasTrabajadas'];
$lugar_de_trabajo = $_POST['lugarTrabajo'];
$hora_de_registro = date('d-m-y h:i:s');

//$reporte->setCod_reporte($cod_reporte);
$reporte->setFecha_de_reporte($fecha_de_reporte);
$reporte->setCod_usuario($usuario->getCod_usuario());
$reporte->setCod_cliente_partner($cod_cliente_partner);
$reporte->setDescripcion_actividad($descripcion_actividad);
$reporte->setHoras_trabajadas($horas_trabajadas);
$reporte->setLugar_de_trabajo($lugar_de_trabajo);
$reporte->setHora_de_registro($hora_de_registro);
ManejoReporte::createReporte($reporte);

//------CREAR REGISTRO EN LA TABLA NO_TICKET--------
if($cod_cliente_partner == 1){
    $numeroTicket = new No_ticket();
    $No_ticket = $_POST['noTicket'];
    $cod_cliente_partner2 = $_POST['cliente_partner'];

    $numeroTicket->setReferencia_no_ticket($No_ticket);
    $numeroTicket->setCod_cliente_partner($cod_cliente_partner2);
    ManejoNo_ticket::createNo_ticket($numeroTicket);    
}


//echo '<script>
//alert("Se ha creado el Reporte de Horas Exitosamente")
//window.location="../Consultor.php?menu=reporteHoras";
//</script>';
?>