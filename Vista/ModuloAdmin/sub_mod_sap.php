<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_actual.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoEstado_actual.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoMod_sap::setConexionBD($conexion);
ManejoAdministrador::setConexionBD($conexion);
ManejoEstado_actual::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);

$cod_aministrador = $_SESSION['cod_administrador'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_aministrador);
//$mod_sap = ManejoMod_sap::getListActivo();
//$mod_sapI = ManejoMod_sap::getListInactivo();
$sub_mod_sap = ManejoSub_mod_sap::getListActivo();
$sub_mod_sapI = ManejoSub_mod_sap::getListInactivo();
?>

<!-- MODULOS ACTIVOS -->
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de los Sub Módulos SAP    <a type="button" rel="tooltip" title="Agregar Sub Módulo" class="btn btn-primary btn-link btn-sm"href="?menu=agregarSubModSap"><i style="font-size:18px;" class="fas fa-plus"></i></a> <!--<a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=2"><i style="font-size:40px;" class="fas fa-file-csv"></i></a>--></h4>
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Nombre Sub Módulo SAP</th>
                <th style="font-size: small;">Estado Actual</th>
                <th style="font-size: small;">Acciones</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($sub_mod_sap) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $sub_mod_sap[$i]->getNombre_sub_mod_sap();?> </td>
                    <td style="font-size: small;"><?php echo ManejoEstado_actual::consultarEstado_actual($sub_mod_sap[$i]->getCod_estado_actual())->getNombre_estado();?></td>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editSubModSap&cod_sub_mod_sap=<?php echo $sub_mod_sap[$i]->getCod_sub_mod_sap();?>"><i class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_mod_sap=<?php echo $sub_mod_sap[$i]->getCod_sub_mod_sap();?>&action=delete&id=2"><i class="material-icons">close</i></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- MODULOS INACTIVOS -->
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de los Módulos SAP Inactivos</h4>
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Nombre Módulo SAP</th>
                <th style="font-size: small;">Estado Actúal</th>
                <th style="font-size: small;">Acciones</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($sub_mod_sapI) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $sub_mod_sapI[$i]->getNombre_sub_mod_sap();?> </td>
                    <td style="font-size: small;"><?php echo ManejoEstado_actual::consultarEstado_actual($sub_mod_sapI[$i]->getCod_estado_actual())->getNombre_estado();?></td>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editSubModSap&cod_sub_mod_sap=<?php echo $sub_mod_sap[$i]->getCod_sub_mod_sap();?>"><i class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_mod_sap=<?php echo $sub_mod_sapI[$i]->getCod_sub_mod_sap();?>&action=Activar&id=2"><i style="font-size:18px;" class="far fa-thumbs-up"></i></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>


<script src="https://kit.fontawesome.com/d82eacb9bb.js" crossorigin="anonymous"></script>