<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == 'index') {
        include_once("../Vista/ModuloAdmin/index.php");
    }
    if ($_GET['menu'] == 'consultores') {
        include_once("../Vista/ModuloAdmin/consultores.php");
    }
    if ($_GET['menu'] == 'miPerfil') {
        include_once("../Vista/ModuloAdmin/miPerfil.php");
    }
    if ($_GET['menu'] == 'reporte') {
        include_once("../Vista/ModuloAdmin/reporte.php");
    }
    if ($_GET['menu'] == 'historialReporte') {
        include_once("../Vista/ModuloAdmin/historialReporte.php");
    }
    if ($_GET['menu'] == 'historialReporteTotal') {
        include_once("../Vista/ModuloAdmin/historialReporteTotal.php");
    }
    if ($_GET['menu'] == 'historialReporteConsultor') {
        include_once("../Vista/ModuloAdmin/historialReporteConsultor.php");
    }
    if ($_GET['menu'] == 'historialReporteConsultores') {
        include_once("../Vista/ModuloAdmin/historialReporteConsultores.php");
    }
    if ($_GET['menu'] == 'historialReporteConsultoresNew') {
        include_once("../Vista/ModuloAdmin/historialReporteConsultoresNew.php");
    }
    if ($_GET['menu'] == 'historialReporteMensual') {
        include_once("../Vista/ModuloAdmin/historialReporteMensual.php");
    }
    if ($_GET['menu'] == 'historialReporteMensuales') {
        include_once("../Vista/ModuloAdmin/historialReporteMensuales.php");
    }
    if ($_GET['menu'] == 'editConsultor') {
        include_once("../Vista/ModuloAdmin/editConsultor.php");
    }
    if ($_GET['menu'] == 'perfilConsultor') {
        include_once("../Vista/ModuloAdmin/perfilConsultor.php");
    }
    if ($_GET['menu'] == 'editarPerfil') {
        include_once("../Vista/ModuloAdmin/editarPerfil.php");
    }
    if ($_GET['menu'] == 'agregarConsultor') {
        include_once("../Vista/ModuloAdmin/agregarConsultor.php");
    }
    if ($_GET['menu'] == 'clientes') {
        include_once("../Vista/ModuloAdmin/clientes.php");
    }
    if ($_GET['menu'] == 'editCliente') {
        include_once("../Vista/ModuloAdmin/editCliente.php");
    }
    if ($_GET['menu'] == 'agregarCliente') {
        include_once("../Vista/ModuloAdmin/agregarCliente.php");
    }
    if ($_GET['menu'] == 'subClientes') {
        include_once("../Vista/ModuloAdmin/subClientes.php");
    }
    if ($_GET['menu'] == 'agregarSubCliente') {
        include_once("../Vista/ModuloAdmin/agregarSubCliente.php");
    }
    if ($_GET['menu'] == 'editSubCliente') {
        include_once("../Vista/ModuloAdmin/editSubCliente.php");
    }
    if ($_GET['menu'] == 'agregarModSap') {
        include_once("../Vista/ModuloAdmin/agregarModSap.php");
    }
    if ($_GET['menu'] == 'agregarClienteAxity') {
        include_once("../Vista/ModuloAdmin/agregarClienteAxity.php");
    }
    if ($_GET['menu'] == 'agregarClienteEveris') {
        include_once("../Vista/ModuloAdmin/agregarClienteEveris.php");
    }
    if ($_GET['menu'] == 'agregarClienteSuca') {
        include_once("../Vista/ModuloAdmin/agregarClienteSuca.php");
    }
    if ($_GET['menu'] == 'agregarClienteMillo') {
        include_once("../Vista/ModuloAdmin/agregarClienteMillo.php");
    }
    if ($_GET['menu'] == 'agregarClienteIce') {
        include_once("../Vista/ModuloAdmin/agregarClienteIce.php");
    }
    if ($_GET['menu'] == 'agregarPepCliente') {
        include_once("../Vista/ModuloAdmin/agregarPepCliente.php");
    }
    if ($_GET['menu'] == 'editReporte') {
        include_once("../Vista/ModuloAdmin/editReporte.php");
    }
    if ($_GET['menu'] == 'administradores') {
        include_once("../Vista/ModuloAdmin/administradores.php");
    }
    if ($_GET['menu'] == 'perfilAdministrador') {
        include_once("../Vista/ModuloAdmin/perfilAdministrador.php");
    }
    if ($_GET['menu'] == 'agregarClienteAva') {
        include_once("../Vista/ModuloAdmin/agregarClienteAva.php");
    }
    if ($_GET['menu'] == 'agregarClienteItges') {
        include_once("../Vista/ModuloAdmin/agregarClienteItges.php");
    }
    if ($_GET['menu'] == 'agregarPepCliente2') {
        include_once("../Vista/ModuloAdmin/agregarPepCliente2.php");
    }
    if ($_GET['menu'] == 'editPep') {
        include_once("../Vista/ModuloAdmin/editPep.php");
    }
    if ($_GET['menu'] == 'agregarModSap2') {
        include_once("../Vista/ModuloAdmin/agregarModSap2.php");
    }
    if ($_GET['menu'] == 'agregarSubModSap') {
        include_once("../Vista/ModuloAdmin/agregarSubModSap.php");
    }
    if ($_GET['menu'] == 'mod_sap') {
        include_once("../Vista/ModuloAdmin/mod_sap.php");
    }
    if ($_GET['menu'] == 'editModSap') {
        include_once("../Vista/ModuloAdmin/editModSap.php");
    }
    if ($_GET['menu'] == 'sub_mod_sap') {
        include_once("../Vista/ModuloAdmin/sub_mod_sap.php");
    }
    if ($_GET['menu'] == 'editSubModSap') {
        include_once("../Vista/ModuloAdmin/editSubModSap.php");
    }
    if ($_GET['menu'] == 'copyReporte') {
        include_once("../Vista/ModuloAdmin/copyReporte.php");
    }
    if ($_GET['menu'] == 'modificarAdministrador') {
        include_once("../Vista/ModuloAdmin/modificarAdministrador.php");
    }
} else {
    include_once("../Vista/ModuloAdmin/index.php");
}
?>