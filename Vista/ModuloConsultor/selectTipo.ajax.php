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
	require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/No_ticket.php';
	require_once ($_SERVER["DOCUMENT_ROOT"]) . '/reportRC/Negocio/ManejoNo_ticket.php';
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
	ManejoNo_ticket::setConexionBD($conexion);
	ManejoPep_cliente::setConexionBD($conexion);
	ManejoMod_sap::setConexionBD($conexion);
	ManejoSub_mod_sap::setConexionBD($conexion);
	ManejoCliente_partner::setConexionBD($conexion);

	//$cod_usuario  =  $_SESSION['cod_usuario'];
	//$usuario = ManejoUsuario::consultarUsuario($cod_usuario);

	//$mod_sap = ManejoMod_sap::consultarMod_sap($usuario->getCod_mod_sap());
	$listMod_sap = ManejoMod_sap::getList();

	$listSub_mod_sap = ManejoSub_mod_sap::getList();

	$listCliente_partner = ManejoCliente_partner::getList();
	$listCliente_partnerAxity = ManejoSub_cliente_partner::getListAxity();
	$listCliente_partnerEveris = ManejoSub_cliente_partner::getListEveris();
	$listCliente_partnerMillo = ManejoSub_cliente_partner::getListMillo();

	$cliente_partner=$_POST["cliente_partner"];

	if ($cliente_partner == 1) {
		
			foreach ($listCliente_partnerAxity as $t) {
				//foreach ($listSub_mod_sap as $e) {
	    echo  
		'
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>5. Cliente  Axity</label>
					
					<div class="form-group">
					<select name="clienteAxity" id="clienteAxity" class="form-control" required>
								<option value="0">Seleccione alguna opcion</option>
                                                          
								
									<option value='. $t->getCod_sub_cliente_partner().'>'.$t->getNombre_sub_cliente_partner().'</option>

								
                                
                            </select>
					
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>6. Modulo SAP</label>
					<div class="form-group">
					<select name="modSapList" id="modSapList" class="form-control" required>
								<option value="0">Seleccione alguna opcion</option>';
                                foreach ($listSub_mod_sap as $e) {
                                
                                    echo '<option value='.$e->getCod_sub_mod_sap().'>'.$e->getNombre_sub_mod_sap() .'</option>';
                                
								}
                            echo ' </select>
					
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>7. Indicar No de Ticket / No Aplica Ticket</label>
					<div class="form-group">
					<label>Colocar Numero del Ticket en caso que aplique / Si no tiene Numero colocar (No Aplica Ticket)</label>
					<div class="form-group">
					<input type="text" class="form-control" name="noTicket" id="noTicket" value="" required>
					</div>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>8. Descripción de las actividades</label>
					<div class="form-group">
					<label>Ejemplo SEIDOR: SIN TICKET CLIENTE/CON TICKET CLIENTE - PEP Cliente/Nombre del cliente -Iniciales del Consultor: Actividad a Realizar (No colocar reuniones con el cliente, especificar que hicieron en la Reunión) = Con Ticket PETROMIL 12345 - GL: Restructuración del Sistema en vivo.</label>
					<div class="form-group">
					<label>Ejemplo Axity: Ticket No / No aplica Ticket - Mall Plaza - GL: Desarrollo en Vivo del sistema</label>
					<div class="form-group">
					<input type="text" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required>
					</div>
					</div>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>9. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="text" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
					</div>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>10. Lugar de trabajo</label>
					<div class="form-group">
					<select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
								<option value="0">Seleccione alguna opcion</option>
                                <option value="1">Remoto-Home office-Teletrabajo</option>
								<option value="2">Oficina (Presencial)</option>
                            </select>
					
					</div>
					</div>
				</div>
			</div>
		';
			}
		//}
	 }else if ($cliente_partner == 2) {
	    echo 
		'
			#
		';
	 }else if ($cliente_partner == 3) {
	    echo 
		'
			#  
		';
	 }else if ($cliente_partner == 4) {
	    echo 
		'
			#  
		';
	 }else if ($cliente_partner == 5) {
	    echo 
		'
			#  
		';
	 }else if ($cliente_partner == 6) {
	    echo 
		'
			#  
		';
	 }else if ($cliente_partner == 7) {
	    echo 
		'
			#  
		';
	 }

?>