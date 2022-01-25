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
    if ($_GET['menu'] == 'estadisticas') {
        include_once("../Vista/ModuloAdmin/estadisticas.php");
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
} else {
    include_once("../Vista/ModuloAdmin/index.php");
}
?>