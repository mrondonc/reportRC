<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';


$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);


$listMod_sap = ManejoMod_sap::getListActivo();

?>
<!-- FORMULARIO MODIFICAR PERFIL -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">PERFIL CONSULTOR</h4>
                  <p class="card-category">Complete los campos requeridos</p>
                </div>
                <div class="card-body">
                <form action="ModuloAdmin/agregaConsultor.php" method="post">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Empresa </label>
                          <input type="text" class="form-control" name="empresa" id="empresa" value="RC Business Consulting" disabled>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Correo electrónico </label>
                          <input type="email" class="form-control" name="correo" id="correo" value="" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombres</label>
                          <input type="text" class="form-control" name="nombres" id="nombres" value="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellidos</label>
                          <input type="text" class="form-control" name="apellidos" id="apellidos" value="" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dirección</label>
                          <!--<input type="text" class="form-control" name="direccion" id="direccion" value="" required>-->
                          <textarea class="form-control" name="direccion" id="direccion" value="" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Fecha de cumpleaños</label>
                            <input type="date" class="form-control" name="cumpleaños" id="cumpleaños" value="" required>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">País de recidencia</label>
                          <input type="text" class="form-control" name="pais" id="pais" value="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefono</label>
                          <input type="number" class="form-control" name="telefono" id="telefono" value="" required>
                        </div>
                      </div>
                    </div> 
                    <div class="row">   
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Usuario LOGIN</label>
                            <input type="text" class="form-control" name="login" id="login" value="" required>
                          </div>
                      </div> 
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Contraseña</label>
                            <input type="text" class="form-control" name="password" id="password" value="" required>
                          </div>
                      </div> 
                    </div> 
                    <div class="row"> 
                      <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Módulo SAP</label>
                              <select name="mod_sap" id="mod_sap" class="form-control">
                                  <option value='0'>Seleccionar módulo sap</option>
                                  <?php
                                  foreach ($listMod_sap as $t) {
                                      echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                  }
                                  ?>
                              </select>
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

