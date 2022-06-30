<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoReporte::setConexionBD($conexion);
ManejoAdministrador::setConexionBD($conexion);

$cod_administrador = $_SESSION['cod_administrador'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);

$reportes = ManejoReporte::getListPorMesActual();

?>
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Historial Reporte de Horas Mensual</h4>
                <p class="nav-tabs-title">Aqui podra visualizar, modificar y eliminar los registros de reporte de horas mensual<br>Seleccione el mes que desea visualizar.</p>
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Mes</th>
                <th style="font-size: small;">Reporte</th>
                <th style="font-size: small;">Descargar Reporte</th>
            </thead>
            <tbody style="text-align: center;">
                <tr>
                    <td style="font-size: small;">ENERO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=1"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=7"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">FEBRERO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=2"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=8"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">MARZO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=3"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=9"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">ABRIL</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=4"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=10"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">MAYO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=5"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=11"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">JUNIO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=6"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=12"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">JULIO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=7"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=13"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">AGOSTO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=8"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=14"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">SEPTIEMBRE</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=9"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=15"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">OCTUBRE</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=10"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=16"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">NOVIEMBRE</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=11"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=17"> Descargar excel </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">DICIEMBRE</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=12"> Visualizar reporte </a></td>
                    <td style="font-size: small;"><a href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=18"> Descargar excel </a></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    
</div>
