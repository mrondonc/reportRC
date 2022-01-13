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
	session_start();
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

	$cod_usuario  =  $_SESSION['cod_usuario'];
	$usuario = ManejoUsuario::consultarUsuario($cod_usuario);

	//$mod_sap = ManejoMod_sap::consultarMod_sap($usuario->getCod_mod_sap());
	$listMod_sap = ManejoMod_sap::getList();

	$listSub_mod_sap = ManejoSub_mod_sap::getListAxity();

	$listCliente_partner = ManejoCliente_partner::getList();
	$listCliente_partnerAxity = ManejoSub_cliente_partner::getListAxity();
	$listCliente_partnerEveris = ManejoSub_cliente_partner::getListEveris();
	$listCliente_partnerMillo = ManejoSub_cliente_partner::getListMillo();
	$listPepCliente = ManejoPep_cliente::getListSeidor();
	$listNoTicket = ManejoNo_ticket::getListAxity();

	$cliente_partner=$_POST["cliente_partner"];

	//CLIENTE AXITY
	if ($cliente_partner == 1) {
		
			//foreach ($listCliente_partnerAxity as $t) {
				//foreach ($listSub_mod_sap as $e) {
	    echo  
		'
			<div class="row">
				<div class="col-md-10">
					<div class="form-group">
					<label>5. Cliente Axity</label>
					
					<div class="form-group">
					<select name="clienteAxity" id="clienteAxity" class="form-control" required>
								<option value="0">Seleccione alguna opcion</option>';
								foreach ($listCliente_partnerAxity as $t) {
								echo '
									<option value='. $t->getCod_sub_cliente_partner().'>'.$t->getNombre_sub_cliente_partner().'</option>

								
                                ';}
								echo '
                            </select>
					
					</div>
					</div>
				</div>
				<div class="col-md-2">
				<a href="?menu=agregarClienteAxity&cod_usuario='. $usuario->getCod_usuario() .'" class="btn btn-primary btn-round">Agregar CLIENTE</a>
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
				<div class="col-md-10">
					<div class="form-group">
					<label>7. Indicar No de Ticket / No Aplica Ticket</label>
					<div class="form-group">
					<label>Colocar Numero del Ticket en caso que aplique / Si no tiene Numero colocar (No Aplica Ticket)</label>
					<div class="form-group">
					<select name="noTicket" id="noTicket" class="form-control" required>
								<option value="0">Seleccione alguna opcion</option>';
                                foreach ($listNoTicket as $o) {
                                
                                    echo '<option value='.$o->getCod_no_ticket().'>'.$o->getReferencia_no_ticket() .'</option>';
                                
								}
					echo ' </select>
					</div>
					</div>
					</div>
				</div>
				<div class="col-md-2">
				<a href="?menu=agregarNoTicketAxity&cod_usuario='. $usuario->getCod_usuario() .'" class="btn btn-primary btn-round">Agregar No. Ticket</a>
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
					<input type="number" placeholder="0.0" step="0.01" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
                                <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
                            </select>
					
					</div>
					</div>
				</div>
			</div>
		';
			//}
		//CLIENTE EVERIS
	 }else if ($cliente_partner == 2) {
		//foreach ($listCliente_partnerEveris as $t) {
	    echo 
		'
			<div class="row">
			<div class="col-md-10">
				<div class="form-group">
				<label>5. Cliente Everis</label>				
				<div class="form-group">
				<select name="clienteEveris" id="clienteEveris" class="form-control" required>
						<option value="0">Seleccione alguna opcion</option>';
						foreach ($listCliente_partnerEveris as $t) {
							echo'
						<option value='. $t->getCod_sub_cliente_partner().'>'.$t->getNombre_sub_cliente_partner().'</option>
						';}
						echo '	
				</select>					
				</div>
				</div>
				</div>
				<div class="col-md-2">
				<a href="?menu=agregarClienteEveris&cod_usuario='. $usuario->getCod_usuario() .'" class="btn btn-primary btn-round">Agregar CLIENTE</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>6. Descripción de las actividades</label>
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
					<label>7. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number"  placeholder="0.0" step="0.01" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
					</div>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>8. Lugar de trabajo</label>
					<div class="form-group">
					<select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
								<option value="0">Seleccione alguna opcion</option>
                                <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
                            </select>
					
					</div>
					</div>
				</div>
			</div>
		';
			//}
		//CLIENTE LUCTA
	 }else if ($cliente_partner == 3) {
	    echo 
		'
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>5. Descripción de las actividades</label>
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
					<label>6. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" step="0.01" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					</div>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>7. Lugar de trabajo</label>
					<div class="form-group">
					<select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
								<option value="0">Seleccione alguna opcion</option>
								<option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
							</select>
					
					</div>
					</div>
				</div>
			</div>
		';
		//CLIENTE MILLO
	 }else if ($cliente_partner == 4) {
		//foreach ($listCliente_partnerMillo as $t) {
	    echo 
		'
		<div class="row">
			<div class="col-md-10">
				<div class="form-group">
				<label>5. Cliente Millo</label>				
				<div class="form-group">
				<select name="clienteMillo" id="clienteMillo" class="form-control" required>
						<option value="0">Seleccione alguna opcion</option>';
						foreach ($listCliente_partnerMillo as $t) {
							echo'
						<option value='. $t->getCod_sub_cliente_partner().'>'.$t->getNombre_sub_cliente_partner().'</option>	
						'; }
						echo '
				</select>					
				</div>
				</div>
				</div>
				<div class="col-md-2">
				<a href="?menu=agregarClienteMillo&cod_usuario='. $usuario->getCod_usuario() .'" class="btn btn-primary btn-round">Agregar CLIENTE</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>6. Descripción de las actividades</label>
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
					<label>7. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number"  placeholder="0.0" step="0.01" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
					</div>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>8. Lugar de trabajo</label>
					<div class="form-group">
					<select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
								<option value="0">Seleccione alguna opcion</option>
                                <option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
                            </select>
					
					</div>
					</div>
				</div>
			</div>	 
		';
			//}
		//CLIENTE PRAXIS
	 }else if ($cliente_partner == 5) {
	    echo 
		'
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>5. Descripción de las actividades</label>
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
					<label>6. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" step="0.01" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
					</div>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>7. Lugar de trabajo</label>
					<div class="form-group">
					<select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
								<option value="0">Seleccione alguna opcion</option>
								<option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
							</select>
					
					</div>
					</div>
				</div>
			</div>	  
		';
		//CLIENTE SEIDOR
	 }else if ($cliente_partner == 6) {
		//foreach ($listPepCliente as $t) {
	    echo 
		'
		<div class="row">
		<div class="col-md-10">
			<div class="form-group">
				<label>5. PEP del cliente</label>				
				<div class="form-group">
				<label>Seleccionar el PEP del cliente que atendieron (si no esta el PEP relacionado, antes de cargar, por favor notificar a la Coordinadora y colocar el PEP que falta en el campo otros).</label>				
				<div class="form-group">
				<select name="pepCliente" id="pepCliente" class="form-control" required>
						<option value="0">Seleccione alguna opcion</option>';
						foreach ($listPepCliente as $t) {
							echo '
						<option value='. $t->getCod_pep_cliente().'>'.$t->getReferencia_pep_cliente().'</option>	
						'; }
						echo '
				</select>					
				</div>
				</div>
				</div>
			</div>
			<div class="col-md-2">
				<a href="?menu=agregarPepCliente&cod_usuario='. $usuario->getCod_usuario() .'" class="btn btn-primary btn-round">Agregar PEP</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
				<label>6. Descripción de las actividades</label>
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
				<label>7. Horas Trabajadas</label>
				<div class="form-group">
				<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
				<div class="form-group">
				<input type="number" placeholder="0.0" step="0.01" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
				
				</div>
				</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
				<label>8. Lugar de trabajo</label>
				<div class="form-group">
				<select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
							<option value="0">Seleccione alguna opcion</option>
							<option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
						</select>
				
				</div>
				</div>
			</div>
		</div>	 
		';
			//}
		//CLIENTE INTERNO RC
	 }else if ($cliente_partner == 7) {
	    echo 
		'
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>5. Descripción de las actividades</label>
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
					<label>6. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" step="0.01" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
					</div>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					<label>7. Lugar de trabajo</label>
					<div class="form-group">
					<select name="lugarTrabajo" id="lugarTrabajo" class="form-control" required>
								<option value="0">Seleccione alguna opcion</option>
								<option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
							</select>
					
					</div>
					</div>
				</div>
			</div>	 
		';
	 }

?>