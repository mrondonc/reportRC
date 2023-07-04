<?php
set_time_limit(5400);
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoAdministrador::setConexionBD($conexion);
$usuario = ManejoUsuario::getList();

$cod_administrador = $_SESSION['cod_administrador'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);
?>

<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                <i style="font-size:45px;" class="far fa-folder-open"></i>
                </div>
                <p class="card-category">Reporte</p>
                <h3 class="card-title">Horas Total                
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i style="font-size:20px;" class="fas fa-expand-arrows-alt" ></i>
                <a href="?menu=historialReporteTotal">Visualizar reporte</a>
                </div>
                <div class="stats">
                <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=6">Descargar Reporte</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                <i style="font-size:45px;" class="far fa-folder-open"></i>
                </div>
                <p class="card-category">Reporte</p>
                <h3 class="card-title">Horas Mensual               
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i style="font-size:20px;" class="fas fa-expand-arrows-alt" ></i>
                <a href="?menu=historialReporteMensual">Visualizar reporte</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                <i style="font-size:45px;" class="far fa-folder-open"></i>
                </div>
                <p class="card-category">Reporte</p>
                <h3 class="card-title">Horas por Consultor                
                </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                <i style="font-size:20px;" class="fas fa-expand-arrows-alt" ></i>
                <a href="?menu=historialReporteConsultor">Visualizar reporte</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/d82eacb9bb.js" crossorigin="anonymous"></script>