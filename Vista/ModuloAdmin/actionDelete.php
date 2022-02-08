<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoMod_sap::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);

$action = $_GET["action"];
$id = $_GET["id"];


if ($action=="delete" && $id==1){ 
    
    $cod_mod_sap = $_GET['cod_mod_sap'];
    $mod_sap = ManejoMod_sap::consultarMod_sap($cod_mod_sap);
    $mod_sap->setCod_estado_actual(2); //QUEDA INACTIVO
    ManejoMod_sap::modifyEstado($mod_sap);
    
    echo '<script>
    alert("Se ha cambiado el estado a INACTIVO")
    window.location="../Administrador.php?menu=mod_sap";
    </script>';
}else if ($action=="delete" && $id==2){ 
    
    $cod_sub_mod_sap = $_GET['cod_sub_mod_sap'];
    $sub_mod_sap = ManejoSub_mod_sap::consultarSub_mod_sap($cod_sub_mod_sap);
    $sub_mod_sap->setCod_estado_actual(2); //QUEDA INACTIVO
    ManejoSub_mod_sap::modifyEstado($sub_mod_sap);
    
    echo '<script>
    alert("Se ha cambiado el estado a INACTIVO")
    window.location="../Administrador.php?menu=sub_mod_sap";
    </script>';

}else if ($action=="delete" && $id==3){ 
    
    $cod_cliente = $_GET['cod_cliente_partner'];
    $cliente = ManejoCliente_partner::consultarCliente_partner($cod_cliente);
    $cliente->setCod_estado_cliente_partner(2); //QUEDA INACTIVO
    ManejoCliente_partner::modifyEstado($cliente);
    
    echo '<script>
    alert("Se ha cambiado el estado a INACTIVO")
    window.location="../Administrador.php?menu=clientes";
    </script>';

}else if ($action=="delete" && $id==4){ 
    
    $cod_sub_cliente = $_GET['cod_sub_cliente_partner'];
    $cliente = ManejoSub_cliente_partner::consultarSub_cliente_partner($cod_sub_cliente);
    $cliente->setCod_estado_actual(2); //QUEDA INACTIVO
    ManejoSub_cliente_partner::modifyEstado($cliente);
    
    echo '<script>
    alert("Se ha cambiado el estado a INACTIVO")
    window.location="../Administrador.php?menu=subClientes&cod_cliente_partner='.$cliente->getCod_cliente_partner().'";
    </script>';

}else if ($action=="delete" && $id==5){ 
    
    $cod_pep_cliente = $_GET['cod_pep_cliente'];
    $pep = ManejoPep_cliente::consultarPep_cliente($cod_pep_cliente);
    $pep->setCod_estado_actual(2); //QUEDA INACTIVO
    ManejoPep_cliente::modifyEstado($pep);
    
    echo '<script>
    alert("Se ha cambiado el estado a INACTIVO")
    window.location="../Administrador.php?menu=subClientes&cod_cliente_partner='.$pep->getCod_cliente_partner().'";
    </script>';   

}else if ($action=="Activar" && $id==1){ 
    
    $cod_mod_sap = $_GET['cod_mod_sap'];
    $mod_sap = ManejoMod_sap::consultarMod_sap($cod_mod_sap);
    $mod_sap->setCod_estado_actual(1); //QUEDA ACTIVO
    ManejoMod_sap::modifyEstado($mod_sap);
    
    echo '<script>
    alert("Se ha cambiado el estado a ACTIVO")
    window.location="../Administrador.php?menu=mod_sap";
    </script>';
}else if ($action=="Activar" && $id==2){ 
    
    $cod_sub_mod_sap = $_GET['cod_sub_mod_sap'];
    $sub_mod_sap = ManejoSub_mod_sap::consultarSub_mod_sap($cod_sub_mod_sap);
    $sub_mod_sap->setCod_estado_actual(1); //QUEDA ACTIVO
    ManejoSub_mod_sap::modifyEstado($sub_mod_sap);
    
    echo '<script>
    alert("Se ha cambiado el estado a ACTIVO")
    window.location="../Administrador.php?menu=sub_mod_sap";
    </script>';
}else if ($action=="Activar" && $id==3){ 
    
    $cod_cliente = $_GET['cod_cliente_partner'];
    $cliente = ManejoCliente_partner::consultarCliente_partner($cod_cliente);
    $cliente->setCod_estado_cliente_partner(1); //QUEDA ACTIVO
    ManejoCliente_partner::modifyEstado($cliente);
    
    echo '<script>
    alert("Se ha cambiado el estado a ACTIVO")
    window.location="../Administrador.php?menu=clientes";
    </script>';
}else if ($action=="Activar" && $id==4){ 
    
    $cod_sub_cliente = $_GET['cod_sub_cliente_partner'];
    $cliente = ManejoSub_cliente_partner::consultarSub_cliente_partner($cod_sub_cliente);
    $cliente->setCod_estado_actual(1); //QUEDA ACTIVO
    ManejoSub_cliente_partner::modifyEstado($cliente);
    
    echo '<script>
    alert("Se ha cambiado el estado a ACTIVO")
    window.location="../Administrador.php?menu=subClientes&cod_cliente_partner='.$cliente->getCod_cliente_partner().'";
    </script>';
}else if ($action=="Activar" && $id==5){ 
    
    $cod_pep_cliente = $_GET['cod_pep_cliente'];
    $pep = ManejoPep_cliente::consultarPep_cliente($cod_pep_cliente);
    $pep->setCod_estado_actual(1); //QUEDA ACTIVO
    ManejoPep_cliente::modifyEstado($pep);
    
    echo '<script>
    alert("Se ha cambiado el estado a ACTIVO")
    window.location="../Administrador.php?menu=subClientes&cod_cliente_partner='.$pep->getCod_cliente_partner().'";
    </script>';
}

?>