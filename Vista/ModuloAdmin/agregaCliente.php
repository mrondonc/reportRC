<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente_partner::setConexionBD($conexion);

$nombre = $_POST['nombreCliente'];

$cliente = new Cliente_partner();

$cliente->setNombre_cliente_partner($nombre);
$cliente->setCod_estado_cliente_partner(1);

ManejoCliente_partner::createCliente_partner($cliente);
    
echo '<script>
    alert("Se ha registrado el cliente!"); 
    window.location="../Administrador.php?menu=clientes";
    </script>';
?>