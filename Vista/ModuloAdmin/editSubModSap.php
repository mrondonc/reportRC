<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoSub_mod_sap::setConexionBD($conexion);

$cod_sub_mod_sap = $_GET['cod_sub_mod_sap'];
$sub_mod_sap = ManejoSub_mod_sap::consultarSub_mod_sap($cod_sub_mod_sap);
?>
<!-- FORMULARIO MODIFICAR PERFIL -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">SUB MÓDULO SAP </h4>
                </div>
                <div class="card-body">
                <form action="ModuloAdmin/editsSubModSap.php?cod_sub_mod_sap=<?php echo $sub_mod_sap->getCod_sub_mod_sap() ?>" method="post">
                    <div class="row">
                      <div class="col-md-8">
                          <div class="form-group">
                            <label class="bmd-label-floating">Nombre del Sub Módulo SAP</label>
                            <input type="text" class="form-control" name="nombreMod" id="nombreMod" value="<?php echo $sub_mod_sap->getNombre_sub_mod_sap() ?>" >
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

