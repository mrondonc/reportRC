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
$cod_sub_cliente_partner = $_GET['cod_sub_cliente_partner'];
$subCliente = ManejoSub_cliente_partner::consultarSub_cliente_partner($cod_sub_cliente_partner);
$cliente_partner = ManejoCliente_partner::consultarCliente_partner($subCliente->getCod_cliente_partner());
?>
<!-- FORMULARIO MODIFICAR PERFIL -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">PERFIL DEL SUB CLIENTE</h4>
                </div>
                <div class="card-body">
                <form action="ModuloAdmin/editsSubCliente.php?cod_sub_cliente_partner=<?php echo $subCliente->getCod_sub_cliente_partner() ?>" method="post">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Código del cliente</label>
                          <input type="text" class="form-control" name="cod_sub_cliente_partner" id="cod_sub_cliente_partner" value="<?php echo $subCliente->getCod_sub_cliente_partner() ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-8">
                          <div class="form-group">
                            <label class="bmd-label-floating">Nombre del Sub Cliente</label>
                            <input type="text" class="form-control" name="nombreSubCliente" id="nombreSubCliente" value="<?php echo $subCliente->getNombre_sub_cliente_partner() ?>" >
                          </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Pertenece al cliente</label>
                          <input type="text" class="form-control" name="codCliente" id="codCliente" value="<?php echo $cliente_partner->getCod_cliente_partner();?>" hidden>
                          <input type="text" class="form-control" name="cliente_partner" id="cliente_partner" value="<?php echo $cliente_partner->getNombre_cliente_partner() ?>" disabled>
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

