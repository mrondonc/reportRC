<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente_partner::setConexionBD($conexion);

$cliente = ManejoCliente_partner::getList();
?>

<!-- USUARIOS ACTIVOS -->
<div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Clientes    <a type="button" rel="tooltip" title="Agregar Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarCliente"><i style="font-size:18px;" class="fas fa-plus"></i></a></h4>
               
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Nombre Cliente</th>
                <th style="font-size: small;">Sub Clientes</th>
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
                    <?php   } else { ?>
                        <td style="font-size: small;"><a rel="tooltip" title="No posee sub clientes">Visualizar Sub Clientes</a></td>
                    <?php }  ?>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editCliente&cod_cliente_partner=<?php echo $cliente[$i]->getCod_cliente_partner();?>"><i class="material-icons">edit</i></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
</div>


<script src="https://kit.fontawesome.com/d82eacb9bb.js" crossorigin="anonymous"></script>