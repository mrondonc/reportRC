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
date_default_timezone_set('America/Bogota');
ManejoUsuario::setConexionBD($conexion);
ManejoReporte::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);
ManejoNo_ticket::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);

    $cod_usuario  =  $_SESSION['cod_usuario'];
    $cod_reporte = $_POST['cod_reporte'];
    $fecha_de_reporte = $_POST['fechaReporte'];
    
    $cod_cliente_partner = $_POST['cliente_partner'];
    $descripcion_actividad = $_POST['descripcionActividades'];
    $horas_trabajadas = $_POST['horasTrabajadas'];
    $lugar_de_trabajo= $_POST['lugarTrabajo'];
    $hora_de_registro = date('d-m-y h:i:s');
    //$hora_de_registro = $_POST[''];
    //$cod_sub_cliente_partner = $_POST[''];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];
$reporte = ManejoReporte::consultarReporte($cod_reporte);

if($cod_cliente_partner==1){ //AXITY
    $cod_sub_cliente_partner = $_POST['clienteAxity'];
    $cod_no_ticket = $_POST['noTicket'];
    //$cod_pep_cliente = $_POST[''];
    $cod_sub_mod_sap = $_POST['modSapList'];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner($cod_sub_cliente_partner);
    $reporte->setCod_no_ticket($cod_no_ticket);
    $reporte->setCod_pep_cliente(47);
    $reporte->setCod_sub_mod_sap($cod_sub_mod_sap);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==2){ //EVERIS
    $cod_sub_cliente_partner = $_POST['clienteEveris'];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner($cod_sub_cliente_partner);
    $reporte->setCod_no_ticket(9);
    $reporte->setCod_pep_cliente(48);
    $reporte->setCod_sub_mod_sap(9);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==3){ //LUCTA
     //$cod_sub_cliente_partner = $_POST[''];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner(0);
    $reporte->setCod_no_ticket(10);
    $reporte->setCod_pep_cliente(49);
    $reporte->setCod_sub_mod_sap(10);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==4){//MILLO
    $cod_sub_cliente_partner = $_POST['clienteMillo'];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner($cod_sub_cliente_partner);
    $reporte->setCod_no_ticket(11);
    $reporte->setCod_pep_cliente(50);
    $reporte->setCod_sub_mod_sap(11);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==5){ //PRAXIS
     //$cod_sub_cliente_partner = $_POST[''];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner(26);
    $reporte->setCod_no_ticket(12);
    $reporte->setCod_pep_cliente(51);
    $reporte->setCod_sub_mod_sap(12);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==6){ //SEIDOR
    $cod_sub_cliente_partner = $_POST['pepCliente'];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner(27);
    $reporte->setCod_no_ticket(13);
    $reporte->setCod_pep_cliente($cod_sub_cliente_partner);
    $reporte->setCod_sub_mod_sap(13);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==7){ //INTERNO DE RC
    //$cod_sub_cliente_partner = $_POST[''];
   //$cod_no_ticket = $_POST[''];
   //$cod_pep_cliente = $_POST[''];
   //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner(28);
    $reporte->setCod_no_ticket(14);
    $reporte->setCod_pep_cliente(52);
    $reporte->setCod_sub_mod_sap(14);
    ManejoReporte::modifyReporte($reporte);
}
echo '<script>
alert("Se ha modificado el Reporte de Horas Exitosamente")
window.location="../Consultor.php?menu=historialReporte";
</script>';
?>