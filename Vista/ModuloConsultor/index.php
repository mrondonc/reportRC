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
$reportes = ManejoReporte::getListByUserMax5($usuario->getCod_usuario());
//$codSap = ManejoMod_sap::consultarMod_sap($reportes->getCod_mod_sap())->getNombre_mod_sap();

// Set the new timezone
date_default_timezone_set('America/Bogota');
$fecha = date('d h:i A');
?>

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <img class="img" src="../Vista/assets/css/imagenes_logo/axity2.jpeg" />
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
          <img class="img" src="../Vista/assets/css/imagenes_logo/nttData2.jpeg" />
        </div>
        <p class="card-category">NTT DATA - Everis</p>
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
          <img class="img" src="../Vista/assets/css/imagenes_logo/seidor2.jpeg" />
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

<div class="row">
  <!--AQUI TERMINA LAS CARTAS Y COMIENZA LA TABLA DE LOS ULTIMOS 15 REPORTES DEL MES-->
  <div class="card">
    <div class="card-header card-header-tabs card-header-primary">
      <div class="nav-tabs-navigation">
        <div class="nav-tabs-wrapper">
          <h4 class="card-title ">Últimos 5 Reportes de Horas realizados</h4>
          <span class="nav-tabs-title">Aquí podrá visualizar, modificar y eliminar sus registros de reporte de horas.
            <!-- <a style="text-align: right;" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelConsultor.php?cod_tipo_usuario=<?php echo $usuario->getCod_tipo_usuario(); ?>&cod_usuario=<?php echo $usuario->getCod_usuario(); ?>"><i style="font-size:40px;" class="fas fa-file-csv"></i></a>-->
          </span>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table" style="text-align: center;">
          <thead class="text-warning">
            <th> </th>
            <th style="font-size: small;">Fecha de Reporte</th>
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
            <?php for ($i = 0; $i < count($reportes); $i++) {
            ?>
              <tr>
                <td class="td-actions text-right">
                  <a type="button" rel="tooltip" class="btn btn-primary btn-link btn-sm" href="?menu=editReporte&cod_reporte=<?php echo $reportes[$i]->getCod_reporte(); ?>&idEditar=16"><i class="material-icons">edit</i></a>
                  <a type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm" href="ModuloConsultor/actionDocument.php?cod_reporte=<?php echo $reportes[$i]->getCod_reporte(); ?>&action=delete&idEliminar=14"><i class="material-icons">close</i></a>
                </td>
                <td style="font-size: small; width: 8%;"> <?php echo $reportes[$i]->getFecha_de_reporte(); ?> </td>
                <td style="font-size: small;"><?php echo ManejoMod_sap::consultarMod_sap($reportes[$i]->getCod_mod_sap())->getNombre_mod_sap(); ?> </td>
                <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reportes[$i]->getCod_cliente_partner())->getNombre_cliente_partner(); ?></td>
                <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportes[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(); ?></td>
                <td style="font-size: small;"><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportes[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap(); ?></td>
                <td style="font-size: small;"><?php echo $reportes[$i]->getCod_no_ticket(); ?></td>
                <td style="font-size: small;"><?php echo ManejoPep_cliente::consultarPep_cliente($reportes[$i]->getCod_pep_cliente())->getReferencia_pep_cliente(); ?></td>
                <td style="font-size: small;"><?php echo $reportes[$i]->getDescripcion_actividad(); ?></td>
                <td style="font-size: small;"><?php echo $reportes[$i]->getHoras_trabajadas(); ?></td>
                <td style="font-size: small;"><?php echo $reportes[$i]->getLugar_de_trabajo(); ?></td>
                <td style="font-size: small;"><?php echo $reportes[$i]->getHora_de_registro(); ?></td>
                <td style="font-size: small; width: 3%;" class="td-actions text-left">
                  <a type="button" class="btn btn-primary btn-link btn-sm" href="?menu=copyReporte&cod_reporte=<?php echo $reportes[$i]->getCod_reporte(); ?>&cod_usuario=<?php echo $reportes[$i]->getCod_usuario(); ?>&idCopy=14"><span class="material-symbols-outlined">file_copy</span></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>