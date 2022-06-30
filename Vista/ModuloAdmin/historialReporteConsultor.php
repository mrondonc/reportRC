<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoEstado_usuario.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoEstado_usuario::setConexionBD($conexion);
ManejoAdministrador::setConexionBD($conexion);

$cod_administrador = $_SESSION['cod_administrador'];
$admin = ManejoAdministrador::consultarAdministrador($cod_administrador);

$consultores = ManejoUsuario::getListOrdenNombre();
$consultoresI = ManejoUsuario::getListOrdenNombreI();
?>

<!-- USUARIOS ACTIVOS -->
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Reportes por Consultores </h4>
               
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Usuario</th>
                <th style="font-size: small;">Nombre y Apellido</th>
                <th style="font-size: small;">Reporte</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($consultores) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $consultores[$i]->getUsuario_login();?></td>
                    <td style="font-size: small;"><?php echo $consultores[$i]->getNombre_usuario();?> <?php echo $consultores[$i]->getApellido_usuario();?></td>
                    <td style="font-size: small;"><a href="?menu=historialReporteConsultores&cod_usuario=<?php echo $consultores[$i]->getCod_usuario();?>">Visualizar Reporte</a></td>  
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- USUARIOS INACTIVOS -->
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total Reporte por Consultores Inactivos</h4>
                
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Usuario</th>
                <th style="font-size: small;">Nombre y Apellido</th>
                <th style="font-size: small;">Reporte</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($consultoresI) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $consultoresI[$i]->getUsuario_login();?></td>
                    <td style="font-size: small;"><?php echo $consultoresI[$i]->getNombre_usuario();?> <?php echo $consultoresI[$i]->getApellido_usuario();?></td>
                    <td style="font-size: small;"><a href="?menu=historialReporteConsultores&cod_usuario=<?php echo $consultoresI[$i]->getCod_usuario();?>">Visualizar Reporte</a></td>  
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/d82eacb9bb.js" crossorigin="anonymous"></script>