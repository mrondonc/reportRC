<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente_partner::setConexionBD($conexion);
$cod_cliente_partner = $_GET['cod_cliente_partner'];
$cliente = ManejoCliente_partner::consultarCliente_partner($cod_cliente_partner);
?>
<!-- FORMULARIO MODIFICAR PERFIL -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">PERFIL DEL CLIENTE</h4>
                </div>
                <div class="card-body">
                <form action="ModuloAdmin/editsCliente.php?cod_cliente_partner=<?php echo $cliente->getCod_cliente_partner() ?>" method="post">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Código del cliente</label>
                          <input type="text" class="form-control" name="cod_cliente_partner" id="cod_cliente_partner" value="<?php echo $cliente->getCod_cliente_partner() ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                            <label class="bmd-label-floating">Nombre del Cliente</label>
                            <input type="text" class="form-control" name="nombreCliente" id="nombreCliente" value="<?php echo $cliente->getNombre_cliente_partner() ?>" >
                          </div>
                      </div>
                    </div>      
                        <button class="btn btn-primary pull-right" type='submit'>Guardar Cambios</button> 
                    <div class="clearfix"></div>
                </div>
                </form>
              </div>
            </div>
   
</div>
<!-- FIN FORMULARIO PERFIL -->

