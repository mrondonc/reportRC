<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoMod_sap::setConexionBD($conexion);

$cod_mod_sap = $_GET['cod_mod_sap'];
$mod_sap = ManejoMod_sap::consultarMod_sap($cod_mod_sap);

$nombre = $_POST['nombreMod'];

$mod_sap->setCod_mod_sap($cod_mod_sap);
$mod_sap->setNombre_mod_sap($nombre);
$mod_sap->setCod_estado_actual($mod_sap->getCod_estado_actual());

ManejoMod_sap::modifyMod_sap($mod_sap);

echo '<script>
alert("Los datos del módulo se han modificado")
window.location="../Administrador.php?menu=mod_sap";
</script>';
?>