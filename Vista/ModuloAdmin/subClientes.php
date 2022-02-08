<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente_partner::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);
ManejoAdministrador::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);

$cod_aministrador = $_SESSION['cod_administrador'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_aministrador);
$cod_cliente_partner = $_GET['cod_cliente_partner'];
$cliente = ManejoCliente_partner::getList();
$subClienteA = ManejoSub_cliente_partner::getListAxity();
$subClienteE = ManejoSub_cliente_partner::getListEveris(); // NTT DATA
$subClienteM = ManejoSub_cliente_partner::getListMillo();
$subClienteL = ManejoSub_cliente_partner::getListLucta();
$subClienteP = ManejoSub_cliente_partner::getListPraxis();
$subClienteS = ManejoSub_cliente_partner::getListSeidor();
$subClienteI = ManejoSub_cliente_partner::getListInterno();
$subClienteITGES = ManejoSub_cliente_partner::getListItges();
$subClienteAVA = ManejoSub_cliente_partner::getListAVA();
$pepSeidor = ManejoPep_cliente::getListSeidor();
?>

<!-- SUB CLIENTES AXITY -->
<?php if($cod_cliente_partner==1) { ?>
    <div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Sub Clientes Axity   <a type="button" rel="tooltip" title="Agregar Sub Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarSubCliente&cod_cliente_partner=1"><i style="font-size:20px;" class="fas fa-plus"></i></a> <a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=3"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></h4>
               
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
                        <?php if($subClienteA[$i]->getCod_estado_actual()==1){ ?>
                            <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_cliente_partner=<?php echo $subClienteA[$i]->getCod_sub_cliente_partner();?>&action=delete&id=4"><i class="material-icons">close</i></a>
                        <?php }else if($subClienteA[$i]->getCod_estado_actual()==2){ ?>
                            <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_cliente_partner=<?php echo $subClienteA[$i]->getCod_sub_cliente_partner();?>&action=Activar&id=4"><i style="font-size:18px;" class="far fa-thumbs-up"></i></a>
                        <?php }?>
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
                <h4 class="card-title ">Listado Total de Sub Clientes NTT DATA   <a type="button" rel="tooltip" title="Agregar Sub Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarSubCliente&cod_cliente_partner=2"><i style="font-size:18px;" class="fas fa-plus"></i></a><a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=4"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></h4>
               
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
                        <?php if($subClienteE[$i]->getCod_estado_actual()==1){ ?>
                            <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_cliente_partner=<?php echo $subClienteE[$i]->getCod_sub_cliente_partner();?>&action=delete&id=4"><i class="material-icons">close</i></a>
                        <?php }else if($subClienteE[$i]->getCod_estado_actual()==2){ ?>
                            <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_cliente_partner=<?php echo $subClienteE[$i]->getCod_sub_cliente_partner();?>&action=Activar&id=4"><i style="font-size:18px;" class="far fa-thumbs-up"></i></a>
                        <?php }?>
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
                <h4 class="card-title ">Listado Total de Sub Clientes Millo   <a type="button" rel="tooltip" title="Agregar Sub Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarSubCliente&cod_cliente_partner=4"><i style="font-size:18px;" class="fas fa-plus"></i></a><a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=5"><i style="font-size:40px;" class="fas fa-file-csv"></i></a></h4>
               
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
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editSubCliente&cod_sub_cliente_partner=<?php echo $subClienteM[$i]->getCod_sub_cliente_partner();?>"><i class="material-icons">edit</i></a>
                        <?php if($subClienteM[$i]->getCod_estado_actual()==1){ ?>
                            <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_cliente_partner=<?php echo $subClienteM[$i]->getCod_sub_cliente_partner();?>&action=delete&id=4"><i class="material-icons">close</i></a>
                        <?php }else if($subClienteM[$i]->getCod_estado_actual()==2){ ?>
                            <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_cliente_partner=<?php echo $subClienteM[$i]->getCod_sub_cliente_partner();?>&action=Activar&id=4"><i style="font-size:18px;" class="far fa-thumbs-up"></i></a>
                        <?php }?>
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
<?php } else if($cod_cliente_partner==6) { ?>
    <div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de PEP Seidor   <a type="button" rel="tooltip" title="Agregar PEP Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarPepCliente2"><i style="font-size:18px;" class="fas fa-plus"></i></a><!--<a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=5"><i style="font-size:40px;" class="fas fa-file-csv"></i></a>--></h4>
               
            </div>
        </div>             
    </div>
    <div class="card-body">
        <div class="table-responsive" >
        <table class="table" style="text-align: center;" >
            <thead class="text-warning">
                <th style="font-size: small;">Nombre PEP Cliente</th>
                <th style="font-size: small;">Acciones</th>
            </thead>
            <tbody style="text-align: center;">
            <?php for ($i=0; $i <count($pepSeidor) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $pepSeidor[$i]->getReferencia_pep_cliente();?> </td>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editPep&cod_pep_cliente=<?php echo $pepSeidor[$i]->getCod_pep_cliente();?>"><i class="material-icons">edit</i></a>
                        <?php if($pepSeidor[$i]->getCod_estado_actual()==1){ ?>
                            <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_pep_cliente=<?php echo $pepSeidor[$i]->getCod_pep_cliente();?>&action=delete&id=5"><i class="material-icons">close</i></a>
                        <?php }else if($pepSeidor[$i]->getCod_estado_actual()==2){ ?>
                            <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_pep_cliente=<?php echo $pepSeidor[$i]->getCod_pep_cliente();?>&action=Activar&id=5"><i style="font-size:18px;" class="far fa-thumbs-up"></i></a>
                        <?php }?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
    
<!-- SUB CLIENTES INTERNO DE RC -->

<!-- SUB CLIENTES ITGES -->
<?php } else if($cod_cliente_partner==10) { ?>
    <div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Clientes Finales ITGES   <a type="button" rel="tooltip" title="Agregar Sub Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarSubCliente&cod_cliente_partner=10"><i style="font-size:18px;" class="fas fa-plus"></i></a><!--<a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=5"><i style="font-size:40px;" class="fas fa-file-csv"></i></a>--></h4>
               
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
            <?php for ($i=0; $i <count($subClienteITGES) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $subClienteITGES[$i]->getNombre_sub_cliente_partner();?> </td>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editSubCliente&cod_sub_cliente_partner=<?php echo $subClienteITGES[$i]->getCod_sub_cliente_partner();?>"><i class="material-icons">edit</i></a>
                        <?php if($subClienteITGES[$i]->getCod_estado_actual()==1){ ?>
                            <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_cliente_partner=<?php echo $subClienteITGES[$i]->getCod_sub_cliente_partner();?>&action=delete&id=4"><i class="material-icons">close</i></a>
                        <?php }else if($subClienteITGES[$i]->getCod_estado_actual()==2){ ?>
                            <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_cliente_partner=<?php echo $subClienteITGES[$i]->getCod_sub_cliente_partner();?>&action=Activar&id=4"><i style="font-size:18px;" class="far fa-thumbs-up"></i></a>
                        <?php }?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
        </div>
    </div>

    <!-- SUB CLIENTES AVA CONSULTING -->
<?php } else if($cod_cliente_partner==11) { ?>
    <div class="card">
    <div class="card-header card-header-tabs card-header-primary">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <h4 class="card-title ">Listado Total de Clientes Finales AVA CONSULTING   <a type="button" rel="tooltip" title="Agregar Sub Cliente" class="btn btn-primary btn-link btn-sm"href="?menu=agregarSubCliente&cod_cliente_partner=11"><i style="font-size:18px;" class="fas fa-plus"></i></a><!--<a style="text-align: right;" type="button" rel="tooltip" title="Descargar" class="btn btn-primary btn-link btn-sm" href="../Vista/exportExcelAdmin.php?cod_administrador=<?php echo $administrador->getCod_administrador();?>&id=5"><i style="font-size:40px;" class="fas fa-file-csv"></i></a>--></h4>
               
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
            <?php for ($i=0; $i <count($subClienteAVA) ; $i++) {    
                    ?>
                <tr>
                    <td style="font-size: small;"><?php echo $subClienteAVA[$i]->getNombre_sub_cliente_partner();?> </td>
                    <td class="td-actions text-center">
                        <a type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm" href="?menu=editSubCliente&cod_sub_cliente_partner=<?php echo $subClienteAVA[$i]->getCod_sub_cliente_partner();?>"><i class="material-icons">edit</i></a>
                        <?php if($subClienteAVA[$i]->getCod_estado_actual()==1){ ?>
                            <a type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_cliente_partner=<?php echo $subClienteAVA[$i]->getCod_sub_cliente_partner();?>&action=delete&id=4"><i class="material-icons">close</i></a>
                        <?php }else if($subClienteAVA[$i]->getCod_estado_actual()==2){ ?>
                            <a type="button" rel="tooltip" title="Activar" class="btn btn-primary btn-link btn-sm" href="ModuloAdmin/actionDelete.php?cod_sub_cliente_partner=<?php echo $subClienteAVA[$i]->getCod_sub_cliente_partner();?>&action=Activar&id=4"><i style="font-size:18px;" class="far fa-thumbs-up"></i></a>
                        <?php }?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
        </div>
    </div>

<?php } ?>




<script src="https://kit.fontawesome.com/d82eacb9bb.js" crossorigin="anonymous"></script>