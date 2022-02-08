<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoEstado_cliente_partner.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente_partner::setConexionBD($conexion);
ManejoAdministrador::setConexionBD($conexion);
ManejoEstado_cliente_partner::setConexionBD($conexion);
$cod_aministrador = $_SESSION['cod_administrador'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_aministrador);
$cliente = ManejoCliente_partner::getListActivo();
$clienteI = ManejoCliente_partner::getListInactivo();

?>

<!-- USUARIOS ACTIVOS -->
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Clientes    <a type="button" rel="tooltip" title="Agregar Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarCliente"><i style="font-size:18px;" class="fas fa-plus"></i></a> <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=2"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></h4>
               
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Nombre Cliente</th>
                <th style="font-size: small;">Sub Clientes</th>
                <th style="font-size: small;">Estado Actual</th>
                <th style="font-size: small;">Acciones</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($cliente) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $cliente[$i]->getNombre_cliente_partner();?> </td>
                    <?php if($cliente[$i]->getCod_cliente_partner()== 1){?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $cliente[$i]->getCod_cliente_partner();?>">Visualizar Sub Clientes</a></td>
                    <?php   } else if($cliente[$i]->getCod_cliente_partner()== 2){ ?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $cliente[$i]->getCod_cliente_partner();?>">Visualizar Sub Clientes</a></td>
                    <?php   } else if($cliente[$i]->getCod_cliente_partner()== 4){ ?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $cliente[$i]->getCod_cliente_partner();?>">Visualizar Sub Clientes</a></td>
                    <?php   } else if($cliente[$i]->getCod_cliente_partner()== 10){ ?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $cliente[$i]->getCod_cliente_partner();?>">Visualizar Sub Clientes</a></td>
                    <?php   } else if($cliente[$i]->getCod_cliente_partner()== 11){ ?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $cliente[$i]->getCod_cliente_partner();?>">Visualizar Sub Clientes</a></td>
                    <?php   } else if($cliente[$i]->getCod_cliente_partner()== 6){ ?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $cliente[$i]->getCod_cliente_partner();?>">Visualizar PEP Clientes</a></td>
                    <?php   } else { ?>
                        <td style="font-size: small;"><a rel="tooltip" title="No posee sub clientes">Visualizar Sub Clientes</a></td>
                    <?php }  ?>
                    <td style="font-size: small;"><?php echo ManejoEstado_cliente_partner::consultarEstado_cliente_partner($cliente[$i]->getCod_estado_cliente_partner())->getNombre_estado();?></td>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editCliente&cod_cliente_partner=<?php echo $cliente[$i]->getCod_cliente_partner();?>"><i class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_cliente_partner=<?php echo $cliente[$i]->getCod_cliente_partner();?>&action=delete&id=3"><i class="material-icons">close</i></a>
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
                <h4 class="card-title ">Listado Total de Clientes Inactivos</h4>
               
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Nombre Cliente</th>
                <th style="font-size: small;">Sub Clientes</th>
                <th style="font-size: small;">Estado Actual</th>
                <th style="font-size: small;">Acciones</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($clienteI) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $clienteI[$i]->getNombre_cliente_partner();?></td>
                    <?php if($clienteI[$i]->getCod_cliente_partner()== 1){?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $clienteI[$i]->getCod_cliente_partner();?>">Visualizar Sub Clientes</a></td>
                    <?php   } else if($clienteI[$i]->getCod_cliente_partner()== 2){ ?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $clienteI[$i]->getCod_cliente_partner();?>">Visualizar Sub Clientes</a></td>
                    <?php   } else if($clienteI[$i]->getCod_cliente_partner()== 4){ ?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $clienteI[$i]->getCod_cliente_partner();?>">Visualizar Sub Clientes</a></td>
                    <?php   } else if($clienteI[$i]->getCod_cliente_partner()== 10){ ?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $clienteI[$i]->getCod_cliente_partner();?>">Visualizar Sub Clientes</a></td>
                    <?php   } else if($clienteI[$i]->getCod_cliente_partner()== 11){ ?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $clienteI[$i]->getCod_cliente_partner();?>">Visualizar Sub Clientes</a></td>
                    <?php   } else if($clienteI[$i]->getCod_cliente_partner()== 6){ ?>
                        <td style="font-size: small;"><a href="?menu=subClientes&cod_cliente_partner=<?php echo $clienteI[$i]->getCod_cliente_partner();?>">Visualizar PEP Clientes</a></td>
                    <?php   } else { ?>
                        <td style="font-size: small;"><a rel="tooltip" title="No posee sub clientes">Visualizar Sub Clientes</a></td>
                    <?php }  ?>
                    <td style="font-size: small;"><?php echo $clienteI[$i]->getCod_estado_cliente_partner();?></td>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editCliente&cod_cliente_partner=<?php echo $clienteI[$i]->getCod_cliente_partner();?>"><i class="material-icons">edit</i></a>
                        <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_cliente_partner=<?php echo $clienteI[$i]->getCod_cliente_partner();?>&action=Activar&id=3"><i style="font-size:18px;" class="far fa-thumbs-up"></i></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>


<script src="https://kit.fontawesome.com/d82eacb9bb.js" crossorigin="anonymous"></script>