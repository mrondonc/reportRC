<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/No_ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoNo_ticket.php';
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
ManejoNo_ticket::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);

$cod_usuario  =  $_SESSION['cod_usuario'];
$cod_reporte = $_GET['cod_reporte'];
$action = $_GET["action"];
$idEliminar = $_GET['idEliminar'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);

$reporte = ManejoReporte::consultarReporte($cod_reporte);


if ($action=="delete"){    
    ManejoReporte::deleteReporte($reporte->getCod_reporte());
}

//=======VUELVE A HISTORIAL REPORTE MENSUALES DEPENDIENDO EL MES=======
if($idEliminar=="2"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=1";
    </script>';
}else if($idEliminar=="3"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=2";
    </script>';
}else if($idEliminar=="4"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=3";
    </script>';
}else if($idEliminar=="5"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=4";
    </script>';
}else if($idEliminar=="6"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=5";
    </script>';
}else if($idEliminar=="7"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=6";
    </script>';
}else if($idEliminar=="8"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=7";
    </script>';
}else if($idEliminar=="9"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=8";
    </script>';
}else if($idEliminar=="10"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=9";
    </script>';
}else if($idEliminar=="11"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=10";
    </script>';
}else if($idEliminar=="12"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=11";
    </script>';
}else if($idEliminar=="13"){
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporteMensuales&id=12";
    </script>';
}else{
    echo '<script>
    alert("Se ha elimando el reporte")
    window.location="../Consultor.php?menu=historialReporte";
    </script>';
}

?>