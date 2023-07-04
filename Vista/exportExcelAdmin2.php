<?php
set_time_limit(5400);
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoEstado_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Vista/SimpleXLSXGen.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoAdministrador::setConexionBD($conexion);
ManejoUsuario::setConexionBD($conexion);
ManejoReporte::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);
ManejoEstado_usuario::setConexionBD($conexion);
$id = $_GET['id'];
$cod_administrador = $_GET['cod_administrador'];
date_default_timezone_set('America/Bogota');
$fecha = date('d/m/y h:i:s A');

$reporte = [
    [
        'Fecha de Reporte', 'Usuario', 'Nombre y Apellido', 'Módulo SAP', 'Cliente Partner', 'Cliente Final',
        'Sub Módulo SAP', 'Número de Ticket', 'Nombre del PEP', 'Descripción Actividad', 'Horas Trabajadas', 'Lugar de Trabajo',
        'Hora de Registro'
    ]
];

if ($id == 6) { // =====EXCEL PARA DESCARGAR REPORTE DE HORAS TOTAL=====
    set_time_limit(5400);
    $reportes = ManejoReporte::getList();
    for ($i = 0; $i < count($reportes); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getApellido_usuario();

        $reporte2 = [
            [
                $reportes[$i]->getFecha_de_reporte(),
                ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getUsuario_login(),
                $nombre . " " . $apellido,
                ManejoMod_sap::consultarMod_sap($reportes[$i]->getCod_mod_sap())->getNombre_mod_sap(),
                ManejoCliente_partner::consultarCliente_partner($reportes[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
                ManejoSub_cliente_partner::consultarSub_cliente_partner($reportes[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
                ManejoSub_mod_sap::consultarSub_mod_sap($reportes[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
                $reportes[$i]->getCod_no_ticket(),
                ManejoPep_cliente::consultarPep_cliente($reportes[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
                $reportes[$i]->getDescripcion_actividad(),
                $reportes[$i]->getHoras_trabajadas(),
                $reportes[$i]->getLugar_de_trabajo(),
                $reportes[$i]->getHora_de_registro()
            ]
        ];

        // $reporte = array_merge($reporte, array(array(
        //     $reportes[$i]->getFecha_de_reporte(),
        //     ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getUsuario_login(),
        //     $nombre . " " . $apellido,
        //     ManejoMod_sap::consultarMod_sap($reportes[$i]->getCod_mod_sap())->getNombre_mod_sap(),
        //     ManejoCliente_partner::consultarCliente_partner($reportes[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
        //     ManejoSub_cliente_partner::consultarSub_cliente_partner($reportes[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
        //     ManejoSub_mod_sap::consultarSub_mod_sap($reportes[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
        //     $reportes[$i]->getCod_no_ticket(),
        //     ManejoPep_cliente::consultarPep_cliente($reportes[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
        //     $reportes[$i]->getDescripcion_actividad(),
        //     $reportes[$i]->getHoras_trabajadas(),
        //     $reportes[$i]->getLugar_de_trabajo(),
        //     $reportes[$i]->getHora_de_registro()
        $reporte = array_merge($reporte, $reporte2);
    }

    // foreach ($item as $reportes) {
    //     $nombre = ManejoUsuario::consultarUsuario($item->getCod_usuario())->getNombre_usuario();
    //     $apellido = ManejoUsuario::consultarUsuario($item->getCod_usuario())->getApellido_usuario();

    //     $reporte2 = [
    //         [
    //             'asd',
    //             // $reportes[$i]->getFecha_de_reporte(),
    //             // ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getUsuario_login(),
    //             $nombre . " " . $apellido
    //             // ManejoMod_sap::consultarMod_sap($reportes[$i]->getCod_mod_sap())->getNombre_mod_sap(),
    //             // ManejoCliente_partner::consultarCliente_partner($reportes[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
    //             // ManejoSub_cliente_partner::consultarSub_cliente_partner($reportes[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
    //             // ManejoSub_mod_sap::consultarSub_mod_sap($reportes[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
    //             // $reportes[$i]->getCod_no_ticket(),
    //             // ManejoPep_cliente::consultarPep_cliente($reportes[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
    //             // $reportes[$i]->getDescripcion_actividad(),
    //             // $reportes[$i]->getHoras_trabajadas(),
    //             // $reportes[$i]->getLugar_de_trabajo(),
    //             // $reportes[$i]->getHora_de_registro()
    //         ]
    //     ];
    //     $reporte = array_merge($reporte, $reporte2);
    // }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteTotal.xlsx'); // This will download the file to your local system

} else if ($id == 7) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS ENERO =====


    $reportesEnero = ManejoReporte::getListPorMesEnero();
    for ($i = 0; $i < count($reportesEnero); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesEnero[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesEnero[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesEnero[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesEnero[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesEnero[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesEnero[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesEnero[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesEnero[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesEnero[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesEnero[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesEnero[$i]->getDescripcion_actividad(),
            $reportesEnero[$i]->getHoras_trabajadas(),
            $reportesEnero[$i]->getLugar_de_trabajo(),
            $reportesEnero[$i]->getHora_de_registro()
        )));
    }
    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteEnero.xlsx'); // This will download the file to your local system

} else if ($id == 8) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS FEBRERO =====
    $reportesFebrero = ManejoReporte::getListPorMesFebrero();
    for ($i = 0; $i < count($reportesFebrero); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesFebrero[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesFebrero[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesFebrero[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesFebrero[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesFebrero[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesFebrero[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesFebrero[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesFebrero[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesFebrero[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesFebrero[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesFebrero[$i]->getDescripcion_actividad(),
            $reportesFebrero[$i]->getHoras_trabajadas(),
            $reportesFebrero[$i]->getLugar_de_trabajo(),
            $reportesFebrero[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteFebrero.xlsx'); // This will download the file to your local system

} else if ($id == 9) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS MARZO =====
    $reportesMarzo = ManejoReporte::getListPorMesMarzo();
    for ($i = 0; $i < count($reportesMarzo); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesMarzo[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesMarzo[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesMarzo[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesMarzo[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesMarzo[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesMarzo[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesMarzo[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesMarzo[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesMarzo[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesMarzo[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesMarzo[$i]->getDescripcion_actividad(),
            $reportesMarzo[$i]->getHoras_trabajadas(),
            $reportesMarzo[$i]->getLugar_de_trabajo(),
            $reportesMarzo[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteMarzo.xlsx'); // This will download the file to your local system

} else if ($id == 10) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS ABRIL =====
    $reportesAbril = ManejoReporte::getListPorMesAbril();
    for ($i = 0; $i < count($reportesAbril); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesAbril[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesAbril[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesAbril[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesAbril[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesAbril[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesAbril[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesAbril[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesAbril[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesAbril[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesAbril[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesAbril[$i]->getDescripcion_actividad(),
            $reportesAbril[$i]->getHoras_trabajadas(),
            $reportesAbril[$i]->getLugar_de_trabajo(),
            $reportesAbril[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteAbril.xlsx'); // This will download the file to your local system

} else if ($id == 11) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS MAYO =====
    $reportesMayo = ManejoReporte::getListPorMesMayo();
    for ($i = 0; $i < count($reportesMayo); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesMayo[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesMayo[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesMayo[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesMayo[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesMayo[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesMayo[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesMayo[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesMayo[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesMayo[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesMayo[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesMayo[$i]->getDescripcion_actividad(),
            $reportesMayo[$i]->getHoras_trabajadas(),
            $reportesMayo[$i]->getLugar_de_trabajo(),
            $reportesMayo[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteMayo.xlsx'); // This will download the file to your local system

} else if ($id == 12) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS JUNIO =====
    $reportesJunio = ManejoReporte::getListPorMesJunio();
    for ($i = 0; $i < count($reportesJunio); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesJunio[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesJunio[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesJunio[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesJunio[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesJunio[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesJunio[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesJunio[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesJunio[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesJunio[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesJunio[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesJunio[$i]->getDescripcion_actividad(),
            $reportesJunio[$i]->getHoras_trabajadas(),
            $reportesJunio[$i]->getLugar_de_trabajo(),
            $reportesJunio[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteJunio.xlsx'); // This will download the file to your local system

} else if ($id == 13) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS JULIO =====
    $reportesJulio = ManejoReporte::getListPorMesJulio();
    for ($i = 0; $i < count($reportesJulio); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesJulio[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesJulio[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesJulio[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesJulio[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesJulio[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesJulio[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesJulio[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesJulio[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesJulio[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesJulio[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesJulio[$i]->getDescripcion_actividad(),
            $reportesJulio[$i]->getHoras_trabajadas(),
            $reportesJulio[$i]->getLugar_de_trabajo(),
            $reportesJulio[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteJulio.xlsx'); // This will download the file to your local system

} else if ($id == 14) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS AGOSTO =====
    $reportesAgosto = ManejoReporte::getListPorMesAgosto();
    for ($i = 0; $i < count($reportesAgosto); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesAgosto[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesAgosto[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesAgosto[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesAgosto[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesAgosto[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesAgosto[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesAgosto[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesAgosto[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesAgosto[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesAgosto[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesAgosto[$i]->getDescripcion_actividad(),
            $reportesAgosto[$i]->getHoras_trabajadas(),
            $reportesAgosto[$i]->getLugar_de_trabajo(),
            $reportesAgosto[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteAgosto.xlsx'); // This will download the file to your local system

} else if ($id == 15) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS SEPTIEMBRE =====
    $reportesSeptiembre = ManejoReporte::getListPorMesSeptiembre();
    for ($i = 0; $i < count($reportesSeptiembre); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesSeptiembre[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesSeptiembre[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesSeptiembre[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesSeptiembre[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesSeptiembre[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesSeptiembre[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesSeptiembre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesSeptiembre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesSeptiembre[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesSeptiembre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesSeptiembre[$i]->getDescripcion_actividad(),
            $reportesSeptiembre[$i]->getHoras_trabajadas(),
            $reportesSeptiembre[$i]->getLugar_de_trabajo(),
            $reportesSeptiembre[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteSeptiembre.xlsx'); // This will download the file to your local system

} else if ($id == 16) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS OCTUBRE =====
    $reportesOctubre = ManejoReporte::getListPorMesOctubre();
    for ($i = 0; $i < count($reportesOctubre); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesOctubre[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesOctubre[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesOctubre[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesOctubre[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesOctubre[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesOctubre[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesOctubre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesOctubre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesOctubre[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesOctubre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesOctubre[$i]->getDescripcion_actividad(),
            $reportesOctubre[$i]->getHoras_trabajadas(),
            $reportesOctubre[$i]->getLugar_de_trabajo(),
            $reportesOctubre[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteOctubre.xlsx'); // This will download the file to your local system

} else if ($id == 17) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS NOVIEMBRE =====
    $reportesNoviembre = ManejoReporte::getListPorMesNoviembre();
    for ($i = 0; $i < count($reportesNoviembre); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesNoviembre[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesNoviembre[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesNoviembre[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesNoviembre[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesNoviembre[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesNoviembre[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesNoviembre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesNoviembre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesNoviembre[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesNoviembre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesNoviembre[$i]->getDescripcion_actividad(),
            $reportesNoviembre[$i]->getHoras_trabajadas(),
            $reportesNoviembre[$i]->getLugar_de_trabajo(),
            $reportesNoviembre[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteNoviembre.xlsx'); // This will download the file to your local system

} else if ($id == 18) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS DICIEMBRE =====
    $reportesDiciembre = ManejoReporte::getListPorMesDiciembre();
    for ($i = 0; $i < count($reportesDiciembre); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesDiciembre[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesDiciembre[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesDiciembre[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesDiciembre[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesDiciembre[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesDiciembre[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesDiciembre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesDiciembre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesDiciembre[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesDiciembre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesDiciembre[$i]->getDescripcion_actividad(),
            $reportesDiciembre[$i]->getHoras_trabajadas(),
            $reportesDiciembre[$i]->getLugar_de_trabajo(),
            $reportesDiciembre[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteDiciembre.xlsx'); // This will download the file to your local system

} else if ($id == 19) { // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS POR CONSULTOR =====
    $cod_usuario = $_GET['cod_usuario'];
    $usuarioRepo = ManejoUsuario::consultarUsuario($cod_usuario);
    $nombreRepo = $usuarioRepo->getUsuario_login();
    $reportesRepo = ManejoReporte::getListByUser($cod_usuario);

    for ($i = 0; $i < count($reportesRepo); $i++) {
        $nombre = ManejoUsuario::consultarUsuario($reportesRepo[$i]->getCod_usuario())->getNombre_usuario();
        $apellido = ManejoUsuario::consultarUsuario($reportesRepo[$i]->getCod_usuario())->getApellido_usuario();
        $reporte = array_merge($reporte, array(array(
            $reportesRepo[$i]->getFecha_de_reporte(),
            ManejoUsuario::consultarUsuario($reportesRepo[$i]->getCod_usuario())->getUsuario_login(),
            $nombre . " " . $apellido,
            ManejoMod_sap::consultarMod_sap($reportesRepo[$i]->getCod_mod_sap())->getNombre_mod_sap(),
            ManejoCliente_partner::consultarCliente_partner($reportesRepo[$i]->getCod_cliente_partner())->getNombre_cliente_partner(),
            ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesRepo[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(),
            ManejoSub_mod_sap::consultarSub_mod_sap($reportesRepo[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(),
            $reportesRepo[$i]->getCod_no_ticket(),
            ManejoPep_cliente::consultarPep_cliente($reportesRepo[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(),
            $reportesRepo[$i]->getDescripcion_actividad(),
            $reportesRepo[$i]->getHoras_trabajadas(),
            $reportesRepo[$i]->getLugar_de_trabajo(),
            $reportesRepo[$i]->getHora_de_registro()
        )));
    }

    $xlsx = SimpleXLSXGen::fromArray($reporte)
        ->setDefaultFont('Calibri')
        ->setDefaultFontSize(11);
    $xlsx->downloadAs('ReporteConsultor.xlsx'); // This will download the file to your local system

}
