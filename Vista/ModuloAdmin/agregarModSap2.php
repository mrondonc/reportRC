<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoMod_sap::setConexionBD($conexion);

$listMod_sap = ManejoMod_sap::getList();

?>
<!-- FORMULARIO AGREGAR MODULO SAP -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">AGREGAR MÓDULO SAP</h4>
        <p class="card-category">Verifique previamente si ya esta creado el módulo SAP</p>
      </div>
      <div class="card-body">
        <form method="post" action="ModuloAdmin/agregaModSap2.php">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Módulos SAP Existentes</label>
                  <select name="mod_sap" id="mod_sap" class="form-control">
                      <option value=''>Verificar los módulos sap existentes</option>
                      <?php
                      foreach ($listMod_sap as $t) {
                          echo '<option value=' . $t->getCod_mod_sap() . ' disabled >' . $t->getNombre_mod_sap() . '</option>';
                      }
                      ?>
                  </select>            
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-md-7">
                <div class="form-group">
                  <label class="bmd-label-floating">Nuevo Módulo SAP</label>
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