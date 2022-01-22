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
} else {
    include_once("../Vista/ModuloAdmin/index.php");
}
?>