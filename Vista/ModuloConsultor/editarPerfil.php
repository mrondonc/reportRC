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
$estado_usuario = ManejoEstado_usuario::consultarEstado_usuario($usuario->getCod_estado_usuario());
$mod_sap = ManejoMod_sap::consultarMod_sap($usuario->getCod_mod_sap());
$listMod_sap = ManejoMod_sap::getList();

?>

<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">MI PERFIL</h4>
                  <p class="card-category">Complete su perfil</p>
                </div>
                <div class="card-body">
                <form action="ModuloConsultor/editaPerfil.php?cod_usuario=<?php echo $usuario->getCod_usuario() ?>" method="post">
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
                          <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $usuario->getCorreo_usuario() ?>" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombres</label>
                          <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $usuario->getNombre_usuario() ?>" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Apellidos</label>
                          <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $usuario->getApellido_usuario() ?>" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dirección</label>
                          <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $usuario->getDireccion_usuario() ?>" >
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Modulo SAP</label>
                            <!-- <input type="text" class="form-control" name="mod_sap" id="mod_sap" value="<?php echo $mod_sap->getNombre_mod_sap() ?>"> -->
                            <select name="mod_sap" id="mod_sap" class="form-control">
                                <option value='<?php echo $usuario->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                <?php
                                foreach ($listMod_sap as $t) {
                                    echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                }
                                ?>
                            </select>
                            
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">País de recidencia</label>
                          <input type="text" class="form-control" name="pais" id="pais" value="<?php echo $usuario->getPais() ?>" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefono</label>
                          <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $usuario->getTelefono_usuario() ?>" >
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Estado usuario</label>
                          <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $estado_usuario->getNombre_estado_usuario() ?>" disabled>
                        </div>
                      </div>
                    </div> 
                    <div class="row">   
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Usuario LOGIN</label>
                            <input type="text" class="form-control" name="login" id="login" value="<?php echo $usuario->getUsuario_login() ?>" >
                          </div>
                      </div> 
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Contraseña</label>
                            <input type="text" class="form-control" name="password" id="password" value="<?php echo $usuario->getContraseña() ?>" >
                          </div>
                      </div> 
                    </div>  
                    
                            <button class="btn btn-primary pull-right" >Agregar modulo SAP</button>                 
                            
                         
                      
                            <button class="btn btn-primary pull-right" type='submit'>Guardar Cambios</button> 
                    
                    <div class="clearfix"></div>
                  
                </div>
                </form>
              </div>
            </div>
   
</div>