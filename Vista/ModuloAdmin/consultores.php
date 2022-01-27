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
$administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);

$consultores = ManejoUsuario::getListOrdenNombre();
$consultoresI = ManejoUsuario::getListOrdenNombreI();
?>

<!-- USUARIOS ACTIVOS -->
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Consultores    <a type="button" rel="tooltip" title="Agregar Consultor" class="btn btn-primary btn-link btn-sm"href="?menu=agregarConsultor"><i style="font-size:18px;"  class="fas fa-user-plus"></i></a> <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcel.php?cod_tipo_usuario=<?php echo $administrador->getCod_tipo_usuario();?>&cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=1"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></h4>
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Usuario</th>
                <th style="font-size: small;">Nombre y Apellido</th>
                <th style="font-size: small;">Estado del Usuario</th>
                <th style="font-size: small;">Detalle Consultor</th>
                <th style="font-size: small;">Acciones</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($consultores) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $consultores[$i]->getUsuario_login();?></td>
                    <td style="font-size: small;"><?php echo $consultores[$i]->getNombre_usuario();?> <?php echo $consultores[$i]->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoEstado_usuario::consultarEstado_usuario($consultores[$i]->getCod_estado_usuario())->getNombre_estado_usuario();?></td>
                    <td style="font-size: small;"><a href="?menu=perfilConsultor&cod_usuario=<?php echo $consultores[$i]->getCod_usuario();?>">PERFIL COMPLETO</a></td>
                    <td class="td-actions text-center">
                        <?php
                            if($consultores[$i]->getCod_estado_usuario() == 2){ ?>
                                <a type="button" rel="tooltip" title="Desactivar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultores[$i]->getCod_usuario();?>&action=desactivar"><i style="font-size:18px;" class="fas fa-user-times"></i></a>
                                <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editConsultor&cod_usuario=<?php echo $consultores[$i]->getCod_usuario();?>"><i class="material-icons">edit</i></a>
                                <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultores[$i]->getCod_usuario();?>&action=delete"><i class="material-icons">close</i></a>
                            <?php } if($consultores[$i]->getCod_estado_usuario() == 4){ ?>
                                <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultores[$i]->getCod_usuario();?>&action=activar"><i style="font-size:18px;" class="fas fa-check-square"></i></a>
                                <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editConsultor&cod_usuario=<?php echo $consultores[$i]->getCod_usuario();?>"><i class="material-icons">edit</i></a>
                                <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultores[$i]->getCod_usuario();?>&action=delete"><i class="material-icons">close</i></a>
                          
                          <?php } if($consultores[$i]->getCod_estado_usuario() == 3){ ?>
                            <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultores[$i]->getCod_usuario();?>&action=activar"><i style="font-size:18px;" class="fas fa-user-check"></i></a>
                          <?php  } ?>
                    </td>
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
                <h4 class="card-title ">Listado Total de Consultores Inactivos</h4>
                
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Usuario</th>
                <th style="font-size: small;">Nombre y Apellido</th>
                <th style="font-size: small;">Estado del Usuario</th>
                <th style="font-size: small;">Detalle Consultor</th>
                <th style="font-size: small;">Acciones</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($consultoresI) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $consultoresI[$i]->getUsuario_login();?></td>
                    <td style="font-size: small;"><?php echo $consultoresI[$i]->getNombre_usuario();?> <?php echo $consultoresI[$i]->getApellido_usuario();?></td>
                    <td style="font-size: small;"><?php echo ManejoEstado_usuario::consultarEstado_usuario($consultoresI[$i]->getCod_estado_usuario())->getNombre_estado_usuario();?></td>
                    <td style="font-size: small;"><a href="?menu=perfilConsultor&cod_usuario=<?php echo $consultoresI[$i]->getCod_usuario();?>">PERFIL COMPLETO</a></td>
                    <td class="td-actions text-center">
                        <?php
                           
                           if($consultoresI[$i]->getCod_estado_usuario() == 3){ ?>
                            <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionUser.php?cod_usuario=<?php echo $consultoresI[$i]->getCod_usuario();?>&action=activar"><i style="font-size:18px;" class="fas fa-user-check"></i></a>
                          <?php  } ?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/d82eacb9bb.js" crossorigin="anonymous"></script>