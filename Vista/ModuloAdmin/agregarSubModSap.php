<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoSub_mod_sap::setConexionBD($conexion);

$listSub_mod_sap = ManejoSub_mod_sap::getListAxity();

?>
<!-- FORMULARIO AGREGAR SUB MODULO SAP -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">AGREGAR SUB MÓDULO SAP</h4>
        <p class="card-category">Verifique previamente si ya esta creado el módulo SAP</p>
      </div>
      <div class="card-body">
        <form method="post" action="ModuloAdmin/agregaSubModSap.php">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Sub Módulos SAP Existentes</label>
                  <select name="mod_sap" id="mod_sap" class="form-control">
                      <option value=''>Verificar los sub módulos sap existentes</option>
                      <?php
                      foreach ($listSub_mod_sap as $t) {
                          echo '<option value=' . $t->getCod_sub_mod_sap() . ' disabled >' . $t->getNombre_sub_mod_sap() . '</option>';
                      }
                      ?>
                  </select>            
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-md-7">
                <div class="form-group">
                  <label class="bmd-label-floating">Nuevo Sub Módulo SAP</label>
                  <input type="text" class="form-control" name="modSapNew" id="modSapNew" value="" >
                </div>
              </div>
            </div>     
                    <button class="btn btn-primary pull-right" type='submit'>Agregar MÓDULO</button> 
            <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- FIN AGREGAR MODULO SAP -->