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

$cod_admin  =  $_SESSION['cod_administrador'];
$admin = ManejoAdministrador::consultarAdministrador($cod_admin);
$estado_usuario = ManejoEstado_usuario::consultarEstado_usuario($admin->getCod_estado_usuario());

?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">MI PERFIL</h4>
                  <p class="card-category">Complete su perfil</p>
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
                          <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $admin->getCorreo() ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombres y Apellidos</label>
                          <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $admin->getNombre_administrador() ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Fecha de cumpleaños</label>
                            <input type="date" class="form-control" name="cumpleaños" id="cumpleaños" value="<?php echo $admin->getCumpleaños() ?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
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
                            <input type="text" class="form-control" name="login" id="login" value="<?php echo $admin->getUsuario_login() ?>" disabled>
                          </div>
                      </div> 
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" value="<?php echo $admin->getContraseña() ?>" disabled>
                          </div>
                      </div> 
                    </div>                
                    <!--<button class="btn btn-primary pull-right" href="../Vista/ModuloConsultor/index.php">Editar Perfil</button>-->
                    <a href="?menu=editarPerfil&cod_administrador=<?php echo $admin->getCod_administrador() ?>" class="btn btn-primary pull-right">Editar Perfil</a>
                    <div class="clearfix"></div>
                  
                </div>
              </div>
            </div>
            
          </div>
        