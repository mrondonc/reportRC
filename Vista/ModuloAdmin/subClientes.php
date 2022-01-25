<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente_partner::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);

$cod_cliente_partner = $_GET['cod_cliente_partner'];
$cliente = ManejoCliente_partner::getList();
$subClienteA = ManejoSub_cliente_partner::getListAxity();
$subClienteE = ManejoSub_cliente_partner::getListEveris(); // NTT DATA
$subClienteM = ManejoSub_cliente_partner::getListMillo();
$subClienteL = ManejoSub_cliente_partner::getListLucta();
$subClienteP = ManejoSub_cliente_partner::getListPraxis();
$subClienteS = ManejoSub_cliente_partner::getListSeidor();
$subClienteI = ManejoSub_cliente_partner::getListInterno();
?>

<!-- SUB CLIENTES AXITY -->
<?php if($cod_cliente_partner==1) { ?>
    <div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Sub Clientes Axity   <a type="button" rel="tooltip" title="Agregar Sub Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarSubCliente&cod_cliente_partner=1"><i style="font-size:18px;" class="fas fa-plus"></i></a></h4>
               
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Nombre Sub Cliente</th>
                <th style="font-size: small;">Acciones</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($subClienteA) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $subClienteA[$i]->getNombre_sub_cliente_partner();?> </td>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editSubCliente&cod_sub_cliente_partner=<?php echo $subClienteA[$i]->getCod_sub_cliente_partner();?>"><i class="material-icons">edit</i></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
<!-- SUB CLIENTES NTT DATA -->
<?php } else if($cod_cliente_partner==2) { ?>
    <div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Sub Clientes NTT DATA   <a type="button" rel="tooltip" title="Agregar Sub Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarSubCliente&cod_cliente_partner=2"><i style="font-size:18px;" class="fas fa-plus"></i></a></h4>
               
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Nombre Sub Cliente</th>
                <th style="font-size: small;">Acciones</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($subClienteE) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $subClienteE[$i]->getNombre_sub_cliente_partner();?> </td>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editSubCliente&cod_sub_cliente_partner=<?php echo $subClienteE[$i]->getCod_sub_cliente_partner();?>"><i class="material-icons">edit</i></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
<!-- SUB CLIENTES LUCTA -->

<!-- SUB CLIENTES MILLO -->
<?php } else if($cod_cliente_partner==4) { ?>
    <div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Sub Clientes Millo   <a type="button" rel="tooltip" title="Agregar Sub Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarSubCliente&cod_cliente_partner=4"><i style="font-size:18px;" class="fas fa-plus"></i></a></h4>
               
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Nombre Sub Cliente</th>
                <th style="font-size: small;">Acciones</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($subClienteM) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $subClienteM[$i]->getNombre_sub_cliente_partner();?> </td>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editSubCliente&cod_sub_cliente_partner=<?php echo $subClienteA[$i]->getCod_sub_cliente_partner();?>"><i class="material-icons">edit</i></a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
<!-- SUB CLIENTES PRAXIS -->

    
<!-- SUB CLIENTES SEIDOR -->

    
<!-- SUB CLIENTES INTERNO DE RC -->

    
<?php } ?>




<script src="https://kit.fontawesome.com/d82eacb9bb.js" crossorigin="anonymous"></script>