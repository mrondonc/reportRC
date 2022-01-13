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

$cod_usuario  =  $_SESSION['cod_usuario'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);
//$reportes = ManejoReporte::consultarReporteUsuario($usuario->getCod_usuario());
$reportes = ManejoReporte::getListByUser($usuario->getCod_usuario());
$codSap = ManejoMod_sap::consultarMod_sap($usuario->getCod_mod_sap())->getNombre_mod_sap();
//$nombreSap = ManejoMod_sap::consultarMod_sap($codSap->getNombre_mod_sap());
?>
<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Historial Reporte de Horas</h4>
        <p class="card-category"> Here is a subtitle for this table</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table" style="text-align: center;">
            <thead class=" text-primary">
                <th style="font-size: small;">Fecha de Reporte</th>
                <th style="font-size: small;">Módulo SAP</th>
                <th style="font-size: small;">Cliente</th>
                <th style="font-size: small;">Sub Cliente</th>
                <th style="font-size: small;">Sub Módulo SAP</th>
                <th style="font-size: small;">Número de Ticket</th>
                <th style="font-size: small;">Nombre del PEP</th>
                <th style="font-size: small;">Descripción Actividad</th>
                <th style="font-size: small;">Horas Trabajadas</th>
                <th style="font-size: small;">Lugar de Trabajo</th>
                <th style="font-size: small;">Hora de Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportes) ; $i++) { 
                    
                    ?>
                <tr>
                    <td style="font-size: small; width: 8%;"> <?php echo $reportes[$i]->getFecha_de_reporte();?> </td>
                    <td style="font-size: small;"> <?php echo $codSap;?> </td>
                    <td style="font-size: small;"> <?php echo ManejoCliente_partner::consultarCliente_partner($reportes[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?> </td>
                    <td style="font-size: small;"> <?php if( ($reportes[$i]->getCod_cliente_partner()) != 3 AND 5 AND 6 AND 7 ){ echo ManejoSub_cliente_partner::consultarSub_cliente_partnerPorCLiente($reportes[$i]->getCod_cliente_partner())->getNombre_sub_cliente_partner();}?> </td>
                    <td style="font-size: small;"> <?php if( ($reportes[$i]->getCod_cliente_partner()) == 1 ){ echo ManejoSub_mod_sap::consultCodigoCliente($reportes[$i]->getCod_cliente_partner())->getNombre_sub_mod_sap();}?> </td>
                    <td style="font-size: small;"> <?php echo '';?> </td>
                    <td style="font-size: small;"> <?php echo '';?> </td>
                    <td style="font-size: small;"> <?php echo '';?> </td>
                    <td style="font-size: small;"> <?php echo '';?> </td>
                    <td style="font-size: small;"> <?php echo '';?> </td>
                    <td style="font-size: small;"> <?php echo '';?> </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>