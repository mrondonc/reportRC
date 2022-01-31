<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoReporte::setConexionBD($conexion);

$cod_usuario  =  $_SESSION['cod_usuario'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);

$reporteMensual = ManejoReporte::getListReporteMensual($usuario->getCod_usuario());

//$dataPoints = array();
//for ($i=0; $i < 0 ; $i++) {   
//  array_push($dataPoints, array("y" => $reporteMensual[$i]->getHoras_trabajadas(), "label" => $reporteMensual[$i]->getFecha_de_reporte()));
//}
?>
<script>
window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     theme: "light2",
     title:{
         text: "Reporte de horas mensual",
         fontSize: 24
     },
     axisY: {
         title: "Número de horas",
         fontSize: 16
     },
     data: [{
         type: "column",
         yValueFormatString: "#,##0 Horas",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();

  
 }
</script>

<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">info_outline</i>
          </div>
          <h3 class="card-category">Axity</h3>
          <p class="card-title">Cierre 27 de cada mes hasta las 5:00 pm </p>
        </div>
        <div class="card-footer">
          <div class="stats">
          <i class="material-icons text-danger">warning</i><a href="?menu=reporteHoras">Realizar reporte de hora</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">info_outline</i>
          </div>
          <p class="card-category">Everis</p>
          <p class="card-title">Cierre 30 y 31 de cada mes hasta las 6:00 pm</p>
        </div>
        <div class="card-footer">
          <div class="stats">
          <i class="material-icons text-danger">warning</i><a href="?menu=reporteHoras">Realizar reporte de hora</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">info_outline</i>
          </div>
          <p class="card-category">Seidor</p>
          <p class="card-title">Cierre 30 y 31 de cada mes hasta las 6:00 pm</p>
        </div>
        <div class="card-footer">
          <div class="stats">
          <i class="material-icons text-danger">warning</i><a href="?menu=reporteHoras">Realizar reporte de hora</a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- GRAFICAS -->
<div class="row">
    <!--<div class="col-md-6">
      <div class="card card-chart">
        <div class="card-header card-header-warning">
          <div class="ct-chart" id="chartContainer"></div>
        </div>
      </div>
    </div>-->
   
      <div class="col-md-6">
              <div class="card card-chart">
              <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">REPORTE DE HORAS SEMANAL</h4>
                </div>
              </div>
              
      </div>
      <div class="col-md-6">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">REPORTE DE HORAS MENSUAL</h4>
                </div>
              </div>
              
      </div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>