<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Usuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoUsuario.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoMod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoCliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_cliente_partner.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_cliente_partner.php';
//require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/No_ticket.php';
//require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoNo_ticket.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Reporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoReporte.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Pep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoPep_cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/Sub_mod_sap.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoSub_mod_sap.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoUsuario::setConexionBD($conexion);
ManejoReporte::setConexionBD($conexion);
ManejoSub_cliente_partner::setConexionBD($conexion);
//ManejoNo_ticket::setConexionBD($conexion);
ManejoPep_cliente::setConexionBD($conexion);
ManejoMod_sap::setConexionBD($conexion);
ManejoSub_mod_sap::setConexionBD($conexion);
ManejoCliente_partner::setConexionBD($conexion);

$cod_usuario  =  $_SESSION['cod_usuario'];
$cod_reporte = $_GET['cod_reporte'];
$idEditar = $_GET['idEditar'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);
$reporte = ManejoReporte::consultarReporte($cod_reporte);
$mod_sap = ManejoMod_sap::consultarMod_sap($reporte->getCod_mod_sap());
$listMod_sap = ManejoMod_sap::getListActivo();

$cliente_partner = ManejoCliente_partner::consultarCliente_partner($reporte->getCod_cliente_partner());
$listCliente_partner = ManejoCliente_partner::getListActivo();

$listCliente_partnerAxity = ManejoSub_cliente_partner::getListAxityActivo();
$sub_cliente_partnerAxity = ManejoSub_cliente_partner::consultarSub_cliente_partner($reporte->getCod_sub_cliente_partner());

$listSub_mod_sap = ManejoSub_mod_sap::getListActivo();
$sub_mod_sap = ManejoSub_mod_sap::consultarSub_mod_sap($reporte->getCod_sub_mod_sap());

//$listNoTicket = ManejoNo_ticket::getListAxity();
//$noTicket = ManejoNo_ticket::consultarNo_ticket($reporte->getCod_no_ticket());

$listCliente_partnerEveris = ManejoSub_cliente_partner::getListEverisActivo();
$listCliente_partnerMillo = ManejoSub_cliente_partner::getListMilloActivo();

$listPepCliente = ManejoPep_cliente::getListSeidorActivo();
$pepCliente = ManejoPep_cliente::consultarPep_cliente($reporte->getCod_pep_cliente());


