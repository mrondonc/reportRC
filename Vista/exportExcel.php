<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoEstado_usuario.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoAdministrador::setConexionBD($conexion);
ManejoUsuario::setConexionBD($conexion);
ManejoReporte::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);
ManejoEstado_usuario::setConexionBD($conexion);

$cod_tipo_usuario  =  $_GET['cod_tipo_usuario'];
date_default_timezone_set('America/Bogota');
$fecha = date('d/m/y h:i:s A');
?>

<?php if($cod_tipo_usuario==1){ // EXCEL REPORTE DESDE EL CONSULTOR
    $cod_usuario  =  $_GET['cod_usuario'];
    $usuario = ManejoUsuario::consultarUsuario($cod_usuario);
    $nombreConsultor = $usuario->getNombre_usuario();
    $reportes = ManejoReporte::getListByUser($usuario->getCod_usuario()); 
    header('Content-Encoding: UTF-8');
    header('Content-Type: application/vnd.ms-excel; charset=utf-8');
    header("Content-Disposition: attachment; filename=ExcelConsultor_$nombreConsultor._$fecha.xls"); //Indica el nombre del archivo resultante
    header("Pragma: no-cache");
    header("Expires: 0");
    echo "\xEF\xBB\xBF"; // UTF-8 BOM
?>
    <h3 align="center">HISTORIAL REPORTE DE HORAS</h3>
    <table width="50%" border="1" align="center">
        <tr style="background-color: #0F344A; color:white;" align="center">
            <th style="width: 10%;">Fecha de Reporte</th>
            <th style="width: 10%;">Módulo SAP</th>
            <th style="width: 10%;">Cliente Partner</th>
            <th style="width: 10%;">Cliente Final</th>
            <th style="width: 10%;">Sub Módulo SAP</th>
            <th style="width: 10%;">Número de Ticket</th>
            <th style="width: 10%;">Nombre del PEP</th>
            <th style="width: 10%;">Descripción Actividad</th>
            <th style="width: 10%;">Horas Trabajadas</th>
            <th style="width: 10%;">Lugar de Trabajo</th>
            <th style="width: 10%;">Hora de Registro</th>
        </tr>
        <?php for ($i=0; $i <count($reportes) ; $i++) {    
                ?>
            <tr align="center">
                <td> <?php echo $reportes[$i]->getFecha_de_reporte();?> </td>
                <td ><?php echo ManejoMod_sap::consultarMod_sap($reportes[$i]->getCod_mod_sap())->getNombre_mod_sap();?> </td>
                <td ><?php echo ManejoCliente_partner::consultarCliente_partner($reportes[$i]->getCod_cliente_partner())->getNombre_cliente_partner();?></td>
                <td ><?php echo ManejoSub_cliente_partner::consultarSub_cliente_partner($reportes[$i]->getCod_sub_cliente_partner())->getNombre_sub_cliente_partner();?></td>
                <td ><?php echo ManejoSub_mod_sap::consultarSub_mod_sap($reportes[$i]->getCod_sub_mod_sap())->getNombre_sub_mod_sap();?></td>
                <td ><?php echo $reportes[$i]->getCod_no_ticket();?></td>
                <td ><?php echo ManejoPep_cliente::consultarPep_cliente($reportes[$i]->getCod_pep_cliente())->getReferencia_pep_cliente();?></td>
                <td ><?php echo $reportes[$i]->getDescripcion_actividad();?></td>
                <td ><?php echo $reportes[$i]->getHoras_trabajadas();?></td>
                <td ><?php echo $reportes[$i]->getLugar_de_trabajo();?></td>
                <td ><?php echo $reportes[$i]->getHora_de_registro();?></td>
            </tr>
            <?php } ?>
    
<?php }else if($cod_tipo_usuario==2){ $id = $_GET['id']; ?>
        <?php if($id==1){ // EXCEL PARA DESCARGAR LISTADO DE CONSULTORES
            $cod_administrador = $_GET['cod_administrador'];
            $administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);
            $usuarioAdministrador = $administrador->getUsuario_login();
            $consultores = ManejoUsuario::getListOrdenNombre();
            header('Content-Encoding: UTF-8');
            header('Content-Type: application/vnd.ms-excel; charset=utf-8');
            header("Content-Disposition: attachment; filename=ExcelAdministrador_$usuarioAdministrador._$fecha.xls"); //Indica el nombre del archivo resultante
            header("Pragma: no-cache");
            header("Expires: 0");
            echo "\xEF\xBB\xBF"; // UTF-8 BOM
        ?>
        <h3 align="center">LISTADO TOTAL DE CONSULTORES</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Usuario</th>
                <th style="width: 10%;">Nombre y Apellido</th>
                <th style="width: 10%;">Estado del Usuario</th>
            </tr>
            <?php for ($i=0; $i <count($consultores) ; $i++) {    
                ?>
            <tr align="center">
                <td ><?php echo $consultores[$i]->getUsuario_login();?></td>
                <td ><?php echo $consultores[$i]->getNombre_usuario();?> <?php echo $consultores[$i]->getApellido_usuario();?></td>
                <td ><?php echo ManejoEstado_usuario::consultarEstado_usuario($consultores[$i]->getCod_estado_usuario())->getNombre_estado_usuario();?></td>
            </tr>
            <?php } ?>

        <?php } if($id==2){ // EXCEL PARA DESCARGAR LISTADO DE CLIENTES PARTNER
            $cod_administrador = $_GET['cod_administrador'];
            $administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);
            $usuarioAdministrador = $administrador->getUsuario_login();
            $cliente = ManejoCliente_partner::getList();
            header('Content-Encoding: UTF-8');
            header('Content-Type: application/vnd.ms-excel; charset=utf-8');
            header("Content-Disposition: attachment; filename=ExcelAdministrador_$usuarioAdministrador._$fecha.xls"); //Indica el nombre del archivo resultante
            header("Pragma: no-cache");
            header("Expires: 0");
            echo "\xEF\xBB\xBF"; // UTF-8 BOM
        ?>
        <h3 align="center">LISTADO TOTAL DE CLIENTES PARTNER</h3>
        <table width="50%" border="1" align="center">
            <tr style="background-color: #0F344A; color:white;" align="center">
                <th style="width: 10%;">Nombre del cliente partner</th>
            </tr>
            <?php for ($i=0; $i <count($cliente) ; $i++) { 
                ?>
            <tr align="center">
                <td ><?php echo $cliente[$i]->getNombre_cliente_partner();?></td>
            </tr>
            <?php } ?>
        <?php } ?>
<?php }else{
        echo 'NO SE PUEDE DESCARGAR EL EXCEL, COMUNICARSE CON EL ADMINISTRADOR';
    }?>
    </table>
  