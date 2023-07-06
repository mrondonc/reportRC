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
<!-- FORMULARIO MODIFICAR PERFIL -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">MI PERFIL</h4>
                  <p class="card-category">Complete su perfil</p>
                </div>
                <div class="card-body">
                <form action="ModuloAdmin/editaPerfil.php?cod_administrador=<?php echo $admin->getCod_administrador() ?>" method="post">
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
                          <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $admin->getCorreo() ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombres y Apellidos</label>
                          <input type="text" class="form-control" name="nombres" id="nombres" value="<?php echo $admin->getNombre_administrador() ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Fecha de cumpleaños</label>
                            <input type="date" class="form-control" name="cumpleaños" id="cumpleaños" value="<?php echo $admin->getCumpleaños() ?>" >
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
                            <input type="text" class="form-control" name="login" id="login" value="<?php echo $admin->getUsuario_login() ?>" disabled>
                          </div>
                      </div> 
                      <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Contraseña</label>
                            <input type="text" class="form-control" name="password" id="password" value="<?php echo $admin->getContraseña() ?>" required>
                          </div>
                      </div> 
                    </div>                
                    <!--<button class="btn btn-primary pull-right" href="../Vista/ModuloConsultor/index.php">Editar Perfil</button>-->
                    <button class="btn btn-primary pull-right" type='submit'>Guardar Cambios</button> 
                    <div class="clearfix"></div>
                </form>
              </div>
            </div>
   
</div>
<!-- FIN FORMULARIO PERFIL -->
