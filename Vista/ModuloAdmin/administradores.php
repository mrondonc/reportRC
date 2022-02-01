<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoEstado_usuario.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoEstado_usuario::setConexionBD($conexion);
ManejoAdministrador::setConexionBD($conexion);

$cod_administrador = $_SESSION['cod_administrador'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);

$administradores = ManejoAdministrador::getList();
?>

<!-- USUARIOS ACTIVOS -->
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Administradores   <?php if($administrador->getCod_administrador()==5){ ?> <a type="button" rel="tooltip" title="Agregar Administrador" class="btn btn-primary btn-link btn-sm"href="?menu=agregarAdministrador"><i style="font-size:18px;"  class="fas fa-user-plus"></i></a> <?php } ?></h4>
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Administrador</th>
                <th style="font-size: small;">Nombre y Apellido</th>
                <th style="font-size: small;">Estado del Administrador</th>
                <th style="font-size: small;">Detalle Administrador</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($administradores) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $administradores[$i]->getUsuario_login();?></td>
                    <td style="font-size: small;"><?php echo $administradores[$i]->getNombre_administrador();?></td>
                    <td style="font-size: small;"><?php echo ManejoEstado_usuario::consultarEstado_usuario($administradores[$i]->getCod_estado_usuario())->getNombre_estado_usuario();?></td>
                    <td style="font-size: small;"><a href="?menu=perfilAdministrador&cod_administrador=<?php echo $administradores[$i]->getCod_administrador();?>">PERFIL COMPLETO</a></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>


<script src="https://kit.fontawesome.com/d82eacb9bb.js" crossorigin="anonymous"></script>