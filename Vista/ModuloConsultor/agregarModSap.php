<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoEstado_usuario.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);
ManejoEstado_usuario::setConexionBD($conexion);

$cod_usuario  =  $_GET['cod_usuario'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);
$mod_sap = ManejoMod_sap::consultarMod_sap($usuario->getCod_mod_sap());
$listMod_sap = ManejoMod_sap::getList();

?>
<!-- FORMULARIO AGREGAR MODULO SAP -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">AGREGAR MODULO SAP</h4>
        <p class="card-category">Verifique previamente si ya esta creado su modulo SAP</p>
      </div>
      <div class="card-body">
        <form method="post" action="ModuloConsultor/agregaModSap2.php">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Modulos SAP Existentes</label>
                  <select name="mod_sap" id="mod_sap" class="form-control">
                      <option value='<?php echo $usuario->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
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
                  <label class="bmd-label-floating">Nuevo Modulo SAP</label>
                  <input type="text" class="form-control" name="modSapNew" id="modSapNew" value="" >
                </div>
              </div>
            </div>     
                    <button class="btn btn-primary pull-right" type='submit'>Agregar MODULO</button> 
            <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- FIN AGREGAR MODULO SAP -->