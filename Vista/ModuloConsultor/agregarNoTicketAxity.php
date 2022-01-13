<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/No_ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoNo_ticket.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoNo_ticket::setConexionBD($conexion);

$cod_usuario  =  $_GET['cod_usuario'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);
$listNoTicket = ManejoNo_ticket::getListAxity();

?>
<!-- FORMULARIO AGREGAR MODULO SAP -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">AGREGAR NÚMERO DE TICKET</h4>
        <p class="card-category">Verifique previamente si ya esta creado su número de ticket</p>
      </div>
      <div class="card-body">
        <form method="post" action="ModuloConsultor/agregaNoTicketAxity.php">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Número de Tickets Existentes</label>
                  <select name="no_ticket" id="no_ticket" class="form-control">
                      <option>Observar No. Ticket</option>
                      <?php
                      foreach ($listNoTicket as $t) {
                          echo '<option value=' . $t->getCod_no_ticket() . ' disabled >' . $t->getReferencia_no_ticket() . '</option>';
                      }
                      ?>
                  </select>            
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-md-7">
                <div class="form-group">
                  <label class="bmd-label-floating">Nuevo Número de Ticket</label>
                  <input type="text" class="form-control" name="no_ticketNuevo" id="no_ticketNuevo" value="" >
                </div>
              </div>
            </div>     
                    <button class="btn btn-primary pull-right" type='submit'>Agregar No. Ticket</button> 
            <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- FIN AGREGAR MODULO SAP -->