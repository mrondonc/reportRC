<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();
ManejoSub_mod_sap::setConexionBD($conexion);

$cod_sub_mod_sap = $_GET['cod_sub_mod_sap'];
$sub_mod_sap = ManejoSub_mod_sap::consultarSub_mod_sap($cod_sub_mod_sap);

$nombre = $_POST['nombreMod'];

$sub_mod_sap->setCod_sub_mod_sap($cod_sub_mod_sap);
$sub_mod_sap->setNombre_sub_mod_sap($nombre);
$sub_mod_sap->setCod_cliente_partner($sub_mod_sap->getCod_cliente_partner());
$sub_mod_sap->setCod_estado_actual($sub_mod_sap->getCod_estado_actual());

ManejoSub_mod_sap::modifySub_mod_sap($sub_mod_sap);

echo '<script>
alert("Los datos del sub módulo se han modificado")
window.location="../Administrador.php?menu=sub_mod_sap";
</script>';
?>