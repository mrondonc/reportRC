<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoReporte::setConexionBD($conexion);

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
            </thead>
            <tbody style="text-align: center;">
                <tr>
                    <td style="font-size: small;">ENERO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=1"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">FEBRERO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=2"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">MARZO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=3"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">ABRIL</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=4"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">MAYO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=5"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">JUNIO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=6"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">JULIO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=7"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">AGOSTO</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=8"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">SEPTIEMBRE</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=9"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">OCTUBRE</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=10"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">NOVIEMBRE</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=11"> Visualizar reporte </a></td>
                </tr>
                <tr>
                    <td style="font-size: small;">DICIEMBRE</td>
                    <td style="font-size: small;"><a href="?menu=historialReporteMensuales&id=12"> Visualizar reporte </a></td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    
</div>
