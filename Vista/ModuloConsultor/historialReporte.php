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
//require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/No_ticket.php';
//require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoNo_ticket.php';
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
//ManejoNo_ticket::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);

$cod_usuario  =  $_SESSION['cod_usuario'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);
//$reportes = ManejoReporte::consultarReporteUsuario($usuario->getCod_usuario());
$reportes = ManejoReporte::getListByUser($usuario->getCod_usuario());
//$codSap = ManejoMod_sap::consultarMod_sap($reportes->getCod_mod_sap())->getNombre_mod_sap();

?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar sus registros de reporte de horas: </span>
                <!--<ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#profile" data-toggle="tab">
                        <i class="material-icons">bug_report</i> Total
                        <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#messages" data-toggle="tab">
                        <i class="material-icons">code</i> Website
                        <div class="ripple-container"></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#settings" data-toggle="tab">
                        <i class="material-icons">cloud</i> Server
                        <div class="ripple-container"></div>
                        </a>
                    </li>
                </ul>  -->
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
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
                <th> </th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportes) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 8%;"> <?php echo $reportes[$i]->getFecha_de_reporte();?> </td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportes[$i]->getCod_mod_sap())->getNombre_mod_sap();?> </td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportes[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportes[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportes[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportes[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getHora_de_registro();?></td>
                    <td class="td-actions text-right">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportes[$i]->getCod_reporte();?>"><i class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloConsultor/actionDocument.php?cod_reporte=<?php echo $reportes[$i]->getCod_reporte();?>&action=delete"><i class="material-icons">close</i></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    
</div>
