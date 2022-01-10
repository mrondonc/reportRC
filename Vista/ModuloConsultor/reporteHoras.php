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

$cod_usuario  =  $_SESSION['cod_usuario'];
$usuario = ManejoUsuario::consultarUsuario($cod_usuario);

$mod_sap = ManejoMod_sap::consultarMod_sap($usuario->getCod_mod_sap());
$listMod_sap = ManejoMod_sap::getList();

$listCliente_partner = ManejoCliente_partner::getList();
?>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">                
                <center>
                    <h4 class="card-title">Reportes de horas Diario RC</h4>
                </center>
                <p class="card-category">El formulario a continuación, les permitirá poder registrar las horas de trabajadas de manera
                diaria con los clientes que atiende, quedando registrado en una base, donde el Coordinador Administrativo y 
                de RRHH tendrá acceso.
                </p>
                <br>
                <p class="card-category">Si presenta alguna novedad de reporte mal realizada, por favor, enviarle un correo a la 
                    Coordinadora indicando cual fue el que quedo mal.
                </p>
                <br>
                <p class="card-category">Importante: por cada actividad se debe crear un nuevo formulario.</p>
                <br>
                <p class="card-category">Gracias!</p>
                <br>
                <p class="card-category">NOTA: al final del formulario, puede visualizar su respuesta.</p>
            </div>
            <!-- Inicio Formulario -->
            <div class="card-body">
                <form method="POST" action="ModuloConsultor/crearReporteHoras.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group"> 
                            <label>1. Fecha de Reporte </label>
                            <div class="form-group">
                            <label class="bmd-label-floating">Por favor indicar el día que trabajo.</label>
                            <div class="form-group">
                            <input type="date" class="form-control" name="fechaReporte" id="fechaReporte" value="" required>
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
                            <label>3. Modulo SAP </label>
                            <div class="form-group">
                            <label class="bmd-label-floating"></label>
                            <select name="mod_sap" id="mod_sap" class="form-control" required>
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
                        <div class="col-md-2">
                            <a href="?menu=agregarModSap&cod_usuario=<?php echo $usuario->getCod_usuario() ?>" class="btn btn-primary btn-round">Agregar MODULO</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>4. Cliente Partner </label>
                                <div class="form-group">
                                <label class="bmd-label-floating"></label>
                                <select onchange="selectTipo()" name="cliente_partner" id="cliente_partner" class="form-control"  required>
                                        <option value='0'>Seleccione alguna opcion</option>
                                        <?php
                                        foreach ($listCliente_partner as $e) {
                                            echo '<option value=' . $e->getCod_cliente_partner() . '>' . $e->getNombre_cliente_partner() . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="customar__field" id="espacioTipo" name="espacioTipo">
                            </div>
                        </div>
                        <button class="btn btn-primary" type='submit'>Enviar</button>
                    </div>       
                </form>                  
            </div>
        </div>
    </div>        
</div>
        
<script>
  function selectTipo() {
  var cliente_partner = $("#cliente_partner").val();
  $.ajax({
    url:"ModuloConsultor/selectTipo.ajax.php",
    method: "POST",
    data: {
      "cliente_partner":cliente_partner
      },
      success: function(respuesta){
        $("#espacioTipo").html(respuesta);
      }
    })
  }
</script>