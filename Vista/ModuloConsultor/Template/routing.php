<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == 'index') {
        include_once("../Vista/ModuloConsultor/index.php");
    }
    if ($_GET['menu'] == 'miPerfil') {
        include_once("../Vista/ModuloConsultor/miPerfil.php");
    }
    if ($_GET['menu'] == 'reporteHoras') {
        include_once("../Vista/ModuloConsultor/reporteHoras.php");
    }
    if ($_GET['menu'] == 'editarPerfil') {
        include_once("../Vista/ModuloConsultor/editarPerfil.php");
    }
    if ($_GET['menu'] == 'agregarModSap') {
        include_once("../Vista/ModuloConsultor/agregarModSap.php");
    }
    if ($_GET['menu'] == 'agregarClienteAxity') {
        include_once("../Vista/ModuloConsultor/agregarClienteAxity.php");
    }
    if ($_GET['menu'] == 'agregarClienteEveris') {
        include_once("../Vista/ModuloConsultor/agregarClienteEveris.php");
    }
    if ($_GET['menu'] == 'agregarPepCliente') {
        include_once("../Vista/ModuloConsultor/agregarPepCliente.php");
    }
    if ($_GET['menu'] == 'agregarClienteMillo') {
        include_once("../Vista/ModuloConsultor/agregarClienteMillo.php");
    }
    if ($_GET['menu'] == 'historialReporte') {
        include_once("../Vista/ModuloConsultor/historialReporte.php");
    }
    if ($_GET['menu'] == 'historialReporteTotal') {
        include_once("../Vista/ModuloConsultor/historialReporteTotal.php");
    }
    if ($_GET['menu'] == 'historialReporteMensual') {
        include_once("../Vista/ModuloConsultor/historialReporteMensual.php");
    }
    if ($_GET['menu'] == 'historialReporteMensuales') {
        include_once("../Vista/ModuloConsultor/historialReporteMensuales.php");
    }
    if ($_GET['menu'] == 'agregarNoTicketAxity') {
        include_once("../Vista/ModuloConsultor/agregarNoTicketAxity.php");
    }
    if ($_GET['menu'] == 'editReporte') {
        include_once("../Vista/ModuloConsultor/editReporte.php");
    }
    //if ($_GET['menu'] == 'organigrama') {
      //  include_once("../Vista/ModuloConsultor/organigrama.php");
    //}
    if ($_GET['menu'] == 'agregarClienteAva') {
        include_once("../Vista/ModuloConsultor/agregarClienteAva.php");
    }
    if ($_GET['menu'] == 'agregarClienteSuca') {
        include_once("../Vista/ModuloConsultor/agregarClienteSUCAFINA.php");
    }
    if ($_GET['menu'] == 'agregarClienteItges') {
        include_once("../Vista/ModuloConsultor/agregarClienteItges.php");
    }
    if ($_GET['menu'] == 'copyReporte') {
        include_once("../Vista/ModuloConsultor/copyReporte.php");
    }
    if ($_GET['menu'] == 'agregarClienteIce') {
        include_once("../Vista/ModuloConsultor/agregarClienteIce.php");
    }
} else {
    include_once("../Vista/ModuloConsultor/index.php");
}
?>