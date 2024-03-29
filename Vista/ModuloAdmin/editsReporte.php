<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/No_ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoNo_ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();
date_default_timezone_set('America/Bogota');
ManejoUsuario::setConexionBD($conexion);
ManejoReporte::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);
ManejoNo_ticket::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);

    $idEditar = $_POST['idEditar'];
    $cod_usuario  =  $_POST['cod_usuario'];
    $cod_reporte = $_POST['cod_reporte'];
    $fecha_de_reporte = $_POST['fechaReporte'];
    
    $cod_cliente_partner = $_POST['cliente_partner'];
    $descripcion_actividad = $_POST['descripcionActividades'];
    $horas_trabajadas = $_POST['horasTrabajadas'];
    $lugar_de_trabajo= $_POST['lugarTrabajo'];
    $hora_de_registro = date('d-m-y h:i:s A');
    $cod_mod_sap = $_POST['mod_sap'];
    //$hora_de_registro = $_POST[''];
    //$cod_sub_cliente_partner = $_POST[''];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];
$reporte = ManejoReporte::consultarReporte($cod_reporte);

if($cod_cliente_partner==1){ //AXITY
    $cod_sub_cliente_partner = $_POST['clienteAxity'];
    $cod_no_ticket = $_POST['noTicket'];
    //$cod_pep_cliente = $_POST[''];
    $cod_sub_mod_sap = $_POST['modSapList'];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner($cod_sub_cliente_partner);
    $reporte->setCod_no_ticket($cod_no_ticket);
    $reporte->setCod_pep_cliente(47);
    $reporte->setCod_sub_mod_sap($cod_sub_mod_sap);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==2){ //EVERIS
    $cod_sub_cliente_partner = $_POST['clienteEveris'];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner($cod_sub_cliente_partner);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(48);
    $reporte->setCod_sub_mod_sap(9);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==3){ //LUCTA
     //$cod_sub_cliente_partner = $_POST[''];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner(0);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(49);
    $reporte->setCod_sub_mod_sap(10);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==4){//MILLO
    $cod_sub_cliente_partner = $_POST['clienteMillo'];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner($cod_sub_cliente_partner);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(50);
    $reporte->setCod_sub_mod_sap(11);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==5){ //PRAXIS
     //$cod_sub_cliente_partner = $_POST[''];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner(26);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(51);
    $reporte->setCod_sub_mod_sap(12);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==6){ //SEIDOR
    $cod_sub_cliente_partner = $_POST['pepCliente'];
    //$cod_no_ticket = $_POST[''];
    //$cod_pep_cliente = $_POST[''];
    //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner(27);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente($cod_sub_cliente_partner);
    $reporte->setCod_sub_mod_sap(13);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==7){ //INTERNO DE RC
    //$cod_sub_cliente_partner = $_POST[''];
   //$cod_no_ticket = $_POST[''];
   //$cod_pep_cliente = $_POST[''];
   //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner(28);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(52);
    $reporte->setCod_sub_mod_sap(14);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==10){ //ITGES
    $cod_sub_cliente_partner = $_POST['clienteItges'];
   //$cod_no_ticket = $_POST[''];
   //$cod_pep_cliente = $_POST[''];
   //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner($cod_sub_cliente_partner);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(55);
    $reporte->setCod_sub_mod_sap(15);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);

}if($cod_cliente_partner==11){ //AVA CONSULTING
    $cod_sub_cliente_partner = $_POST['clienteAVA'];
   //$cod_no_ticket = $_POST[''];
   //$cod_pep_cliente = $_POST[''];
   //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner($cod_sub_cliente_partner);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(56);
    $reporte->setCod_sub_mod_sap(16);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);
}if($cod_cliente_partner==12){ //ACTIONBYTE
    //$cod_sub_cliente_partner = $_POST['clienteAVA'];
   //$cod_no_ticket = $_POST[''];
   //$cod_pep_cliente = $_POST[''];
   //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner(68);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(82);
    $reporte->setCod_sub_mod_sap(18);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);
}if($cod_cliente_partner==13){ //SUCAFINA
    $cod_sub_cliente_partner = $_POST['clienteSuca'];
   //$cod_no_ticket = $_POST[''];
   //$cod_pep_cliente = $_POST[''];
   //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner($cod_sub_cliente_partner);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(82);
    $reporte->setCod_sub_mod_sap(18);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);
}if($cod_cliente_partner==15){ //ICE
    $cod_sub_cliente_partner = $_POST['clienteIce'];
   //$cod_no_ticket = $_POST[''];
   //$cod_pep_cliente = $_POST[''];
   //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner($cod_sub_cliente_partner);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(82);
    $reporte->setCod_sub_mod_sap(18);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);
}if($cod_cliente_partner==16){ //EVEDISA

   //$cod_no_ticket = $_POST[''];
   //$cod_pep_cliente = $_POST[''];
   //$cod_sub_mod_sap = $_POST[''];

    $reporte->setCod_reporte($cod_reporte);
    $reporte->setFecha_de_reporte($fecha_de_reporte);
    $reporte->setCod_usuario($cod_usuario);
    $reporte->setCod_cliente_partner($cod_cliente_partner);
    $reporte->setDescripcion_actividad($descripcion_actividad);
    $reporte->setHoras_trabajadas($horas_trabajadas);
    $reporte->setLugar_de_trabajo($lugar_de_trabajo);
    $reporte->setHora_de_registro($hora_de_registro);
    $reporte->setCod_sub_cliente_partner(68);
    $reporte->setCod_no_ticket(" ");
    $reporte->setCod_pep_cliente(82);
    $reporte->setCod_sub_mod_sap(18);
    $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::modifyReporte($reporte);
}
if($idEditar=="1"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteTotal";
    </script>';
//=======VUELVE A HISTORIAL REPORTE MENSUALES DEPENDIENDO EL MES=======
}else if($idEditar=="2"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=1";
    </script>';
}else if($idEditar=="3"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=2";
    </script>';
}else if($idEditar=="4"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=3";
    </script>';
}else if($idEditar=="5"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=4";
    </script>';
}else if($idEditar=="6"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=5";
    </script>';
}else if($idEditar=="7"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=6";
    </script>';
}else if($idEditar=="8"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=7";
    </script>';
}else if($idEditar=="9"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=8";
    </script>';
}else if($idEditar=="10"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=9";
    </script>';
}else if($idEditar=="11"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=10";
    </script>';
}else if($idEditar=="12"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=11";
    </script>';
}else if($idEditar=="13"){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteMensuales&id=12";
    </script>';

//=======VUELVE A HISTORIAL REPORTE POR CONSULTOR=======
}else if($idEditar==14){
    echo '<script>
    alert("Se ha modificado el Reporte de Horas Exitosamente")
    window.location="../Administrador.php?menu=historialReporteConsultores&cod_usuario='.$cod_usuario.'";
    </script>';
}

?>