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
	session_start();
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
	$usuario = ManejoUsuario::consultarUsuario($cod_usuario);

	//$mod_sap = ManejoMod_sap::consultarMod_sap($usuario->getCod_mod_sap());
	$listMod_sap = ManejoMod_sap::getListActivo();

	$listSub_mod_sap = ManejoSub_mod_sap::getListActivo();

	$listCliente_partner = ManejoCliente_partner::getListActivo();
	$listCliente_partnerAxity = ManejoSub_cliente_partner::getListAxityActivo();
	$listCliente_partnerEveris = ManejoSub_cliente_partner::getListEverisActivo();
	$listCliente_partnerMillo = ManejoSub_cliente_partner::getListMilloActivo();
	$listCliente_partnerItges = ManejoSub_cliente_partner::getListItgesActivo();
	$listCliente_partnerAva = ManejoSub_cliente_partner::getListAVAActivo();
	$listCliente_partnerSuca = ManejoSub_cliente_partner::getListSUFACINAActivo();
	$listPepCliente = ManejoPep_cliente::getListSeidorActivo();
	//$listNoTicket = ManejoNo_ticket::getListAxity();

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
								<option value="">Seleccione alguna opcion</option>';
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
								<option value="">Seleccione alguna opcion</option>';
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
					<input maxlength="1000" type="text" class="form-control" name="noTicket" id="noTicket" value="" required>
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
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required></textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>9. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
								<option value="">Seleccione alguna opcion</option>
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
						<option value="">Seleccione alguna opcion</option>';
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
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required></textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>7. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
								<option value="">Seleccione alguna opcion</option>
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
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required></textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>6. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
								<option value="">Seleccione alguna opcion</option>
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
						<option value="">Seleccione alguna opcion</option>';
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
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required></textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>7. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
								<option value="">Seleccione alguna opcion</option>
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
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required></textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>6. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
								<option value="">Seleccione alguna opcion</option>
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
						<option value="">Seleccione alguna opcion</option>';
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
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required></textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>7. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
							<option value="">Seleccione alguna opcion</option>
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
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required></textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>6. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
								<option value="">Seleccione alguna opcion</option>
								<option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
							</select>
					
					</div>
					</div>
				</div>
			</div>	 
		';
	 	//CLIENTE ITGES
	}else if ($cliente_partner == 10) {
		echo 
		'
			<div class="row">
				 <div class="col-md-10">
				 <div class="form-group">
				 <label>5. Cliente ITGES</label>				
				 <div class="form-group">
				 <select name="clienteItges" id="clienteItges" class="form-control" required>
						 <option value="">Seleccione alguna opcion</option>';
						 foreach ($listCliente_partnerItges as $t) {
							 echo'
						 <option value='. $t->getCod_sub_cliente_partner().'>'.$t->getNombre_sub_cliente_partner().'</option>	
						 '; }
						 echo '
				 </select>					
				 </div>
				 </div>
				 </div>
				 <div class="col-md-2">
				 <a href="?menu=agregarClienteItges" class="btn btn-primary btn-round">Agregar CLIENTE</a>
				 </div>
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
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required></textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>7. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
								<option value="">Seleccione alguna opcion</option>
								<option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
							</select>
					
					</div>
					</div>
				</div>
			</div>	 
		';
	 	//CLIENTE AVA CONSULTING
	}else if ($cliente_partner == 11) {
		echo 
		'
			<div class="row">
				 <div class="col-md-10">
				 <div class="form-group">
				 <label>5. Cliente AVA CONSULTING</label>				
				 <div class="form-group">
				 <select name="clienteAva" id="clienteAva" class="form-control" required>
						 <option value="">Seleccione alguna opcion</option>';
						 foreach ($listCliente_partnerAva as $t) {
							 echo'
						 <option value='. $t->getCod_sub_cliente_partner().'>'.$t->getNombre_sub_cliente_partner().'</option>	
						 '; }
						 echo '
				 </select>					
				 </div>
				 </div>
				 </div>
				 <div class="col-md-2">
				 <a href="?menu=agregarClienteAva" class="btn btn-primary btn-round">Agregar CLIENTE</a>
				 </div>
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
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required></textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>7. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
								<option value="">Seleccione alguna opcion</option>
								<option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
							</select>
					
					</div>
					</div>
				</div>
			</div>	 
		';
		//CLIENTE ACTIONBYTE
	}else if ($cliente_partner == 12) {
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
					<label>Colocar Hora de Inicio - Hora de Fin </label>
					<div class="form-group">
					<label>Ejemplo: 08:00 AM - 10:00 AM</label>
					<div class="form-group">
					<label>Colocar el ID del proyecto</label>
					<div class="form-group">
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" required> asdasd</textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>6. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
								<option value="">Seleccione alguna opcion</option>
								<option value="Remoto-Home office-Teletrabajo">Remoto-Home office-Teletrabajo</option>
								<option value="Oficina (Presencial)">Oficina (Presencial)</option>
							</select>
					
					</div>
					</div>
				</div>
			</div>	 
		';
	 	//CLIENTE SUCAFINA
	}else if ($cliente_partner == 13) {
		echo 
		'
			<div class="row">
				 <div class="col-md-10">
				 <div class="form-group">
				 <label>5. Cliente SUCAFINA</label>				
				 <div class="form-group">
				 <select name="clienteSuca" id="clienteSuca" class="form-control" required>
						 <option value="">Seleccione alguna opcion</option>';
						 foreach ($listCliente_partnerSuca as $t) {
							 echo'
						 <option value='. $t->getCod_sub_cliente_partner().'>'.$t->getNombre_sub_cliente_partner().'</option>	
						 '; }
						 echo '
				 </select>					
				 </div>
				 </div>
				 </div>
				 <div class="col-md-2">
				 <a href="?menu=agregarClienteSuca" class="btn btn-primary btn-round">Agregar CLIENTE</a>
				 </div>
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
					<textarea maxlength="1000" class="form-control" name="descripcionActividades" id="descripcionActividades" value="" required></textarea>
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
				<div class="col-md-12">
					<div class="form-group">
					<label>7. Horas Trabajadas</label>
					<div class="form-group">
					<label>Por favor indicar en Numero (p.e. 3) las horas trabajadas de ese día</label>
					<div class="form-group">
					<input type="number" placeholder="0.0" max="24" min="0" step="0.5" class="form-control" name="horasTrabajadas" id="horasTrabajadas" value="" required>
					
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
								<option value="">Seleccione alguna opcion</option>
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

<script>
	$('textarea').keyup(function() {
    
	var characterCount = $(this).val().length,
		current = $('#current'),
		maximum = $('#maximum'),
		theCount = $('.the-count');
	  
	current.text(characterCount);
		
  });
</script>