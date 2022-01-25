<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente_partner::setConexionBD($conexion);
?>
<!-- FORMULARIO MODIFICAR PERFIL -->
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">PERFIL DEL CLIENTE</h4>
                </div>
                <div class="card-body">
                <form action="ModuloAdmin/agregaCliente.php" method="post">
                    <div class="row">
                      <div class="col-md-8">
                          <div class="form-group">
                            <label class="bmd-label-floating">Nombre del Cliente</label>
                            <input type="text" class="form-control" name="nombreCliente" id="nombreCliente" value="" required>
                          </div>
                      </div>
                    </div>      
                        <button class="btn btn-primary pull-right" type='submit'>Crear</button> 
                    <div class="clearfix"></div>
                </div>
                </form>
              </div>
            </div>
   
</div>
<!-- FIN FORMULARIO PERFIL -->

