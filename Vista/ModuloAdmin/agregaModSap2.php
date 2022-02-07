<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoMod_sap::setConexionBD($conexion);

$mod_sap = new Mod_sap();
//$cod_mod_sap = [0];
$nombre_mod_sap = $_POST['modSapNew'];


//$mod_sap->setCod_mod_sap($cod_mod_sap);
$mod_sap->setNombre_mod_sap($nombre_mod_sap);

ManejoMod_sap::createMod_sap($mod_sap);

echo '<script>
alert("Se ha agregado el Módulo SAP Exitosamente")
window.location="../Administrador.php?menu=reporte";
</script>';

?>