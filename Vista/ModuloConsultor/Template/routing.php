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
    if ($_GET['menu'] == 'agregarNoTicketAxity') {
        include_once("../Vista/ModuloConsultor/agregarNoTicketAxity.php");
    }
    if ($_GET['menu'] == 'editReporte') {
        include_once("../Vista/ModuloConsultor/editReporte.php");
    }
    //if ($_GET['menu'] == 'organigrama') {
      //  include_once("../Vista/ModuloConsultor/organigrama.php");
    //}
} else {
    include_once("../Vista/ModuloConsultor/index.php");
}
?>