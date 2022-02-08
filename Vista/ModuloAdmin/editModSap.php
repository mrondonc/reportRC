<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoMod_sap::setConexionBD($conexion);

$cod_mod_sap = $_GET['cod_mod_sap'];
$mod_sap = ManejoMod_sap::consultarMod_sap($cod_mod_sap);
?>
<!-- FORMULARIO MODIFICAR PERFIL -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">MÓDULO SAP </h4>
                </div>
                <div class="card-body">
                <form action="ModuloAdmin/editsModSap.php?cod_mod_sap=<?php echo $mod_sap->getCod_mod_sap() ?>" method="post">
                    <div class="row">
                      <div class="col-md-8">
                          <div class="form-group">
                            <label class="bmd-label-floating">Nombre del Módulo SAP</label>
                            <input type="text" class="form-control" name="nombreMod" id="nombreMod" value="<?php echo $mod_sap->getNombre_mod_sap() ?>" >
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

