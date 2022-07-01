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
//require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/No_ticket.php';
//require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoNo_ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoReporte::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);
//ManejoNo_ticket::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);

// Set the new timezone
date_default_timezone_set('America/Bogota');

//------CREAR REGISTRO EN LA TABLA REPORTE------
$reporte = new Reporte();
//$cod_reporte = [0];
$fecha_de_reporte = $_POST['fechaReporte'];

$cod_usuario = $_SESSION['cod_usuario'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);

$cod_cliente_partner = $_POST['cliente_partner'];
$descripcion_actividad = $_POST['descripcionActividades'];
$horas_trabajadas = $_POST['horasTrabajadas'];
$lugar_de_trabajo = $_POST['lugarTrabajo'];
$fechaValidacion = date('d h:i A');
$hora_de_registro = date('d/m/y h:i:s A');
$cod_mod_sap = $_POST['mod_sap'];

//$reporte->setCod_reporte($cod_reporte);

//---------CREAR REGISTRO EN LA TABLA REPORTE----------
if($cod_cliente_partner == 1 ){
    if(/**$fechaValidacion >= '32 00:00 PM' && $fechaValidacion <= '32 00:00 PM'*/ ($fechaValidacion >= '27 05:00 PM' && $fechaValidacion <= '27 11:59 PM' )){
        echo '<script>
            alert("NO PUEDE REGISTRAR HORAS DE AXITY, COMUNICARSE CON EL ADMINISTRADOR.")
            window.location="../Consultor.php?menu=reporteHoras";
            </script>';
    }else{
        $sub_cliente_partnerA = $_POST['clienteAxity'];
        $sub_mod_sap = $_POST['modSapList'];
        $noTicket = $_POST['noTicket'];
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $reporte->setCod_sub_cliente_partner($sub_cliente_partnerA);
        $reporte->setCod_no_ticket($noTicket);
        $reporte->setCod_pep_cliente(47);// cod 47 pertenece AXITY RESULTADO 'NADA' 
        $reporte->setCod_sub_mod_sap($sub_mod_sap);
        $reporte->setCod_mod_sap($cod_mod_sap);
        ManejoReporte::createReporte($reporte);
    }
}else if($cod_cliente_partner == 2){//EVERIS
    if($fechaValidacion >= '32 00:00 PM' && $fechaValidacion <= '32 00:00 PM'  ($fechaValidacion >= '30 06:00 PM' && $fechaValidacion <= '30 11:59 PM' ) || ($fechaValidacion >= '31 06:00 PM' && $fechaValidacion <= '31 11:59 PM' )){
        echo '<script>
        alert("NO PUEDE REGISTRAR HORAS DE NTT DATA, COMUNICARSE CON EL ADMINISTRADOR.")
        window.location="../Consultor.php?menu=reporteHoras";
        </script>';
    }else{
        $sub_cliente_partnerE= $_POST['clienteEveris'];
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $reporte->setCod_sub_cliente_partner($sub_cliente_partnerE);
        $reporte->setCod_no_ticket(" ");
        $reporte->setCod_pep_cliente(48); // cod 48 pertenece EVERIS RESULTADO 'NADA'
        $reporte->setCod_sub_mod_sap(9); // cod 9 pertenece EVERIS RESULTADO 'NADA'
        $reporte->setCod_mod_sap($cod_mod_sap);
        ManejoReporte::createReporte($reporte);
    }
    
}else if($cod_cliente_partner == 3){//LUCTA
    if(/**$fechaValidacion >= '32 00:00 PM' && $fechaValidacion <= '32 00:00 PM'*/  ($fechaValidacion >= '30 06:00 PM' && $fechaValidacion <= '30 11:59 PM' ) || ($fechaValidacion >= '31 06:00 PM' && $fechaValidacion <= '31 11:59 PM' )){
        echo '<script>
        alert("NO PUEDE REGISTRAR HORAS DE LUCTA, COMUNICARSE CON EL ADMINISTRADOR.")
        window.location="../Consultor.php?menu=reporteHoras";
        </script>';
    }else{
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $reporte->setCod_sub_cliente_partner(0); // cod 0 pertenece LUCTA RESULTADO 'NADA'
        $reporte->setCod_no_ticket(" "); 
        $reporte->setCod_pep_cliente(49);// cod 49 pertenece LUCTA RESULTADO 'NADA'
        $reporte->setCod_sub_mod_sap(10); // cod 10 pertenece LUCTA RESULTADO 'NADA'
        $reporte->setCod_mod_sap($cod_mod_sap);
    ManejoReporte::createReporte($reporte);
    }
}else if($cod_cliente_partner == 4){//MILLO
    if(($fechaValidacion >= '30 06:00 PM' && $fechaValidacion <= '30 11:59 PM' ) || ($fechaValidacion >= '31 06:00 PM' && $fechaValidacion <= '31 11:59 PM' )){
        echo '<script>
        alert("NO PUEDE REGISTRAR HORAS DE MILLO, COMUNICARSE CON EL ADMINISTRADOR.")
        window.location="../Consultor.php?menu=reporteHoras";
        </script>';
    }else{
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $sub_cliente_partnerM= $_POST['clienteMillo'];
        $reporte->setCod_sub_cliente_partner($sub_cliente_partnerM);
        $reporte->setCod_no_ticket(" ");
        $reporte->setCod_pep_cliente(50);// cod 50 pertenece MILLO RESULTADO 'NADA'
        $reporte->setCod_sub_mod_sap(11); // cod 11 pertenece MILLO RESULTADO 'NADA'
        $reporte->setCod_mod_sap($cod_mod_sap);
        ManejoReporte::createReporte($reporte);
    }
}else if($cod_cliente_partner == 5){//PRAXIS
    if(($fechaValidacion >= '30 06:00 PM' && $fechaValidacion <= '30 11:59 PM' ) || ($fechaValidacion >= '31 06:00 PM' && $fechaValidacion <= '31 11:59 PM' )){
        echo '<script>
        alert("NO PUEDE REGISTRAR HORAS DE PRAXIS, COMUNICARSE CON EL ADMINISTRADOR.")
        window.location="../Consultor.php?menu=reporteHoras";
        </script>';
    }else{
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $reporte->setCod_sub_cliente_partner(26); // cod 26 pertenece PRAXIS RESULTADO 'NADA'
        $reporte->setCod_no_ticket(" ");
        $reporte->setCod_pep_cliente(51); // cod 51 pertenece PRAXIS RESULTADO 'NADA'
        $reporte->setCod_sub_mod_sap(12); // cod 12 pertenece PRAXIS RESULTADO 'NADA'
        $reporte->setCod_mod_sap($cod_mod_sap);
        ManejoReporte::createReporte($reporte);
    }
}else if($cod_cliente_partner == 6){//SEIDOR
    if(($fechaValidacion >= '30 06:00 PM' && $fechaValidacion <= '30 11:59 PM' ) || ($fechaValidacion >= '31 06:00 PM' && $fechaValidacion <= '31 11:59 PM' )){
        echo '<script>
        alert("NO PUEDE REGISTRAR HORAS DE SEIDOR, COMUNICARSE CON EL ADMINISTRADOR.")
        window.location="../Consultor.php?menu=reporteHoras";
        </script>';
    }else{
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $pep_cliente = $_POST['pepCliente'];
        $reporte->setCod_sub_cliente_partner(27); // cod 27 pertenece SEIDOR RESULTADO 'NADA'
        $reporte->setCod_no_ticket(" ");
        $reporte->setCod_pep_cliente($pep_cliente);
        $reporte->setCod_sub_mod_sap(13);  // cod 13 pertenece SEIDOR RESULTADO 'NADA'
        $reporte->setCod_mod_sap($cod_mod_sap);
        ManejoReporte::createReporte($reporte);
    }
}else if($cod_cliente_partner == 7){//INTERNO RC
    if(($fechaValidacion >= '30 06:00 PM' && $fechaValidacion <= '30 11:59 PM' ) || ($fechaValidacion >= '31 06:00 PM' && $fechaValidacion <= '31 11:59 PM' )){
        echo '<script>
        alert("NO PUEDE REGISTRAR HORAS DE INTERNO RC, COMUNICARSE CON EL ADMINISTRADOR.")
        window.location="../Consultor.php?menu=reporteHoras";
        </script>';
        
    }else {
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $reporte->setCod_sub_cliente_partner(28); // cod 28 pertenece INTERNO RC RESULTADO 'NADA'
        $reporte->setCod_no_ticket(" ");
        $reporte->setCod_pep_cliente(52); // cod 52 pertenece INTERNO RC RESULTADO 'NADA'
        $reporte->setCod_sub_mod_sap(14); // cod 14 pertenece INTERNO RC RESULTADO 'NADA'
        $reporte->setCod_mod_sap($cod_mod_sap);
        ManejoReporte::createReporte($reporte);   
    }
}else if($cod_cliente_partner == 10){//ITGES
    if(($fechaValidacion >= '30 06:00 PM' && $fechaValidacion <= '30 11:59 PM' ) || ($fechaValidacion >= '31 06:00 PM' && $fechaValidacion <= '31 11:59 PM' )){
        echo '<script>
        alert("NO PUEDE REGISTRAR HORAS DE ITGES, COMUNICARSE CON EL ADMINISTRADOR.")
        window.location="../Consultor.php?menu=reporteHoras";
        </script>';
    }else{
        $sub_cliente_partnerItges = $_POST['clienteItges'];
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $reporte->setCod_sub_cliente_partner($sub_cliente_partnerItges); 
        $reporte->setCod_no_ticket(" ");
        $reporte->setCod_pep_cliente(55); // cod 55 pertenece ITGES RESULTADO 'NADA'
        $reporte->setCod_sub_mod_sap(15); // cod 15 pertenece ITGES RESULTADO 'NADA'
        $reporte->setCod_mod_sap($cod_mod_sap);
        ManejoReporte::createReporte($reporte);
    }
}else if($cod_cliente_partner == 11){//AVA
    if(($fechaValidacion >= '30 06:00 PM' && $fechaValidacion <= '30 11:59 PM' ) || ($fechaValidacion >= '31 06:00 PM' && $fechaValidacion <= '31 11:59 PM' )){
        echo '<script>
        alert("NO PUEDE REGISTRAR HORAS DE AVA CONSULTING, COMUNICARSE CON EL ADMINISTRADOR.")
        window.location="../Consultor.php?menu=reporteHoras";
        </script>';
    }else{
        $sub_cliente_partnerAva = $_POST['clienteAva'];
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $reporte->setCod_sub_cliente_partner($sub_cliente_partnerAva); 
        $reporte->setCod_no_ticket(" ");
        $reporte->setCod_pep_cliente(56); // cod 56 pertenece AVA RESULTADO 'NADA'
        $reporte->setCod_sub_mod_sap(16); // cod 16 pertenece AVA RESULTADO 'NADA'
        $reporte->setCod_mod_sap($cod_mod_sap);
        ManejoReporte::createReporte($reporte);
    }
}else if($cod_cliente_partner == 12){//ACTIONBYTE
    if(($fechaValidacion >= '30 06:00 PM' && $fechaValidacion <= '30 11:59 PM' ) || ($fechaValidacion >= '31 06:00 PM' && $fechaValidacion <= '31 11:59 PM' )){
        echo '<script>
        alert("NO PUEDE REGISTRAR HORAS DE ACTIOBYTE, COMUNICARSE CON EL ADMINISTRADOR.")
        window.location="../Consultor.php?menu=reporteHoras";
        </script>';
    }else{
        //$sub_cliente_partnerAva = $_POST['clienteActionByte'];
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $reporte->setCod_sub_cliente_partner(68); //cod 68 para ACTIONBYTE 'NADA' 
        $reporte->setCod_no_ticket(" ");
        $reporte->setCod_pep_cliente(82); // cod 82 pertenece ACTIONBYTE 'NADA'
        $reporte->setCod_sub_mod_sap(18); // cod 18 pertenece ACTIONBYTE 'NADA'
        $reporte->setCod_mod_sap($cod_mod_sap);
        ManejoReporte::createReporte($reporte);
    }
}else if($cod_cliente_partner == 13){//SUCAFINA
    if(($fechaValidacion >= '30 06:00 PM' && $fechaValidacion <= '30 11:59 PM' ) || ($fechaValidacion >= '31 06:00 PM' && $fechaValidacion <= '31 11:59 PM' )){
        echo '<script>
        alert("NO PUEDE REGISTRAR HORAS DE SUCAFINA, COMUNICARSE CON EL ADMINISTRADOR.")
        window.location="../Consultor.php?menu=reporteHoras";
        </script>';
    }else{
        $sub_cliente_partnerAva = $_POST['clienteSuca'];
        $reporte->setFecha_de_reporte($fecha_de_reporte);
        $reporte->setCod_usuario($usuario->getCod_usuario());
        $reporte->setCod_cliente_partner($cod_cliente_partner);
        $reporte->setDescripcion_actividad($descripcion_actividad);
        $reporte->setHoras_trabajadas($horas_trabajadas);
        $reporte->setLugar_de_trabajo($lugar_de_trabajo);
        $reporte->setHora_de_registro($hora_de_registro);
        
        $reporte->setCod_sub_cliente_partner($sub_cliente_partnerAva); 
        $reporte->setCod_no_ticket(" ");
        $reporte->setCod_pep_cliente(82); // cod 82 pertenece ACTIONBYTE 'NADA'
        $reporte->setCod_sub_mod_sap(18); // cod 18 pertenece ACTIONBYTE 'NADA'
        $reporte->setCod_mod_sap($cod_mod_sap);
        ManejoReporte::createReporte($reporte);
    }
}
echo '<script>
    alert("Se ha creado el Reporte de Horas Exitosamente")
    window.location="../Consultor.php?menu=reporteHoras";
    </script>';
    
?>