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
$sub_cliente_partnerA = $_POST['clienteAxity'];
$sub_mod_sap = $_POST['modSapList'];
//$no_ticketA = $_POST[''];

//$reporte->setCod_reporte($cod_reporte);

//------CREAR REGISTRO EN LA TABLA NO_TICKET--------
if($cod_cliente_partner == 1){
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($usuario->getCod_usuario());
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    
    $numeroTicket = new No_ticket();
    $No_ticket = $_POST['noTicket'];
    $cod_cliente_partner2 = $_POST['cliente_partner'];

    $numeroTicket->setReferencia_no_ticket($No_ticket);
    $numeroTicket->setCod_cliente_partner($cod_cliente_partner2);
    ManejoNo_ticket::createNo_ticket($numeroTicket);
    //return $numeroTicket;
    //echo $numeroTicket;
    $cod_generado = ManejoNo_ticket::consultarNo_ticket($numeroTicket->getCod_no_ticket());
    $reporte->setCod_sub_cliente_partner($sub_cliente_partnerA);
    $reporte->setCod_no_ticket($cod_generado);
    $reporte->setCod_pep_cliente(47);// cod 47 pertenece AXITY RESULTADO 'NADA'
    $reporte->setCod_sub_mod_sap($sub_mod_sap);
    ManejoReporte::createReporte($reporte);

}if($cod_cliente_partner == 2){//EVERIS
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($usuario->getCod_usuario());
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    
    $reporte->setCod_sub_cliente_partner();
    $reporte->setCod_no_ticket();
    $reporte->setCod_pep_cliente();// cod 47 pertenece AXITY RESULTADO 'NADA'
    $reporte->setCod_sub_mod_sap();
    ManejoReporte::createReporte($reporte);
}if($cod_cliente_partner == 3){//LUCTA
    $reporte->setCod_sub_cliente_partner();
    $reporte->setCod_no_ticket();
    $reporte->setCod_pep_cliente();// cod 47 pertenece AXITY RESULTADO 'NADA'
    $reporte->setCod_sub_mod_sap();
    ManejoReporte::createReporte($reporte);
}if($cod_cliente_partner == 4){//MILLO
    $reporte->setCod_sub_cliente_partner();
    $reporte->setCod_no_ticket();
    $reporte->setCod_pep_cliente();// cod 47 pertenece AXITY RESULTADO 'NADA'
    $reporte->setCod_sub_mod_sap();
    ManejoReporte::createReporte($reporte);
}if($cod_cliente_partner == 5){//PRAXIS
    $reporte->setCod_sub_cliente_partner();
    $reporte->setCod_no_ticket();
    $reporte->setCod_pep_cliente();// cod 47 pertenece AXITY RESULTADO 'NADA'
    $reporte->setCod_sub_mod_sap();
    ManejoReporte::createReporte($reporte);
}if($cod_cliente_partner == 6){//SEIDOR
    $reporte->setCod_sub_cliente_partner();
    $reporte->setCod_no_ticket();
    $reporte->setCod_pep_cliente();// cod 47 pertenece AXITY RESULTADO 'NADA'
    $reporte->setCod_sub_mod_sap();
    ManejoReporte::createReporte($reporte);
}if($cod_cliente_partner == 7){//INTERNO RC
    $reporte->setCod_sub_cliente_partner();
    $reporte->setCod_no_ticket();
    $reporte->setCod_pep_cliente();// cod 47 pertenece AXITY RESULTADO 'NADA'
    $reporte->setCod_sub_mod_sap();
    ManejoReporte::createReporte($reporte);
}

echo '<script>
alert("Se ha creado el Reporte de Horas Exitosamente")
window.location="../Consultor.php?menu=reporteHoras";
</script>';
?>