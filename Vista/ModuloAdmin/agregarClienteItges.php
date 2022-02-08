<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoSub_cliente_partner::setConexionBD($conexion);

$listSubClientes = ManejoSub_cliente_partner::getListItgesActivo();

?>
<!-- FORMULARIO AGREGAR SUB CLIENTE AVA -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">AGREGAR CLIENTE ITGES</h4>
        <p class="card-category">Verifique previamente si ya esta creado el cliente de ITGES</p>
      </div>
      <div class="card-body">
        <form method="post" action="ModuloAdmin/agregaClienteItges.php">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Clientes Itges Existentes</label>
                  <select name="sub_clientes" id="sub_clientes" class="form-control">
                  <option> Observar Clientes </option>
                      <?php
                      foreach ($listSubClientes as $t) {
                          echo '<option value=' . $t->getCod_sub_cliente_partner() . ' disabled >' . $t->getNombre_sub_cliente_partner() . '</option>';
                      }
                      ?>
                  </select>            
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-md-7">
                <div class="form-group">
                  <label class="bmd-label-floating">Nuevo Cliente ITGES</label>
                  <input type="text" class="form-control" name="nombreCliente" id="nombreCliente" value="" required>
                </div>
              </div>
            </div>     
                    <button class="btn btn-primary pull-right" type='submit'>Agregar Cliente</button> 
            <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- FIN AGREGAR MODULO SAP -->