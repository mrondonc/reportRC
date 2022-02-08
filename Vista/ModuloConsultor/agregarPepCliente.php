<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';


$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);

$cod_usuario  =  $_GET['cod_usuario'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);
$listPep = ManejoPep_cliente::getListSeidorActivo();

?>
<!-- FORMULARIO AGREGAR PEP SEIDOR -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">AGREGAR PEP SEIDOR</h4>
        <p class="card-category">Verifique previamente si ya esta creado su PEP </p>
      </div>
      <div class="card-body">
        <form method="post" action="ModuloConsultor/agregaPepCliente.php">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">PEP Seidor Existentes</label>
                  <select name="pepExistentes" id="pepExistentes" class="form-control">
                      <option> Observar PEP </option>
                      <?php
                      foreach ($listPep as $t) {
                          echo '<option value=' . $t->getCod_pep_cliente() . ' disabled >' . $t->getReferencia_pep_cliente() . '</option>';
                      }
                      ?>
                  </select>            
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-md-7">
                <div class="form-group">
                  <label class="bmd-label-floating">Nuevo PEP Seidor</label>
                  <input type="text" class="form-control" name="pepNuevo" id="pepNuevo" value="" required>
                </div>
              </div>
            </div>     
                    <button class="btn btn-primary pull-right" type='submit'>Agregar PEP</button> 
            <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- FIN AGREGAR MODULO SAP -->