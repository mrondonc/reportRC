<?php
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
?>

<?php 
    $administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);
    $usuarioAdministrador = $administrador->getUsuario_login();
    header('Content-Encoding: UTF-8');
    header('Content-Type: application/vnd.ms-excel; charset=utf-8');
    header("Content-Disposition: attachment; filename=ExcelAdministrador.xls"); //Indica el nombre del archivo resultante    
    header("Pragma: no-cache");
    header("Expires: 0");
    echo "\xEF\xBB\xBF"; // UTF-8 BOM
    
    /*ob_start();
    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-type:   application/x-msexcel; charset=utf-8");
    header("Content-Disposition: attachment; filename=Test.xls"); 
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 
    echo pack("CCC",0xef,0xbb,0xbf);
    ob_end_flush();
      */      
        if($id==1){ // EXCEL PARA DESCARGAR LISTADO DE CONSULTORES
            $consultores = ManejoUsuario::getListOrdenNombre();
        ?>
        <h3 align="center">LISTADO TOTAL DE CONSULTORES</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Telefono</th>
                <th style="width: 10%;">Correo</th>
                <th style="width: 10%;">Dirección</th>
                <th style="width: 10%;">País de recidencia</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Estado del Usuario</th>
                <th style="width: 10%;">Fecha de Cumpleaños</th>
                <th style="width: 10%;">Cuenta de skype</th>
                <th style="width: 10%;">Nombre Contacto Emergencia</th>
                <th style="width: 10%;">Telefono Contacto Emergencia</th>
            </tr>
            <?php for ($i=0; $i <count($consultores) ; $i++) {    
                ?>
            <tr align="center">
                <td ><?php echo $consultores[$i]->getUsuario_login();?></td>
                <td ><?php echo $consultores[$i]->getNombre_usuario();?> <?php echo $consultores[$i]->getApellido_usuario();?></td>
                <td ><?php echo $consultores[$i]->getTelefono_usuario();?></td>
                <td ><?php echo $consultores[$i]->getCorreo_usuario();?></td>
                <td ><?php echo $consultores[$i]->getDireccion_usuario();?></td>
                <td ><?php echo $consultores[$i]->getPais();?></td>
                <td ><?php echo ManejoMod_sap::consultarMod_sap($consultores[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                <td ><?php echo ManejoEstado_usuario::consultarEstado_usuario($consultores[$i]->getCod_estado_usuario())->getNombre_estado_usuario();?></td>
                <td ><?php echo $consultores[$i]->getCumpleaños();?></td>
                <td ><?php echo $consultores[$i]->getCuenta_skype();?></td>
                <td ><?php echo $consultores[$i]->getNombre_contacto_emergencia();?></td>
                <td ><?php echo $consultores[$i]->getNumero_contacto_emergencia();?></td>
            </tr>
            <?php } ?>

        <?php } else if($id==2){ // EXCEL PARA DESCARGAR LISTADO DE CLIENTES PARTNER
            $cliente = ManejoCliente_partner::getList();
        ?>
        <h3 align="center">LISTADO TOTAL DE CLIENTES PARTNER</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Nombre del cliente partner</th>
            </tr>
            <?php for ($i=0; $i <count($cliente) ; $i++) { 
                ?>
            <tr align="center">
                <td><?php echo $cliente[$i]->getNombre_cliente_partner();?></td>
            </tr>
            <?php } ?>
        
        <?php } if($id==3){ // EXCEL PARA DESCARGAR LISTADO DE CLIENTES FINALES AXITY
            $subClienteA = ManejoSub_cliente_partner::getListAxity();
        ?>
        <h3 align="center">LISTADO TOTAL DE CLIENTES FINALES AXITY</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Nombre del cliente final</th>
            </tr>
            <?php for ($i=0; $i <count($subClienteA) ; $i++) { 
                ?>
            <tr align="center">
                <td><?php echo $subClienteA[$i]->getNombre_sub_cliente_partner();?></td>
            </tr>
                <?php } ?>
        
        <?php } if($id==4){ // EXCEL PARA DESCARGAR LISTADO DE CLIENTES FINALES NTT DATA
            $subClienteE = ManejoSub_cliente_partner::getListEveris(); // NTT DATA
        ?>
        <h3 align="center">LISTADO TOTAL DE CLIENTES FINALES NTT DATA</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Nombre del cliente final</th>
            </tr>
            <?php for ($i=0; $i <count($subClienteE) ; $i++) { 
                ?>
            <tr align="center">
                <td><?php echo $subClienteE[$i]->getNombre_sub_cliente_partner();?></td>
            </tr>
            <?php } ?>
        
        <?php } if($id==5){ // EXCEL PARA DESCARGAR LISTADO DE CLIENTES FINALES MILLO
            $subClienteM = ManejoSub_cliente_partner::getListMillo();
        ?>
        <h3 align="center">LISTADO TOTAL DE CLIENTES FINALES MILLO</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Nombre del cliente final</th>
            </tr>
            <?php for ($i=0; $i <count($subClienteM) ; $i++) { 
                ?>
            <tr align="center">
                <td><?php echo $subClienteM[$i]->getNombre_sub_cliente_partner();?></td>
            </tr>
            <?php } ?>
        
        <?php } if($id==6){ // =====EXCEL PARA DESCARGAR REPORTE DE HORAS TOTAL=====
            $reportes = ManejoReporte::getList();
        ?>
        <h3 align="center">REPORTE DE HORAS TOTAL</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportes) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportes[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportes[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportes[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportes[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportes[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportes[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportes[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportes[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportes[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportes[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportes[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==7){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS ENERO =====
            $reportesEnero = ManejoReporte::getListPorMesEnero();
        ?>
        <h3 align="center">REPORTE DE HORAS ENERO</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesEnero) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesEnero[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesEnero[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesEnero[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesEnero[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesEnero[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesEnero[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesEnero[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesEnero[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesEnero[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesEnero[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesEnero[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesEnero[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesEnero[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesEnero[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==8){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS FEBRERO =====
            $reportesFebrero = ManejoReporte::getListPorMesFebrero();
        ?>
        <h3 align="center">REPORTE DE HORAS FEBRERO</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesFebrero) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesFebrero[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesFebrero[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesFebrero[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesFebrero[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesFebrero[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesFebrero[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesFebrero[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesFebrero[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesFebrero[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesFebrero[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesFebrero[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesFebrero[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesFebrero[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesFebrero[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==9){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS MARZO =====
            $reportesMarzo = ManejoReporte::getListPorMesMarzo();
        ?>
        <h3 align="center">REPORTE DE HORAS MARZO</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesMarzo) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesMarzo[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesMarzo[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesMarzo[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesMarzo[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesMarzo[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesMarzo[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesMarzo[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesMarzo[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesMarzo[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesMarzo[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesMarzo[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesMarzo[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesMarzo[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesMarzo[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==10){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS ABRIL =====
            $reportesAbril = ManejoReporte::getListPorMesAbril();
        ?>
        <h3 align="center">REPORTE DE HORAS ABRIL</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesAbril) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesAbril[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesAbril[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesAbril[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesAbril[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesAbril[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesAbril[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesAbril[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesAbril[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesAbril[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesAbril[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesAbril[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesAbril[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesAbril[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesAbril[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==11){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS MAYO =====
            $reportesMayo = ManejoReporte::getListPorMesMayo();
        ?>
        <h3 align="center">REPORTE DE HORAS MAYO</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesMayo) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesMayo[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesMayo[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesMayo[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesMayo[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesMayo[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesMayo[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesMayo[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesMayo[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesMayo[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesMayo[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesMayo[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesMayo[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesMayo[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesMayo[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==12){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS JUNIO =====
            $reportesJunio = ManejoReporte::getListPorMesJunio();
        ?>
        <h3 align="center">REPORTE DE HORAS JUNIO</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesJunio) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesJunio[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesJunio[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesJunio[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesJunio[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesJunio[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesJunio[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesJunio[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesJunio[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesJunio[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesJunio[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesJunio[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesJunio[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesJunio[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesJunio[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==13){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS JULIO =====
            $reportesJulio = ManejoReporte::getListPorMesJulio();
        ?>
        <h3 align="center">REPORTE DE HORAS JULIO</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesJulio) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesJulio[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesJulio[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesJulio[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesJulio[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesJulio[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesJulio[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesJulio[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesJulio[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesJulio[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesJulio[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesJulio[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesJulio[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesJulio[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesJulio[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==14){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS AGOSTO =====
            $reportesAgosto = ManejoReporte::getListPorMesAgosto();
        ?>
        <h3 align="center">REPORTE DE HORAS AGOSTO</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesAgosto) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesAgosto[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesAgosto[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesAgosto[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesAgosto[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesAgosto[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesAgosto[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesAgosto[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesAgosto[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesAgosto[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesAgosto[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesAgosto[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesAgosto[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesAgosto[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesAgosto[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==15){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS SEPTIEMBRE =====
            $reportesSeptiembre = ManejoReporte::getListPorMesSeptiembre();
        ?>
        <h3 align="center">REPORTE DE HORAS SEPTIEMBRE</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesSeptiembre) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesSeptiembre[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesSeptiembre[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesSeptiembre[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesSeptiembre[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesSeptiembre[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesSeptiembre[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesSeptiembre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesSeptiembre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesSeptiembre[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesSeptiembre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesSeptiembre[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesSeptiembre[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesSeptiembre[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesSeptiembre[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==16){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS OCTUBRE =====
            $reportesOctubre = ManejoReporte::getListPorMesOctubre();
        ?>
        <h3 align="center">REPORTE DE HORAS OCTUBRE</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesOctubre) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesOctubre[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesOctubre[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesOctubre[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesOctubre[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesOctubre[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesOctubre[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesOctubre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesOctubre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesOctubre[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesOctubre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesOctubre[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesOctubre[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesOctubre[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesOctubre[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==17){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS NOVIEMBRE =====
            $reportesNoviembre = ManejoReporte::getListPorMesNoviembre();
        ?>
        <h3 align="center">REPORTE DE HORAS NOVIEMBRE</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesNoviembre) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesNoviembre[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesNoviembre[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesNoviembre[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesNoviembre[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesNoviembre[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesNoviembre[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesNoviembre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesNoviembre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesNoviembre[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesNoviembre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesNoviembre[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesNoviembre[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesNoviembre[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesNoviembre[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } if($id==18){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS DICIEMBRE =====
            $reportesDiciembre = ManejoReporte::getListPorMesDiciembre();
        ?>
        <h3 align="center">REPORTE DE HORAS DICIEMBRE</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportesDiciembre) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportesDiciembre[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesDiciembre[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportesDiciembre[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesDiciembre[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportesDiciembre[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportesDiciembre[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesDiciembre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesDiciembre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportesDiciembre[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportesDiciembre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportesDiciembre[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportesDiciembre[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportesDiciembre[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportesDiciembre[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>

        <?php } if($id==19){ // ===== EXCEL PARA DESCARGAR REPORTE DE HORAS POR CONSULTOR =====
            $cod_usuario = $_GET['cod_usuario'];
            $usuario = ManejoUsuario::consultarUsuario($cod_usuario);
            $reportes = ManejoReporte::getListByUser($cod_usuario);
        ?>
        <h3 align="center">REPORTE DE HORAS POR CONSULTOR</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Fecha de Reporte</th>
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Módulo SAP</th>
                <th style="width: 10%;">Cliente Partner</th>
                <th style="width: 10%;">Cliente Final</th>
                <th style="width: 10%;">Sub Módulo SAP</th>
                <th style="width: 10%;">Número de Ticket</th>
                <th style="width: 10%;">Nombre del PEP</th>
                <th style="width: 10%;">Descripción Actividad</th>
                <th style="width: 10%;">Horas Trabajadas</th>
                <th style="width: 10%;">Lugar de Trabajo</th>
                <th style="width: 10%;">Hora de Registro</th>
            </tr>
            <?php for ($i=0; $i <count($reportes) ; $i++) { 
                ?>
            <tr align="center">
            <td style="font-size: small; "><?php echo $reportes[$i]->getFecha_de_reporte();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td ><?php echo ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td ><?php echo ManejoMod_sap::consultarMod_sap($reportes[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportes[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportes[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportes[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td ><?php echo $reportes[$i]->getCod_no_ticket();?></td>
                    <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportes[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td ><?php echo $reportes[$i]->getDescripcion_actividad();?></td>
                    <td ><?php echo $reportes[$i]->getHoras_trabajadas();?></td>
                    <td ><?php echo $reportes[$i]->getLugar_de_trabajo();?></td>
                    <td ><?php echo $reportes[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
        <?php } ?>
    </table>
  