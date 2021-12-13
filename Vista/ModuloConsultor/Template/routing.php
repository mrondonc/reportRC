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
} else {
    include_once("../Vista/ModuloConsultor/index.php");
}
?>