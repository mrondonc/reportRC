<?php
set_time_limit(300);
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
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';

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
ManejoAdministrador::setConexionBD($conexion);

$usuario = ManejoUsuario::getList();
$reportes = ManejoReporte::getList();

$cod_administrador = $_SESSION['cod_administrador'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);
?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas TOTAL</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=6"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Acciones</th>
                <th style="font-size: small;">Fecha de Reporte</th>
                <th style="font-size: small;">Usuario</th>
                <th style="font-size: small;">Nombre y Apellido</th>
                <th style="font-size: small;">Módulo SAP</th>
                <th style="font-size: small;">Cliente Partner</th>
                <th style="font-size: small;">Cliente Final</th>
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
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportes[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportes[$i]->getCod_usuario();?>&idEditar=1"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportes[$i]->getCod_reporte();?>&action=delete&idEliminar=1&cod_usuario=<?php echo $reportes[$i]->getCod_usuario()?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportes[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportes[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportes[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportes[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportes[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportes[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportes[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getHora_de_registro();?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    
</div>
