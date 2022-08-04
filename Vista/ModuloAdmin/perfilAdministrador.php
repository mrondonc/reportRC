<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Administrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoAdministrador.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Estado_usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoEstado_usuario.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoAdministrador::setConexionBD($conexion);
ManejoEstado_usuario::setConexionBD($conexion);
$cod_administradors = $_SESSION['cod_administrador'];
$cod_administrador =  $_GET['cod_administrador'];
$administrador = ManejoAdministrador::consultarAdministrador($cod_administrador);
$estado_usuario = ManejoEstado_usuario::consultarEstado_usuario($administrador->getCod_estado_usuario());

?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">PERFIL COMPLETO</h4>
                  <p class="card-category">Aquí podrá mirar los datos personales</p>
                </div>
                <div class="card-body">

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
                          <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $administrador->getCorreo() ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre y Apellido</label>
                          <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $administrador->getNombre_administrador() ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Dirección</label>
                          <input type="text" class="form-control" name="direccion" id="direccion" value="<?php echo $administrador->getDireccion() ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Fecha de cumpleaños</label>
                            <input type="date" class="form-control" name="cumpleaños" id="cumpleaños" value="<?php echo $administrador->getCumpleaños() ?>" disabled>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">País de residencia</label>
                          <input type="text" class="form-control" name="pais" id="pais" value="<?php echo $administrador->getPais() ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Telefono</label>
                          <input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $administrador->getTelefono() ?>" disabled>
                        </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Cuenta de skype</label>
                            <input type="text" class="form-control" name="cuentaSkype" id="cuentaSkype" value="<?php echo $administrador->getCuenta_skype() ?>" disabled>
                          </div>
                      </div> 
                      
                    </div> 
                    <div class="row">   
                      <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Contacto de emergencia</label>
                            <input type="text" class="form-control" name="nombreContacto" id="nombreContacto" value="<?php echo $administrador->getNombre_contacto_emergencia() ?>" disabled>
                          </div>
                      </div> 
                      <div class="col-md-4">
                          <div class="form-group">
                            <label class="bmd-label-floating">Número contacto de emergencia</label>
                            <input type="text" class="form-control" name="numeroContacto" id="numeroContacto" value="<?php echo $administrador->getNumero_contacto_emergencia() ?>" disabled>
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
                            <input type="text" class="form-control" name="login" id="login" value="<?php echo $administrador->getUsuario_login() ?>" disabled>
                          </div>
                      </div> 
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" value="<?php echo $administrador->getContraseña() ?>" disabled>
                          </div>
                      </div> 
                    </div>                
                    <?php
                      if($cod_administradors == 5){ //Codigo del super admin *revisar en la bd el de manuel* ?>
                        <a class="btn btn-primary pull-right" href="?menu=modificarAdministrador&cod_administrador=<?php echo $administrador->getCod_administrador() ?>">Editar Perfil</a>
                     <?php } ?>
                </div>
              </div>
            </div>
            
          </div>
        