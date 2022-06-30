<?php
set_time_limit(600);
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';


$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoAdministrador::setConexionBD($conexion);
ManejoUsuario::setConexionBD($conexion);
ManejoReporte::setConexionBD($conexion);


$cod_administrador = $_SESSION['cod_administrador'];
$cod_usuario = $_GET['cod_usuario'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);
$reportes = ManejoReporte::getListPorUsuarioNew($cod_usuario);

?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Total por Consultor</h4>
                <span class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas </span>
                <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=19&cod_usuario=<?php echo $cod_usuario;?>"><i style="font-size:40px;" class="fas fa-file-csv"></i></a>
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <?php echo $cod_usuario; ?>
        <?php for ($j=0; $j <count($reportes) ; $j++) {
            echo $reportes[j]->getFecha_de_reporte();
        }; ?>
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Acciones</th>
                <th style="font-size: small;">Fecha de Reporte</th>
                <th style="font-size: small;">Usuario</th>
                <th style="font-size: small;">Nombre y Apellido</th>
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
                    <td style="font-size: small; width: 7%;" class="td-actions text-left">
                        <a type="button"  class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportes[$i]->getCod_reporte();?>&cod_usuario=<?php echo $reportes[$i]->getCod_usuario();?>&idEditar=14"><i style="font-size:20px;" class="material-icons">edit</i></a>
                        <a type="button"  class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDocument.php?cod_reporte=<?php echo $reportes[$i]->getCod_reporte();?>&action=delete&idEliminar=14&cod_usuario=<?php echo $reportes[$i]->getCod_usuario()?>"><i style="font-size:20px;" class="material-icons">close</i></a>
                    </td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getFecha_de_reporte();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getUsuario_login();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getNombre_usuario();?> <?php echo $reportes[$i]->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getNombre_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getNombre_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getNombre_sub_cliente_partner();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getNombre_sub_mod_sap();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getCod_no_ticket();?></td>
                    <td style="font-size: small;"><?php echo $reportes[$i]->getReferencia_pep_cliente();?></td>
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
