<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoEstado_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoReporte::setConexionBD($conexion);
ManejoAdministrador::setConexionBD($conexion);
ManejoEstado_usuario::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);

$cod_administrador  =  $_SESSION['cod_administrador'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);
$consultores = ManejoUsuario::getListOrdenNombreEnEspera();
date_default_timezone_set('America/Bogota');
$fecha_actual = date('d/m/y');

$mes = date('m A');
$reporte = ManejoReporte::getListPorMesActualMax5();

?>

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <!--<i class="material-icons">info_outline</i>-->
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
          <!--<i class="material-icons">info_outline</i>-->
          <img class="img" src="../Vista/assets/css/imagenes_logo/nttData2.jpeg" />
        </div>
        <p class="card-category">NTT DATA</p>
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
          <!--<i class="material-icons">info_outline</i>-->
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

  <div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-warning">
        <h4 class="card-title">Consultores en espera</h4>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover" style="text-align: center;">
          <thead class="text-warning">
            <th style="font-size: small;">Usuario</th>
            <th style="font-size: small;">Nombre y Apellido</th>
            <th style="font-size: small;">Estado del Usuario</th>
            <th style="font-size: small;">Detalle Consultor</th>
            <th style="font-size: small;">Acciones</th>
          </thead>
          <tbody style="text-align: center;">
            <?php for ($i = 0; $i < count($consultores); $i++) {
            ?>
              <tr>
                <td style="font-size: small;"><?php echo $consultores[$i]->getUsuario_login(); ?></td>
                <td style="font-size: small;"><?php echo $consultores[$i]->getNombre_usuario(); ?> <?php echo $consultores[$i]->getApellido_usuario(); ?></td>
                <td style="font-size: small;"><?php echo ManejoEstado_usuario::consultarEstado_usuario($consultores[$i]->getCod_estado_usuario())->getNombre_estado_usuario(); ?></td>
                <td style="font-size: small;"><a href="?menu=perfilConsultor&cod_usuario=<?php echo $consultores[$i]->getCod_usuario(); ?>">PERFIL COMPLETO</a></td>
                <td class="td-actions text-center">
                  <?php
                  if ($consultores[$i]->getCod_estado_usuario() == 2) { ?>
                    <a type="button" rel="tooltip" title="Desactivar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultores[$i]->getCod_usuario(); ?>&action=desactivar"><i style="font-size:18px;" class="fas fa-user-times"></i></a>
                    <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editConsultor&cod_usuario=<?php echo $consultores[$i]->getCod_usuario(); ?>"><i class="material-icons">edit</i></a>
                    <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultores[$i]->getCod_usuario(); ?>&action=delete"><i class="material-icons">close</i></a>
                  <?php }
                  if ($consultores[$i]->getCod_estado_usuario() == 4) { ?>
                    <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultores[$i]->getCod_usuario(); ?>&action=activar"><i style="font-size:18px;" class="fas fa-check-square"></i></a>
                    <!--<a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editConsultor&cod_usuario=<?php echo $consultores[$i]->getCod_usuario(); ?>"><i class="material-icons">edit</i></a>
                                      <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultores[$i]->getCod_usuario(); ?>&action=delete"><i class="material-icons">close</i></a>-->

                  <?php }
                  if ($consultores[$i]->getCod_estado_usuario() == 3) { ?>
                    <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultores[$i]->getCod_usuario(); ?>&action=activar"><i style="font-size:18px;" class="fas fa-user-check"></i></a>
                  <?php  } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-md-12">
    <div class="card">
      <div class="card-header card-header-warning">
        <?php setlocale(LC_ALL, "es_ES");
        $mes_array = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $mes2 = $mes_array[date('n') - 1] . " del " . date('Y');
        ?>
        <h4 class="card-title">Últimos 5 Reportes del mes <?php echo $mes2; ?></h4>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-hover" style="text-align: center;">
          <thead class="text-warning">
            <th style="font-size: small;">Usuario</th>
            <th style="font-size: small;">Cliente Partner</th>
            <th style="font-size: small;">Cliente Final</th>
            <th style="font-size: small;">Horas Trabajadas</th>
            <th style="font-size: small;">Fecha de reporte</th>
          </thead>
          <tbody style="text-align: center;">
            <?php for ($i = 0; $i < count($reporte); $i++) {
            ?>
              <tr>
                <td style="font-size: small;"><?php echo ManejoUsuario::consultarUsuario($reporte[$i]->getCod_usuario())->getUsuario_login(); ?></td>
                <td style="font-size: small;"><?php echo ManejoCliente_partner::consultarCliente_partner($reporte[$i]->getCod_cliente_partner())->getNombre_cliente_partner(); ?></td>
                <td style="font-size: small;"><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reporte[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner(); ?></td>
                <td style="font-size: small;"><?php echo $reporte[$i]->getHoras_trabajadas(); ?></td>
                <td style="font-size: small;"><?php echo $reporte[$i]->getFecha_de_reporte(); ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i style="font-size:40px;" class="far fa-plus-square"></i>
        </div>
        <h3 class="card-category">AGREGAR MÓDULO SAP</h3>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-danger">warning</i><a href="?menu=mod_sap">IR AL FORMULARIO</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i style="font-size:40px;" class="far fa-plus-square"></i>
        </div>
        <p class="card-category">AGREGAR PEP SEIDOR</p>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-danger">warning</i><a href="?menu=subClientes&cod_cliente_partner=6">IR AL FORMULARIO</a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-header card-header-danger card-header-icon">
        <div class="card-icon">
          <i style="font-size:40px;" class="far fa-plus-square"></i>
        </div>
        <p class="card-category">AGREGAR SUB MÓDULO SAP AXITY</p>
      </div>
      <div class="card-footer">
        <div class="stats">
          <i class="material-icons text-danger">warning</i><a href="?menu=sub_mod_sap">IR AL FORMULARIO</a>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>