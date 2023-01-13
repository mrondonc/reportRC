<?php
set_time_limit(600);
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
$cod_administrador = $_SESSION['cod_administrador'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);
$id = $_GET['id'];
$usuario = ManejoUsuario::getList();
$reportesEnero = ManejoReporte::getListPorMesEnero();
$reportesFebrero = ManejoReporte::getListPorMesFebrero();
$reportesMarzo = ManejoReporte::getListPorMesMarzo();
$reportesAbril = ManejoReporte::getListPorMesAbril();
$reportesMayo = ManejoReporte::getListPorMesMayo();
$reportesJunio = ManejoReporte::getListPorMesJunio();
$reportesJulio = ManejoReporte::getListPorMesJulio();
$reportesAgosto = ManejoReporte::getListPorMesAgosto();
$reportesSeptiembre = ManejoReporte::getListPorMesSeptiembre();
$reportesOctubre = ManejoReporte::getListPorMesOctubre();
$reportesNoviembre = ManejoReporte::getListPorMesNoviembre();
$reportesDiciembre = ManejoReporte::getListPorMesDiciembre();

?>
<!-- ENERO -->
<?php if($id == 1 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Enero</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=7"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesEnero) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesEnero[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesEnero[$i]->getCod_usuario();?>&idEditar=2"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button"  class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesEnero[$i]->getCod_reporte();?>&action=delete&idEliminar=2&cod_usuario=<?php echo $reportesEnero[$i]->getCod_usuario()?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesEnero[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesEnero[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesEnero[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesEnero[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesEnero[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesEnero[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesEnero[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesEnero[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesEnero[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesEnero[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesEnero[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesEnero[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesEnero[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesEnero[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesEnero[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesEnero[$i]->getCod_usuario();?>&idCopy=2"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!-- FEBRERO -->
<?php }else if($id == 2 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Febrero</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=8"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesFebrero) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesFebrero[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesFebrero[$i]->getCod_usuario();?>&idEditar=3"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesFebrero[$i]->getCod_reporte();?>&action=delete&idEliminar=3&cod_usuario=<?php echo $reportesFebrero[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesFebrero[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesFebrero[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesFebrero[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesFebrero[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesFebrero[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesFebrero[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesFebrero[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesFebrero[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesFebrero[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesFebrero[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesFebrero[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesFebrero[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesFebrero[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesFebrero[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesFebrero[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesFebrero[$i]->getCod_usuario();?>&idCopy=3"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!-- MARZO -->
<?php }else if($id == 3 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Marzo</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=9"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesMarzo) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesMarzo[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesMarzo[$i]->getCod_usuario();?>&idEditar=4"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesMarzo[$i]->getCod_reporte();?>&action=delete&idEliminar=4&cod_usuario=<?php echo $reportesMarzo[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesMarzo[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesMarzo[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesMarzo[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesMarzo[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesMarzo[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesMarzo[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesMarzo[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesMarzo[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesMarzo[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesMarzo[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesMarzo[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesMarzo[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesMarzo[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesMarzo[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesMarzo[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesMarzo[$i]->getCod_usuario();?>&idCopy=4"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- ABRIL -->
<?php }else if($id == 4 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Abril</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=10"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesAbril) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesAbril[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesAbril[$i]->getCod_usuario();?>&idEditar=5"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesAbril[$i]->getCod_reporte();?>&action=delete&idEliminar=5&cod_usuario=<?php echo $reportesAbril[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesAbril[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesAbril[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesAbril[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesAbril[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesAbril[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesAbril[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesAbril[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesAbril[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesAbril[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesAbril[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesAbril[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesAbril[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesAbril[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesAbril[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesAbril[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesAbril[$i]->getCod_usuario();?>&idCopy=5"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!-- MAYO -->
<?php }else if($id == 5 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Mayo</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=11"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesMayo) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesMayo[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesMayo[$i]->getCod_usuario();?>&idEditar=6"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesMayo[$i]->getCod_reporte();?>&action=delete&idEliminar=6&cod_usuario=<?php echo $reportesMayo[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesMayo[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesMayo[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesMayo[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesMayo[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesMayo[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesMayo[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesMayo[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesMayo[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesMayo[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesMayo[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesMayo[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesMayo[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesMayo[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesMayo[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesMayo[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesMayo[$i]->getCod_usuario();?>&idCopy=6"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!-- JUNIO -->
<?php }else if($id == 6 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Junio</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=12"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesJunio) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesJunio[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesJunio[$i]->getCod_usuario();?>&idEditar=7"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesJunio[$i]->getCod_reporte();?>&action=delete&idEliminar=7&cod_usuario=<?php echo $reportesJunio[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesJunio[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesJunio[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesJunio[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesJunio[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesJunio[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesJunio[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesJunio[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesJunio[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesJunio[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesJunio[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesJunio[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesJunio[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesJunio[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesJunio[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesJunio[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesJunio[$i]->getCod_usuario();?>&idCopy=7"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!-- JULIO -->
<?php }else if($id == 7 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Julio</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=13"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesJulio) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesJulio[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesJulio[$i]->getCod_usuario();?>&idEditar=8"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesJulio[$i]->getCod_reporte();?>&action=delete&idEliminar=8&cod_usuario=<?php echo $reportesJulio[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesJulio[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesJulio[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesJulio[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesJulio[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesJulio[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesJulio[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesJulio[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesJulio[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesJulio[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesJulio[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesJulio[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesJulio[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesJulio[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesJulio[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesJulio[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesJulio[$i]->getCod_usuario();?>&idCopy=8"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!-- AGOSTO -->
<?php }else if($id == 8 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Agosto</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=14"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesAgosto) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesAgosto[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesAgosto[$i]->getCod_usuario();?>&idEditar=9"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesAgosto[$i]->getCod_reporte();?>&action=delete&idEliminar=9&cod_usuario=<?php echo $reportesAgosto[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesAgosto[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesAgosto[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesAgosto[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesAgosto[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesAgosto[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesAgosto[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesAgosto[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesAgosto[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesAgosto[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesAgosto[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesAgosto[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesAgosto[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesAgosto[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesAgosto[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesAgosto[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesAgosto[$i]->getCod_usuario();?>&idCopy=9"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!-- SEPTIEMBRE -->
<?php }else if($id == 9 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Septiembre</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=15"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesSeptiembre) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesSeptiembre[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesSeptiembre[$i]->getCod_usuario();?>&idEditar=10"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesSeptiembre[$i]->getCod_reporte();?>&action=delete&idEliminar=10&cod_usuario=<?php echo $reportesSeptiembre[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesSeptiembre[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesSeptiembre[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesSeptiembre[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesSeptiembre[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesSeptiembre[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesSeptiembre[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesSeptiembre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesSeptiembre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesSeptiembre[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesSeptiembre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesSeptiembre[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesSeptiembre[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesSeptiembre[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesSeptiembre[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesSeptiembre[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesSeptiembre[$i]->getCod_usuario();?>&idCopy=10"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!-- OCTUBRE -->
<?php }else if($id == 10 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Octubre</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=16"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesOctubre) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesOctubre[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesOctubre[$i]->getCod_usuario();?>&idEditar=11"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesOctubre[$i]->getCod_reporte();?>&action=delete&idEliminar=11&cod_usuario=<?php echo $reportesOctubre[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesOctubre[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesOctubre[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesOctubre[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesOctubre[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesOctubre[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesOctubre[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesOctubre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesOctubre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesOctubre[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesOctubre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesOctubre[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesOctubre[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesOctubre[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesOctubre[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesOctubre[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesOctubre[$i]->getCod_usuario();?>&idCopy=11"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!-- NOVIEMBRE -->
<?php }else if($id == 11 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Noviembre</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=17"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesNoviembre) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesNoviembre[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesNoviembre[$i]->getCod_usuario();?>&idEditar=12"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesNoviembre[$i]->getCod_reporte();?>&action=delete&idEliminar=12&cod_usuario=<?php echo $reportesNoviembre[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesNoviembre[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesNoviembre[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesNoviembre[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesNoviembre[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesNoviembre[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesNoviembre[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesNoviembre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesNoviembre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesNoviembre[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesNoviembre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesNoviembre[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesNoviembre[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesNoviembre[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesNoviembre[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesNoviembre[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesNoviembre[$i]->getCod_usuario();?>&idCopy=12"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<!-- DICIEMBRE -->
<?php }else if($id == 12 ){ ?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total Mes Diciembre</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin2.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=18"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></span>
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
                <th style="font-size: small;">Copiar Registro</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($reportesDiciembre) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportesDiciembre[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesDiciembre[$i]->getCod_usuario();?>&idEditar=13"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportesDiciembre[$i]->getCod_reporte();?>&action=delete&idEliminar=13&cod_usuario=<?php echo $reportesDiciembre[$i]->getCod_usuario();?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small; "><?php echo $reportesDiciembre[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesDiciembre[$i]->getCod_usuario())->getUsuario_login();?></td>
                    <td style="font-size: small; "><?php echo ManejoUsuario::consultarUsuario($reportesDiciembre[$i]->getCod_usuario())->getNombre_usuario();?> <?php echo ManejoUsuario::consultarUsuario($reportesDiciembre[$i]->getCod_usuario())->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportesDiciembre[$i]->getCod_mod_sap())->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportesDiciembre[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportesDiciembre[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportesDiciembre[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportesDiciembre[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportesDiciembre[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                    <td style="font-size: small;"><?php echo $reportesDiciembre[$i]->getDescripcion_actividad();?></td>
                    <td style="font-size: small;"><?php echo $reportesDiciembre[$i]->getHoras_trabajadas();?></td>
                    <td style="font-size: small;"><?php echo $reportesDiciembre[$i]->getLugar_de_trabajo();?></td>
                    <td style="font-size: small;"><?php echo $reportesDiciembre[$i]->getHora_de_registro();?></td>
                    <td style="font-size: small; width: 3%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportesDiciembre[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportesDiciembre[$i]->getCod_usuario();?>&idCopy=13"><span class="material-symbols-outlined">file_copy</span></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<?php }else{

} ?>