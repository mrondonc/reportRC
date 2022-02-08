<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoSub_mod_sap::setConexionBD($conexion);

$sub_mod_sap = new Sub_mod_sap();
//$cod_mod_sap = [0];
$nombre_mod_sap = $_POST['modSapNew'];


//$mod_sap->setCod_mod_sap($cod_mod_sap);
$sub_mod_sap->setNombre_sub_mod_sap($nombre_mod_sap);
$sub_mod_sap->setCod_cliente_partner(1);
$sub_mod_sap->setCod_estado_actual(1);

ManejoSub_mod_sap::createSub_mod_sap($sub_mod_sap);

echo '<script>
alert("Se ha agregado el Sub Módulo SAP Exitosamente")
window.location="../Administrador.php?menu=sub_mod_sap";
</script>';

?>