$listCliente_partnerItges = ManejoSub_cliente_partner::getListItgesActivo();
$listCliente_partnerAva = ManejoSub_cliente_partner::getListAVAActivo();
$listCliente_partnerSuca = ManejoSub_cliente_partner::getListSUFACINAActivo();
$listCliente_partnerIce = ManejoSub_cliente_partner::getListIceActivo();
?>
<!-- FORMULARIO EDITAR REGISTRO REPORTE -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">EDITAR REPORTE</h4>
                <p class="card-category">Codigo Reporte: <?php echo $cod_reporte;?> </p>
            </div>
            <div class="card-body">
                <form method="post" action="ModuloConsultor/editsReporte.php" name="editReporte" id="editReporte">
                <input id="cod_reporte" name="cod_reporte" type="hidden" value="<?php echo $reporte->getCod_reporte();?>">
                    <?php if($reporte->getCod_cliente_partner()==1){?>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group"> 
                                <label>1. Fecha de Reporte </label>
                                <div class="form-group">
                                <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                <div class="form-group">
                                <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>2. Consultor </label>
                                <div class="form-group">
                                <label class="bmd-label-floating"></label>
                                <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>3. Módulo SAP  </label>
                                <div class="form-group">
                                <label class="bmd-label-floating"></label>
                                <select name="mod_sap" id="mod_sap" class="form-control" required>
                                        <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                        <?php
                                        foreach ($listMod_sap as $t) {
                                            echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>4. Cliente Partner </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                            <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                            <?php
                                            foreach ($listCliente_partner as $e) {
                                                echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>5. Cliente Axity</label>
                                
                                <div class="form-group">
                                <select name="clienteAxity" id="clienteAxity" class="form-control" required>
                                    <option value='<?php echo $sub_cliente_partnerAxity->getCod_sub_cliente_partner(); ?>'><?php echo $sub_cliente_partnerAxity->getNombre_sub_cliente_partner(); ?></option>
                                    <?php
                                    foreach ($listCliente_partnerAxity as $t) {
                                        echo '<option value=' . $t->getCod_sub_cliente_partner() . '>' . $t->getNombre_sub_cliente_partner() . '</option>';
                                    }
                                    ?>
                                </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Modulo SAP</label>
                                <div class="form-group">
                                <select name="modSapList" id="modSapList" class="form-control" required>
                                    <option value='<?php echo $sub_mod_sap->getCod_sub_mod_sap(); ?>'><?php echo $sub_mod_sap->getNombre_sub_mod_sap(); ?></option>
                                    <?php
                                    foreach ($listSub_mod_sap as $e) {
                                        echo '<option value=' . $e->getCod_sub_mod_sap() . '>' . $e->getNombre_sub_mod_sap() . '</option>';
                                    }
                                    ?>
                                </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Indicar No de Ticket / No Aplica Ticket</label>
                                <div class="form-group">
                                <label>Colocar Numero del Ticket en caso que aplique / Si no tiene Numero colocar (No Aplica Ticket)</label>
                                <div class="form-group">
                                <input type="text" class="form-control" name="noTicket" id="noTicket" value="<?php echo $reporte->getCod_no_ticket(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>8. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>9. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number" placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>10. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div>
                            
                       <!-- EVERIS  --> 
                        <?php }if($reporte->getCod_cliente_partner()==2){ ?>
                            <div class="row">
                            <div class="col-md-10">
                                <div class="form-group"> 
                                <label>1. Fecha de Reporte </label>
                                <div class="form-group">
                                <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                <div class="form-group">
                                <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>2. Consultor </label>
                                <div class="form-group">
                                <label class="bmd-label-floating"></label>
                                <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>3. Módulo SAP  </label>
                                <div class="form-group">
                                <label class="bmd-label-floating"></label>
                                <select name="mod_sap" id="mod_sap" class="form-control" required>
                                        <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                        <?php
                                        foreach ($listMod_sap as $t) {
                                            echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>4. Cliente Partner </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                            <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                            <?php
                                            foreach ($listCliente_partner as $e) {
                                                echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>5. Cliente NTT DATA</label>				
                                    <div class="form-group">
                                        <select name="clienteEveris" id="clienteEveris" class="form-control" required>
                                            <option value='<?php echo $sub_cliente_partnerAxity->getCod_sub_cliente_partner(); ?>'><?php echo $sub_cliente_partnerAxity->getNombre_sub_cliente_partner(); ?></option>
                                            <?php
                                            foreach ($listCliente_partnerEveris as $t) {
                                                echo '<option value=' . $t->getCod_sub_cliente_partner() . '>' . $t->getNombre_sub_cliente_partner() . '</option>';
                                            }
                                            ?>
                                        </select>			
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>8. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div> 
                        
                        <!-- LUCTA  --> 
                        <?php }if($reporte->getCod_cliente_partner()==3){ ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"> 
                                    <label>1. Fecha de Reporte </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                    <div class="form-group">
                                    <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>2. Consultor </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                    <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>3. Módulo SAP  </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="mod_sap" id="mod_sap" class="form-control" required>
                                            <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                            <?php
                                            foreach ($listMod_sap as $t) {
                                                echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>4. Cliente Partner </label>
                                        <div class="form-group">
                                        <label class="bmd-label-floating"></label>
                                        <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                                <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                                <?php
                                                foreach ($listCliente_partner as $e) {
                                                    echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>5. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div> 

                        <!-- MILLO  --> 
                        <?php }if($reporte->getCod_cliente_partner()==4){ ?>
                            <div class="row">
                            <div class="col-md-10">
                                <div class="form-group"> 
                                <label>1. Fecha de Reporte </label>
                                <div class="form-group">
                                <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                <div class="form-group">
                                <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>2. Consultor </label>
                                <div class="form-group">
                                <label class="bmd-label-floating"></label>
                                <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>3. Módulo SAP  </label>
                                <div class="form-group">
                                <label class="bmd-label-floating"></label>
                                <select name="mod_sap" id="mod_sap" class="form-control" required>
                                        <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                        <?php
                                        foreach ($listMod_sap as $t) {
                                            echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>4. Cliente Partner </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                            <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                            <?php
                                            foreach ($listCliente_partner as $e) {
                                                echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>5. Cliente Millo</label>				
                                    <div class="form-group">
                                        <select name="clienteMillo" id="clienteMillo" class="form-control" required>
                                            <option value='<?php echo $sub_cliente_partnerAxity->getCod_sub_cliente_partner(); ?>'><?php echo $sub_cliente_partnerAxity->getNombre_sub_cliente_partner(); ?></option>
                                            <?php
                                            foreach ($listCliente_partnerMillo as $t) {
                                                echo '<option value=' . $t->getCod_sub_cliente_partner() . '>' . $t->getNombre_sub_cliente_partner() . '</option>';
                                            }
                                            ?>
                                        </select>			
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>8. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div> 

                        <!-- PRAXIS  --> 
                        <?php }if($reporte->getCod_cliente_partner()==5){ ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"> 
                                    <label>1. Fecha de Reporte </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                    <div class="form-group">
                                    <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>2. Consultor </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                    <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>3. Módulo SAP  </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="mod_sap" id="mod_sap" class="form-control" required>
                                            <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                            <?php
                                            foreach ($listMod_sap as $t) {
                                                echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>4. Cliente Partner </label>
                                        <div class="form-group">
                                        <label class="bmd-label-floating"></label>
                                        <select name="cliente_partner" id="cliente_partner" class="form-control" >
                                                <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                                <?php
                                                foreach ($listCliente_partner as $e) {
                                                    echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>5. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>6. Horas Trabajadas</label>
                                    <div class="form-group">
                                    <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                    <div class="form-group">
                                    <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>7. Lugar de trabajo</label>
                                    <div class="form-group">
                                    <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                                <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                                <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                                <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                            </select>
                                    
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                <button class="btn btn-primary" type='submit'>Guardar</button>
                                </div>
                            </div> 
                        <!-- SEIDOR  --> 
                        <?php }if($reporte->getCod_cliente_partner()==6){ ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"> 
                                    <label>1. Fecha de Reporte </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                    <div class="form-group">
                                    <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>2. Consultor </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                    <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>3. Módulo SAP  </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="mod_sap" id="mod_sap" class="form-control" required>
                                            <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                            <?php
                                            foreach ($listMod_sap as $t) {
                                                echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>4. Cliente Partner </label>
                                        <div class="form-group">
                                        <label class="bmd-label-floating"></label>
                                        <select name="cliente_partner" id="cliente_partner" class="form-control" >
                                                <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                                <?php
                                                foreach ($listCliente_partner as $e) {
                                                    echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>5. PEP del cliente</label>				
                                        <div class="form-group">
                                        <label>Seleccionar el PEP del cliente que atendieron (si no esta el PEP relacionado, antes de cargar, por favor notificar a la Coordinadora y colocar el PEP que falta en el campo otros).</label>				
                                        <div class="form-group">
                                        <select name="pepCliente" id="pepCliente" class="form-control" >
                                                <option value='<?php echo $pepCliente->getCod_pep_cliente(); ?>'><?php echo $pepCliente->getReferencia_pep_cliente(); ?></option>
                                                <?php
                                                foreach ($listPepCliente as $t) {
                                                    echo '<option value=' . $t->getCod_pep_cliente() . '>' . $t->getReferencia_pep_cliente() . '</option>';
                                                }
                                                ?>
                                            </select>			
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <label>6. Descripción de las actividades</label>
                                        <div class="form-group">
                                        <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                        <div class="form-group">
                                        <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                        <div class="form-group">
                                        <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                        <div class="the-count">
                                            <span id="current">0</span>
                                            <span id="maximum">/ 1000</span>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <label>7. Horas Trabajadas</label>
                                        <div class="form-group">
                                        <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                        <div class="form-group">
                                        <input type="number" placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                        
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                        <label>8. Lugar de trabajo</label>
                                        <div class="form-group">
                                        <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                                    <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                                    <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                                    <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                                </select>
                                        
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                <button class="btn btn-primary" type='submit'>Guardar</button>
                                </div>
                                </div>	 
                        <!-- INTERNO RC  --> 
                        <?php }if($reporte->getCod_cliente_partner()==7){ ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"> 
                                    <label>1. Fecha de Reporte </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                    <div class="form-group">
                                    <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>2. Consultor </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                    <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>3. Módulo SAP  </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="mod_sap" id="mod_sap" class="form-control" required>
                                            <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                            <?php
                                            foreach ($listMod_sap as $t) {
                                                echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>4. Cliente Partner </label>
                                        <div class="form-group">
                                        <label class="bmd-label-floating"></label>
                                        <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                                <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                                <?php
                                                foreach ($listCliente_partner as $e) {
                                                    echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>5. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div>
                        <!-- ITGES  --> 
                        <?php }if($reporte->getCod_cliente_partner()==10){ ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"> 
                                    <label>1. Fecha de Reporte </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                    <div class="form-group">
                                    <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>2. Consultor </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                    <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>3. Módulo SAP  </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="mod_sap" id="mod_sap" class="form-control" required>
                                            <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                            <?php
                                            foreach ($listMod_sap as $t) {
                                                echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>4. Cliente Partner </label>
                                        <div class="form-group">
                                        <label class="bmd-label-floating"></label>
                                        <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                                <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                                <?php
                                                foreach ($listCliente_partner as $e) {
                                                    echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>5. Cliente ITGES</label>				
                                            <div class="form-group">
                                                <select name="clienteItges" id="clienteItges" class="form-control" required>
                                                        <option value='<?php echo $sub_cliente_partnerAxity->getCod_sub_cliente_partner();?>'><?php echo $sub_cliente_partnerAxity->getNombre_sub_cliente_partner(); ?></option>';
                                                        <?php
                                                            foreach ($listCliente_partnerItges as $t) {
                                                                echo '<option value=' . $t->getCod_sub_cliente_partner() . '>' . $t->getNombre_sub_cliente_partner() . '</option>';
                                                            }
                                                        ?>
                                                </select>					
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                <a href="?menu=agregarClienteItges" class="btn btn-primary btn-round">Agregar CLIENTE</a>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>8. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div>
                        <!-- AVA CONSULTING  --> 
                        <?php }if($reporte->getCod_cliente_partner()==11){ ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"> 
                                    <label>1. Fecha de Reporte </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                    <div class="form-group">
                                    <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>2. Consultor </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                    <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>3. Módulo SAP  </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="mod_sap" id="mod_sap" class="form-control" required>
                                            <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                            <?php
                                            foreach ($listMod_sap as $t) {
                                                echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>4. Cliente Partner </label>
                                        <div class="form-group">
                                        <label class="bmd-label-floating"></label>
                                        <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                                <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                                <?php
                                                foreach ($listCliente_partner as $e) {
                                                    echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>5. Cliente AVA CONSULTING</label>				
                                            <div class="form-group">
                                                <select name="clienteAVA" id="clienteAVA" class="form-control" required>
                                                        <option value='<?php echo $sub_cliente_partnerAxity->getCod_sub_cliente_partner();?>'><?php echo $sub_cliente_partnerAxity->getNombre_sub_cliente_partner(); ?></option>';
                                                        <?php
                                                            foreach ($listCliente_partnerAva as $t) {
                                                                echo '<option value=' . $t->getCod_sub_cliente_partner() . '>' . $t->getNombre_sub_cliente_partner() . '</option>';
                                                            }
                                                        ?>
                                                </select>					
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                <a href="?menu=agregarClienteAva" class="btn btn-primary btn-round">Agregar CLIENTE</a>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>8. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div> 
                        <!-- ACTIONBYTE  --> 
                        <?php }if($reporte->getCod_cliente_partner()==12){ ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"> 
                                    <label>1. Fecha de Reporte </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                    <div class="form-group">
                                    <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>2. Consultor </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                    <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>3. Módulo SAP  </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="mod_sap" id="mod_sap" class="form-control" required>
                                            <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                            <?php
                                            foreach ($listMod_sap as $t) {
                                                echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>4. Cliente Partner </label>
                                        <div class="form-group">
                                        <label class="bmd-label-floating"></label>
                                        <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                                <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                                <?php
                                                foreach ($listCliente_partner as $e) {
                                                    echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>5. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
					            <label>Colocar Hora de Inicio - Hora de Fin </label>
					            <div class="form-group">
					            <label>Ejemplo: 08:00 AM - 10:00 AM</label>
                                <div class="form-group">
					            <label>Colocar ID del proyecto</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
					            </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div> 

                        <!-- SUCAFINA  --> 
                        <?php }if($reporte->getCod_cliente_partner()==13){ ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"> 
                                    <label>1. Fecha de Reporte </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                    <div class="form-group">
                                    <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>2. Consultor </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                    <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>3. Módulo SAP  </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="mod_sap" id="mod_sap" class="form-control" required>
                                            <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                            <?php
                                            foreach ($listMod_sap as $t) {
                                                echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>4. Cliente Partner </label>
                                        <div class="form-group">
                                        <label class="bmd-label-floating"></label>
                                        <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                                <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                                <?php
                                                foreach ($listCliente_partner as $e) {
                                                    echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>5. Cliente SUCAFINA</label>				
                                            <div class="form-group">
                                                <select name="clienteSuca" id="clienteSuca" class="form-control" required>
                                                        <option value='<?php echo $sub_cliente_partnerAxity->getCod_sub_cliente_partner();?>'><?php echo $sub_cliente_partnerAxity->getNombre_sub_cliente_partner(); ?></option>';
                                                        <?php
                                                            foreach ($listCliente_partnerSuca as $t) {
                                                                echo '<option value=' . $t->getCod_sub_cliente_partner() . '>' . $t->getNombre_sub_cliente_partner() . '</option>';
                                                            }
                                                        ?>
                                                </select>					
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                <a href="?menu=agregarClienteAva" class="btn btn-primary btn-round">Agregar CLIENTE</a>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>8. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div> 
                        
                        <!-- ICE  --> 
                        <?php }if($reporte->getCod_cliente_partner()==15){ ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"> 
                                    <label>1. Fecha de Reporte </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                    <div class="form-group">
                                    <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>2. Consultor </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                    <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>3. Módulo SAP  </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="mod_sap" id="mod_sap" class="form-control" required>
                                            <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                            <?php
                                            foreach ($listMod_sap as $t) {
                                                echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>4. Cliente Partner </label>
                                        <div class="form-group">
                                        <label class="bmd-label-floating"></label>
                                        <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                                <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                                <?php
                                                foreach ($listCliente_partner as $e) {
                                                    echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>5. Cliente ICE</label>				
                                            <div class="form-group">
                                                <select name="clienteSuca" id="clienteSuca" class="form-control" required>
                                                        <option value='<?php echo $sub_cliente_partnerAxity->getCod_sub_cliente_partner();?>'><?php echo $sub_cliente_partnerAxity->getNombre_sub_cliente_partner(); ?></option>';
                                                        <?php
                                                            foreach ($listCliente_partnerIce as $t) {
                                                                echo '<option value=' . $t->getCod_sub_cliente_partner() . '>' . $t->getNombre_sub_cliente_partner() . '</option>';
                                                            }
                                                        ?>
                                                </select>					
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                <a href="?menu=agregarClienteIce" class="btn btn-primary btn-round">Agregar CLIENTE</a>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>8. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div> 
                        <!-- EVEDISA  --> 
                        <?php }if($reporte->getCod_cliente_partner()==16){ ?>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group"> 
                                    <label>1. Fecha de Reporte </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                                    <div class="form-group">
                                    <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="<?php echo $reporte->getFecha_de_reporte() ?>" required>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>2. Consultor </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" class="form-control" name="nombreConsultor" id="nombreConsultor"value="<?php echo $usuario->getNombre_usuario() ?> <?php echo $usuario->getApellido_usuario() ?>" disabled>
                                    <input type="text" class="form-control" name="idEditar" id="idEditar"value="<?php echo $idEditar ?>" hidden>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                    <label>3. Módulo SAP  </label>
                                    <div class="form-group">
                                    <label class="bmd-label-floating"></label>
                                    <select name="mod_sap" id="mod_sap" class="form-control" required>
                                            <option value='<?php echo $reporte->getCod_mod_sap(); ?>'><?php echo $mod_sap->getNombre_mod_sap(); ?></option>
                                            <?php
                                            foreach ($listMod_sap as $t) {
                                                echo '<option value=' . $t->getCod_mod_sap() . '>' . $t->getNombre_mod_sap() . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>4. Cliente Partner </label>
                                        <div class="form-group">
                                        <label class="bmd-label-floating"></label>
                                        <select name="cliente_partner" id="cliente_partner" class="form-control" required>
                                                <option value='<?php echo $cliente_partner->getCod_cliente_partner(); ?>'><?php echo $cliente_partner->getNombre_cliente_partner(); ?></option>
                                                <?php
                                                foreach ($listCliente_partner as $e) {
                                                    echo '<option value=' . $e->getCod_cliente_partner() . ' disabled >' . $e->getNombre_cliente_partner() . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>5. Descripción de las actividades</label>
                                <div class="form-group">
                                <label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
                                <div class="form-group">
                                <label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
                                <div class="form-group">
					            <label>Colocar Hora de Inicio - Hora de Fin </label>
					            <div class="form-group">
					            <label>Ejemplo: 08:00 AM - 10:00 AM</label>
                                <div class="form-group">
					            <label>Colocar ID del proyecto</label>
                                <div class="form-group">
                                <textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required><?php echo $reporte->getDescripcion_actividad(); ?></textarea>
                                    <div class="the-count">
                                        <span id="current">0</span>
                                        <span id="maximum">/ 1000</span>
                                    </div>
                                </div>
                                </div>
                                </div>
					            </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>6. Horas Trabajadas</label>
                                <div class="form-group">
                                <label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
                                <div class="form-group">
                                <input type="number"  placeholder="0.0" step="0.5" min="0" max="24" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="<?php echo $reporte->getHoras_trabajadas(); ?>" required>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                <label>7. Lugar de trabajo</label>
                                <div class="form-group">
                                <select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
                                            <option value='<?php echo $reporte->getLugar_de_trabajo(); ?>'><?php echo $reporte->getLugar_de_trabajo(); ?></option>
                                            <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
                                            <option value="Oficina (Presencial)">Oficina (Presencial)</option>
                                        </select>
                                
                                </div>
                                </div>
                            </div>
                            <div class="col-md-10">
                            <button class="btn btn-primary" type='submit'>Guardar</button>
                            </div>
                        </div> 
                        <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>