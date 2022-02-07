<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoPep_cliente::setConexionBD($conexion);
$cod_pep_cliente = $_GET['cod_pep_cliente'];
$pep_cliente = ManejoPep_cliente::consultarPep_cliente($cod_pep_cliente);
?>
<!-- FORMULARIO MODIFICAR PERFIL -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">PEP CLIENTE SEIDOR</h4>
                </div>
                <div class="card-body">
                <form action="ModuloAdmin/editsPep.php?cod_pep_cliente=<?php echo $pep_cliente->getCod_pep_cliente() ?>" method="post">
                    <div class="row">
                      <div class="col-md-8">
                          <div class="form-group">
                            <label class="bmd-label-floating">Nombre del PEP</label>
                            <input type="text" class="form-control" name="nombrePep" id="nombrePep" value="<?php echo $pep_cliente->getReferencia_pep_cliente() ?>" >
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

